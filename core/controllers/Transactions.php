<?php

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Item;
use Core\Models\Transaction;

class Transactions extends Controller
{

    public function __construct()
    {
        $this->authorize(['accountant', 'admin']);
    }

    function __destruct()
    {
        self::unset_admin();
    }

    public function render(): View
    {
        return $this->view($this->view, $this->data);
    }


    public function list()
    {
        self::set_admin();
        $trans = new Transaction();
        $items = new Item();
        $all_trans = $trans->get_all();
        //to switch item id in the transactions table to the item name in items table
        foreach ($all_trans as $key => $one_trans) {
            $temp_items = $items->get_by_id($one_trans->item_id);
            $all_trans[$key]->item_id = !empty($temp_items) ? $temp_items->name : "Deleted Item";
        }

        //total of transactions
        $total_of_sales = $trans->get_all();
        $total_arr = array();
        foreach ($total_of_sales as $trans) {
            if (empty($price = $items->get_by_id($trans->item_id)->selling_price)) {
                continue;
            }
            $total = $price *= $trans->quantity;
            array_push($total_arr, $total);
        }
        $final_total = array_sum($total_arr);


        $this->data['trans'] = $all_trans;
        $this->data['total'] = $final_total;
        $this->view = ('admin.transactions.list');
    }

    public function single()
    {
        self::set_admin();
        $trans = new Transaction();
        $items = new Item();
        $selected_item = $trans->get_by_id($_GET['id']);
        $temp_items = $items->get_by_id($selected_item->item_id);
        $selected_item->item_id = !empty($temp_items) ? $items->get_by_id($selected_item->item_id)->name : header("Location: /404");
        $this->data['trans'] = $selected_item;
        $this->view = ('admin.transactions.single');
    }



    public function edit()
    {
        self::set_admin();
        $trans = new Transaction();
        $items = new Item();
        $all_items = $items->get_all();
       
        $this->data['items'] = $all_items;
        
        $this->data['trans'] = $trans->get_by_id($_GET['id']);
        $this->data['trans_name'] = 
        $this->view = ('admin.transactions.edit');
    }


    public function update()
    {
        self::set_admin();
        $trans = new Transaction();
        $trans->update($_POST['id'], [
            'item_id' => $_POST['trans_name'],
            'quantity' => $_POST['trans_qty']


        ]);
        header("Location: /admin/transactions");
    }


    public function delete()
    {
        self::set_admin();
        $trans = new Transaction();
        $trans->delete($_POST['trans_id']);
        header("Location: /admin/transactions");
    }
}

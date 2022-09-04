<?php

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Item;
use Core\Models\Transaction;

class Sellings extends Controller
{

    public function __construct()
    {
        $this->authorize(['seller', 'admin']);
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
        $list_of_trans = $trans->select_where_relation($_SESSION['user']->user_id)->all();

        foreach ($list_of_trans as $one_trans) {
            $item_name  =  $items->get_by_id($one_trans->trans_id)->name;
            $price = $items->get_by_id($one_trans->trans_id)->selling_price;
            $cost = $items->get_by_id($one_trans->trans_id)->cost;
            $all_items =  $items->get_all();

            $selected_item[] = (object) [
                'name' =>  $item_name,
                'quantity' => $one_trans->quantity,
                'id' => $one_trans->id,
                'price' => $price,
                'cost' => $cost,
            ];
        }
        $all_items = $items->get_all();
        $all_trans = $trans->get_all();

        if (!empty($selected_item)) {
            $this->data['trans'] = $selected_item;
        }

        $this->data['trans_quantity'] =  $list_of_trans;
        $this->data['items'] =  $all_items;
        $this->data['transaction'] =  $all_trans;
        $this->view = ('admin.sellings.list');
    }


    public function delete()
    {
        self::set_admin();
        $trans = new Transaction();
        $trans->delete_trans($_POST['trans_id']);
        header("Location: /admin/sellings");
    }


    public function store()
    {

        self::set_admin();
        $trans = new Transaction;
        $items = new Item;
        $all_items = $items->get_all();
        //Check Stock Availability
        $selling_product = true;
        $status = true;
        foreach ($all_items as $item) {
            if ($item->id == $_POST['item_name']) {
                if ($item->stock_available_qty == 'out_of_stock') {
                    $status = false;
                }
            }
        }


        if ($status) {
            if (!empty($_POST['quantity']) && !empty($_POST['item_name']) && ($_POST['item_name'] != 0)) {
                if (isset($_POST['quantity']) && isset($_POST['item_name'])) {
                    $trans->store_relation_user_trans_id($_SESSION['user']->user_id, $_POST['item_name'], $_POST['quantity']);

                    $trans->insert(
                        [
                            'item_id' => $_POST['item_name'],
                            'quantity' => $_POST['quantity']
                        ]
                    );
                }
            }
            header("Location: /admin/sellings");
        } else {
            header("Location: /empty");
        }
    }
}

<?php

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Item;
use Core\Models\Option;
use Core\Models\Transaction;
use Core\Models\User;


class Admin extends Controller
{

    public function render(): View
    {
        $this->auth(); 
        self::set_admin();

        //site title
        $option = new Option;
        $title = $option->get_option('site_title');
        $slogan = $option->get_option('site_slogan');


        //number of users
        $user = new User();
        $user_count = count($user->get_all());

        //number of transactions
        $transaction = new Transaction();
        $trans_count = count($transaction->get_all());

        //number of items
        $item = new Item();
        $item_count = count($item->get_all());

        //Total of sales
        $total_of_sales = $transaction->get_all();
        $total_arr = array();
        foreach ($total_of_sales as $trans) {
            if (empty($price =$item->get_by_id($trans->item_id)->selling_price)){
                continue;
            }
            $total = $price *= $trans->quantity;
            array_push($total_arr, $total);
          }
        $final_total = array_sum($total_arr);
   


        //Top five expensive items to buy
        $top_five_expensive_item = $item->get_order_by();
        $reslut_of_top = null;
        foreach ($top_five_expensive_item as $top) {
            $reslut_of_top .= '.' . $top->name;
            $arr_result = explode('.', $reslut_of_top);
        }


   return $this->View('admin.dashboard', [
            'num_of_users' => $user_count,
            'num_of_trans' => $trans_count,
            'num_of_items' => $item_count,
            'total_of_sales' => $final_total,
            'top_five_expensive_item' => $arr_result,
            'site_title' => $title,
            'site_slogan' => $slogan
        ]);
    }
    function __destruct()
    {
        self::unset_admin();
    }
}

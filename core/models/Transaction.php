<?php
namespace Core\Models;

use Core\Base\Collection;
use Core\Base\Model;

class Transaction extends Model {



    function store_relation_user_trans_id($session_user_id, $trans_id,$quantity)
    {
        $query = "INSERT INTO users_trans (user_id,trans_id,quantity) VALUES($session_user_id,$trans_id,$quantity) ;";
        $execution = $this->connection->query($query);
        return $execution;
    }


    function select_where_relation($user_id)   
    {
        $query = "SELECT * FROM users_trans WHERE user_id ='$user_id';";
        $collection = new Collection($this->connection, $query);
        $this->data = $collection->data;
        return $this;
    }


    function delete_trans($id)
    {
        $query = "DELETE FROM users_trans WHERE id=$id";
        return $this->connection->query($query);
    }


}
<?php 

namespace Core\Models;

use Core\Base\Collection;
use Core\Base\Model;

class Item extends Model{


function get_order_by()
{
    $query = "SELECT * FROM $this->table ORDER BY selling_price DESC LIMIT 5;";
    $collection = new Collection($this->connection, $query);
    return $collection->data;
}

}
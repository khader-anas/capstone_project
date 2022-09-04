<?php
namespace Core\Controllers;
 
use Core\Base\Controller;
use Core\Base\View;
// this controller to direct if the item out of stock
class Outs extends Controller{


    public function render(): View
    {
        self::set_admin();
        return $this->view('out',[0]);
        
    }


    function __destruct()
    {
        self::unset_admin();
    }
}
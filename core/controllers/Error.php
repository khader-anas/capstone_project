<?php
namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;

class Error extends Controller{


    public function render(): View
    {
        self::set_admin();
        return $this->view('404',[0]);
    }


    function __destruct()
    {
        self::unset_admin();
    }
}
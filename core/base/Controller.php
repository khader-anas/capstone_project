<?php
//parent class

namespace Core\Base;

use Core\Models\User;

abstract class Controller
{
    public $view;
    public $data = [];


    abstract public function render(): View; 

    protected function view($view, $data = [])   // we will create function with name view to return View () 
    {
        return new View($view, $data);
    }

    public static function set_admin()
    {

        $_SESSION['admin'] = true;
    }

    public static function unset_admin()
    {

        unset($_SESSION['admin']);
    }


    protected function auth()
    {
        $auth = false;
        if (isset($_SESSION['user']->logged)) {
            if ($_SESSION['user']->logged == true) {
                $auth = true;
            }
        }
        if (!$auth) {
            header("Location: /");
        }
    }


    protected function authorize($provided_permission)
    {
        $this->auth();
        $redirect = true;
        $current_user = new User();
        $current_login_user = $current_user->get_by_id($_SESSION['user']->user_id);
        $user_permissions = explode(",", $current_login_user->role);
        if (is_array($provided_permission)) {     
            foreach ($provided_permission as $permission) {
                if (in_array($permission, $user_permissions)) {
                    $redirect= false;
                    break;
                }
            }
        } else {                                  
            if (in_array($provided_permission, $user_permissions)) {
                $redirect= false;
            }
        }

        if($redirect){
            header("Location: /admin");

        }
    }
}

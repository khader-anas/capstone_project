<?php

use Core\Models\User;

function redirect($url)
{
    header("Location: $url");
}

function check_permission($permission)
{

    $authorized = false;
    $current_user = new User();
    $current_login_user = $current_user->get_by_id($_SESSION['user']->user_id);
    $permissions = explode(",", $current_login_user->role);
    if (in_array($permission, $permissions)) {
        $authorized = true;
    }
    return $authorized;
}

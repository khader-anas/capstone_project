<?php
session_start();

require_once './config.php';
require_once './functions.php';

use Core\Models\User;
use Core\Router;


spl_autoload_register(function ($class_name) {
    // Core\Router
    $file_path = __DIR__;   //C:\xampp\htdocs\htucms 

    $class_name = explode('\\', $class_name);
    // array(2) { [0]=> string(4) "Core" [1]=> string(6) "Router" }
    foreach ($class_name as  $key => $value) {
        if ($key != array_key_last($class_name)) {
            $class_name[$key] = strtolower($value);
        }
        $file_path .= '/' . $class_name[$key];
    }
    $file_path .= '.php ';
    require_once $file_path;
});


if (isset($_COOKIE['pass_user'])) {
    $user = new User;
    $auth_user = $user->get_by_id($_COOKIE['pass_user']);
    if (!empty($auth_user)) {
        $_SESSION['user'] = (object)[
            'username' => $auth_user->username,
            'display_name' => $auth_user->display_name,
            'user_id' => $auth_user->id,
            'logged' => true
        ];
    }
}


//Public Routes
Router::get('/admin', 'admin');
Router::get('/', 'login.form');
Router::post('/login', 'login.authenticate');
Router::post('/logout', 'login.logout');
//Error page route
Router::get('/404', 'error');
////route for out of stock page 
Router::get('/empty', 'outs');


//////////STOCK////////////// Items Order as CRUD ///////////STOCK////////////

/////Create/////
Router::get('/admin/stock/add', 'items.add'); //add page
Router::post('/admin/stock/store', 'items.store'); //store in DB
/////Read/////
Router::get('/admin/stock', 'items.list');
Router::get('/admin/stock/single', 'items.single');
/////Update/////
Router::get('/admin/stock/edit', 'items.edit'); //to update page
Router::post('/admin/stock/update', 'items.update'); //update as process (in post)
/////Delete/////
Router::post('/admin/stock/delete', 'items.delete');

//////////TRANSACTION////////////// Transactions Order as CRUD ///////////TRANSACTION////////////

/////Read/////
Router::get('/admin/transactions', 'transactions.list');
Router::get('/admin/transactions/single', 'transactions.single');
/////Update/////
Router::get('/admin/transactions/edit', 'transactions.edit'); //to update page
Router::post('/admin/transactions/update', 'transactions.update'); //update as process (in post)
/////Delete/////
Router::post('/admin/transactions/delete', 'transactions.delete');


//////////TRANSACTION////////////// Users Order as CRUD ///////////TRANSACTION////////////

/////Create/////
Router::get('/admin/users/add', 'users.add');
Router::post('/admin/users/store', 'users.store');
/////Read/////
Router::get('/admin/users', 'users.list');
Router::get('/admin/users/single', 'users.single');
/////Update/////
Router::get('/admin/users/edit', 'users.edit');
Router::post('/admin/users/update', 'users.update');
/////Delete/////
Router::post('/admin/users/delete', 'users.delete');

//////////Profile////////////// Profile Order as CRUD ///////////Profile////////////

/////Read/////
Router::get('/admin/profile', 'profile.list');
/////Update/////
Router::get('/admin/profile/edit', 'profile.edit');
Router::post('/admin/profile/update', 'profile.update');

//////////Settings////////////// Settings Order as CRUD ///////////Settings////////////

/////Read/////
Router::get('/admin/settings', 'settings.list');
/////Update/////
Router::get('/admin/settings/edit', 'settings.edit');
Router::post('/admin/settings/update', 'settings.update');

//////////Sellings////////////// Sellings Order as CRUD ///////////Sellings////////////

/////Read/////
Router::get('/admin/sellings', 'sellings.list');
/////Update/////
Router::get('/admin/sellings/edit', 'sellings.edit');
Router::post('/admin/sellings/update', 'sellings.update');
/////Delete/////
Router::post('/admin/sellings/delete', 'sellings.delete');
Router::post('/admin/sellings/store', 'sellings.store');


Router::redirect();

<?php

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\User;

class Users extends Controller
{

    public function render(): View
    {
        return $this->view($this->view, $this->data);
    }

    function __destruct()
    {
        self::unset_admin();
    }
    


    public function list()
    {
        $this->auth();
        $this->authorize('admin');
        self::set_admin();
        $users = new User();
        $this->view = ('admin.users.list');
        $this->data['users'] = $users->get_all();;
    }


    public function single()
    {
        $this->auth();
        self::set_admin();
        $this->authorize('admin');
        $users = new User();
        $this->view = ('admin.users.single');
        $this->data['users'] = $users->get_by_id($_GET['id']);
    }


    public function edit()
    {
        $this->auth();
        self::set_admin();
        $this->authorize('admin');
        $users = new User();
        $this->view = ('admin.users.edit');
        $this->data['users'] = $users->get_by_id($_GET['id']);
    }


    public function update()
    {
        $this->auth();
        self::set_admin();
        $this->authorize('admin');
        $users = new User;
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $users->update($_POST['id'], [
            'display_name' =>  $_POST['name'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $hashed_password
        ]);
        header("Location: /admin/users");
    }


    public function store()
    {
        //verfication all data entered 
        $this->auth();
        $this->authorize('admin');
        self::set_admin();
        $users = new User();
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $users->insert([
            'display_name' => $_POST['name'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $hashed_password,
            'role' => $_POST['role']
        ]);
        header("Location: /admin/users");
    }

    public function add()
    {
        $this->auth();
        self::set_admin();
        $this->view = ('admin.users.add');
    }


    public function delete()
    {
        $this->auth();
        $this->authorize('admin');
        self::set_admin();
        $users = new User();
        $users->delete($_POST['user_id']);
        header("Location: /admin/users");
    }
}

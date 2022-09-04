<?php

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\User;

class Profile extends Controller
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
        self::set_admin();
        $users = new User();
        $this->view = ('admin.profile.list');
        $this->data['user'] = $users->get_by_id($_SESSION['user']->user_id);
    }


    public function edit()
    {
        $this->auth();
        self::set_admin();
        $users = new User();
        $this->view = ('admin.profile.edit');
        $this->data['user'] = $users->get_by_id($_SESSION['user']->user_id);
    }

    public function update()
    {
        $this->auth();
        self::set_admin();
        $users = new User();
        $moved_file = false;
        $file_name = null;
        $file_ext = null;


        if (!empty($_FILES)) {
            $file_name = "pp-" . $_POST['username'];
            $file_ext = explode('/', $_FILES['profile_photo']['type'])[1];
            $file_path = dirname(__DIR__, 2) . "/resources/photos/$file_name.$file_ext";
            $moved_file = move_uploaded_file($_FILES['profile_photo']['tmp_name'], $file_path);
        }
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $users->update($_SESSION['user']->user_id, [
            'display_name' => $_POST['name'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $hashed_password,
            'role' => 'Admin',
            'profile_photo' => $moved_file ? "$file_name.$file_ext" : null

        ]);

        header("Location: /admin/profile");
    }
}

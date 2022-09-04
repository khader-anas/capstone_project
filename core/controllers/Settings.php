<?php

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Option;

class Settings extends Controller
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
        $this->authorize('admin');
        self::set_admin();
        $options = new Option();
        $title = $options->get_option('site_title');
        $slogan = $options->get_option('site_slogan');
        $this->view = ('admin.settings.list');
        $this->data['option_title'] = $title;
        $this->data['option_slogan'] = $slogan;
    }



    public function edit()
    {
        $this->authorize('admin');
        self::set_admin();
        $options = new Option();
        $title = $options->get_option('site_title');
        $slogan = $options->get_option('site_slogan');
        $this->view = ('admin.settings.edit');
        $this->data['option_title'] = $title;
        $this->data['option_slogan'] = $slogan;
    }

    public function update()
    {
        $this->authorize('admin');
        self::set_admin();
        $option = new Option();
        $options = $_POST;
        $site_title = $option->get_option_object('site_title');
        $site_slogan = $option->get_option_object('site_slogan');
        $option->update($site_title->id, ['value' => $options['site_title']]);
        $option->update($site_slogan->id, ['value' => $options['site_slogan']]);
        header("Location: /admin/settings");
    }
}

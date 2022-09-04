<?php

namespace Core\Controllers;

use Core\Base\Controller;
use Core\Base\View;
use Core\Models\Item;

class Items extends Controller
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
        self::set_admin();
        $this->authorize(['procurement', 'admin']);
        $items = new Item();
        $this->view = 'admin.items.list';
        $this->data['items'] = $items->get_all();
    }


    public function single()
    {
        self::set_admin();
        $this->authorize(['procurement', 'admin']);
        $items = new Item;
        $this->view = 'admin.items.single';
        $check_item = !empty($items->get_by_id($_GET['id']));
        $check_item ? $this->data['item'] = $items->get_by_id($_GET['id']) :  header("Location: /404");
    }

    public function delete()
    {
        self::set_admin();
        $this->authorize(['procurement', 'admin']);
        $items = new Item;
        $items->delete($_POST['item_id']);
        header("Location: /admin/stock");
    }


    public function add()
    {
        self::set_admin();
        $this->authorize(['procurement', 'admin']);
        $this->view = ('admin.items.add');
    }


    public function store()
    {
        self::set_admin();
        $this->authorize(['procurement', 'admin']);
        $items = new Item;
        $items->insert(
            [
                'name' => $_POST['item_name'],
                'cost' => $_POST['item_cost'],
                'selling_price' => $_POST['item_price'],
                'stock_available_qty' => $_POST['item_qty'],
            ]
        );

        header("Location: /admin/stock");
    }

    public function edit()
    {
        self::set_admin();
        $this->authorize(['procurement', 'admin']);
        $items = new Item;
        $this->view = ('admin.items.edit');
        $this->data['item'] = $items->get_by_id($_GET['id']);
    }



    public function update()
    {
        self::set_admin();
        $this->authorize(['procurement', 'admin']);
        $items = new Item;
        $items->update($_POST['id'], [
            'name' => $_POST['item_name'],
            'cost' => $_POST['item_cost'],
            'selling_price' => $_POST['item_price'],
            'stock_available_qty' => $_POST['item_qty']

        ]);

        header("Location: /admin/stock");
    }
}

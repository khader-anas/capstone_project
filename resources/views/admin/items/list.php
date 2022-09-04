<div class="container">
    <h1 class="d-flex justify-content-center mt-3">Stock Mangement</h1>
    <hr>
    <div class="d-flex justify-content-end">
        <a class="btn btn-primary" href="/admin/stock/add" role="button">Add Item</a>
    </div>
    <table class="table table-striped table-hover mt-4" style="display:inline-block; height: 430px; overflow-y: auto;">
        <thead>
            <tr>
                <th  style="width: 12%;" scope="col">Name</th>
                <th  style="width: 10%;" scope="col">Cost</th>
                <th  style="width: 15%;" scope="col">Selling Price</th>
                <th  style="width: 18%;" scope="col">Stock Available Qty</th>
                <th  style="width: 16%;" scope="col">Created At</th>
                <th  style="width: 17%;" scope="col">Updated At</th>
                <th  scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->items as $item) : ?>
                <tr>
                    <td style="text-transform:capitalize"><?= htmlspecialchars($item->name) ?></td>
                    <td><sup>$</sup><?= htmlspecialchars($item->cost)?></td>
                    <td><sup>$</sup><?= htmlspecialchars($item->selling_price) ?></td>
                    <td><?= htmlspecialchars($item->stock_available_qty) ?></td>
                    <td><?= $item->created_at ?></td>
                    <td><?= $item->updated_at ?></td>
                    <td class="d-flex">
                        <a href="/admin/stock/single?id=<?=$item->id ?>" class="btn btn-primary btn-sm mx-1"> <i class="fa-solid fa-eye"></i> </a>
                        <a href="/admin/stock/edit?id=<?=$item->id?>" class="btn btn-warning btn-sm mx-1"> <i class="fa-solid fa-pen-to-square"></i></a>

                        <form action="/admin/stock/delete" method="post" class="mx-1">
                            <input type="hidden" name="item_id" value="<?=$item->id?>">
                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                <?php endforeach; ?>




                </tr>
        </tbody>
    </table>
</div>
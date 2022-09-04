<div class="container">
    <h1 class="d-flex justify-content-center text-capitalize my-3"><?= htmlspecialchars($data->item->name) ?></h1>
    <hr>

    <div class="d-flex justify-content-end">
        <a href="/admin/stock" class="btn btn-primary btn-sm mx-1"> <i class="fa-solid fa-caret-left"></i> </a>
        <a href="/admin/stock/edit?id=<?= $data->item->id ?>" class="btn btn-warning btn-sm mx-1"> <i class="fa-solid fa-pen-to-square"></i></a>

        <form action="/admin/stock/delete" method="post" class="mx-1">
            <input type="hidden" name="item_id" value="<?= $data->item->id ?>">
            <button type="submit" class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash-can"></i></button>
        </form>
    </div>


    <div class="d-flex justify-content-center">
        <div class="card mt-5" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h5><strong>Stock Available Qty:</strong></h5> 
                    <?= htmlspecialchars($data->item->stock_available_qty) ?>
                </li>
                <li class="list-group-item">
                    <h5> <strong>Selling Price: </strong></h5>
                    <sup>$</sup><?= htmlspecialchars($data->item->selling_price)?>
                </li>
                <li class="list-group-item">
                    <h5> <strong>Stock Available Qty:</strong></h5>
                    <?=htmlspecialchars($data->item->stock_available_qty) ?>
                </li>
                <li class="list-group-item">
                    <h5> <strong>Created At:</strong></h5>
                    <?= $data->item->created_at ?>
                </li>
                <li class="list-group-item">
                    <h5> <strong>Updated At:</strong></h5>
                    <?= $data->item->updated_at ?>
                </li>
            </ul>
        </div>
    </div>


</div>
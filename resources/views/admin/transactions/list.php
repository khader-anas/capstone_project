<div class="container">
    <h1 class="d-flex justify-content-center mt-3">Transactions Mangement</h1>
    <hr>

    <table class="table table-striped table-hover mt-5 text-center " style="display:inline-block; height: 400px; overflow-y: auto;">
        <thead>
            <tr>
                <th class="w-25" scope="col">Item Name</th>
                <th class="w-25" scope="col">Quantity</th>
                <th class="w-25" scope="col">Created At</th>
                <th class="w-25" scope="col">Updated At</th>
                <th class="w-25" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->trans as $one_trans) : ?>
                <tr>
                    <td style="text-transform:capitalize"><?= htmlspecialchars($one_trans->item_id) ?></td>
                    <td><?= htmlspecialchars($one_trans->quantity) ?></td>
                    <td><?= $one_trans->created_at ?></td>
                    <td><?= $one_trans->updated_at ?></td>
                    <td class="d-flex">
                        <a href="/admin/transactions/single?id=<?=$one_trans->id?>" class="btn btn-primary btn-sm mx-1"> <i class="fa-solid fa-eye"></i> </a>
                        <a href="/admin/transactions/edit?id=<?=$one_trans->id?>" class="btn btn-warning btn-sm mx-1"> <i class="fa-solid fa-pen-to-square"></i></a>

                        <form action="/admin/transactions/delete" method="post" class="mx-1">
                            <input type="hidden" name="trans_id" value="<?=$one_trans->id?>">
                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                <?php endforeach; ?>

                <div class="d-flex justify-content-end"><strong class=" mt- shadow p-3  bg-white rounded" style="background-color: #C3FFBB; font-size : 18px; font-family: 'Courier New', monospace;">Total Of Transactions: <u><?= $data->total . '.0$' ?></strong></u></div>
               
            </tr>
        </tbody>
    </table>
  
</div>
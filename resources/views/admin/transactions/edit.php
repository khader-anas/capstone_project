<div class="container">
    <h1 class="d-flex justify-content-center mt-3">Edit Transaction</h1>
    <hr class="mt-3">
    <div class="d-flex justify-content-end">
        <a href="/admin/transactions" class="btn btn-danger"> <i class="fa-solid fa-caret-left"></i></a>
    </div>

   

     <div class=" d-flex justify-content-center mt-5">

        <form class="w-50" action="/admin/transactions/update" method="POST">
       
            <input type="hidden" name="id" value="<?=$data->trans->id?>">

            <select name="trans_name" class="form-select form-select  w-100 ">
                    <option class="text-center" selected>Select Item</option>
                    <?php foreach ($data->items as $item)  : ?>
                        <option class="text-center" style="text-transform:capitalize" value="<?= $item->id ?>"><?= $item->name?></option>
                    <?php  endforeach; ?>
                </select>

            <div class="mb-3">
                <label for="itemQty" class="form-label">Quantity</label>
                <input type="text" name="trans_qty" class="form-control" id="itemQty" value="<?=htmlspecialchars($data->trans->quantity)?>">
            </div>
         
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div> 
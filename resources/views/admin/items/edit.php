<div class="container">
    <h1 class="d-flex justify-content-center mt-3">Edit Item</h1>
    <hr class="mt-3">
    <div class="d-flex justify-content-end">
        <a href="/admin/stock" class="btn btn-danger"> <i class="fa-solid fa-caret-left"></i></a>
    </div>

   

     <div class=" d-flex justify-content-center mt-5">

        <form class="w-50" action="/admin/stock/update" method="POST">
       
            <input type="hidden" name="id" value="<?=$data->item->id?>">

            <div class="mb-3">
                <label for="itemName" class="form-label">Name</label>
                <input type="text" name="item_name" class="form-control" id="itemName" value="<?=htmlspecialchars($data->item->name)?>">
            </div>
            <div class="mb-3">
                <label for="itemCost" class="form-label">Cost</label>
                <input type="text" name="item_cost" class="form-control" id="itemCost" value="<?=htmlspecialchars($data->item->cost)?>">
            </div>
            <div class="mb-3">
                <label for="sellPrice" class="form-label">Selling Price</label>
                <input type="text" name="item_price" class="form-control" id="sellPrice" value="<?=htmlspecialchars($data->item->selling_price)?>">
            </div>
            <div class="mb-3">
                <label for="itemQty" class="form-label">Stock Available Qty </label>
                <input type="text" name="item_qty" class="form-control" id="itemQty" value="<?=htmlspecialchars($data->item->stock_available_qty)?>">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div> 
<div class="container">
    <h1 class="d-flex justify-content-center mt-3"> Add Item</h1>
    <hr>
    <div class="d-flex justify-content-end">
     <a href="/admin/stock" class="btn btn-danger btn-sm mx-1"> <i class="fa-solid fa-caret-left"></i> </a>
     </div>
    <div class=" d-flex justify-content-center mt-5">
        
    <form class="w-50" action="/admin/stock/store" method="POST">
        <div class="mb-3">
            <label for="itemName" class="form-label">Name</label>
            <input type="text" name="item_name" class="form-control" id="itemName">
        </div> 
        <div class="mb-3">
            <label for="itemCost" class="form-label">Cost</label>
            <input type="text" name="item_cost" class="form-control" id="itemCost">
        </div>
        <div class="mb-3">
            <label for="sellPrice" class="form-label">Selling Price </label>
            <input type="text" name="item_price" class="form-control" id="sellPrice">
        </div>
        <div class="mb-3">
            <label for="itemQty" class="form-label">Stock Available Qty </label>
            <input type="text" name="item_qty" class="form-control" id="itemQty">
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
    </div>
</div>
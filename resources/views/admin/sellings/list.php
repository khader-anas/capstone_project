<div class="container">
    <h1 class="d-flex justify-content-center my-3"> Sales</h1>
    <div class="d-flex justify-content-between"><?php $date = date("F j, Y, D"); ?>
        <div><strong><u> Seller</u></strong> : <strong style="font-family: 'Courier New', monospace;  font-size : 17px;"><?= $_SESSION['user']->display_name ?></strong></div>
        <div class=" "><strong style=" font-family: 'Courier New', monospace;   font-size : 17px;"><u>Date</u>: <?= $date ?></strong> </div>
    </div>
    <hr class="mt-1">
    <form action="/admin/sellings/store" method="POST" class="d-flex justify-content-center">
        <div class="row g-3 align-items-center mt-1 w-75">
            <div class="col-5 mt-2">
                <label for="inputQuantity" class="col-form-label d-flex justify-content-center"> <strong>Items</strong> </label>

                <select name="item_name" class="form-select form-select  w-100 ">
                    <option class="text-center" selected>Select Item</option>
                    <?php foreach ($data->items as $item) : ?>
                        <option class="text-center" style="text-transform:capitalize" value="<?= $item->id ?>"><?= $item->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-5">
                <label for="inputQuantity" class="col-form-label d-flex justify-content-center"> <strong>Quantity </strong> </label>
                <input type="text" name="quantity" id="inputQuantity" class="form-control mb-2">
            </div>
            <div class="col-2 mt-5">
                <button type="submit" class="btn btn-primary"> <i class="fa-solid fa-plus"></i> </button>
            </div>

        </div>
    </form>


    <!-- ///////////////////////////////////////////////////////////List Of Transactions///////////////////////////////////////////////////////////////////////////////// -->

    <table class="table table-striped table-hover mt-4 text-center" style="display:inline-block; height: 277px; overflow-y: auto;">
        <?php if (!empty($data->trans)) : ?>
            <thead>
                <tr>
                    <th class="w-25" scope="col">Items</th>
                    <th class="w-25" scope="col">Cost</th>
                    <th class="w-25" scope="col">Price</th>
                    <th class="" scope="col">Quantity</th>
                    <th class="w-25" scope="col">Delete Transaction</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($data->trans as $item) : ?>
                    <tr>
                        <td style="text-transform:capitalize"><?= $item->name; ?></td>
                        <td><sup>$</sup><?= $item->cost; ?></td>
                        <td><sup>$</sup><?= $item->price; ?></td>
                        <td><?= $item->quantity; ?></td>

                        <td class="d-flex justify-content-center">
                            <form action="/admin/sellings/delete" method="POST" class="mx-1">
                                <input type="hidden" name="trans_id" value="<?= $item->id ?>">
                                <button type="submit" class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    <?php endforeach; ?>
                <?php endif ?>
                    </tr>
            </tbody>
    </table>

    <?php
    if (!empty($data->trans)) :
        $total_arr = array();
        foreach ($data->trans as $item) {
            $total = $item->price *= $item->quantity;
            array_push($total_arr, $total);
        }
        $final_total = array_sum($total_arr);
        $count = count($total_arr);
    ?>

        <div class="d-flex justify-content-between mt-3">
            <div class=""><strong class="p-3 mt-5 rounded" style="background-color: #C3FFBB; font-size : 18px; font-family: 'Courier New', monospace;">Items Count: <u><?= $count ?></strong></u></div>
            <div class=""><strong class="p-3 mt-5 rounded" style="background-color:#32cd32; font-size : 18px; font-family: 'Courier New', monospace; ">Total:<u><?= $final_total . '.0' ?></u>$</strong></div>
        </div>
    <?php endif ?>
</div>
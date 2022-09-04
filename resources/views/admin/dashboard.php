        <div class="container">
          <h1 class="text-center mt-3"><?= htmlspecialchars($data->site_title) ?></h1>
          <h6 class="d-flex justify-content-center" style="font-family: 'Courier New', monospace;" ><?= htmlspecialchars($data->site_slogan) ?></h6>

          <hr>
          
          <div class="d-flex justify-content-center">
            <div class="row my-5">
              <div class="col-3">
                <div class="card" style="width: 16rem;">
                  <div class="card-body">
                    <h5 class="card-title d-flex justify-content-center">Number Of Users</h5>
                    <p class="card-text d-flex justify-content-center"><?= htmlspecialchars($data->num_of_users) ?></p>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="card" style="width: 16rem;">
                  <div class="card-body">
                    <h5 class="card-title d-flex justify-content-center">Number Of Items</h5>
                    <p class="card-text d-flex justify-content-center"><?= htmlspecialchars($data->num_of_items) ?></p>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="card" style="width: 16rem;">
                  <div class="card-body">
                    <h5 class="card-title d-flex justify-content-center">Number Of Transactions</h5>
                    <p class="card-text d-flex justify-content-center"><?= htmlspecialchars($data->num_of_trans) ?></p>
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="card" style="width: 16rem;">
                  <div class="card-body">
                    <h5 class="card-title d-flex justify-content-center">Total Of Sales</h5>
                    <p class="card-text  d-flex justify-content-center"><?= htmlspecialchars($data->total_of_sales) ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="d-flex justify-content-center">
            <div class="row mt-2">
              <div class="col-12 d-flex">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title d-flex justify-content-center">Top Expensive Items</h5>
                    <?php foreach ($data->top_five_expensive_item as $key => $single) : ?>
                      <p class="card-text d-flex justify-content-center" style="text-transform:capitalize"> <?= $single ?></p>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
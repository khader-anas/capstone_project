<div class="container">
    <h1 class="d-flex justify-content-center mt-3">Website Settings</h1>
    <hr class="mt-3">

    <div class=" bg-light shadow w-100 my-5 py-3">
        <p class="d-flex justify-content-center"> <strong>Website Title:&nbsp;</strong> <?= $data->option_title ?></p>
       
        <p class="d-flex justify-content-center"> <strong> Website Slogan:&nbsp;</strong><?= $data->option_slogan ?></p>
    </div>

    <div class="d-flex justify-content-center">
        <a href="/admin/settings/edit" class="btn btn-primary ">Edit Settings</a> 
         <a href="/admin" class="btn btn-danger mx-5 ">Cancel</a>
    </div>
</div>
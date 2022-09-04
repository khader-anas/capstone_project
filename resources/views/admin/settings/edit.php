<div class="container">
    <h1 class="d-flex justify-content-center mt-3">Edit Settings</h1>
    <hr class="mt-3">
    <div class="d-flex justify-content-end">
        <a href="/admin/settings" class="btn btn-danger"> <i class="fa-solid fa-caret-left"></i></a>
    </div>



    <div class=" d-flex justify-content-center mt-5">
        <form class="w-50" action="/admin/settings/update" method="POST">
        
            <div class="mb-3">
                <label for="siteTitle" class="form-label">Website Title</label>
                <input type="text" name="site_title" class="form-control" id="siteTitle" value="<?= $data->option_title ?>">
            </div>

            <div class="mb-3">
                <label for="siteSlogan" class="form-label">Website Slogan</label>
                <input type="text" name="site_slogan" class="form-control" id="siteSlogan" value="<?=  $data->option_slogan ?>">

            <button type="submit" class="mt-3 btn btn-primary">Update</button>
        </form>
    </div>
</div>
<div class="container">
    <h1 class="d-flex justify-content-center mt-3">Edit Profile</h1>
    <hr class="mt-3">
    <div class="d-flex justify-content-end">
        <a href="/admin/profile" class="btn btn-danger"> <i class="fa-solid fa-caret-left"></i></a>
    </div>



    <div class=" d-flex justify-content-center mt-5">

        <form class="w-50" action="/admin/profile/update" method="POST"  enctype="multipart/form-data">

           

            <div class="mb-3">
                <div class="mb-3">
                    <label for="displayName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="displayName" value="<?= htmlspecialchars($data->user->display_name) ?>">
                </div>
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="<?= htmlspecialchars($data->user->username) ?>">
            </div>
            <div class="mb-3">
                <label for="userEmail" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="userEmail" value="<?= htmlspecialchars($data->user->email) ?>">
            </div>
            <div class="mb-3">
                <label for="userPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="userPassword" placeholder="Enter New Password" value="">
            </div>
            <div class="mb-3">
                <label for="profile_photo" class="form-label">Upload Profile Photo</label>
                <input class="form-control" name="profile_photo" type="file" id="profile_photo">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
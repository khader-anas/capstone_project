<?php

use Core\Models\User;

$user = new User;
$current_user = $user->get_by_id($_SESSION['user']->user_id);

?>

<div class="container">
    <h1 class="text-center my-3">My Profile</h1>
    <hr>
    <div class="d-flex justify-content-end">
        <a href="/admin/profile/edit" class="btn btn-primary">Edit Profile</a>
    </div>
    <div class="row my-5">

        <div class="col-6 bg-light shadow py-4  my-5 h-50 px-5">

            <strong class="my-5"> Email:</strong>
            <p><?= htmlspecialchars($data->user->email) ?></p>
            <strong> Username:</strong>
            <p><?= htmlspecialchars($data->user->username) ?></p>
            <strong> Create Profile At:</strong>
            <p><?= $data->user->created_at ?></p>
        </div>



        <div class="col-6">
            <div class="text-center">
                <img src="<?php
                  $pp_path = "/resources/photos/";
                  echo !empty($current_user->profile_photo) ? $pp_path . $current_user->profile_photo : $pp_path . "pp-default.jpg";  //check if not empty in DB not in file
                  ?>" class=" img-thumbnail rounded-circle w-50" alt="Profile-Photo">
            </div>
            <h4 class="text-center mt-3"><strong><?= $data->user->display_name ?></strong></h4>
        </div>

    </div>
</div>
<?php

use Core\Models\User;

$user = new User;
$current_user = $user->get_by_id($_SESSION['user']->user_id);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HTU POS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="resources/css/style.css">
</head>

<body>
  <div class="container-fluid">

    <div class="row">

      <div style="background-color:#000220;" class="col-2  min-vh-100 text-white text-center position-relative">
        <div class="p-2">
          <h4 style=" font-family: Georgia, serif;">Admin Panel</h4>
        </div>
        <hr>
        <!-- Admin Picture-->
        <div class="p-2 w-75 mx-4 d-flex justify-content-center">
          <img src="<?php
                    $pp_path = "/resources/photos/";
                    echo !empty($current_user->profile_photo) ? $pp_path . $current_user->profile_photo : $pp_path . "pp-default.jpg";  //check if not empty in DB not in file
                    ?>" class="img-thumbnail rounded-circle" alt="Profile Pic">
        </div>
        <!-- Admin Control Links -->
        <div class=" d-flex justify-content-end  w-75 my-3 light"> <a href="/admin/profile" class="text-decoration-none text-light"><strong style="font-family: 'Courier New', monospace;"><?= $_SESSION['user']->display_name ?></strong></a></div>
        <hr class="w-75 mx-4">
        <div class="p-3"> <a href="/admin" class="text-decoration-none ">Dashboard</a></div>
        <?php if (check_permission('seller') || check_permission('admin')) : ?>
          <div class="p-3"> <a href="/admin/sellings" class="text-decoration-none ">Sellings</a></div>
        <?php endif; ?>
        <?php if (check_permission('procurement') || check_permission('admin')) : ?>
          <div class="p-3"> <a href="/admin/stock" class="text-decoration-none ">Stock</a></div>
        <?php endif; ?>
        <?php if (check_permission('accountant') || check_permission('admin')) : ?>
          <div class="p-3"> <a href="/admin/transactions" class="text-decoration-none ">Transactions</a></div>
        <?php endif; ?>
        <?php if (check_permission('admin')) : ?>
          <div class="p-3"> <a href="/admin/users" class="text-decoration-none ">Users</a></div>
        <?php endif; ?>
        <!-- Settings and Logout and profile-->

        <div class="position-absolute bottom-0 end-0">
          <form action="/logout" method="POST">
            <button type="submit" class="btn btn-outline-light"><a href=""> <i class="fa-solid fa-right-from-bracket"></i></a></button>
          </form>
        </div>
       
        <?php if (check_permission('admin')) : ?>
        <div class="position-absolute bottom-0 start-50 translate-middle-x">
          <a href="/admin/settings" class="btn btn-outline-light"> <i class="fa-solid fa-gear"></i></a>
        </div>
        <?php endif; ?>


        <div class="position-absolute bottom-0 start-0">
          <a href="/admin/profile" class="btn btn-outline-light"> <i class="fa-solid fa-user"></i></a>
        </div>

      </div>

      <div class="col-10 min-vh-100" style="background-color: #F7F7F4;">
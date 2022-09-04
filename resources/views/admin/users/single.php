<div class="container">
    <h1 class="d-flex justify-content-center text-capitalize my-3"><?= $data->users->display_name ?></h1>
    <hr>

    <div class="d-flex justify-content-end">
        <a href="/admin/users" class="btn btn-primary btn-sm mx-1"> <i class="fa-solid fa-caret-left"></i> </a>
        <a href="/admin/users/edit?id=<?= $data->users->id ?>" class="btn btn-warning btn-sm mx-1"> <i class="fa-solid fa-pen-to-square"></i></a>

        <form action="/admin/users/delete" method="post" class="mx-1">
            <input type="hidden" name="user_id" value="<?= $data->users->id ?>">
            <button type="submit" class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash-can"></i></button>
        </form>
    </div>


    <div class="d-flex justify-content-center">
        <div class="card mt-5" style="width: 18rem;">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <h5><strong>Name</strong></h5> 
                    <?= htmlspecialchars($data->users->display_name) ?>
                </li>
                <li class="list-group-item">
                    <h5> <strong>Username</strong></h5>
                    <?=htmlspecialchars($data->users->username)?>
                </li>
                <li class="list-group-item">
                    <h5> <strong>Email</strong></h5>
                    <?= htmlspecialchars($data->users->email) ?>
                </li>
                <li class="list-group-item">
                    <h5> <strong>Role</strong></h5>
                    <?= htmlspecialchars($data->users->role) ?>
                </li>
                <li class="list-group-item">
                    <h5> <strong>Created At:</strong></h5>
                    <?=$data->users->created_at ?>
                </li>
                <li class="list-group-item">
                    <h5> <strong>Updated At:</strong></h5>
                    <?= $data->users->updated_at ?>
                </li>
            </ul>
        </div>
    </div>


</div>
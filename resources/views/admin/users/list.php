<div class="container">
    <h1 class="d-flex justify-content-center mt-3">Users Mangement</h1>
    <hr>
    <div class="d-flex justify-content-end">
        <a class="btn btn-primary" href="/admin/users/add" role="button">Add User</a>
    </div>
    <table class="table table-striped table-hover mt-5">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data->users as $user) : ?>
                <tr>
                    
                    <td><?= htmlspecialchars($user->display_name) ?></td>
                    <td><?= htmlspecialchars($user->username) ?></td>
                    <td><?= htmlspecialchars($user->email) ?></td>
                    <td><?= htmlspecialchars($user->role) ?></td>
                    <td><?= $user->created_at ?></td>
                    <td><?= $user->updated_at ?></td>
                    <td class="d-flex">
                        <a href="/admin/users/single?id=<?=$user->id?>" class="btn btn-primary btn-sm mx-1"> <i class="fa-solid fa-eye"></i> </a>
                        <a href="/admin/users/edit?id=<?=$user->id?>" class="btn btn-warning btn-sm mx-1"> <i class="fa-solid fa-pen-to-square"></i></a>

                        <form action="/admin/users/delete" method="post" class="mx-1">
                            <input type="hidden" name="user_id" value="<?=$user->id?>">
                        <button type="submit" class="btn btn-danger btn-sm"> <i class="fa-solid fa-trash-can"></i></button>
                        </form>
                    </td>
                <?php endforeach; ?>
                </tr>
        </tbody>
    </table>
</div>
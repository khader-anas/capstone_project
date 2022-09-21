<div class="container">
    <h1 class="d-flex justify-content-center mt-3">Add User</h1>
    <hr class="mt-3">
    <div class="d-flex justify-content-end">
        <a href="/admin/users" class="btn btn-danger"> <i class="fa-solid fa-caret-left"></i></a>
    </div>

   

     <div class=" d-flex justify-content-center mt-5">

        <form class="w-50" action="/admin/users/store" method="POST">
       
            <input type="hidden" name="id" value="<?=$data->users->id?>">

            <div class="mb-3">
            <div class="mb-3">
                <label for="displayName" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="displayName" required>
            </div>
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" required>
            </div>
            <div class="mb-3">
                <label for="userEmail" class="form-label" >Email</label>
                <input type="text" name="email" class="form-control" id="userEmail" required>
            </div>
            <div class="mb-3">
                <label for="userPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="userPassword" placeholder="Enter New Password" value="" required>
            </div>
            <div class="mb-3">
                <!-- <label for="userRole" class="form-label">Role</label> -->
                <select name="role" id="userRole" required class="mb-3 btn btn-primary px-5">
                    <option value>Select User Role</option>
                    <option value="admin">Admin</option>
                    <option value="procurement">Procurement</option>
                    <option value="seller">Seller</option>
                    <option value="accountant">Accountant</option>
                </select>
                <!-- <input type="text" name="role" class="form-control" id="userRole" value=""> -->
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTU-POS</title>

    <style>
        .alert {
            margin-top: 10px;
            padding: 5px;
            background-color: #f44336;
            color: white;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
</head>

<body>


    <div class="login_container">
    <h3 style="text-align: center; color:white; font-family: 'Courier New', monospace;">HTU Point Of Sale System  </h3>
        <form action="/login" class="login_form" method="POST">
            <h1> <strong> Log in </strong></h1>
           
            <div class="form-set">
                <label for="email">Email</label>
                <input name="email" class="form_input" type="email" required>
            </div>

            <div class="form-set">
                <label for="password">Password</label>
                <input name="password" class="form_input" type="password" min="7" max="30" required>
                <input type="checkbox" name="remember_me" for="remember">
                <label class="remember" for="remember_me"  style="font-size: 13px;"> Remember me </label>
            </div>
            <input type="submit" class="submit_Btn" value="Login">


            <?php if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
                $message = '';
                if (in_array('unauthenticated_user', $_SESSION['errors'])) {
                    $message = "Incorrect Username Or Password!";
                }
                echo "<div class=\"alert\">
                     <span class= \"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>
                     <strong>Danger!</strong> $message
                    </div>";
            } ?>

        </form>
    </div>
</body>

</html>
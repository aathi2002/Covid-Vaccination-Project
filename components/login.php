<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>

    <?php

    include_once '../config/conn.php';

    if (isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result_set = mysqli_query($link, "SELECT role,password FROM users WHERE user_name = '$username'");

        if (mysqli_num_rows($result_set) > 0) {
            $res = mysqli_fetch_assoc($result_set);
            if ($password ==  $res['password']) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $res['role'];
                // print_r($_SESSION);
                header('Location: '."../index.php");
            }
        } else {
            echo '<script>alert("User not found");</script>';
        }
    }

    ?>

    <?php include "./navbar.php" ?>


    <div style="height: 87vh;" class="container d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-md-6">
                <div class="card" style="width: 400px;">
                    <div class="card-body">
                        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group m-2">
                                <input type="submit" class="btn btn-primary" value="Login">
                                <a class="btn btn-warning" href="signup.php">Sign Up</a>
                                <!-- <a type="button" class="btn btn-primary" value="Sign Up"> -->
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</body>

</html>
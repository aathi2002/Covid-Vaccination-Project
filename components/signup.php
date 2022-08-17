<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php include './navbar.php'; ?>

    <?php

        if(isset($_POST['username'])){
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];

            include '../config/conn.php';
            
            mysqli_query($link,"INSERT INTO users (name,user_name,password,phone_number) VALUES ('$name','$username','$password',$phone)");

            session_start();
            $_SESSION['role'] = 'user';
            $_SESSION['username'] = $_POST['username'];

            header("Location: http://localhost");
        }

    ?>

    <div class="container signup-container d-flex align-items-center justify-content-center">
        <div class="container m-5" style="width: 400px;">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Username: </label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                </div>

                <div class="form-group">
                    <label for="Phone">Phone: </label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" required>
                </div>

                <div class="form-group m-2">
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>

            </form>
        </div>
    </div>




</body>

</html>
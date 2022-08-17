<?php

    include '../config/conn.php';

    session_start();
    $id = $_GET['id'];

    $username = $_SESSION['username'];

    $user_id = mysqli_fetch_assoc(mysqli_query($link,"Select id from users where user_name='$username'"))['id'];

    mysqli_query($link,"INSERT INTO `applied` (`user_id`, `center_id`, `apply_time`) VALUES ('$user_id', '$id', current_timestamp())");

    header("Location: http://localhost/index.php?applied=true");
    


?>
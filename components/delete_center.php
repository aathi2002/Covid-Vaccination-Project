<?php

    $id = $_GET['id'];

    include '../config/conn.php';

    mysqli_query($link, "DELETE FROM `centres` WHERE `centres`.`id` = $id;");

    header("Location: http://localhost/index.php")
?>
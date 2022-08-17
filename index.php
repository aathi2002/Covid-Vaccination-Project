<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- Linking css -->
    <link rel="stylesheet" href="./main.css">
    <!-- Linking css -->

    <title>Covid Vaccination Camp</title>
</head>

<body>

    <?php include "./components/navbar.php"; ?>

    <br>
    <div class="container d-flex flex-row-reverse">
        <?php
            $data = '<a class="btn btn-primary" href="http://localhost/components/insert_center.php">+ Add Center</a>';
            if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                echo $data;
            }
        ?>

    </div>


    <?php
     if(isset($_GET['applied']) && $_GET['applied'] == 'true') {
        echo '<center><div class="alert alert-success" role="alert" style="margin-top:10px">Applied for vaccination success.</div></center>';
    }

    $retrive_query ="";
    if(isset($_GET['search'])){
        
    }

    ?>
    <div class="container">
        <h3 class="diplay-3">Available Centers</h3>
    </div>


    <div class="container flex-wrap d-flex">



        <!-- Centres Retrivel -->

        <?php

        include './config/conn.php';

        $resultSet ="";
        if(isset($_GET['search'])){
            // echo "select * from centres where place LIKE '%".$_GET['search']."%'";
            $resultSet = mysqli_query($link, "select * from centres where place LIKE '%".$_GET['search']."%'");
        } else{
            $resultSet = mysqli_query($link, "select * from centres");
        }

        if (mysqli_num_rows($resultSet) == 0) {
            echo '<center><div class="alert alert-danger" role="alert" style="margin-top:10px">There are no centers found at the moment.</div></center>';
        }

       

        while ($row = mysqli_fetch_array($resultSet)) {
            // print_r($row);
            if (isset($_SESSION['role'])) {
                if($_SESSION['role'] == 'admin') {
                $additional_data = '
                    <a href="http://localhost/components/apply_center.php?id=' . $row['id'] . '" class="btn btn-primary">Apply</a>                    
                    <a href="http://localhost/components/delete_center.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a>
                ';
                } else {
                    $additional_data = '
                        <a href="http://localhost/components/apply_center.php?id=' . $row['id'] . '" class="btn btn-primary">Apply</a>
                    ';
                }
            }else{
                $additional_data = '
                <a href="http://localhost/components/login.php" class="btn btn-primary">Login to apply</a>
                ';
            }
            echo '<div class="card">
                <div class="card-header">
                    Place: ' . $row['place'] . '
                </div>
                <div class="card-body">
                    <h5 class="card-title">Closes on ' . $row['end_date'] . '</h5>
                    <p>
                        <li>Dosages Left : ' . $row['dosage_left'] . '</li>
                        <li>Vaccine type : ' . $row['vaccine_type'] . '</li>
                        <li>Time: ' . $row['start_time'] . ' - ' . $row['end_time'] . '</li>
    
                    </p>'.$additional_data.'                    
                </div>  
            </div>';
        }

        ?>
        <!-- Centres Retrivel -->




    </div>



</body>

</html>
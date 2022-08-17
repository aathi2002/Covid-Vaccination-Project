<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Center</title>
</head>

<body>

    <?php 
        include 'navbar.php'; 

        if(isset($_POST['place'])){
            $place = $_POST['place'];
            $dosage = $_POST['dosage'];
            $startTime = $_POST['startTime'];
            $endTime = $_POST['endTime'];
            $endDate = $_POST['endDate'];
            $dosageType = $_POST['dosageType'];

            echo $endDate; 
            include '../config/conn.php';


            mysqli_query($link,"INSERT INTO `centres` (`dosage_left`, `vaccine_type`, `place`, `start_time`, `end_time`, `end_date`) VALUES ('$dosage', '$dosageType', '$place', '$startTime', '$endTime', '$endDate')");

            echo '<div class="alert alert-success" role="alert">
            <center>New center has been added to the portal</center>
          </div>';
        }
    ?>
    <div class="container"></div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 card m-4">
                <!-- Insert Form -->
                <form id="form-insert-form" class="form-horizontal" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <div class="form-group">
                        <label for="place">Place: </label>
                        <input id="place" name="place" type="text" class="form-control" placeholder="Place">
                    </div>
                    <div class="form-group">
                        <label for="dosage">Dosage Left: </label>
                        <input id="dosage" name="dosage" type="number" class="form-control" placeholder="Dosage">
                    </div>
                    <div class="form-group">
                        <label for="dosageType">Dosage Type: </label>                        
                        <input id="dosageType" name="dosageType" type="text" class="form-control" placeholder="Dosage Type">
                        </div>
                    <div class="form-group">
                        <label for="startTime">Start Time:</label>
                        <input id="startTime" name="startTime" type="time" class="form-control" placeholder="Start Time">
                    </div>
                    <div class="form-group">
                        <label for="endTime">End Time:</label>
                        <input id="endTime" name="endTime" type="time" class="form-control" placeholder="End Time">
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date:</label>
                        <input id="endDate" name="endDate" type="date" class="form-control" placeholder="End Date">
                    </div>
                    <div class="form-group m-2 d-flex justify-content-end">
                        <input type="submit" value="+ Add Center" class="btn btn-primary">
                    </div>
                </form>



</body>

</html>
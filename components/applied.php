<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applied Users</title>
</head>

<body>

    <?php
    include 'navbar.php';
    ?>

    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Center Place</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Applied on</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../config/conn.php';
                $resSet = mysqli_query($link, "Select * from applied");
                while ($row = mysqli_fetch_array($resSet)) {
                    $user_id = $row["user_id"];
                    $center_id = $row["center_id"];

                    // echo "select * from users where id = $user_id;";

                    $userInfo = mysqli_fetch_assoc(mysqli_query($link, "select * from users where id = $user_id;"));
                    $centerInfo = mysqli_fetch_assoc(mysqli_query($link, "select * from centres where id = $center_id"));

                    echo '
                        <tr>
                        <th>'.$userInfo['user_name'].'</th>
                        <td>'.$centerInfo['place'].'</td>
                        <td>'.$userInfo['phone_number'].'</td>
                        <td>'.$row['apply_time'].'</td>
                    </tr>
                        ';
                }
                ?>


            </tbody>
        </table>
    </div>


</body>

</html>
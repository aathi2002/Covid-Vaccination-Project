<?php


try {

    // Try Connect to the DB with mysqli_connect function - Params {hostname, userid, password, dbname}
    $link = mysqli_connect("localhost", "root", "", "covid");

} catch (mysqli_sql_exception $e) { // Failed to connect? Lets see the exception details..

    echo "MySQLi Error Code: " . $e->getCode() . "<br />";
    echo "Exception Msg: " . $e->getMessage();

    exit; // exit and close connection.
}


?>
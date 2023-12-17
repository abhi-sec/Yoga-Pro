<?php

$servername="localhost";
$username="root";
$password="root";
$dbname="trainee";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if($conn)
{
    // echo "Connection Established";
}
else
{
    echo "Connection Failed".mysqli_connect_error();
}

?>
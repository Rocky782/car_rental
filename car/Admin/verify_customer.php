<?php
require "../connection.php";
$conn = connect();

$cust_id = $_GET["id"];
$sql1 = "UPDATE  customers set reqr=1 where customer_id=$cust_id";

$result1 = mysqli_query($conn, $sql1);

if ($result1){
    header("location: driverv.php");
}
else {
    echo "Error occured cannot perform the respected query";
    echo $conn->error;
}

$conn->close();
?>
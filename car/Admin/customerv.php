<!DOCTYPE html>
<html>
<?php 
session_start(); 
require '../connection.php';
$conn = Connect();
?>
<head>
    <title>Driver Verification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DajuBhai Rental</title>
    <link rel="shortcut icon" type="image/png" href="../assets/img/P.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/user.css">
    <link rel="stylesheet" href="../assets/w3css/w3.css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<h3 style="text-align:center;">Customer Verification Section</h3>
<section class="menu-content">
            <?php   
            $sql1 = "SELECT * FROM customers WHERE reqr=0";
            $result1 = $conn->query($sql1);

            if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()){
                    $customer_id = $row1['customer_id'];
                    $name = $row1['customer_name'];
                    $uname = $row1['customer_username'];
                    $phone = $row1['customer_phone'];
                    $email = $row1['customer_email'];
                    $addr  = $row1['customer_address'];
                    $customer_img = "../images/user.png";
                    $stat = $row1['reqr'];

                    if ($stat == 0){
                        $imgv = "../images/redstar.jpg";
                    }
                    else {
                        $imgv = "../images/green_star.png";
                    }

                    
                    echo "
                    <div class='sub-menu'>
                    <div class='status_var'> <img src=$imgv alt='Status Unkown'> </div>
                    
                    <img class='card-img-top' src=$customer_img alt='Card image cap'>
                    <h5> $uname </h5>
                    <h6> Customer Name : $name</h6>
                    <h6> Phone : $phone </h6>
                    <h6> Email : $email </h6>
                    <h6> Address : $addr </h6>
                    <a href='verify_customer.php?id=$customer_id'><button class='verify_button'> Verify $uname</button></a>

                    </div> 
                    ";
                    }
                }
                    
            else {

        echo "<h1> No Customers left to verify :( </h1>";
            
            }
        $conn->close();
            ?>                                   
        </section>
    
        </body>
        </html>
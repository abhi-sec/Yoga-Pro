<?php
include("connection.php");
session_start();

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>FEE PORTAL</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--===============================================================================================-->
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <!--===============================================================================================-->
    </head>
    <body>

    <div class="limiter">
            <main id="week-form"  action="#" method="POST">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="#" method="POST">
                    <span class="login100-form-title p-b-48">
                        <header>
                <h1 id="title">FEE PORTAL</h1>
            </header>
					</span>

                    <div class="wrap-input100 validate-input" >
                    <input type="text" name="name" placeholder="Name" required>
                        <span class="focus-input100" data-placeholder=""></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                    <input type="text" name="email" placeholder="Enter email" required>
                        <span class="focus-input100" data-placeholder=""></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "enter valid card number">
                    <input type="text" name="" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="Card Number - xxxx xxxx xxxx xxxx" required>
                        <span class="focus-input100" data-placeholder=""></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="expiry year">
                        <select class="input100" name="Expiry Year" required>
                            <option value="" disabled selected></option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026">2026</option>
                        </select>
                        <span class="focus-input100" data-placeholder="Expiry Year"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Please enter a valid age (18-65)">
                    <input type="text" name="" placeholder="Expiry Month" required>
                        <span class="focus-input100" data-placeholder=""></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="enter valid cvv ">
                    <input type="number" name="" placeholder="CVV" size="3" required>
                        <span class="focus-input100" ></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" class="login100-form-btn" id="submit" name="submit">
                                Pay 500
                            </button>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

    </body>
    </html>

<?php
if(isset($_POST['submit']))
{
    $em=$_POST['email'];
    $pay=500;
    $sql = "SELECT * from feepaid where email = '$em'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  

    if($count == 0){  
    $query= "INSERT INTO feepaid VALUES('$em','$pay')";
    $data = mysqli_query($conn, $query);
    if($data)
    {
        echo '<script type ="text/JavaScript">';
        echo 'alert(" Fee Paid Successfully!!!! ")';
        echo '</script>';
        echo '<script> window.location="index.php"; </script>';
    }
    else
    {
        echo '<script type ="text/JavaScript">';
        echo 'alert("Failed to Pay Fee Successfully!!!! ")';
        echo '</script>';
    }
    }
    else{
        echo '<script type ="text/JavaScript">';
        echo 'alert("You have already paid the Fee")';
        echo '</script>';
        echo '<script> window.location="index.php"; </script>';
    }
    

}


?>
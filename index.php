<?php
include("connection.php");
session_start();

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>YOGA CLASS REGISTRATION</title>
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
                <h1 id="title">Yoga Class Registration</h1>
            </header>
					</span>

                    <div class="wrap-input100 validate-input" data-validate = "Enter name">
                        <input class="input100" type="text" name="fname" required>
                        <span class="focus-input100" data-placeholder="First Name"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter name">
                        <input class="input100" type="text" name="lname" required>
                        <span class="focus-input100" data-placeholder="Last Name"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                        <input class="input100" type="text" name="email" required>
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Please select your gender">
                        <select class="input100" name="gender" required>
                            <option value="" disabled selected></option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        <span class="focus-input100" data-placeholder="Gender"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Please enter a valid age (18-65)">
                        <input class="input100" type="number" name="age" min="18" max="65" required>
                        <span class="focus-input100" data-placeholder="Age"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Please enter a valid date of birth ">
                        <input class="input100" type="date" name="dob" required>
                        <span class="focus-input100" ></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" class="login100-form-btn" id="submit" name="submit">
                                Pay 500 & Register
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

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $dob= $_POST['dob'];
    $sql = "SELECT * from trainee where email = '$email'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        $_SESSION['email']= $row['email'];

    if($count == 0){  
    $query= "INSERT INTO trainee VALUES('$fname','$lname', '$email', '$gender', '$age', '$dob' )";
    $data = mysqli_query($conn, $query);
    if($data)
    {
        echo '<script type ="text/JavaScript">';
        echo 'alert(" Submitted Successfully!!!! ")';
        echo '</script>';
        echo '<script> window.location="payment.php"; </script>';
    }
    else
    {
        echo '<script type ="text/JavaScript">';
        echo 'alert("Failed to Submit Successfully!!!! ")';
        echo '</script>';
    }
    }
    else{
        echo '<script type ="text/JavaScript">';
        echo 'alert("You are already registered")';
        echo '</script>';
        echo '<script> window.location="payment.php"; </script>';
    }
    

}


?>
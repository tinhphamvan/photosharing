
<?php
include ("header.inc.php");
?>
<title xmlns="http://www.w3.org/1999/html">Sign Up Page</title>
<link rel="stylesheet" type="text/css" href="loginCSS.css">
<style>

    body{
        background-image: url("images/loginbackground3.jpg");
    }

</style>





<div class="container">


<?php
    //Controller sign
    $reg = @$_GET['reg'];
    //declaring variables to prevent errors
    $fn = ""; //First Name
    $ln = ""; //Last Name
    $un = ""; //Username
    $em = ""; //Email

    $pswd = ""; //Password
    $pswd2 = ""; // Password 2
    $d = ""; // Sign up Date
    $u_check = ""; // Check if username exists
    //registration form
    $fn = strip_tags(@$_GET['fname']);
    $ln = strip_tags(@$_GET['lname']);

    $un = strip_tags(@$_GET['username']);
    $em = strip_tags(@$_GET['email']);

    $pswd = strip_tags(@$_GET['password']);
    $pswd2 = strip_tags(@$_GET['password2']);

    $d = date("Y-m-d"); // Year - Month - Day

    if ($reg) {

    // Check if user already exists
            $u_check = mysqli_query($connection,"SELECT username FROM users WHERE username='$un'")
            or die(mysqli_error($connection));
    // Count the amount of rows where username = $un
            $check = mysqli_num_rows($u_check);
    //Check whether Email already exists in the database
            $e_check = mysqli_query($connection,"SELECT email FROM users WHERE email='$em'")
            or die(mysqli_error($connection));

    //Count the number of rows returned
            $email_check = mysqli_num_rows($e_check);
            if ($check == 0) {
                if ($email_check == 0) {
    //check all of the fields have been filed in
                    if ($fn&&$ln&&$un&&$em&&$pswd&&$pswd2) {
    // check that passwords match
                        if ($pswd==$pswd2) {
    // check the maximum length of username/first name/last name does not exceed 25 characters
                            if (strlen($un)>25||strlen($fn)>25||strlen($ln)>25) {
                                echo '<div class="alert alert-info"
    <strong>Info!</strong> The maximum limit for username/first name/last name is 25 characters!
    </div>';

                            }
                            else
                            {
    // check the maximum length of password does not exceed 25 characters and is not less than 5 characters
                                if (strlen($pswd)>30||strlen($pswd)<5) {

                                    echo '<div class="alert alert-info"
    <strong>Info!</strong> Your password must be between 5 and 30 characters long!
    </div>';
                                }
                                else
                                {
    //encrypt password and password 2 using md5 before sending to database
                                    $pswd = md5($pswd);
                                    $pswd2 = md5($pswd2);
                                    $query = mysqli_query($connection,"INSERT INTO users VALUES ('','$un','$fn','$ln','$em','$pswd','$d','0','','','','','','','')");

                                    echo '
                                                <div class="alert alert-success" role="alert">
                                                  Sign In Successfully!!! <a href="index.php" class="alert-link">Login</a>
                                                </div>


                                        ';


                                    die(mysqli_error($connection));



                                }
                            }
                        }
                        else {

                            echo '<div class="alert alert-danger"
    <strong>Info!</strong> Your passwords don\'t match!
    </div>';

                        }
                    }
                    else
                    {
                        echo '<div class="alert alert-danger"
    <strong>Info!</strong> Please fill in all of the fields
    </div>';

                    }
                }
                else
                {
                    echo '<div class="alert alert-danger"
    <strong>Info!</strong> Sorry, but it looks like someone has already used that email!
    </div>';

                }
            }
            else
            {
                echo '<div class="alert alert-dark"
    <strong>Info!</strong> Username already taken ...
    </div>';

            }



    }

?>
    <div class="d-flex justify-content-center h-100" style="float: right">

        <div class="card" style="height: 450px">
            <div class="card-header">
                <h3>Sign In</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <form >
                    <div class="input-group form-group">

                        <input type="text" name="fname" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" >

                    </div>
                    <div class="input-group form-group">

                        <input type="text" name="lname" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2"   >

                    </div>
                    <div class="input-group form-group">

                        <input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" tabindex="3">

                    </div>
                    <div class="input-group form-group">

                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">

                    </div>
                    <div class="input-group form-group">

                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">

                    </div>
                    <div class="input-group form-group">

                        <input type="password" name="password2" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                    </div>
                    <div >
                        <a href="index.php" class="btn float-right login_btn" role="button" aria-pressed="true">Login</a>
                    </div>
                    <div >
                        <input  name ="reg" type="submit" value="Sign Up" class="btn float-right login_btn">
                    </div>



                </form>

            </div>



    </div>
</div>
</div>
<script>
    $( "div.alert-info" ).fadeIn( 1000 ).delay( 3000 ).fadeOut( 1000 );
</script>
<?php
include ("close.inc.php");
?>
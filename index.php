
<?php
include ("header.inc.php");
if (!isset($_SESSION["user_login"])) {
    echo "";
}
else
{
    echo "<meta http-equiv=\"refresh\" content=\"0; url=home.php\">";
}
?>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="loginCSS.css">
</head>

<div class="container" id="sticky">
    <?php
    //Controller Login
    if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
        $user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); // filter everything but numbers and letters
        $password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); // filter everything but numbers and letters
        $md5password_login = md5($password_login);
        $sql = mysqli_query($connection,"SELECT id FROM users WHERE username='$user_login' AND password='$md5password_login' LIMIT 1") // query the person
        or die(mysqli_error($connection));

        $userCount = mysqli_num_rows($sql);
        if ($userCount == 1) {
            while($row = mysqli_fetch_array($sql)){
                $id = $row["id"];
            }
            $_SESSION["user_login"] = $user_login;
            exit("<meta http-equiv=\"refresh\" content=\"0\">");
        } else {

            echo '
            <div class="alert alert-danger" role="alert" >
              That information is incorrect, try again!!! or <a href="index.php" class="alert-link">Sign In here</a>
            </div>';

        }
    }
    ?>
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>

                </div>
            </div>
            <div class="card-body">
                <form method = "POST">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input name = "user_login" type="text" class="form-control" placeholder="username">

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input name = "password_login" type="password" class="form-control" placeholder="password">
                    </div>
                    <div class="row align-items-center remember">
                        <input type="checkbox">Remember Me
                    </div>
                    <div class="form-group">
                        <input name = "login" type="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Don't have an account?<a href="signupHTML.php">Sign Up</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="#">Forgot your password?</a>
                </div>
            </div>
        </div>

    </div>

</div>

<?php
exit();
include ("close.inc.php");
?>
<?php
    include ('header.inc.php');
    if($username != ""){

    }
    else{
        die("You must login to view this page");
    }
?>


<head>
    <title  >Update Information</title>
    
</head>
<?php
    //Controller UpdateInformation
    $senddata = @$_POST['senddata'];
    //Password Variables
    $old_password = strip_tags(@$_POST['oldpassword']);
    $new_password = strip_tags(@$_POST['newpassword']);
    $repeat_password = strip_tags(@$_POST['newpassword2']);
    $fn = strip_tags(@$_POST['fname']);
    $ln = strip_tags(@$_POST['lname']);
    $bi = @$_POST['bio'];
    $bday = @$_POST['birthday'];

if($senddata) {
        $password_query = mysqli_query($connection,"SELECT * FROM users WHERE username='$username'") or die(mysqli_error($connection));
        if (strlen($fn) < 3) {
            echo "<div class=\"alert alert-danger\" role=\"alert\" >
                                     Your first name must be 3 more more characters long
                                    </div>';";
        }
        else {
            if (strlen($ln) < 5) {
                echo "<div class=\"alert alert-danger\" role=\"alert\" >
                                     Your last name must be 5 more more characters long.
                                    </div>';";
            } else {
                //Submit the form to the database
                $info_submit_query = mysqli_query($connection,"UPDATE users SET first_name='$fn', last_name='$ln', bio='$bi', birthday = '$bday' WHERE username='$username'")
                or die(mysqli_error($connection));

                echo "<div class=\"alert alert-success\" role=\"alert\" >
                                     Your profile info has been updated!
                                    </div>';";

            }
        }
        while ($row = mysqli_fetch_assoc($password_query)) {
            $db_password = $row['password'];

            //md5 the old password before we check if it matches
            $old_password_md5 = md5($old_password);

            //Check whether old password equals $db_password
            if ($old_password_md5 == $db_password) {
                //Continue Changing the users password ...
                //Check whether the 2 new passwords match
                if ($new_password == $repeat_password) {
                    if (strlen($new_password) <= 4) {

                        echo "<div class=\"alert alert-danger\" role=\"alert\" >
                                  Sorry! But your password must be more than 4 character long!
                                </div>';";

                    } else {

                        //md5 the new password before we add it to the database
                        $new_password_md5 = md5($new_password);
                        //Great! Update the users passwords!
                        $password_update_query = mysqli_query($connection, "UPDATE users SET password='$new_password_md5' WHERE username='$username'")
                        or die(mysqli_error($connection));
                        echo "<div class=\"alert alert-success\" role=\"alert\" >
                                  Success! Your password has been updated!
                                </div>';";


                    }
                } else {
                    echo "<div class=\"alert alert-warning\" role=\"alert\" >
                                  Your two new passwords don't match!
                                </div>';";
                }
            } else {
                echo "";
                echo "<div class=\"alert alert-danger\" role=\"alert\" >
                                 The old password is incorrect!
                                </div>';";
            }
        }
    }
    else{
        echo "";
    }


?>
<?php
$check = mysqli_query($connection, "select username, first_name, last_name, bio, imgurl, imgcover1, imgcover2, imgcover3 , birthday from users where username ='$username' ")
or die(mysqli_error($connection));
if(mysqli_num_rows($check) == 1) {
    $get = mysqli_fetch_assoc($check);
    $firstname = $get['first_name'];
    $lastname = $get['last_name'];
    $bio = $get['bio'];
    $imgurl = $get['imgurl'];
    $imgcover1 = $get['imgcover1'];
    $imgcover2 = $get['imgcover2'];
    $imgcover3 = $get['imgcover3'];
    $birthday = $get['birthday'];

}
?>
<?php

if(isset($_POST['uploadprofile'])){
    if(!isset($_POST['uploadimage']) )
    {

    }
    else{

        $img = $_POST['uploadimage'];
        if($img == ''){
            echo "<div class=\"alert alert-danger\" role=\"alert\" >
                                         Upload your profile images please!!
                                        </div>";
        }
        else{
            mysqli_query($connection,"UPDATE users SET imgurl='$img' where username = '$username'")
            or die(mysqli_error($connection));

            echo "<div class=\"alert alert-success\" role=\"alert\" >
                                         Update profile image successfully!
                                        </div>";
            echo "<meta http-equiv='refresh' content='0'>";
        }





    }
}
else echo"";

if(isset($_POST['uploadcoverimg']) ) {
    if (!isset($_POST['uploadcover1']) && !isset($_POST['uploadcover2']) && !isset($_POST['uploadcover3'])) {

    } else {

        $coverimg1 = $_POST['uploadcover1'];
        $coverimg2 = $_POST['uploadcover2'];
        $coverimg3 = $_POST['uploadcover3'];
        if($coverimg1 == ''){
            $coverimg1 = $imgcover1;
        }
        if($coverimg2 == ''){
            $coverimg2 = $imgcover2;
        }
        if($coverimg3 == ''){
            $coverimg3 = $imgcover3;
        }

        mysqli_query($connection,"UPDATE users SET imgcover1='$coverimg1',imgcover2='$coverimg2',imgcover3='$coverimg3' where username = '$username'")
        or die(mysqli_error($connection));
        echo "<meta http-equiv='refresh' content='0'>";

        echo "<div class=\"alert alert-success\" role=\"alert\" >
                                     Update cover image successfully!
                                    </div>";



    }
}
?>
    <script>
        UPLOADCARE_LOCALE = "en";
        UPLOADCARE_TABS = "file url facebook gdrive gphotos dropbox instagram evernote flickr skydrive";
        UPLOADCARE_PUBLIC_KEY = "3a173ab29eac547120cf";
        function installWidgetPreviewSingle(widget, img) {
            widget.onChange(function(file) {
                img.css('visibility', 'hidden');
                img.attr('src', '');
                if (file) {
                    file.done(function(fileInfo) {
                        var size = '' + (img.width() * 2) + 'x' + (img.height() * 2);
                        var previewUrl = fileInfo.cdnUrl + '-/scale_crop/' + size + '/center/';
                        img.attr('src', previewUrl);
                        img.css('visibility', 'visible');
                    });
                }
            });
        }
        $(function() {
            $('.image-preview-single').each(function() {
                installWidgetPreviewSingle(
                    uploadcare.SingleWidget($(this).children('input')),
                    $(this).children('img')
                );
            });
        });




    </script>



<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
</script>

<script charset="utf-8" src="//ucarecdn.com/libs/widget/3.6.1/uploadcare.full.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<form style="width: 80%; margin: auto" action="updateInfomation.php" method="post" >

    <h2 style="font-weight: bold">ACCOUNT SETTINGS</h2>
    <br>
    <hr>
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >

            <h5>CHANGE PROFILE IMAGE</h5>
            <br>
            <img src="<?= $imgurl ?>" class="img-fluid" alt="Responsive image" height="250px" width="250px">


                <input type="hidden" role="uploadcare-uploader"
                       data-clearable=""
                       data-images-only=""
                       data-public-key="3a173ab29eac547120cf"
                       name = "uploadimage"
                       data-preview-step="true"
                       data-rotate = ""
                       data-effects="crop,rotate,enhance,sharp,grayscale"
                       data-crop="1:1"
                >
            <br>
            <br>
            <input type="submit" id="uploadprofile" name="uploadprofile" class="btn btn-primary" value="UPDATE PROFILE IMAGE">

        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6" >
            <h5>CHANGE COVER IMAGE</h5>
            <br>
            <p>Cover 1</p>

            <img src="<?php if(!$imgcover1){
                echo 'https://iso.500px.com/wp-content/uploads/2016/04/stock-photo-146960667-1-1500x990.jpg ';
            }
            else echo $imgcover1

            ?>" class="img-fluid" alt="Responsive image"  width="70%">
                <input type="hidden" role="uploadcare-uploader"
                       data-clearable=""
                       data-images-only=""
                       data-public-key="3a173ab29eac547120cf"
                       name = "uploadcover1"
                       data-preview-step="true"
                       data-rotate = ""
                       data-effects="crop,rotate,enhance,sharp,grayscale"
                       data-crop="5:2"
                >
            <br>


            <br>
            <p>Cover 2</p>

            <img src="<?php if(!$imgcover2){
                echo 'https://iso.500px.com/wp-content/uploads/2016/04/stock-photo-146960667-1-1500x990.jpg ';
            }
            else echo $imgcover2

            ?>" class="img-fluid" alt="Responsive image"  width="70%">




            <input type="hidden" role="uploadcare-uploader"
                   data-clearable=""
                   data-images-only=""
                   data-public-key="3a173ab29eac547120cf"
                   name = "uploadcover2"
                   data-preview-step="true"
                   data-rotate = ""
                   data-effects="crop,rotate,enhance,sharp,grayscale"
                   data-crop="5:2"

            >
            <br>
            <br>
            <p>Cover 3</p>

            <img src="<?php if(!$imgcover3){
                            echo 'https://iso.500px.com/wp-content/uploads/2016/04/stock-photo-146960667-1-1500x990.jpg ';
                        }
                        else echo $imgcover3

            ?>" class="img-fluid" alt="Responsive image"  width="70%">




            <input type="hidden" role="uploadcare-uploader"
                   data-clearable=""
                   data-images-only=""
                   data-public-key="3a173ab29eac547120cf"
                   name = "uploadcover3"
                   data-preview-step="true"
                   data-rotate = ""
                   data-effects="crop,rotate,enhance,sharp,grayscale"
                   data-crop="5:2"

            >
            <br>



            <br>
            <input type="submit" id ="uploadcoverimg" name="uploadcoverimg" class="btn btn-primary" value="UPDATE">
            <br>
        </div>
    </div>

    <br>




    <hr>
    <h5>CHANGE YOUR PASSWORD</h5>

    <br>
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Old Password</label>
        <div class="col-5">
            <input class="form-control" name="oldpassword" id="oldpassword" type="password" value="" id="example-text-input">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-search-input" class="col-2 col-form-label">New Password</label>
        <div class="col-5">
            <input class="form-control" name="newpassword" id="newpassword" type="password" value="" id="example-search-input">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-search-input" class="col-2 col-form-label">Repeat Password</label>
        <div class="col-5">
            <input class="form-control" name="newpassword2" id="newpassword2" type="password" value="" id="example-search-input">
        </div>
    </div>
    <hr>
    <h5>UPDATE INFORMATION</h5>
    <br>
    <div class="form-group row">
        <label for="example-search-input" class="col-2 col-form-label">First Name</label>
        <div class="col-5">
            <input class="form-control" name="fname"  type="text" value="<?= $firstname?>" id="fname">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-search-input" class="col-2 col-form-label">Last Name</label>
        <div class="col-5">
            <input class="form-control" type="text" value="<?= $lastname?>" id="lname" name="lname">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-search-input" class="col-2 col-form-label">Birthday</label>
        <div class="col-5">
            <input name='birthday' class='form-control' style='width: 50%' type="date" id="birthday" value="<?= $birthday?>">
        </div>
    </div>
    <div class="form-group row">
        <label for="comment">Bio:</label>
        <textarea name="bio" id="bio" class="form-control" rows="5" id="comment"><?= $bio?></textarea>
    </div>
    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <input type="submit" name = "senddata" id = "senddata" class="btn btn-primary" value="UPDATE">
    </div>
</form>
<?php include ('close.inc.php') ?>
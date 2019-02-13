<?php
    session_start();
 
    $connection = mysqli_connect("localhost", "root", "") or die("Khong the ket noi den database");
    mysqli_select_db($connection, "imagesnetworking") or die("Khong tim thay database");
    //include ('functions.php');
    if (!isset($_SESSION['user_login'])) {
        $username1 = "";
    }
    else {
        $username1 = $_SESSION["user_login"];
    }

    if(isset($_GET['u'])){
        $username = mysqli_real_escape_string($connection,$_GET['u']);
        if(ctype_alnum($username)){
            $check = mysqli_query($connection, "select username, first_name, last_name, bio,sign_up_date,imgurl,imgcover1, imgcover2, imgcover3 , birthday from users where username ='$username' ")
            or die(mysqli_error($connection));
            if(mysqli_num_rows($check) == 1){
                $get = mysqli_fetch_assoc($check);
                $username = $get['username'];
                $firstname = $get['first_name'];
                $lastname = $get['last_name'];
                $signupdate = $get['sign_up_date'];
                $bio        = $get['bio'];
                $imgurl     = $get['imgurl'];
                $imgcover1 = $get['imgcover1'];
                $imgcover2 = $get['imgcover2'];
                $imgcover3 = $get['imgcover3'];
                $birthday = $get['birthday'];
                $sql = mysqli_query($connection,"SELECT * FROM `posts`,`users` WHERE username = user_id_p and username = '$username' ORDER BY `status_time` DESC")
                or die(mysqli_error($connection));
                $posts = mysqli_fetch_all($sql);
                $post_count = mysqli_num_rows($sql);
            }
            else{
                echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
                exit();
            }
        }
    }
    else echo "what the fuck u";
    $checkfollowing = mysqli_query($connection,"SELECT * FROM follow WHERE uf_one = '$username'")
        or die(mysqli_error($connection));
    $checkfollower = mysqli_query($connection,"SELECT * FROM follow WHERE uf_two = '$username'")
        or die(mysqli_error($connection));
    $count_following = mysqli_num_rows($checkfollowing);

    $count_follower = mysqli_num_rows($checkfollower);


?>


<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<head>
<title> <?php echo " $firstname $lastname "?></title>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css"/>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
        } );
    </script>

</head>
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





<script charset="utf-8" src="//ucarecdn.com/libs/widget/3.6.1/uploadcare.full.min.js"></script>
<html>


<style>
    
    html, body { height: 100%;}
    .wrapper{
        background-image: url("https://i.pinimg.com/originals/4c/e6/d4/4ce6d49ecacc39b0a49c9ac279ea4861.png  ");
    }
    /*Slider*/
    .slidecontainer {
        width: 100%;

    }


    .slider {
        -webkit-appearance: none;
        width: 100%;
        height: 15px;
        border-radius: 5px;
        background: #d3d3d3;
        outline: none;
        opacity: 0.7;
        -webkit-transition: .2s;
        transition: opacity .2s;
    }

    .slider:hover {
        opacity: 1;
    }

    .slider::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: #4CAF50;
        cursor: pointer;

    }

    .slider::-moz-range-thumb {
        width: 25px;
        height: 25px;
        border-radius: 50%;
        background: #4CAF50;
        cursor: pointer;
    }

    /* So that the modal is displayed in the preview.. You can probably remove this and the above rule */
    .img-modal {
        display: block;
    }

    .img-modal .modal-dialog {
        /* An arbitrary minimum height. Feel free to modify this one as well */
        min-height: 350px;
        height: 80%;
    }

    .img-modal .modal-content, .img-modal .modal-body, .img-modal .row, .img-modal .modal-image {
        height: 100%;
    }

    .modal-content {
        border-radius: 0;
    }

    .modal-body {
        padding-top: 0;
        padding-bottom: 0;
    }

    .modal-image {
        background: #000;
        padding :0;
    }

    .modal-image img {
        margin: 0 auto;
        max-height: 100%;
        max-width: 100%;

        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .img-modal .img-modal-btn {
        display: block;
        position: absolute;
        top: 0;
        bottom: 0;
        background: black;
        opacity: 0;
        font-size: 1.5em;
        width: 45px;
        color: #fff;
        transition: opacity .2s ease-in;
    }

    .img-modal .modal-image:hover .img-modal-btn {
        opacity: 0.4;
    }

    .img-modal .modal-image:hover .img-modal-btn:hover {
        opacity: 0.75;
    }

    .img-modal .img-modal-btn.right {
        right: 0;
    }

    .img-modal .img-modal-btn i {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        text-align: center;
        margin-top: -.75em;
    }

    .img-modal .modal-meta {
        position: relative;
        height: 100%;
    }

    .img-modal .modal-meta-top {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 45px;
        padding: 5px 10px;
        overflow-y: auto;
    }

    .img-modal .modal-meta-top .img-poster img {
        height: 70px;
        width: 70px;
        float: left;
        margin-right: 15px;
    }

    .img-modal .modal-meta-top .img-poster strong {
        display: block;
        padding-top: 15px;
    }

    .img-modal .modal-meta-top .img-poster span {
        display: block;
        color: #aaa;
        font-size:.9em;
    }

    .img-modal .modal-meta-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 5px;
        border-top: solid 1px #ccc;
    }

    .img-modal .img-comment-list {
        list-style: none;
        padding: 0;
    }
    .img-modal .img-comment-list li {
        margin:0;
        margin-top:10px;
    }

    .img-modal .img-comment-list li > div {
        display:table-cell;
    }

    .img-modal .img-comment-list img {
        border-radius:50%;
        width: 42px;
        height: 42px;
        margin-right: 10px;
        margin-top: 20px;
    }

    .img-modal .img-comment-list p {
        margin: 0;
    }

    .img-modal .img-comment-list span {
        font-size: .8em;
        color: #aaa;
    }

    @media only screen and (max-width : 992px) {
        .modal-content {
            border-radius: 0;
            max-height: 100%;
            overflow-y: auto;
        }

        .img-modal .modal-image {
            height: calc(100% - 100px);
        }

        .img-modal .modal-meta {
            height: auto;
        }

        .img-modal .modal-meta-top {
            position: static;
            padding-top: 15px;
        }

        .img-modal .modal-meta-bottom {
            position: static;
            margin: 0 -15px;
        }
    }


    .glyphicon {  margin-bottom: 10px;margin-right: 10px;}

    small {
        display: block;
        line-height: 1.428571429;
        color: #999;
    }
    img { border: 0; max-width: 100%; }

    body { background: #333; }

    img { border: 0; max-width: 100%; }

    .page-header h1 {
        font-size: 3.26em;
        text-align: center;
        color: #efefef;
        text-shadow: 1px 1px 0 #000;
    }

    /** timeline box structure **/
    .timeline {
        list-style: none;
        padding: 20px 0 20px;
        position: relative;
    }

    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eee;
        left: 50%;
        margin-left: -1.5px;
    }

    .tldate {
        display: block;
        width: 200px;
        background: #414141;
        border: 3px solid #212121;
        color: #ededed;
        margin: 0 auto;
        padding: 3px 0;
        font-weight: bold;
        text-align: center;
        -webkit-box-shadow: 0 0 11px rgba(0,0,0,0.35);
    }

    .timeline li {
        margin-bottom: 25px;
        position: relative;
    }

    .timeline li:before, .timeline li:after {
        content: " ";
        display: table;
    }
    .timeline li:after {
        clear: both;
    }
    .timeline li:before, .timeline li:after {
        content: " ";
        display: table;
    }

    /** timeline panels **/
    .timeline li .timeline-panel {
        width: 46%;
        float: left;
        background: #fff;
        border: 1px solid #d4d4d4;
        padding: 20px;
        position: relative;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        border-radius: 8px;
        -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.15);
        box-shadow: 0 1px 6px rgba(0, 0, 0, 0.15);
    }

    /** panel arrows **/
    .timeline li .timeline-panel:before {
        position: absolute;
        top: 26px;
        right: -15px;
        display: inline-block;
        border-top: 15px solid transparent;
        border-left: 15px solid #ccc;
        border-right: 0 solid #ccc;
        border-bottom: 15px solid transparent;
        content: " ";
    }

    .timeline li .timeline-panel:after {
        position: absolute;
        top: 27px;
        right: -14px;
        display: inline-block;
        border-top: 14px solid transparent;
        border-left: 14px solid #fff;
        border-right: 0 solid #fff;
        border-bottom: 14px solid transparent;
        content: " ";
    }
    .timeline li .timeline-panel.noarrow:before, .timeline li .timeline-panel.noarrow:after {
        top:0;
        right:0;
        display: none;
        border: 0;
    }

    .timeline li.timeline-inverted .timeline-panel {
        float: right;
    }

    .timeline li.timeline-inverted .timeline-panel:before {
        border-left-width: 0;
        border-right-width: 15px;
        left: -15px;
        right: auto;
    }

    .timeline li.timeline-inverted .timeline-panel:after {
        border-left-width: 0;
        border-right-width: 14px;
        left: -14px;
        right: auto;
    }


    /** timeline circle icons **/
    .timeline li .tl-circ {
        position: absolute;
        top: 23px;
        left: 50%;
        text-align: center;
        background: #6a8db3;
        color: #fff;
        width: 35px;
        height: 35px;
        line-height: 35px;
        margin-left: -16px;
        border: 3px solid #90acc7;
        border-top-right-radius: 50%;
        border-top-left-radius: 50%;
        border-bottom-right-radius: 50%;
        border-bottom-left-radius: 50%;
        z-index: 1;
    }


    /** timeline content **/

    .tl-heading h2 {
        margin: 0;
        color: #c25b4e;
    }
    .tl-heading h4 {
        margin: 0;
        color: #c25b4e;
    }

    .tl-body p, .tl-body ul {
        margin-bottom: 0;
    }

    .tl-body > p + p {
        margin-top: 5px;
    }

    /** media queries **/
    @media (max-width: 991px) {
        .timeline li .timeline-panel {
            width: 44%;
        }
    }

    @media (max-width: 700px) {
        .page-header h1 { font-size: 1.8em; }

        ul.timeline:before {
            left: 40px;
        }

        .tldate { width: 140px; }

        ul.timeline li .timeline-panel {
            width: calc(100% - 90px);
            width: -moz-calc(100% - 90px);
            width: -webkit-calc(100% - 90px);
        }

        ul.timeline li .tl-circ {
            top: 22px;
            left: 22px;
            margin-left: 0;

        }
        ul.timeline > li > .tldate {
            margin: 0;
        }

        ul.timeline > li > .timeline-panel {
            float: right;
        }

        ul.timeline > li > .timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        ul.timeline > li > .timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }
    }

    h1, h2, h3, h4, h5, h6{
        font-family: 'Open Sans Condensed', sans-serif, sans-serif;
    }

    .container{
    }

    .wrapper{
    }

    #header{
        border:1px solid #ddd;
        margin-bottom:20px;
    }




    .navbar{
        border-radius:0;
        margin-bottom:0;
        border:none;
        font-family: 'Open Sans Condensed', sans-serif, sans-serif;

    }

    .navbar > li >a{

    }



    .navbar-header{
    }

    .navbar-brand{
        width:160px;
        height:160px;
        float:left;
        padding:0;
        margin-top:-130px;
        overflow:hidden;
        border:3px solid #eee;
        margin-left:15px;
        background:#333;
        text-align:center;
        line-height:160px;
        color:#fff !important;
        font-size:2em;
        -webkit-transition:  all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -o-transition:  all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out ;

    }


    .site-name{
        color:#fff;
        font-size:2.4em;
        float:left;
        margin-top:-65px !important;
        margin-left:15px;
        font-family: 'Open Sans Condensed', sans-serif, sans-serif;

    }
    .site-description{
        color:#fff;
        font-size:1.3em;
        float:left;
        margin-top:-30px !important;
        margin-left:15px;
    }

    .main-menu{
        position:absolute;
        left:190px;
    }

    .slider, .carousel{
        max-height:360px;
        overflow:hidden;
    }

    .carousel-control .fa-angle-left,
    .carousel-control .fa-angle-right {
        position: absolute;
        top: 50%;
        font-size:2em;
        z-index: 5;
        display: inline-block;
    }

    .carousel-control{
        background-color:transparent;
        background-image:none !important;
    }

    .carousel-control:hover,
    .carousel-control:focus {
        color: #fff;
        text-decoration: none;
        background-color:transparent !important;
        background-image:none !important;
        outline: 0;
    }






    @media (max-width: 768px) {
        .navbar-brand{
            max-width: 100px;
            max-height:100px;
            float:left;
            margin-top:-65px;
            margin-left:15px;
            -webkit-transition:  all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -o-transition:  all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out ;
        }





        .navbar{
            border-radius:0;
            margin-bottom:0;
            border:none;
        }

        .main-menu{
            left:0;
            position:relative;
        }


    }

    @media (max-width: 490px) {
        .site-name{
            color:#fff;
            font-size:1.5em;
            float:left;
            line-height:20px;
            margin-top:-100px !important;
            margin-left:125px;
        }
        .site-description{
            color:#fff;
            font-size:1.3em;
            float:left;
            margin-top:-80px !important;
            margin-left:125px;
        }
    }
    #myviewBtn {
        display: none;
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 99;
        font-size: 18px;
        border: none;
        outline: none;
        background-color: cornflowerblue;
        color: white;
        cursor: pointer;
        padding: auto;
        padding-left: 15px;
        padding-right: 15px;
        border-radius: 4px;
    }

    #myviewBtn:hover {
        background-color: #555;
    }
    .col-1 {width: 5%;}
    .col-2 {width: 10%;}
    .col-3 {width: 15%;}
    .col-4 {width: 20%;}
    .col-5 {width: 25%;}
    .col-6 {width: 30%;}
    .col-7 {width: 35%;}
    .col-8 {width: 40%;}
    .col-9 {width: 45%;}
    .col-10 {width: 50%;}
    .col-11 {width: 55%;}
    .col-12 {width: 60%;}
    .col-13 {width: 65%;}
    .col-14 {width: 70%;}
    .col-15 {width: 75%;}
    .col-16 {width: 80%;}
    .col-17 {width: 85%;}
    .col-18 {width: 90%;}
    .col-19 {width: 95%;}
    .col-20 {width: 100%;}
</style>


<div class="wrapper">
    <div class="container" style="width: 85%">
        <div class="row" style="width: 100% ; margin: auto">
            <div class="col-md-12" >
                <header id="header">
                    <div class="slidera">
                        <div    id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                        <img src="<?php
                                                    if(!$imgcover1){
                                                        echo 'https://iso.500px.com/wp-content/uploads/2016/04/stock-photo-146960667-1-1500x990.jpg ';
                                                    }
                                                    else echo $imgcover1;
                                                     ?>
                                        " alt="Los Angeles" ">
                                </div>

                                <div class="item ">
                                    <img src="<?php
                                    if(!$imgcover2){
                                        echo 'https://iso.500px.com/wp-content/uploads/2016/04/stock-photo-146960667-1-1500x990.jpg ';
                                    }
                                    else echo $imgcover2;
                                    ?>
                                        " alt="Los Angeles" ">
                                </div>

                                <div class="item ">
                                    <img src="<?php
                                    if(!$imgcover3){
                                        echo 'https://iso.500px.com/wp-content/uploads/2016/04/stock-photo-146960667-1-1500x990.jpg ';
                                    }
                                    else echo $imgcover3;
                                    ?>
                                        " alt="Los Angeles" ">
                                </div>



                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>



                    </div><!--slider-->

                    <nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"><img class="img-responsive" src="
                                <?php
                                    if(!$imgurl){
                                        echo 'https://ucarecdn.com/bd2f7b59-1280-4995-ae1f-49bd8ed1e00b/ ';
                                    }
                                    else echo $imgurl;
                                ?>
                            "></a>
                            <span style="font-size: 30px; padding: auto" class="site-name"><b><?= $firstname ?></b> <?= $lastname ?>
                                <?php
                                $checkfollow = mysqli_query($connection, "SELECT `id`, `uf_one`, `uf_two` FROM `follow` WHERE uf_one = '$username1' and uf_two = '$username'")
                                or die(mysqli_error($connection));

                                if($username1 != $username && mysqli_num_rows($checkfollow) == 0){
                                    echo"
                                                 <input type='button' onclick='checkfollow()'  style=' margin: 1px; font-weight: bold ;font-size: medium ' value=\"Follow\" id =\"follow\"  class=\"btn btn-success\">
                                          
                                            ";
                                }
                                else
                                    if($username1 != $username && mysqli_num_rows($checkfollow) == 1){
                                        echo"
                                                <input type='button' onclick='checkfollow()' style='margin:1px; font-weight: bold ;font-size: medium' value=\"Following\" id=\"follow\"  class=\"btn btn-success\">
                                          
                                            ";
                                    }


                                ?>



                            </span>

                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="mainNav" >
                            <ul class="nav main-menu navbar-nav">
                                <li><a href="home.php"><i class="fa fa-home"></i> HOME</a></li>
                                <li><a>Posts <?php echo $post_count ?></a></li>
                                <li><a id="followers" >Followers <?php echo $count_follower ?></a></li>
                                <li><a id="following" >Following <?php echo $count_following ?></a></li>



                            </ul>

                            <ul class="nav  navbar-nav navbar-right">
                                <?php
                                    if($username1 == $_GET['u']){
                                        echo "<li><a href=\"updateInfomation.php\">Update Information</a></li>";
                                    }
                                    else
                                    {

                                    }
                                ?>

                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>


                </header><!--/#HEADER-->
            </div>
        </div>


        <div class="row" style="background-color: white ; width: 95% ; margin: auto;padding: auto;"  >
                <h1 style="margin: 15px ; font-size: 30px">Bio</h1>
                <h4 style="text-align: center; "><?= $bio ?></h4>
                <br />
                <small><i class=" glyphicon glyphicon-time"> Since</i><cite title="San Francisco, USA"><?= $signupdate ?></cite> </small>
        </div>

        <button onclick="topFunction()" id="myviewBtn" title="Go to top">Top</button>
         <div id="timeline" class="row" style="width: 100%" >
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            <ul class="timeline">
            
            <?php
            if($username1 == $_GET['u']) {
                echo"
                <li><div class=\"tldate\">Today</div></li>
                <li>
                <div class=\"tl-circ\"></div>
                <div class=\"timeline-panel\" >
                    <div class=\"tl-heading\">
                        <h2 style = \"font-size : 17px\">Add your memory here. Save your moments in your life</h2>
                        <p><small class=\"text-muted\"><i class=\"glyphicon glyphicon-time\"></i> now</small></p>                                 
                        <input type=\"hidden\" role=\"uploadcare-uploader\"
                               data-clearable=\"\"
                               data-images-only=\"\"
                               data-public-key=\"3a173ab29eac547120cf\"
                               data-crop=\"\"
                               name = \"uploadimage\"
                               data-preview-step=\"true\"
                               data-rotate = \"\"
                               data-effects=\"crop,rotate,enhance,sharp,grayscale\"
                        >
                        <div class=\"_list\"></div> 
                        <br>
                        <img id='modelImages' class=\"img-thumbnail\" style='display: none; ' src=\"\"   >
                        <input type='button'  id='previewImages' class='btn btn-success' value='Preview'>
                        
                        
                        <div id='sliderArea' style='display: none' class=\"\"\"slidecontainer\">
                            <span>enhance</span> <input onclick='checkImagesEffect()'  type=\"range\" min=\"0\" max=\"100\" value=\"50\" class=\"slider\" id=\"enhance\">
                            <br>
                            <span>sharp</span> <input onclick='checkImagesEffect()' type=\"range\" min=\"0\" max=\"20\" value=\"5\" class=\"slider\" id=\"sharp\">
                            <br>
                            <span>blur</span> <input onclick='checkImagesEffect()' type=\"range\" min=\"0\" max=\"10\" value=\"10\" class=\"slider\" id=\"blur\">
                            <br>
                            <span>grayscale</span> <input onclick='checkImagesEffect()' type=\"range\" min=\"1\" max=\"2\" value=\"1\" class=\"slider\" id=\"grayscale\">
                        </div>
                    </div> 
                    <br> 
                        
                    <div class=\"tl-body\">
                        <br>
                        <div class=\"form-group\">
                          <label >Title:</label>
                          <input class=\"form-control\" type='text' style='width: 100%' id='status_title' name='status_title'  placeholder='Title' >
                          <br>
                            <label >Date:</label>
                            <input name='datepicker' class='form-control' style='width: 50%' type=\"date\" id=\"datepicker\">
                            <br>
                          <label for=\"comment\">Content:</label>
                          <textarea class=\"form-control\" style='width: 100%; height: 100px' rows=\"5\" class='text-type' id='status' name='status' placeholder='What is on your mind?'></textarea>
                        </div>  
                        <ul>
                            <li style='float: right; padding: auto; margin: auto' >
                               
                                    <input  style='float: left; width: 80px  ' type='button'  class=\"btn btn-primary\" name='submitpost' id='submitpost' value='Post' >
                                
                            </li>
                        </ul>
                    </div>

                </div>
                
                
            </li>
            ";
            }
            else{

            }
            ?>
            <?php
                $previostime = "1888-01-01";
                $previostime_value = strtotime($previostime);
                $key = 1;


                foreach($posts as $row) {

                $time=strtotime($row[3]);

                if($time == strtotime($birthday)){
                    $day=date("d",$time);
                    $month=date("m",$time);
                    $year=date("Y",$time);
                    echo"<li ><div style='text-align: center' class=\"tldate\"> BIRTHDAY <span class=\"glyphicon glyphicon-heart\"></span> <br> $day / $month / $year</div></li>";
                }

                else
                if((date("m",$time) != date("m",$previostime_value)) && (date("Y",$time) != date("Y",$previostime_value)) ||(date("m",$time) == date("m",$previostime_value)) && (date("Y",$time) != date("Y",$previostime_value)) ){
                    $month=date("m",$time);
                    $year=date("Y",$time);
                    echo"<li><div  class=\"tldate\">$month / $year</div></li>";


                }
                $previostime_value = strtotime($row[3]);
                    $strings = array(
                    'timeline-inverted',
                    '',
                );
                if($key == 1){
                    $key = 0;
                }
                else $key = 1;
                $check_liked1 = mysqli_query($connection,"SELECT * FROM likes WHERE liker = '$username1' and post_id =  '$row[0]'")
                or die(mysqli_error($connection));
                $likes = mysqli_num_rows($check_liked1);
                if($likes == 0){
                    echo "
                    <li class='$strings[$key]'  >
                        <div class=\"tl-circ\"></div>
                        <div class=\"timeline-panel\" style='padding: 0px' >
                            <div class=\"tl-heading\" >
                                <h4 style='margin: 3%; margin-bottom: auto'>$row[4]</h4>
                                    <button style='margin: 3%' onclick='deletePost($row[0])' type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                <p><small class=\"text-muted\"><i style='margin: 3%;margin-top: 1%;margin-bottom: 1% ' class=\"glyphicon glyphicon-time\"></i> $row[3]</small></p>
                            </div>
                            <div  class=\"tl-body\">
                                <p  style='margin: 3%;margin-bottom: 1px;margin-top: 1px' >$row[5] </p>
                                <br>
                                <p><img  onclick='commentFunction($row[0])' src=\"$row[2]\" alt=\"lorem pixel\"></p>

                            </div>
                            <br>
                            <div class=\"timeline-footer\" style='margin-left: 3%'>
                                    <!--glyphicon glyphicon-heart-->
                                  
                                        <a><button onclick='checkID( $row[0])'  id = '$row[0]'  class=\"glyphicon glyphicon-heart-empty\">$row[6]</button></a>
                                        <a><i  onclick='commentFunction($row[0])' class=\"glyphicon glyphicon-comment\"></i></a>
                                        
                                    
                            </div>

                        </div>
                     </li>
                    ";
                    }
                    else{
                        echo "
                    <li class='$strings[$key]'  >
                        <div class=\"tl-circ\"></div>
                        <div class=\"timeline-panel\" style='padding: 0px'>
                            <div class=\"tl-heading\">
                                <h4 style='margin: 3%; margin-bottom: auto'>$row[4]</h4>
                                <button style='margin: 3%' onclick='deletePost($row[0])'  type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                <p><small class=\"text-muted\"><i style='margin: 3%;margin-top: 1%;margin-bottom: 1%' class=\"glyphicon glyphicon-time\"></i> $row[3]</small></p>
                                
                            </div>
                            <div class=\"tl-body\">
                                <p  style='margin: 3%;margin-bottom: 1px;margin-top: 1px' >$row[5] </p>
                                <br>
                                <p><img  onclick='commentFunction($row[0])' src=\"$row[2]\" alt=\"lorem pixel\"></p>

                            </div>
                            <br>
                            <div class=\"timeline-footer\" style='margin-left: 3%'>
                                    <!--glyphicon glyphicon-heart-->
                                       
                                        <a><button onclick='checkID($row[0])'    id = '$row[0]'  class=\"glyphicon glyphicon-heart\">$row[6]</button></a>
                                        <a><i onclick='commentFunction($row[0])' class=\"glyphicon glyphicon-comment\"></i></a>
                                                     
                            </div>

                        </div>
                     </li>
                    ";
                    }


            }

           /* if(isset($_POST['postID'])){
                $postid = $_POST['postID'];
                $check_liked = mysqli_query($connection,"SELECT * FROM likes WHERE liker = '$username1' and post_id =  '$postid'")
                or die(mysqli_error($connection));
                if(mysqli_num_rows($check_liked) == 0){
                echo"<script> document.getElementById(\"likebutton\").className = \"glyphicon glyphicon-heart\"; </script>";
                    mysqli_query($connection, "UPDATE `posts` SET `p_likes` = p_likes + 1 WHERE post_id='$postid'")
                    or die(mysqli_error($connection));
                    mysqli_query($connection, "INSERT INTO `likes`(`id`, `liker`, `post_id`) VALUES (NULL,'$username1','$postid')")
                    or die(mysqli_error($connection));
                    echo "echo \"<meta http-equiv='refresh' content='0'>\";";
                }
                elseif(mysqli_num_rows($check_liked) == 1){
                    echo"<script> document.getElementById(\"likebutton\").className = \"glyphicon glyphicon-hear-empty\"; </script>";
                    mysqli_query($connection, "UPDATE `posts` SET `p_likes` = p_likes - 1 WHERE post_id= '$postid'")
                    or die(mysqli_error($connection));
                    mysqli_query($connection, "DELETE from `likes` where liker = '$username1' and post_id = '$postid'")
                    or die(mysqli_error($connection));
                    echo "echo \"<meta http-equiv='refresh' content='0'>\";";
                }

            }
*/

            ?>

                <script>

                    //Flolow Stuff
                    $(document).ready(function(){
                        $('#followers').click(function (event){

                        event.preventDefault();

                       var userfollower = "<?php echo $username ?>"; 
                         //alert("response");
                       $.ajax({
                                url      : 'test.php',
                                method   : 'POST',
                                data     : {userfollower:userfollower},
                                success  : function(response) {
                                    //var data = response.split(",");
                                    //$('#postComment').val("");
                                    
                                    $('#modalContentID').html(response);
                                    $('#myModalList').modal('toggle');
                                    
                                }
                               // $('#commentModal').modal('toggle');
                            });
                    });

                    });

                    $(document).ready(function(){
                        $('#following').click(function (event){

                        event.preventDefault();

                       var userfollowing = "<?php echo $username ?>"; 
                         //alert("response");
                       $.ajax({
                                url      : 'test.php',
                                method   : 'POST',
                                data     : {userfollowing:userfollowing},
                                success  : function(response) {
                                    //var data = response.split(",");
                                    //$('#postComment').val("");
                                    
                                    $('#modalContentID').html(response);
                                    $('#myModalList').modal('toggle');
                                    
                                }
                               // $('#commentModal').modal('toggle');
                            });
                    });

                    });

                    //POST COMMENT
                    
                    $(document).ready(function(){
                        $('#postCommentButton').click(function (event) {
                            event.preventDefault();
                            //alert('gggg');
                            //var a=$(this).attr('#postComment');
                            var commentContent = $('#postComment').val();
                            var author = "<?php echo $username1 ?>";
                            //var name =
                            var name = $("#postCommentButton").attr("name");

                            $.ajax({
                                url      : 'test.php',
                                method   : 'POST',
                                data     : {commentContent:commentContent,author:author,name:name},
                                success  : function(response) {
                                 
                                    $('#postComment').val("");
                                    $('#hahalist').append(response);
                                  

                                }
                            
                            });
                        });
                    });
                           

                        $('#submitpost').click(function (event) {
                            event.preventDefault();
                            var status_image = $('#modelImages').attr('src');
                          
                            var status_title = $('#status_title').val();
                            var datepicker = $('#datepicker').val();
                            var status     = $('#status').val();
                         

                            $.ajax({
                                url      : 'test.php',
                                method   : 'POST',
                                data     : {status_image : status_image,status_title:status_title,datepicker:datepicker,status:status},
                                success  : function(response) {
                                    if (!isNaN(response)) {
                                        alert("Please pick a time for your memory!!! "   );


                                    }
                                    else {
                                        var data = response.split("|");
                                        setTimeout(function(){// wait for 5 secs(2)
                                            location.reload(); // then reload the page.(3)
                                        }, 4000);


                                        $('#timeline').html(data[0]);
                                        //$('#previewImages')

                                        document.getElementById(data[1]).scrollIntoView({
                                            block: 'center',
                                            behavior: 'smooth'
                                        });

                                    }
                                }




                            });
                        });

                        $('#previewImages').click(function (event) {
                            event.preventDefault();
                  
                            var checkPreview = $("input[name=uploadimage]").val();
                            //alert('checkPreview');
                            if(checkPreview){
                                $('#sliderArea').css("display","block");
                                //$('#modelImages').
                                $("#modelImages").css("display","block").attr("src",checkPreview);;
                               // $("#modelImages")
                            }
                            else{
                                alert('Please upload images first!')
                            }
                            //document.getElementById(sliderArea).css(



                        });

                        //JSON JSON VL JSON
                        function checkImagesEffect() {

                            var checkPreview = $("input[name=uploadimage]").val();
                            var enhance = $('#enhance').val();
                            var sharp = $('#sharp').val();
                            var blur = $('#blur').val();
                            var grayscale = $('#grayscale').val();
                            var txt = {"checkPreview":checkPreview,"enhance":enhance, "sharp":sharp, "blur":blur, "grayscale":grayscale};
                           
                                $.ajax({
                                    url      : 'test.php',
                                    method   : 'POST',
                                    dataType: 'JSON',
                                    data     : {checkPreview:JSON.stringify(txt)},
                                    success  : function(response){
 
                                        $("#modelImages").attr("src",response.checkPreview);
                                        

                                    }
                                });

                        };

                        function checkID(x){
                            var postID = x;
                            $this = $(this);

                            $.ajax({
                                url      : 'test.php',
                                method   : 'POST',
                                data     : {postID : postID},
                                success  : function(response){
                                    var data = response.split(",");
                                    $('#'+postID).text(data[0]);
                                    document.getElementById(postID).className = data[1];
                                }
                            });

                        };
                        function checkfollow(){
                            var user = "<?php echo $username ?>";

                            var follow = $('#follow').val();

                            $.ajax({
                                url      : 'test.php',
                                method   : 'POST',
                                data     : {follow : follow , user : user},
                                success  : function(response){
                                    var data = response.split(",");
                                    $('#follow').val(data[0]);
                                    $('#followers').text( "Followers " + data[1]);
                                    $('#following').text("Following " + data[2]);

                                }
                            });
                        };

                        function deletePost(x){
                            var postIDdelete = x;
                            $('#myModal').modal('toggle');
                            $('#close').click(function (event) {
                                event.preventDefault();
                            });
                            $('#yes').click(function (event) {
                                event.preventDefault();
                                $.ajax({
                                    url      : 'test.php',
                                    method   : 'POST',
                                    data     : {postIDdelete : postIDdelete},
                                    success  : function(){
                                        location.reload();
                                    }
                                });
                            });


                        };
                        function commentFunction(x){
                            //data-toggle="modal" data-target="#commentModal"
                            //
                            var postIDComment = x;

                            $.ajax({
                                url      : 'test.php',
                                method   : 'POST',
                                data     : {postIDComment:postIDComment},
                                //dataType : 'json',
                                success  : function(response) {
                                    var data = response.split("|");
                                    $("#imageComment").attr("src",data[1]);
                                   // alert(data[0]);
                                   // $('#imageComment').val(data[0]);
                                    $('#timeComment').html(data[0]);
                                    $('#postCommentButton').attr('name', postIDComment);
                                    $('#title_comment').text(data[2]);
                                    $('#status_comment').text(data[3]);
                                    var i;
                                    var e = '';
                                    for (i = 4; i < data.length -2 ; i++) {
                                        e += data[i];

                                    }
                                    $('#hahalist').html(e);
                                    $('#commentModal').modal('toggle');
                                   // $('#commentModal').modal('toggle');
                                    //


                                }

                            });
                        };

                    window.onscroll = function() {scrollFunction()};

                    function scrollFunction() {
                        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                            document.getElementById("myviewBtn").style.display = "block";
                        } else {
                            document.getElementById("myviewBtn").style.display = "none";
                        }
                    };
                    // When the user clicks on the button, scroll to the top of the document
                    function  topFunction() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    };



                </script>
        </ul>
        </div>
        </div>
    </div>
</div>
<!-- Modal cofirm delete-->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">COMFIRM</h4>
            </div>
            <div class="modal-body">
                <p style="font-size: large">Are you sure to delete this post?</p>


            </div>
            <div class="modal-footer">
                <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="yes" class="btn btn-danger" data-dismiss="modal">Yes</button>
            </div>
        </div>

    </div>
</div>

<div class = "modal fade " id="commentModal">
    <div class="modal img-modal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 modal-image">
                            <img alt id="imageComment" class="img-responsive " src="">

                            <!--<a href="" class="img-modal-btn left"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <a href="" class="img-modal-btn right"><i class="glyphicon glyphicon-chevron-right"></i></a>!-->
                        </div>
                        <div class="col-md-4 modal-meta">
                            <div class="modal-meta-top">
                                <button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <div class="img-poster clearfix">
                                    <a href=""><img class="img-circle" src="<?php echo $imgurl ?>"/></a>
                                    <strong><a id="nameComment" href=""></a><?php echo $firstname ." ".$lastname ?></strong>
                                    <span id="timeComment"></span>

                                </div>
                                <h3 style="font-family: Arial" id="title_comment"></h3>
                                <h5 style="font-family: Arial" id="status_comment"></h5>
                                <ul id="hahalist" class="img-comment-list">

                                </ul>
                            </div>
                            <div class="modal-meta-bottom">
                                <input style="float: left ; width: 80%" type="text"  id="postComment" class="form-control"  placeholder="Leave a commment.."/>
                                <input value="POST" style=" float: left ; width: 20%" type="button" id="postCommentButton" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
</div>

<script>
    $( "div.alert-info" ).fadeIn( 1000 ).delay( 3000 ).fadeOut( 1000 );
</script>
 

<div class="modal fade" id="myModalList" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="modalContentID">
       
      </div>
      
    </div>
  </div>

</html>


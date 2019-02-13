<div style="height: 13%">
        <?php
         include ("header.inc.php");
        include ("functions.php");
        ?>
</div>

<!------ Include the above in your HEAD tag ---------->
<head>
    <title  >Home Page</title>
    
</head>
<style>
    body {
            background-image: url("https://i.pinimg.com/564x/eb/c8/94/ebc894f0a6a4db139e64f4b94602e078.jpg");
        }

        h1, h2, h3, h4, h5, h6{
        font-family: 'Open Sans Condensed', sans-serif, sans-serif;
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
       font-size: .8em;
        
    }

    .img-modal .img-comment-list span {
        font-size: .7em;
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

        .h7 {
            font-size: 0.8rem;
        }

        .gedf-wrapper {
            margin-top: 0rem;
        }

        @media (min-width: 992px) {
            .gedf-main {
                padding-left: 1rem;
                padding-right: 1rem;
            }
            .gedf-card {
                margin-bottom: 2.77rem;

            }
        }

        /**Reset Bootstrap*/
        .dropdown-toggle::after {
            content: none;
            display: none;
        }
        .btn{
            margin: 1%;
        }
        .mr-2e{
        float: left;
        padding: 1%;
        border-radius: 50%;
        
        }
        .twPc-div {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #e1e8ed;
    border-radius: 6px;
    height: 200px;
    max-width: 340px; // orginal twitter width: 290px;
    margin-top: 10%;
}
.twPc-bg {
    background-image: url("https://i.pinimg.com/564x/c8/36/68/c8366825ed45484e54f195a182895264.jpg");
    background-position: 0 50%;
    background-size: 100% auto;
    border-bottom: 1px solid #e1e8ed;
    border-radius: 4px 4px 0 0;
    height: 95px;
    width: 100%;
}
.twPc-block {
    display: block !important;
}
.twPc-button {
    margin: -35px -10px 0;
    text-align: right;
    width: 100%;
}
.twPc-avatarLink {
    background-color: #fff;
    border-radius: 6px;
    display: inline-block !important;
    float: left;
    margin: -30px 5px 0 8px;
    max-width: 100%;
    padding: 1px;
    vertical-align: bottom;
}
.twPc-avatarImg {
    border: 2px solid #fff;
    border-radius: 7px;
    box-sizing: border-box;
    color: #fff;
    height: 72px;
    width: 72px;
}
.twPc-divUser {
    margin: 5px 0 0;
}
.twPc-divName {
    font-size: 18px;
    font-weight: 700;
    line-height: 21px;
}
.twPc-divName a {
    color: inherit !important;
}
.twPc-divStats {
    margin-left: 11px;
    padding: 10px 0;
}
.twPc-Arrange {
    box-sizing: border-box;
    display: table;
    margin: 0;
    min-width: 100%;
    padding: 0;
    table-layout: auto;
}
ul.twPc-Arrange {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.twPc-ArrangeSizeFit {
    display: table-cell;
    padding: 0;
    vertical-align: top;
}
.twPc-ArrangeSizeFit a:hover {
    text-decoration: none;
}
.twPc-StatValue {
    display: block;
    font-size: 18px;
    font-weight: 500;
    transition: color 0.15s ease-in-out 0s;
    text-align: center;
}
.twPc-StatLabel {
    color: #8899a6;
    font-size: 10px;
    letter-spacing: 0.02em;
    overflow: hidden;
    text-transform: uppercase;
    transition: color 0.15s ease-in-out 0s;
}
.imagess{

    max-width: 100%;
    display: block;
    margin: auto;
    padding: 0px;

}
</style>
<?php 
    
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
    $checkfollowing = mysqli_query($connection,"SELECT * FROM follow WHERE uf_one = '$username'")
        or die(mysqli_error($connection));
    $checkfollower = mysqli_query($connection,"SELECT * FROM follow WHERE uf_two = '$username'")
        or die(mysqli_error($connection));
    $count_following = mysqli_num_rows($checkfollowing);   
    $count_follower = mysqli_num_rows($checkfollower);
 
    

?>
    
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
        
        
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    
    <div class="container-fluid gedf-wrapper">
        <div class="row">
            <div class="col-md-3" id="filter"  >

                <div class="card" >

                    <div class="card-body">
                        <div class="h6 text-muted">Filter by</div>
                        <div style="text-align: center; ">
                        <button id="newest" class="btn btn-primary filter-button" data-filter="Newest">Newest</button>
                        
                        
                        <button id="popular" class="btn btn-default filter-button" data-filter="popular">Popular</button>
                        <br> 
                        <br>  
                        <span style="float: left;" class="badge badge-info">Time</span>
                        <div class="input-group">
                                
                                <select id="fromMonth" onchange="filterbytime()" style="width: auto;float: left;" name="control-month" class="form-control" aria-describedby="month-addon">
                                    <option selected="selected">Month</option>
                                    <option>January</option>                            
                                    <option>February</option>                            
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>Octomber</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                
                                <select id="fromYear" onchange="filterbytime()" style="width: auto;float: left;" name="control-year" class="form-control" aria-describedby="year-addon">
                                    <option selected="selected">Year</option> 
                                    <?php 
                                        for ($i = 2018; $i >= 1900; $i--) {
                                            echo "<option>$i</option>";
                                        }
                                    ?>                          
                                                            
                                </select>

                        </div>
                        <br> 
                        
                        <span id="anotheryear" style="float:left;" class="badge badge-info">To another year</span>
                        <br>
                        <div id="anotheryearfield" onchange="filterbytime()"  style="display: none;" class="input-group">
                                <select id="toMonth" style="width: auto;float: left;"  name="control-month" class="form-control" aria-describedby="month-addon">
                                    <option selected="selected">Month</option>
                                    <option>January</option>                            
                                    <option>February</option>                            
                                    <option>March</option>
                                    <option>April</option>
                                    <option>May</option>
                                    <option>June</option>
                                    <option>July</option>
                                    <option>August</option>
                                    <option>September</option>
                                    <option>Octomber</option>
                                    <option>November</option>
                                    <option>December</option>
                                </select>
                                
                                <select id="toYear" onchange="filterbytime()" style="width: auto;float: left;" name="control-year" class="form-control" aria-describedby="year-addon">
                                    <option selected="selected">Year</option>                            
                                    <?php 
                                        for ($i = 2018; $i >= 1900; $i--) {
                                            echo "<option>$i</option>";
                                        }
                                    ?>                                
                                </select>
                                
                        </div>

                    </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="h6 text-muted">Followers</div>
                            <div class="h5"><?= 822.256 + $count_follower ?></div>
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted">Following</div>
                            <div class="h5"><?= 300 + $count_following ?></div>
                        </li>
                        <li class="list-group-item">Add more</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 gedf-main" id="newfeed">

                <!--- \\\\\\\Post-->
                
                <!-- Post /////-->

                <!--- \\\\\\\Post-->
                <?php
                    $newest = mysqli_query($connection,"SELECT * FROM posts WHERE user_id_p in (select uf_two FROM follow WHERE uf_one = '$username') ORDER by `time_posts` DESC")
                    or die(mysqli_error($connection));
                    $newestPost = mysqli_fetch_all($newest);
                    $gettime  = new Main;
                    foreach ($newestPost as $np) {
                        $checkuserPost = mysqli_query($connection, "select first_name, last_name, imgurl from users where username ='$np[1]' ")
                        or die(mysqli_error($connection));
                        if(mysqli_num_rows($checkuserPost) == 1) {
                            $getuserPost = mysqli_fetch_assoc($checkuserPost);
                            $firstnameuserPost = $getuserPost['first_name'];
                            $lastnameuserPost = $getuserPost['last_name'];
                            $imgurluserPost = $getuserPost['imgurl'];

                        }
                        $postnumber = mysqli_query($connection, "SELECT count(*) FROM `comments` WHERE `c_post_id` = $np[0] LIMIT 1 ")
                            or die(mysqli_error($connection));
                        $postnb = $postnumber->fetch_array(MYSQLI_NUM);
                        $timeAgo = $gettime->timeAgo($np[7]);
                        $check_liked1 = mysqli_query($connection,"SELECT * FROM likes WHERE liker = '$username' and post_id =  '$np[0]'")
                        or die(mysqli_error($connection));
                        $likes = mysqli_num_rows($check_liked1);
                        if($likes == 0){
                        echo"
                <div class=\"card gedf-card\" >

                    <div class=\"card-header\">
                        <div class=\"d-flex justify-content-between align-items-center\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div class=\"mr-2\">
                                    <img href=\"$np[1]\" class=\"rounded-circle\" width=\"45\" src=\"$imgurluserPost\" alt=\"\">
                                </div>
                                <div class=\"ml-2\">
                                    <a style =\"color : black \" href=\"$np[1]\">
                                    <div  class=\"h5 m-0\">$firstnameuserPost $lastnameuserPost</div>
                                    </a>
                                    <div class=\"h7 text-muted\">$np[3]</div>
                                </div>
                            </div>
                            <div>
                                <div class=\"dropdown\">
                                    <button class=\"btn btn-link dropdown-toggle\" type=\"button\" id=\"gedf-drop1\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                        <i class=\"fa fa-ellipsis-h\"></i>
                                    </button>
                                    <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"gedf-drop1\">
                                        <div class=\"h6 dropdown-header\">Configuration</div>
                                        <a class=\"dropdown-item\" href=\"#\">Save</a>
                                        <a class=\"dropdown-item\" href=\"#\">Hide</a>
                                        <a class=\"dropdown-item\" href=\"#\">Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class=\"card-body\" style='padding: 0px'>
                        <div class=\"text-muted h7 mb-2\"> <i style='margin-left: 2%' class=\"fa fa-clock-o\"></i>$timeAgo</div>
                        <a class=\"card-link\" href=\"#\">
                            <h5 class=\"card-title\" style='margin-left: 2%'>$np[4]</h5>
                        </a>

                        <p class=\"card-text\" style='margin-left: 2%'>
                                $np[5]
                            <br>
                            <p><img class='imagess' onclick='commentFunction($np[0])' src=\"$np[2]\" alt=\"Responsive image\"></p>
                        </p>
                    </div>
                    <div class=\"card-footer\">
                        
                        <a id = \"$np[0]\" onclick = \"checkID($np[0])\"  class=\"card-link\"><i class=\"fa fa-gittip\"></i> $np[6] Like</a>
                        <a onclick='commentFunction($np[0])' class=\"card-link\"><i class=\"fa fa-comment\"></i> $postnb[0] Comment</a>
                        <a  class=\"card-link\"><i class=\"fa fa-mail-forward\"></i> Share</a>
                    </div>
                </div>
                        ";
                    }
                    if ($likes == 1) {
                        echo"
                <div class=\"card gedf-card\" >

                    <div class=\"card-header\">
                        <div class=\"d-flex justify-content-between align-items-center\">
                            <div class=\"d-flex justify-content-between align-items-center\">
                                <div class=\"mr-2\">
                                    <img href=\"$np[1]\" class=\"rounded-circle\" width=\"45\" src=\"$imgurluserPost\" alt=\"\">
                                </div>
                                <div class=\"ml-2\">
                                    <a style =\"color : black \" href=\"$np[1]\">
                                    <div  class=\"h5 m-0\">$firstnameuserPost $lastnameuserPost</div>
                                    </a>
                                    <div class=\"h7 text-muted\">$np[3]</div>
                                </div>
                            </div>
                            <div>
                                <div class=\"dropdown\">
                                    <button class=\"btn btn-link dropdown-toggle\" type=\"button\" id=\"gedf-drop1\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                                        <i class=\"fa fa-ellipsis-h\"></i>
                                    </button>
                                    <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"gedf-drop1\">
                                        <div class=\"h6 dropdown-header\">Configuration</div>
                                        <a class=\"dropdown-item\" href=\"#\">Save</a>
                                        <a class=\"dropdown-item\" href=\"#\">Hide</a>
                                        <a class=\"dropdown-item\" href=\"#\">Report</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class=\"card-body\" style='padding: 0px'>
                        <div class=\"text-muted h7 mb-2\"> <i style='margin-left: 2%' class=\"fa fa-clock-o\"></i>$timeAgo</div>
                        <a class=\"card-link\" href=\"#\">
                            <h5 class=\"card-title\" style='margin-left: 2%'>$np[4]</h5>
                        </a>

                        <p class=\"card-text\" style='margin-left: 2%'>
                                $np[5]
                            <br>
                            <p><img class='imagess' onclick='commentFunction($np[0])' src=\"$np[2]\" alt=\"Responsive image\"></p>
                        </p>
                    </div>
                    <div class=\"card-footer\">
                        
                        <a style =\"color : red\" id = \"$np[0]\" onclick = \"checkID($np[0])\"  class=\"card-link\"><i class=\"fa fa-gittip\"></i> $np[6] Like</a>
                        <a onclick='commentFunction($np[0])' class=\"card-link\"><i class=\"fa fa-comment\"></i> $postnb[0] Comment</a>
                        <a  class=\"card-link\"><i class=\"fa fa-mail-forward\"></i> Share</a>
                    </div>
                </div>
                        ";
                    }
                    }
                ?>


                <!-- Post /////-->





            </div>
            <div class="col-md-3">
                <div class="card gedf-card">
                    <div class="card-body"style='padding: 0px'  >
                        <h5 class="card-title" style='margin: 2%'>Your friends</h5>
                        <?php 
                            $checkFriends = mysqli_query($connection, "SELECT uf_two FROM `follow` WHERE uf_one = '$username' and uf_two in (SELECT uf_one FROM follow WHERE uf_two = '$username')")
                                or die(mysqli_error($connection));
                            $friends = mysqli_fetch_all($checkFriends);
                             shuffle($friends);
                            foreach ($friends as $fr) {
                                $checkFriendsImg = mysqli_query($connection, "SELECT imgurl, username FROM `users` WHERE username = '$fr[0]'")
                                or die(mysqli_error($connection));
                                $row = $checkFriendsImg->fetch_array(MYSQLI_NUM);
                               echo "
                                <div class=\"mr-2e\">
                                    <img  class=\"rounded-circle\" title=\"$row[1]\" href=\"$row[1]\" width=\"45\" src=\"$row[0] \" alt=\"\">
                                </div>

                               ";
                            }
                        ?>
                       

                    </div>
                </div>
                <div class="card gedf-card">
                        <div class="card-body" style='padding: 0px'  >
                            <h5 class="card-title" style='margin: 2%'>People You May Know</h5>
                            <?php
                                  $ab=array("btn btn-primary","btn btn-secondary","btn btn-success","btn btn-danger","btn btn-warning","btn btn-info","btn btn-light","btn btn-dark");                                
                                    
                                    $checkFriendsAd = mysqli_query($connection, "SELECT * FROM users WHERE username != '$username' and username not in (SELECT uf_two FROM follow WHERE uf_one = '$username') LIMIT 6")
                                            or die(mysqli_error($connection));
                                        $friendsAd = mysqli_fetch_all($checkFriendsAd);
                                        shuffle($friendsAd);
                                        foreach ($friendsAd as $frAd) {
                                            $checkfollowing = mysqli_query($connection,"SELECT * FROM follow WHERE uf_one = '$frAd[1]'")
                                                or die(mysqli_error($connection));
                                            $checkfollower = mysqli_query($connection,"SELECT * FROM follow WHERE uf_two = '$frAd[1]'")
                                                or die(mysqli_error($connection));
                                            $count_following = mysqli_num_rows($checkfollowing);

                                            $count_follower = mysqli_num_rows($checkfollower);
                                            $sql = mysqli_query($connection,"SELECT * FROM `posts`,`users` WHERE username = user_id_p and username = '$frAd[1]' ORDER BY `status_time` DESC")
                                            or die(mysqli_error($connection));
                                        
                                            $post_count = mysqli_num_rows($sql);
                                            $random_keys1=array_rand($ab);

                                           echo "
                                             <div class=\"twPc-div\" id=\"$frAd[0]\">
                                                <a class=\"twPc-bg twPc-block\" ></a>

                                                <div>
                                                    <div class=\"twPc-button\">
                                               
                                                        <input type=\"button\" value=\"Follow\" id = \"id$frAd[0]\"onclick=\"checkfollow($frAd[0])\" class=\"$ab[$random_keys1]\" >
                                                    <!-- Twitter Button -->   
                                                    </div>

                                                <a title=\"$frAd[2] $frAd[3]\" href=\"$frAd[1]\" class=\"twPc-avatarLink\">
                                                    <img alt=\"$frAd[2] $frAd[3]    \" src=\"$frAd[10]\" class=\"twPc-avatarImg\">
                                                </a>

                                                <div class=\"twPc-divUser\">
                                                    <div class=\"twPc-divName\">
                                                        <a href=\"$frAd[1]\">$frAd[2] $frAd[3]</a>
                                                    </div>
                                                    <span>
                                                        <a href=\"$frAd[1]\">@<span>$frAd[1]</span></a>
                                                    </span>
                                                </div>

                                                <div class=\"twPc-divStats\">
                                                    <ul class=\"twPc-Arrange\">
                                                        <li class=\"twPc-ArrangeSizeFit\">
                                                            <a href=\"$frAd[1]\"9.840 Tweet\">
                                                                <span class=\"twPc-StatLabel twPc-block\">Posts</span>
                                                                <span class=\"twPc-StatValue\">$post_count</span>
                                                            </a>
                                                        </li>
                                                        <li class=\"twPc-ArrangeSizeFit\">
                                                            <a href=\"$frAd[1]\" title=\"$count_following Following\">
                                                                <span class=\"twPc-StatLabel twPc-block\">Following</span>
                                                                <span class=\"twPc-StatValue\">$count_following</span>
                                                            </a>
                                                        </li>
                                                        <li class=\"twPc-ArrangeSizeFit\">
                                                            <a href=\"$frAd[1]\" title=\"$count_follower Followers\">
                                                                <span class=\"twPc-StatLabel twPc-block\">Followers</span>
                                                                <span class=\"twPc-StatValue\">$count_follower</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                    </div>
                                                </div>

                                           ";
                            }

                            ?>
                           
                            </div>
                        </div>
            </div>
        </div>
    </div>
    <script>
       
        function checkfollow(x){
                            
                            var userfl1 = "<?php echo $username ?>";

                            var userfl = x;
                          
                            $.ajax({
                                url      : 'test.php',
                                method   : 'POST',
                                data     : {userfl : userfl , userfl1 : userfl1},
                                success  : function(response){
                                    
                                    $('#id'+userfl).val(response);
                                    setTimeout(function(){// wait for 5 secs(2)
                                            $('#'+userfl).hide();
                                        }, 2000);

                                }
                            });
                        }



        $('#anotheryear').click(function(event){

            event.preventDefault();
      
            if($('#anotheryearfield').css("display") == "none"){
                $('#anotheryearfield').css("display", "block");
                $('#anotheryear').text("Hide another year");

            }
            else{
                $('#anotheryearfield').css("display", "none");
                $('#anotheryear').text("To another year");
                $('#toMonth option:selected').text("Month");
                $('#toYear option:selected').text("Year");

            }
            

        });

        $('#popular').click(function(event){
            event.preventDefault();
            var userpopular = "<?php echo $username ?>";
            
            $.ajax({
                url      : 'test.php',
                method   : 'POST',
                data     : {userpopular : userpopular},
                success  : function(response){
                    $('#newfeed').html(response);
                }
            });
        });

        $('#newest').click(function(event){
            event.preventDefault();
            var usernewest = "<?php echo $username ?>";
            
            $.ajax({
                url      : 'test.php',
                method   : 'POST',
                data     : {usernewest : usernewest},
                success  : function(response){
                    $('#newfeed').html(response);
                }
            });
        });

        function filterbytime(){
            var fromMonth = $('#fromMonth option:selected').text();
            var fromYear = $('#fromYear option:selected').text();
            var toMonth = $('#toMonth option:selected').text();
            var toYear = $('#toYear option:selected').text();
            
            $.ajax({
            url      : 'test.php',
            method   : 'POST',
            data     : {fromMonth : fromMonth,fromYear : fromYear,toMonth : toMonth,toYear : toYear},
            success  : function(response){
                $('#newfeed').html(response);
                //alert(response);
            }
        });
            
            
        }
        function checkID(x){
                            var postID = x;
                            $this = $(this);
                            
                            
                            $.ajax({
                                url      : 'test.php',
                                method   : 'POST',
                                data     : {postID : postID},
                                success  : function(response){
                                    var data = response.split(",");
                                    $('#'+postID).html(data[3]);
                                    $('#'+postID).css("color",data[2]);

                                }
                            });

                        }

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
                                    $('#profilecomment').attr("src",data[data.length-1]);
                                    $('#nameComment').text(data[data.length-2])
                                    var i;
                                    var e = '';
                                    for (i = 4; i < data.length - 2 ; i++) {
                                        e += data[i];

                                    }
                                    $('#hahalist').html(e);
                                    $('#commentModal').modal('toggle');
                                   // $('#commentModal').modal('toggle');
                                    //


                                }

                            });
                        }

        
        $(document).ready(function(){
                        $('#postCommentButton').click(function (event) {
                            event.preventDefault();
                            //alert('gggg');
                            //var a=$(this).attr('#postComment');
                            var commentContent = $('#postComment').val();
                            var author = "<?php echo $username ?>";
                            //var name =
                            var name = $("#postCommentButton").attr("name");

                            $.ajax({
                                url      : 'test.php',
                                method   : 'POST',
                                data     : {commentContent:commentContent,author:author,name:name},
                                success  : function(response) {
                                    //var data = response.split(",");
                                    $('#postComment').val("");
                                    $('#hahalist').append(response);
                                    //commentFunction(name);
                                   // $('#commentModal').modal('toggle');

                                }
                               // $('#commentModal').modal('toggle');
                            });
                        });
                    });
    
</script>
                        
<div class = "modal fade " id="commentModal">
    <div class="modal img-modal" style="margin: auto">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 modal-image">
                            <img style="width: 100%" id="imageComment" class="img-responsive " src="">

                            <!--<a href="" class="img-modal-btn left"><i class="glyphicon glyphicon-chevron-left"></i></a>
                            <a href="" class="img-modal-btn right"><i class="glyphicon glyphicon-chevron-right"></i></a>!-->
                        </div>
                        <div class="col-md-4 modal-meta" style="height: 100% ; width: 100%">
                            <div class="modal-meta-top">
                                <button type="button" data-dismiss="modal" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <div class="img-poster clearfix" style="width:100%">
                                    <a href=""><img id="profilecomment" class="img-circle" src=""/></a>
                                    <strong><a id="nameComment" href=""></a></strong>
                                    <span id="timeComment"></span>

                                </div>
                                <h5 style="font-family: Arial; padding-top: 5%" id="title_comment"></h5>
                                <p style="font-family: Arial; font-size: 13" id="status_comment"></p>
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
<?php
    include("close.inc.php");
?>
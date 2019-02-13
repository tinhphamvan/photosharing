<?php
    session_start();
    include ('functions.php');
    include ('connect.inc.php');

    if (!isset($_SESSION['user_login'])) {
        $username1 = "";
    }
    else {
        $username1 = $_SESSION["user_login"];
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){


     //PREVIEW IMAGES

            if(isset($_POST['checkPreview'])){

                $urlImages = $_POST['checkPreview'];

                $a = json_decode($urlImages,true);
                //echo $a['checkPreview'];
                $enhance = $a['enhance'];

                $blur   = $a['blur'];

                $sharp  = $a['sharp'];

                $grayscale = $a['grayscale'];
                
                if (strpos($a['checkPreview'], 'preview') == false) {
                    if($grayscale == 2){
                        $a['checkPreview'] .= "-/preview/-/enhance/$enhance/-/blur/$blur/-/sharp/$sharp/-/grayscale/";
                    }
                    else{
                        $a['checkPreview'] .= "-/preview/-/enhance/$enhance/-/blur/$blur/-/sharp/$sharp/";
                    }

                }
                else{
                    if($grayscale == 2){
                        $a['checkPreview'] .= "-/enhance/$enhance/-/blur/$blur/-/sharp/$sharp/-/grayscale/";
                    }
                    else{
                        $a['checkPreview'] .= "-/enhance/$enhance/-/blur/$blur/-/sharp/$sharp/";
                    }

                }
                echo json_encode($a);
            }
//-----------------------------------------------------------------------------------------------------------------------------

        //CHECK SEEN POST

            if(isset($_POST['checkSeenPost'])){
                mysqli_query($connection,"UPDATE `notifications` SET `checkSeen`= 1 WHERE 1")
                or die(mysqli_error($connection));
            }
//-----------------------------------------------------------------------------------------------------------------------------
        //UPDATE NOTIFICATION

            if (isset($_POST['updatenortification'])) {
                $updatenortification = $_POST['updatenortification'];
                 $nortificationsql = mysqli_query($connection,"SELECT * FROM `notifications` WHERE `for_id` = '$username1' and `seen` = 0 and `checkSeen` = 0")
                or die(mysqli_error($connection));
                $count_nortification = mysqli_num_rows($nortificationsql);
                if($count_nortification == 0){
                    
                }
                else{
                    $stringnotification = "";

                    $stringnotification = $count_nortification."|";
                          




                $nortification = mysqli_fetch_all($nortificationsql);

                
                foreach ($nortification as $nf) {
                    $checkuserPost = mysqli_query($connection, "select first_name, last_name, imgurl from users where username ='$nf[2]' ")
                    or die(mysqli_error($connection));
                    if(mysqli_num_rows($checkuserPost) == 1) {
                        $getuserPost = mysqli_fetch_assoc($checkuserPost);
                        $firstnameuserPost = $getuserPost['first_name'];
                        $lastnameuserPost = $getuserPost['last_name'];
                        $imgurluserPost = $getuserPost['imgurl'];

                    }

                    if($nf[4] == 1){
                        $stringnotification.="
                            <li onclick='commentFunction($nf[1])' class=\"notification-box bg-gray\">
                                <div class=\"row\">
                                  <div class=\"col-lg-3 col-sm-3 col-3 text-center\">
                                    <img src=\"$imgurluserPost\" alt class=\"w-50 rounded-circle\">
                                  </div>    
                                  <div class=\"col-lg-8 col-sm-8 col-8\">
                                    <strong class=\"text-info\">$firstnameuserPost $lastnameuserPost</strong>
                                    <div>
                                      liked your post
                                    </div>
                                    <small class=\"text-warning\">$nf[6]</small>
                                  </div>    
                                </div>
                            </li>

                        ";
                    }
                    elseif($nf[4] == 2){
                        $stringnotification.="
                            <li onclick='commentFunction($nf[1])' class=\"notification-box bg-gray\">
                                <div class=\"row\">
                                  <div class=\"col-lg-3 col-sm-3 col-3 text-center\">
                                    <img src=\"$imgurluserPost\" alt class=\"w-50 rounded-circle\">
                                  </div>    
                                  <div class=\"col-lg-8 col-sm-8 col-8\">
                                    <strong class=\"text-info\">$firstnameuserPost $lastnameuserPost</strong>
                                    <div>
                                      commented on your post
                                    </div>
                                    <small class=\"text-warning\">$nf[6]</small>
                                  </div>    
                                </div>
                            </li>

                        ";
                    }

                    else{
                        $stringnotification.="
                            <li class=\"notification-box bg-gray\">
                                <div class=\"row\">
                                  <div class=\"col-lg-3 col-sm-3 col-3 text-center\">
                                   <a href = \"$nf[2]\"> <img src=\"$imgurluserPost\" class=\"w-50 rounded-circle\"> </a>
                                  </div>    
                                  <div class=\"col-lg-8 col-sm-8 col-8\">
                                    <strong href = \"$nf[2]\" class=\"text-info\">$firstnameuserPost $lastnameuserPost</strong>
                                    <div>
                                      start following you
                                    </div>
                                    <small class=\"text-warning\">$nf[6]</small>
                                  </div>    
                                </div>
                            </li>

                        ";
                    }




                    
                }

                $stringnotification .= "<li class=\"footer bg-dark text-center\">
                                <a href=\"\" class=\"text-light\">View All</a>
                              </li>";
                mysqli_query($connection,"UPDATE `notifications` SET `checkSeen`= 1 WHERE 1")
                or die(mysqli_error($connection));
                echo  $stringnotification;

                }
                
            }
//-----------------------------------------------------------------------------------------------------------------------------


        //FILTER BY TIME

            if (isset($_POST['fromMonth'])) {
                $fromMonth = $_POST['fromMonth'];
                $fromYear = $_POST['fromYear'];
                $toMonth = $_POST['toMonth'];
                $toYear = $_POST['toYear'];
                if( $toMonth == "Month" && $toYear == "Year"){
                    if($fromMonth == "Month" && $fromYear != "Year"){
                        $postinoneYearSQL = mysqli_query($connection,"SELECT * FROM `posts` WHERE YEAR(`status_time`) = $fromYear")
                        or die(mysqli_error($connection));
                        $postinoneYear =  mysqli_fetch_all($postinoneYearSQL);
                        $gettime  = new Main;
                        $popularString = "";
                        shuffle($postinoneYear);
                        foreach ($postinoneYear as $np) {
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
                                $check_liked1 = mysqli_query($connection,"SELECT * FROM likes WHERE liker = '$username1' and post_id =  '$np[0]'")
                                or die(mysqli_error($connection));
                                $likes = mysqli_num_rows($check_liked1);
                                if($likes == 0){
                               
                                $popularString.="
                        <div class=\"card gedf-card\" >

                            <div class=\"card-header\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <div class=\"mr-2\">
                                            <img class=\"rounded-circle\" width=\"45\" src=\"$imgurluserPost\" alt=\"\">
                                        </div>
                                        <div class=\"ml-2\">
                                            <div class=\"h5 m-0\">$firstnameuserPost $lastnameuserPost</div>
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
                                
                                <a id = \"$np[0]\" onclick = \"checkID($np[0])\" class=\"card-link\"><i class=\"fa fa-gittip\"></i> $np[6] Like</a>
                                <a onclick='commentFunction($np[0])' class=\"card-link\"><i class=\"fa fa-comment\"></i> $postnb[0] Comment</a>
                                <a class=\"card-link\"><i class=\"fa fa-mail-forward\"></i> Share</a>
                            </div>
                        </div>
                                ";
                            }
                            else{
                                $popularString.="
                        <div class=\"card gedf-card\" >

                            <div class=\"card-header\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <div class=\"mr-2\">
                                            <img class=\"rounded-circle\" width=\"45\" src=\"$imgurluserPost\" alt=\"\">
                                        </div>
                                        <div class=\"ml-2\">
                                            <div class=\"h5 m-0\">$firstnameuserPost $lastnameuserPost</div>
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
                                
                                <a id = \"$np[0]\" onclick = \"checkID($np[0])\" style = \"color : red\" class=\"card-link\"><i class=\"fa fa-gittip\"></i> $np[6] Like</a>
                                <a onclick='commentFunction($np[0])' class=\"card-link\"><i class=\"fa fa-comment\"></i> $postnb[0] Comment</a>
                                <a class=\"card-link\"><i class=\"fa fa-mail-forward\"></i> Share</a>
                            </div>
                        </div>
                                ";
                            }
                            }
                        if($popularString == ""){
                            $popularString =  "
                            <div class=\"card gedf-card\" >
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <h5 > No post in this time !!</h5>
                                </div>

                            </div>    


                            ";
                            echo $popularString;
                        }
                        else{
                            echo $popularString;
                        }
                        
                    }
                    elseif($fromMonth != "Month" && $fromYear != "Year"){
                        $dateMonth = date('m', strtotime($fromMonth));
                        $postinoneYearSQL = mysqli_query($connection,"SELECT * FROM `posts` WHERE YEAR(`status_time`) = $fromYear AND MONTH(`status_time`) = $dateMonth")
                        or die(mysqli_error($connection));
                        $postinoneYear =  mysqli_fetch_all($postinoneYearSQL);
                        $gettime  = new Main;
                        $popularString = "";
                        shuffle($postinoneYear);
                        foreach ($postinoneYear as $np) {
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
                                $check_liked1 = mysqli_query($connection,"SELECT * FROM likes WHERE liker = '$username1' and post_id =  '$np[0]'")
                                or die(mysqli_error($connection));
                                $likes = mysqli_num_rows($check_liked1);
                                if($likes == 0){
                                $popularString.="
                        <div class=\"card gedf-card\" >

                            <div class=\"card-header\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <div class=\"mr-2\">
                                            <img class=\"rounded-circle\" width=\"45\" src=\"$imgurluserPost\" alt=\"\">
                                        </div>
                                        <div class=\"ml-2\">
                                            <a style =\"color : black \" href=\"$np[1]\">
                                            <div class=\"h5 m-0\">$firstnameuserPost $lastnameuserPost</div>
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
                                
                                <a id = \"$np[0]\" onclick = \"checkID($np[0])\" class=\"card-link\"><i class=\"fa fa-gittip\"></i> $np[6] Like</a>
                                <a onclick='commentFunction($np[0])' class=\"card-link\"><i class=\"fa fa-comment\"></i> $postnb[0] Comment</a>
                                <a  class=\"card-link\"><i class=\"fa fa-mail-forward\"></i> Share</a>
                            </div>
                        </div>
                                ";
                            }
                            else{
                                 $popularString.="
                        <div class=\"card gedf-card\" >

                            <div class=\"card-header\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <div class=\"mr-2\">
                                            <img class=\"rounded-circle\" width=\"45\" src=\"$imgurluserPost\" alt=\"\">
                                        </div>
                                        <div class=\"ml-2\">
                                            <a style =\"color : black \" href=\"$np[1]\">
                                            <div class=\"h5 m-0\">$firstnameuserPost $lastnameuserPost</div>
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
                                
                                <a style =\"color : red\" id = \"$np[0]\" onclick = \"checkID($np[0])\" class=\"card-link\"><i class=\"fa fa-gittip\"></i> $np[6] Like</a>
                                <a onclick='commentFunction($np[0])' class=\"card-link\"><i class=\"fa fa-comment\"></i> $postnb[0] Comment</a>
                                <a  class=\"card-link\"><i class=\"fa fa-mail-forward\"></i> Share</a>
                            </div>
                        </div>
                                ";
                            }
                            }
                            
                        if($popularString == ""){
                            $popularString =  "
                            <div class=\"card gedf-card\" >
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <h5 > No post in this time !!</h5>
                                </div>

                            </div>    


                            ";
                            echo $popularString;
                        }
                        else{
                            echo $popularString;
                        }
                    }
                    else{
                        echo"
                            <div class=\"card gedf-card\" >
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <h5 > Select year please !!</h5>
                                </div>

                            </div>    


                        ";
                    }

                }
                else{
                        $dateMonthfrom = date('m', strtotime($fromMonth));
                        $dateMonthto = date('m', strtotime($toMonth));
                        $postinoneYearSQL = mysqli_query($connection,"SELECT * from `posts` WHERE `status_time` BETWEEN '$fromYear-$dateMonthfrom-1' AND '$toYear-$dateMonthto-31'")
                        or die(mysqli_error($connection));
                        $postinoneYear =  mysqli_fetch_all($postinoneYearSQL);
                        $gettime  = new Main;
                        $popularString = "";
                        shuffle($postinoneYear);
                        foreach ($postinoneYear as $np) {
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
                                $check_liked1 = mysqli_query($connection,"SELECT * FROM likes WHERE liker = '$username1' and post_id =  '$np[0]'")
                                or die(mysqli_error($connection));
                                $likes = mysqli_num_rows($check_liked1);
                                if($likes == 0){
                                $popularString.="
                        <div class=\"card gedf-card\" >

                            <div class=\"card-header\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <div class=\"mr-2\">
                                            <img class=\"rounded-circle\" width=\"45\" src=\"$imgurluserPost\" alt=\"\">
                                        </div>
                                        <div class=\"ml-2\">
                                            <a style =\"color : black \" href=\"$np[1]\">
                                            <div class=\"h5 m-0\">$firstnameuserPost $lastnameuserPost</div>
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
                                
                                <a id = \"$np[0]\" onclick = \"checkID($np[0])\" class=\"card-link\"><i class=\"fa fa-gittip\"></i> $np[6] Like</a>
                                <a onclick='commentFunction($np[0])' class=\"card-link\"><i class=\"fa fa-comment\"></i> $postnb[0] Comment</a>
                                <a  class=\"card-link\"><i class=\"fa fa-mail-forward\"></i> Share</a>
                            </div>
                        </div>
                                ";
                            }
                            else{
                               $popularString.="
                        <div class=\"card gedf-card\" >

                            <div class=\"card-header\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <div class=\"mr-2\">
                                            <img class=\"rounded-circle\" width=\"45\" src=\"$imgurluserPost\" alt=\"\">
                                        </div>
                                        <div class=\"ml-2\">
                                            <a style =\"color : black \" href=\"$np[1]\">
                                            <div class=\"h5 m-0\">$firstnameuserPost $lastnameuserPost</div>
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
                                
                                <a style =\"color : red\" id = \"$np[0]\" onclick = \"checkID($np[0])\" class=\"card-link\"><i class=\"fa fa-gittip\"></i> $np[6] Like</a>
                                <a onclick='commentFunction($np[0])' class=\"card-link\"><i class=\"fa fa-comment\"></i> $postnb[0] Comment</a>
                                <a  class=\"card-link\"><i class=\"fa fa-mail-forward\"></i> Share</a>
                            </div>
                        </div>
                                "; 
                            }
                        }
                        if($popularString == ""){
                            $popularString =  "
                            <div class=\"card gedf-card\" >
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <h5 > No post in this rtime !!</h5>
                                </div>

                            </div>    


                            ";
                            echo $popularString;
                        }
                        else{
                            echo $popularString;
                        }
                        
                    
                    

                }

            }
//-----------------------------------------------------------------------------------------------------------------------------



        //POPULAR



            if(isset($_POST['userpopular'])){
                $userpopular = $_POST['userpopular'];
                
                
                            $popular = mysqli_query($connection,"SELECT * FROM posts WHERE user_id_p in (select uf_two FROM follow WHERE uf_one = '$userpopular') ORDER by `p_likes` DESC")
                            or die(mysqli_error($connection));
                            $popularPost = mysqli_fetch_all($popular);
                            $gettime  = new Main;
                            $popularString = "";
                            foreach ($popularPost as $np) {
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
                                $check_liked1 = mysqli_query($connection,"SELECT * FROM likes WHERE liker = '$username1' and post_id =  '$np[0]'")
                                or die(mysqli_error($connection));
                                $likes = mysqli_num_rows($check_liked1);
                                if($likes == 0){
                                $popularString.="
                        <div class=\"card gedf-card\" >

                            <div class=\"card-header\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <div class=\"mr-2\">
                                            <img class=\"rounded-circle\" width=\"45\" src=\"$imgurluserPost\" alt=\"\">
                                        </div>
                                        <div class=\"ml-2\">
                                            <a style =\"color : black \" href=\"$np[1]\">
                                            <div class=\"h5 m-0\">$firstnameuserPost $lastnameuserPost</div>
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
                                
                                <a id = \"$np[0]\" onclick = \"checkID($np[0])\" class=\"card-link\"><i class=\"fa fa-gittip\"></i> $np[6] Like</a>
                                <a onclick='commentFunction($np[0])' class=\"card-link\"><i class=\"fa fa-comment\"></i> $postnb[0] Comment</a>
                                <a  class=\"card-link\"><i class=\"fa fa-mail-forward\"></i> Share</a>
                            </div>
                        </div>
                                ";
                            }
                            else{
                                 $popularString.="
                        <div class=\"card gedf-card\" >

                            <div class=\"card-header\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <div class=\"mr-2\">
                                            <img class=\"rounded-circle\" width=\"45\" src=\"$imgurluserPost\" alt=\"\">
                                        </div>
                                        <div class=\"ml-2\">
                                            <a style =\"color : black \" href=\"$np[1]\">
                                            <div class=\"h5 m-0\">$firstnameuserPost $lastnameuserPost</div>
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
                                
                                <a style = \"color : red\" id = \"$np[0]\" onclick = \"checkID($np[0])\" class=\"card-link\"><i class=\"fa fa-gittip\"></i> $np[6] Like</a>
                                <a onclick='commentFunction($np[0])' class=\"card-link\"><i class=\"fa fa-comment\"></i> $postnb[0] Comment</a>
                                <a  class=\"card-link\"><i class=\"fa fa-mail-forward\"></i> Share</a>
                            </div>
                        </div>
                                ";
                            }
                            }
                        echo $popularString;

            }
//-----------------------------------------------------------------------------------------------------------------------------
        //NEWEST
            if(isset($_POST['usernewest'])){
                $usernewest = $_POST['usernewest'];
                
                
                            $popular = mysqli_query($connection,"SELECT * FROM posts WHERE user_id_p in (select uf_two FROM follow WHERE uf_one = '$usernewest') ORDER by `time_posts` DESC")
                            or die(mysqli_error($connection));
                            $popularPost = mysqli_fetch_all($popular);
                            $gettime  = new Main;
                            $popularString = "";
                            foreach ($popularPost as $np) {
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
                                $check_liked1 = mysqli_query($connection,"SELECT * FROM likes WHERE liker = '$username1' and post_id =  '$np[0]'")
                                or die(mysqli_error($connection));
                                $likes = mysqli_num_rows($check_liked1);
                                if($likes == 0){
                                $popularString.="
                        <div class=\"card gedf-card\" >

                            <div class=\"card-header\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <div class=\"mr-2\">
                                            <img class=\"rounded-circle\" width=\"45\" src=\"$imgurluserPost\" alt=\"\">
                                        </div>
                                        <div class=\"ml-2\">

                                            <div class=\"h5 m-0\">$firstnameuserPost $lastnameuserPost</div>
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
                                
                                <a id = \"$np[0]\" onclick = \"checkID($np[0])\" class=\"card-link\"><i class=\"fa fa-gittip\"></i> $np[6] Like</a>
                                <a onclick='commentFunction($np[0])' class=\"card-link\"><i class=\"fa fa-comment\"></i> $postnb[0] Comment</a>
                                <a  class=\"card-link\"><i class=\"fa fa-mail-forward\"></i> Share</a>
                            </div>
                        </div>
                                ";
                            }
                            else{
                                $popularString.="
                        <div class=\"card gedf-card\" >

                            <div class=\"card-header\">
                                <div class=\"d-flex justify-content-between align-items-center\">
                                    <div class=\"d-flex justify-content-between align-items-center\">
                                        <div class=\"mr-2\">
                                            <img class=\"rounded-circle\" width=\"45\" src=\"$imgurluserPost\" alt=\"\">
                                        </div>
                                        <div class=\"ml-2\">

                                            <div class=\"h5 m-0\">$firstnameuserPost $lastnameuserPost</div>
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
                                
                                <a style =\"color : red\" id = \"$np[0]\" onclick = \"checkID($np[0])\" class=\"card-link\"><i class=\"fa fa-gittip\"></i> $np[6] Like</a>
                                <a onclick='commentFunction($np[0])' class=\"card-link\"><i class=\"fa fa-comment\"></i> $postnb[0] Comment</a>
                                <a  class=\"card-link\"><i class=\"fa fa-mail-forward\"></i> Share</a>
                            </div>
                        </div>
                                ";
                            }
                            }
                        echo $popularString;

            }
//-----------------------------------------------------------------------------------------------------------------------------

        //CHECKPEOPLEYOUMAYKNOW
            if(isset($_POST['userfl'])){
                $userfl = $_POST['userfl'];
                $userfl1 = $_POST['userfl1'];

                $awd = mysqli_query($connection, "Select username from  `users` WHERE id= '$userfl' LIMIT 1 ")
                or die(mysqli_error($connection));
                $rowrr = $awd->fetch_array(MYSQLI_NUM);
                mysqli_query($connection, "INSERT INTO `follow`(`id`, `uf_one`, `uf_two`) VALUES (NULL,'$userfl1','$rowrr[0]')")
                or die(mysqli_error($connection));        
                mysqli_query($connection,"INSERT INTO `notifications`(`id`, `post_id`, `from_id`, `for_id`, `notifyType_id`, `seen`, `time`, `checkSeen`) VALUES (null,0,'$userfl1','$rowrr[0]',3,0,CURRENT_TIMESTAMP,0)")
                    or die(mysqli_error($connection));
                
                echo "Following";
            }
//-----------------------------------------------------------------------------------------------------------------------------


        //SEARCH
            if(isset($_POST['result'])){

                    $result = $_POST['result'];
                    $rsn = "";
                    $resultAPI = mysqli_query($connection, "SELECT  first_name, last_name, username, imgurl FROM `users` WHERE `username` LIKE '$result%' LIMIT 4")
                    or die(mysqli_error($connection));
                    if (!$resultAPI) {
                        echo "";
                    }
                    $a=array("list-group-item list-group-item-action list-group-item-primary","list-group-item list-group-item-action list-group-item-secondary","list-group-item list-group-item-action list-group-item-success","list-group-item list-group-item-action list-group-item-danger","list-group-item list-group-item-action list-group-item-warning","list-group-item list-group-item-action list-group-item-info","list-group-item list-group-item-action list-group-item-light","list-group-item list-group-item-action list-group-item-dark");

                    $resultnum = mysqli_fetch_all($resultAPI);
                    foreach ($resultnum as $rn) {
                        $random_keys=array_rand($a);
                       $rsn .= "<a href=\"$rn[2]\" class=\"$a[$random_keys]\"><img style= \"width:50px;height:50px;\" class=\"img-circle\" src=\"$rn[3]\" height=\"42\" width=\"42\" >     $rn[0] $rn[1] </a> ";

                    }    
                    echo $rsn;

            }
//-----------------------------------------------------------------------------------------------------------------------------


        //Check number of follows    
            if(isset($_POST['userfollower'])){
                $usernumfollow = $_POST['userfollower'];
                //$checkfollowing = mysqli_query($connection, "SELECT * FROM follow WHERE uf_one = '$usernumfollow'")
                //or die(mysqli_error($connection));
                $checkfollower = mysqli_query($connection, "SELECT * FROM follow WHERE uf_two = '$usernumfollow'")
                or die(mysqli_error($connection));
                //$count_following = mysqli_num_rows($checkfollowing);
                //$count_follower = mysqli_num_rows($checkfollower);   
                $string = "<div class=\"modal-header\">
                  <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                  <h4 class=\"modal-title\"> Followers</h4>
                </div>";     
                $followers = mysqli_fetch_all($checkfollower);
                foreach ($followers as $fl) {
                    $checkNameComment = mysqli_query($connection, "SELECT  `first_name`, `last_name`, `imgurl` FROM `users`where `username` = '$fl[1]'")
                        or die(mysqli_error($connection));
                        if (mysqli_num_rows($checkNameComment) == 1) {
                            $getNameCommnentGo = mysqli_fetch_assoc($checkNameComment);
                            $first_nameComment = $getNameCommnentGo['first_name'];
                            $last_nameComment = $getNameCommnentGo['last_name'];
                            $profile_picComment = $getNameCommnentGo['imgurl'];

                        }
                        $string = $string."
                            <div class=\"modal-body\">
                                <div class=\"img-poster clearfix\">
                                    <br>
                                    <a href=\"$fl[1]\"><img style=\"width:50px;height:50px;\" class=\"img-circle\" src=\"$profile_picComment\"/ height=\"42\" width=\"42\" ></a>
                                    <strong><a id=\"nameComment\" href=\"$fl[1]\"></a>$first_nameComment $last_nameComment</strong>
                                    <span id=\"timeComment\"></span>

                                </div>
                            </div>

                        ";
                    # code...
                }
                $string = $string."<div class=\"modal-footer\">
                  
                </div>";

                echo $string;
            }

            if(isset($_POST['userfollowing'])){
            $usernumfollow = $_POST['userfollowing'];
            //$checkfollowing = mysqli_query($connection, "SELECT * FROM follow WHERE uf_one = '$usernumfollow'")
            //or die(mysqli_error($connection));
            $checkfollower = mysqli_query($connection, "SELECT * FROM follow WHERE uf_one = '$usernumfollow'")
            or die(mysqli_error($connection));
            //$count_following = mysqli_num_rows($checkfollowing);
            //$count_follower = mysqli_num_rows($checkfollower);   
            $string = "<div class=\"modal-header\">
              <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
              <h4 class=\"modal-title\"> Following</h4>
            </div>";     
            $followers = mysqli_fetch_all($checkfollower);
            foreach ($followers as $fl) {
                $checkNameComment = mysqli_query($connection, "SELECT  `first_name`, `last_name`, `imgurl` FROM `users`where `username` = '$fl[2]'")
                    or die(mysqli_error($connection));
                    if (mysqli_num_rows($checkNameComment) == 1) {
                        $getNameCommnentGo = mysqli_fetch_assoc($checkNameComment);
                        $first_nameComment = $getNameCommnentGo['first_name'];
                        $last_nameComment = $getNameCommnentGo['last_name'];
                        $profile_picComment = $getNameCommnentGo['imgurl'];

                    }
                    $string = $string."
                        <div class=\"modal-body\">
                            <div class=\"img-poster clearfix\">
                                <br>
                                <a href=\"$fl[2]\"><img style=\"width:50px;height:50px;\" class=\"img-circle\" src=\"$profile_picComment\"/ height=\"42\" width=\"42\" ></a>
                                <strong><a id=\"nameComment\" href=\"$fl[2]\"></a>$first_nameComment $last_nameComment</strong>
                                <span id=\"timeComment\"></span>

                            </div>
                        </div>

                    ";
                # code...
            }
            $string = $string."<div class=\"modal-footer\">
              
            </div>";

            echo $string;
            }
//-----------------------------------------------------------------------------------------------------------------------------
       

        //UPLOAD POST

            if(isset($_POST['status'])){

                $status  = $_POST['status'];
                $status_image = $_POST['status_image'];
                $status_title = $_POST['status_title'];
                $datepicker = $_POST['datepicker'];
                //checking image if isset
                 if($datepicker == "" || $datepicker == null){

                    echo 1;
                }
                else {
                    $timeline = "
                    <div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-12\" >
                        <ul class=\"timeline\">
                        <li><div class=\"tldate\">Today</div></li>
                        <li>
                        <div class=\"tl-circ\"></div>
                        <div class=\"timeline-panel\">
                            <div class=\"tl-heading\">
                                <h4>Add your memory here. Save your moments in your life</h4>
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

                    mysqli_query($connection,"INSERT INTO `posts` (`post_id`, `user_id_p`,  `status_image`,`status_time`,`status_title`,`status`,`p_likes`,`time_posts`) VALUES (NULL, '$username1', '$status_image','$datepicker','$status_title','$status'  ,0,CURRENT_TIMESTAMP )")
                    or die(mysqli_error($connection));

                    $checkbirthday = mysqli_query($connection, "select  birthday from users where username ='$username1' ")
                    or die(mysqli_error($connection));
                    $birthday= $checkbirthday->fetch_array(MYSQLI_NUM);
                    $sql = mysqli_query($connection,"SELECT * FROM `posts`,`users` WHERE username = user_id_p and username = '$username1' ORDER BY `status_time` DESC")
                    or die(mysqli_error($connection));
                    $posts = mysqli_fetch_all($sql);
                    $post_count = mysqli_num_rows($sql);

                    $previostime = "1888-01-01";
                    $previostime_value = strtotime($previostime);
                    $key = 1;


                    foreach($posts as $row) {

                        $time=strtotime($row[3]);

                        if($time == strtotime($birthday[0])){
                            $day=date("d",$time);
                            $month=date("m",$time);
                            $year=date("Y",$time);
                            $timeline = $timeline."<li ><div style='text-align: center' class=\"tldate\"> BIRTHDAY <span class=\"glyphicon glyphicon-heart\"></span> <br> $day / $month / $year</div></li>";
                        }

                        else
                            if((date("m",$time) != date("m",$previostime_value)) ){
                                $month=date("m",$time);
                                $year=date("Y",$time);
                                $timeline =$timeline."<li><div  class=\"tldate\">$month / $year</div></li>";


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
                            $timeline = $timeline."
                            <li class='$strings[$key]'  >
                                <div class=\"tl-circ\"></div>
                                <div class=\"timeline-panel\" style='padding: 0px' >
                                    <div class=\"tl-heading\">
                                        <h4 style='margin: 3%; margin-bottom: auto' >$row[4]</h4>
                                            <button style='margin: 3%' onclick='deletePost($row[0])' type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <p><small class=\"text-muted\"><i style='margin: 3%;margin-top: 1%;margin-bottom: 1%' class=\"glyphicon glyphicon-time\"></i> $row[3]</small></p>
                                    </div>
                                    <div class=\"tl-body\">
                                        <p style='margin: 3%;margin-bottom: 1px;margin-top: 1px' >$row[5] </p>
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
                            $timeline = $timeline."
                            <li class='$strings[$key]'  >
                                <div class=\"tl-circ\"></div>
                                <div class=\"timeline-panel\" style='padding: 0px'>
                                    <div class=\"tl-heading\">
                                        <h4 style='margin: 3%; margin-bottom: auto'>$row[4]</h4>
                                        <button style='margin: 3%' onclick='deletePost($row[0])'  type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <p><small class=\"text-muted\"><i style='margin: 3%;margin-top: 1%;margin-bottom: 1%' class=\"glyphicon glyphicon-time\"></i> $row[3]</small></p>
                                        
                                    </div>
                                    <div class=\"tl-body\">
                                        <p style='margin: 3%;margin-bottom: 1px;margin-top: 1px' >$row[5] </p>
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
                    $a = mysqli_query($connection,"SELECT `post_id` FROM posts WHERE `user_id_p` = '$username1' ORDER BY `post_id` DESC")
                    or die(mysqli_error($connection));
                    $row = $a->fetch_array(MYSQLI_NUM);
                    $timeline = $timeline."|".$row[0];
                    echo $timeline;

                    
                    
                    
                }
            }
//-----------------------------------------------------------------------------------------------------------------------------

        //CHECK LIKE
            if(isset($_POST['postID'])){
                $postID = $_POST['postID'];
                $check_liked1 = mysqli_query($connection,"SELECT * FROM likes WHERE liker = '$username1' and post_id =  '$postID'")
                or die(mysqli_error($connection));
                $likes = mysqli_num_rows($check_liked1);

                if($likes == 0){
                    mysqli_query($connection, "UPDATE `posts` SET `p_likes` = p_likes + 1 WHERE post_id= '$postID'")
                    or die(mysqli_error($connection));
                    mysqli_query($connection, "INSERT INTO `likes`(`id`, `liker`, `post_id`) VALUES (NULL,'$username1','$postID')")
                    or die(mysqli_error($connection));
                    $a = mysqli_query($connection, "Select p_likes from  `posts` WHERE post_id= '$postID' LIMIT 1 ")
                    or die(mysqli_error($connection));
                    $row = $a->fetch_array(MYSQLI_NUM);

                    $color = "red";
                    $nflike = "<i class=\"fa fa-gittip\"></i> $row[0] like";
                    $b = "glyphicon glyphicon-heart";

                    //notification
                    $checkforID = mysqli_query($connection, "SELECT user_id_p from posts WHERE post_id = $postID")
                        or die(mysqli_error($connection));
                    $forID = $checkforID->fetch_array(MYSQLI_NUM);
                    mysqli_query($connection,"INSERT INTO `notifications`(`id`, `post_id`, `from_id`, `for_id`, `notifyType_id`, `seen`, `time`, `checkSeen`) VALUES (null,$postID,'$username1','$forID[0]',1,0,CURRENT_TIMESTAMP,0)")
                    or die(mysqli_error($connection));
                

                    echo $row[0].",".$b.",".$color.",".$nflike ;

                }
                if($likes == 1){
                    mysqli_query($connection, "UPDATE `posts` SET `p_likes` = p_likes - 1 WHERE post_id= '$postID'")
                    or die(mysqli_error($connection));
                    mysqli_query($connection, "DELETE from `likes` where liker = '$username1' and post_id = '$postID'")
                    or die(mysqli_error($connection));
                    $a = mysqli_query($connection, "Select p_likes from  `posts` WHERE post_id= '$postID' LIMIT 1 ")
                    or die(mysqli_error($connection));
                    $row = $a->fetch_array(MYSQLI_NUM);
                    $b = "glyphicon glyphicon-heart-empty";
                    $color = "black";
                    $nflike = "<i class=\"fa fa-gittip\"></i> $row[0] like";
                    echo $row[0].",".$b.",".$color.",".$nflike  ;

                }
            }
//-----------------------------------------------------------------------------------------------------------------------------

        //COMMENT POST

            if(isset($_POST['commentContent'])){
                $commentContent = $_POST['commentContent'];
                $author         = $_POST['author'];
                $name           = $_POST['name'];
                $checkNameComment1 = mysqli_query($connection, "SELECT  `first_name`, `last_name`, `imgurl` FROM `users`  where `username` = '$author'")
                or die(mysqli_error($connection));
                if (mysqli_num_rows($checkNameComment1) == 1) {
                    $getNameCommnentGo1 = mysqli_fetch_assoc($checkNameComment1);
                    $first_nameComment1 = $getNameCommnentGo1['first_name'];
                    $last_nameComment1 = $getNameCommnentGo1['last_name'];
                    $profile_picComment1 = $getNameCommnentGo1['imgurl'];

                }
                mysqli_query($connection, " INSERT INTO `comments`(`c_id`, `c_author_id`, `c_post_id`, `c_content`, `c_time`) VALUES (null ,'$author','$name','$commentContent',CURRENT_TIMESTAMP)")
                or die(mysqli_error($connection));

                //notification
                $checkforID = mysqli_query($connection, "SELECT user_id_p from posts WHERE post_id = $name")
                    or die(mysqli_error($connection));
                $forID = $checkforID->fetch_array(MYSQLI_NUM);
                mysqli_query($connection,"INSERT INTO `notifications`(`id`, `post_id`, `from_id`, `for_id`, `notifyType_id`, `seen`, `time`, `checkSeen`) VALUES (null,$name,'$username1','$forID[0]',2,0,CURRENT_TIMESTAMP,0)")
                or die(mysqli_error($connection));
                //CURRENT_TIMESTAMP
                echo "
                    <li>
                        <div class=\"comment - img\">
                            <img alt  src=\"$profile_picComment1\">
                        </div>
                        <div class=\"comment - text\">
                            <strong><a href=\"\">$first_nameComment1 $last_nameComment1</a></strong>
                            <p  class=\"\">$commentContent</p> <span class=\"date sub - text\">Just now</span>
                        </div>
                    </li>
                    
                    ";

            }

            if(isset($_POST['postIDComment']) ) {
                $postComment = $_POST['postIDComment'];
                $check9 = mysqli_query($connection, "SELECT `post_id`, `user_id_p`, `status_image`, `status_time`, `status_title`, `status`, `p_likes`, `time_posts` FROM `posts`  where post_id ='$postComment' ")
                or die(mysqli_error($connection));
                $sqlcomment = mysqli_query($connection,"SELECT * FROM `comments` WHERE `c_post_id` ='$postComment'")
                or die(mysqli_error($connection));
                $postscomment = mysqli_fetch_all($sqlcomment);

                if (mysqli_num_rows($check9) == 1) {
                    $get = mysqli_fetch_assoc($check9);
                    $status_image = $get['status_image'];
                    $status_time = $get['status_time'];
                    $status_title = $get['status_title'];
                    $user_id_p = $get['user_id_p'];
                    $status = $get['status'];
                    $p_likes = $get['p_likes'];
                    $time_posts = $get['time_posts'];
                    $return= '';
                    $return =  $status_time."|".$status_image."|".$status_title."|".$status  ;
                    $gettime  = new Main;
                    foreach ($postscomment as $comment_row) {
                        //$timeAgo = '';

                        $timeAgo = $gettime->timeAgo($comment_row[4]);
                        $checkNameComment = mysqli_query($connection, "SELECT  `first_name`, `last_name`, `imgurl` FROM `users`  where `username` = '$comment_row[1]'")
                        or die(mysqli_error($connection));
                        if (mysqli_num_rows($checkNameComment) == 1) {
                            $getNameCommnentGo = mysqli_fetch_assoc($checkNameComment);
                            $first_nameComment = $getNameCommnentGo['first_name'];
                            $last_nameComment = $getNameCommnentGo['last_name'];
                            $profile_picComment = $getNameCommnentGo['imgurl'];
                        }

                        $return = $return."|"."<li>
                                                            <div class=\"comment-img\">
                                                                <img alt  src=\"$profile_picComment\">
                                                            </div>
                                                            <div class=\"comment-text\">
                                                                <strong><a href=\"\">$first_nameComment $last_nameComment</a></strong>
                                                                <p style =\" margin : auto\" class=\"\">$comment_row[3]</p> <span class=\"date sub-text\">$timeAgo</span>
                                                            </div>
                                                        </li>";
                    }
                     $checkNameComment1 = mysqli_query($connection, "SELECT  `first_name`, `last_name`, `imgurl` FROM `users`  where `username` = '$user_id_p'")
                    or die(mysqli_error($connection));
                    if (mysqli_num_rows($checkNameComment1) == 1) {
                        $getNameCommnentGo1 = mysqli_fetch_assoc($checkNameComment1);
                        $first_nameComment1 = $getNameCommnentGo1['first_name'];
                        $last_nameComment1 = $getNameCommnentGo1['last_name'];
                        $profile_picComment1 = $getNameCommnentGo1['imgurl'];

                    }
                    $return.= "|".$first_nameComment1." ".$last_nameComment1."|".$profile_picComment1;
                    echo $return;
                }
            }
//-----------------------------------------------------------------------------------------------------------------------------        
        //DELETE POST

            if(isset($_POST['postIDdelete'])) {
                $post = $_POST['postIDdelete'];
                mysqli_query($connection, "DELETE from `posts` where post_id = '$post'")
                or die(mysqli_error($connection));
            }
//-----------------------------------------------------------------------------------------------------------------------------
        //FOLLOW
            if(isset($_POST['follow'])) {
                $follow = $_POST['follow'];
                $username = $_POST['user'];
                if ($follow == "Follow") {

                    mysqli_query($connection, "INSERT INTO `follow`(`id`, `uf_one`, `uf_two`) VALUES (NULL,'$username1','$username')")
                    or die($connection);
                    $string = "Following";

                    //notification
              
                    mysqli_query($connection,"INSERT INTO `notifications`(`id`, `post_id`, `from_id`, `for_id`, `notifyType_id`, `seen`, `time`, `checkSeen`) VALUES (null,0,'$username1','$username',3,0,CURRENT_TIMESTAMP,0)")
                    or die(mysqli_error($connection));


                    $checkfollowing = mysqli_query($connection, "SELECT * FROM follow WHERE uf_one = '$username'")
                    or die(mysqli_error($connection));
                    $checkfollower = mysqli_query($connection, "SELECT * FROM follow WHERE uf_two = '$username'")
                    or die(mysqli_error($connection));
                    $count_following = mysqli_num_rows($checkfollowing);
                    $count_follower = mysqli_num_rows($checkfollower);
                    echo $string.",".$count_follower.",".$count_following;

                }
                if ($follow == "Following") {

                    mysqli_query($connection, "DELETE FROM `follow` WHERE uf_one = '$username1' and uf_two = '$username'")
                    or die($connection);
                    $string = "Follow";
                    $checkfollowing = mysqli_query($connection, "SELECT * FROM follow WHERE uf_one = '$username'")
                    or die(mysqli_error($connection));
                    $checkfollower = mysqli_query($connection, "SELECT * FROM follow WHERE uf_two = '$username'")
                    or die(mysqli_error($connection));
                    $count_following = mysqli_num_rows($checkfollowing);
                    $count_follower = mysqli_num_rows($checkfollower);
                    echo $string.",".$count_follower.",".$count_following;
                }
            }
    }
    else{
        http_response_code(405);
        //METHOD IS NOT ALLOW
    }
      
?>
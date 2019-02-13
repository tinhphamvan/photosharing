<?php
    session_start();
    include ("connect.inc.php");
    if (!isset($_SESSION['user_login'])) {
    $username = "";
}
else {
    $username = $_SESSION["user_login"];
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <!--<link rel="stylesheet" type="text/css" href="loginCSS.css">!-->



</head>

<body>
<style >


/* The sticky class is added to the navbar with JS when it reaches its scroll position */
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

/* Add some top padding to the page content to prevent sudden quick movement (as the navigation bar gets a new position at the top of the page (position:fixed and top:0) */

.nav-pills .nav-link.active, .nav-pills .show > .nav-link{
    background-color: #17A2B8;
}
.dropdown-menu{
    top: 60px;
    right: 0px;
    right: unset;
    width: 460px;
    box-shadow: 0px 5px 7px -1px #c1c1c1;
    padding-bottom: 0px;
    padding: 0px;
}
.dropdown-menu:before{
    content: "";
    position: absolute;
    top: -20px;
    left: 12px;
    border:10px solid #343A40;
    border-color: transparent transparent #343A40 transparent;
}
.head{
    padding:5px 15px;
    border-radius: 3px 3px 0px 0px;
}
.footer{
    padding:5px 15px;
    border-radius: 0px 0px 3px 3px;
}
.notification-box{
    padding: 10px 0px;
}
.bg-gray{
    background-color: #eee;
}
@media (max-width: 640px) {
    .dropdown-menu{
        top: 50px;
        left: -16px;
        width: 290px;
    }
    .nav{
        display: block;
    }
    .nav .nav-item,.nav .nav-item a{
        padding-left: 0px;
    }
    .message{
        font-size: 13px;
    }
}
</style>
<script>




   $(document).ready(function(){
   $('#textSearch').keyup(function(event) 
    {
        event.preventDefault();
        var result = $('#textSearch').val();
        //alert(result);
        if (result) {
            $.ajax({
            url      : 'test.php',
            method   : 'POST',
            data     : {result : result},
            success  : function(response){
                if (!isNaN(response)) {
                    $("#resultSearch").html("<a class=\"list-group-item list-group-item-action list-group-item-primary\">  Not found </a>"   );
                    setTimeout(function(){// wait for 5 secs(2)
                                            $("#resultSearch").html(""); // then reload the page.(3)
                                        }, 7000);
                 }
                else{
                    $("#resultSearch").html(response);
                    setTimeout(function(){// wait for 5 secs(2)
                                            $("#resultSearch").html("")// then reload the page.(3)
                                        }, 7000);
                }
                
                //alert(response);
                /*$("#resultSearch").html(response);
                
                */
            }
             }); 
            
        }
        
       
        
       /* $("#resultSearch").html("<a href=\"#\" class=\"list-group-item list-group-item-action list-group-item-primary\"><img style= \" width:50px;height:50px;\" class=\"img-circle\" src=\"https://cldup.com/iK8ZpZm42G-3000x3000.png\" height=\"42\" width=\"42\" >  $first_nameComment</a>");
         setTimeout(function(){// wait for 5 secs(2)
           $("#resultSearch").html("");         // then reload the page.(3)
        }, 5000);

            */
                       
    });
   });
    

</script>
<div id="navbar" style="z-index: 10 ; ">
<nav  class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php" style="padding-left: 10px; padding-top: 0px; padding-bottom: 0px"><img src="https://ucarecdn.com/b90b60cc-dc73-4bb4-bd2c-6a3956a034c6/storybook.png" style="width: 55px; height: 55px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo $username ?>">
                    <i class="fa fa-home" style="font-size:24px; "></i>
                    Profile
                    <span class="sr-only">(current)</span>
                </a>

            </li>
            <?php
                if(!$username){
                    echo "
                        <li class=\"nav-item\" >
                            <a class=\"nav-link\" href=\"index.php\" >
                                 Login +
                             </a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"signupHTML.php\">
                                 Sign Up
                             </a>
                        </li>
                    ";
                }
                else{
                   $nortificationsql = mysqli_query($connection,"SELECT * FROM `notifications` WHERE `for_id` = '$username' and `seen` = 0 and checkseen = 0") or die(mysqli_error($connection));
                   $count_nortification = mysqli_num_rows($nortificationsql);
                   $nortification = mysqli_fetch_all($nortificationsql);
                    echo"
                 <li class=\"nav-item dropdown\">
                  <a class=\"nav-link\" onclick=\"directProfilepage()\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    <i class=\"fa fa-globe\" id = \"notifications\" style=\"font-size:24px; margin-right: 10px\">
                        <span id =\"number_no\" style=\"font-size:15px;\" class=\"badge badge-danger\">$count_nortification</span>
                    </i>
                  </a>
                    <ul id =\"number_notification\" class=\"dropdown-menu\">
                      <li class=\"head text-light bg-dark\">
                        <div class=\"row\">
                          <div class=\"col-lg-12 col-sm-12 col-12\">
                            <span>Notifications (3)</span>
                            <a href=\"\" class=\"float-right text-light\">Mark all as read</a>
                          </div>
                      </li>

                      ";

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
                echo "
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
                echo "
                    <li onclick='commentFunction($nf[1])' class=\"notification-box bg-gray\">
                        <div class=\"row\">
                          <div class=\"col-lg-3 col-sm-3 col-3 text-center\">
                            <img src=\"$imgurluserPost\" alt class=\"w-50 rounded-circle\" </a>
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
                echo    "
                    <li  class=\"notification-box bg-gray\">
                        <div class=\"row\">
                          <div class=\"col-lg-3 col-sm-3 col-3 text-center\">
                            <a href = \"$nf[2]\"> <img src=\"$imgurluserPost\" class=\"w-50 rounded-circle\"></a>
                          </div>    
                          <div  class=\"col-lg-8 col-sm-8 col-8\">
                            
                              <strong  class=\"text-info\">$firstnameuserPost $lastnameuserPost</strong>
                          
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


                      ?>
                      
                    </ul>
                </li>
       
            <li class="nav-item">
                <a class="nav-link" href="updateInfomation.php">
                    <i class="fa fa-cogs" style="font-size:24px;margin-right: 15px">
                        
                    </i>
                  
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link"  href="logout.php">
                    <i class="fa fa-sign-out" style="font-size:24px;margin-right: 15px">
                        
                    </i>
                  
                </a>
            </li>

           
          
            
                  
              <?php  } ?>     
            

        </ul>

       
        <form  class="form-inline my-2 my-lg-">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
            
                <input  class="form-control mr-sm-2"  id="textSearch" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" onclick="uvh()" type="button">Search</button>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="list-group" id="resultSearch" style="width: 90% ; position: absolute; z-index: 1000000">
                      
                </div>
            </div>
        </form>
    </div>
</nav>
</div>
<br>
<script>
    window.onscroll = function() {myFunction()};

    var navbar = document.getElementById("navbar");
    
    var sticky = navbar.offsetTop;
    

    function myFunction() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
       
      } else {
        navbar.classList.remove("sticky");
        
      }
    }
    
        
      function directProfilepage(){
        var checkSeenPost = 1;
        $.ajax({
          url      : 'test.php',
          method   : 'POST',
          data     : {checkSeenPost:checkSeenPost},
          success  : function() {
            setTimeout(function(){// wait for 5 secs(2)
                $('#number_no').text(0);
                
            }, 4000);
            
          }
         
        });
        
      }

    window.setInterval(function(){
      var updatenortification = 1;
      $.ajax({
        url      : 'test.php',
        method   : 'POST',
        data     : {updatenortification:updatenortification},
        success  : function(response) {
            if (!isNaN(response)) {
               


            }
            else {
               var data = response.split("|");
              var integer = parseInt(data[0], 10);
              var integer1 = parseInt($('#number_no').text(), 10);
              var result = integer + integer1;
              
              $('#number_no').text(result);
              $('#number_notification').append(data[1]);
            
            }
            
            
        }
       
      });
  
    }, 5000);


</script>
<?php 
include "../admin/Classes/dp.php";
include "../admin/Classes/users.php";
include "../admin/Classes/friends.php";
include "../admin/Classes/article.php";
include "../admin/Classes/comment.php";
include "../admin/Classes/favourite.php";
session_start()
?>
<!doctype html>
<html lang="en">

<head>
    <title>Writers</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" src="css/all.min.css">
    <script src="js/all.min.js"> </script>

</head>

<body>
    <!-- Start Navbar-->
    <div class="container" style="background-color: #F5F5F5;">
        <div class="row">
            <div class="col-9">
                <nav class="navbar navbar-expand-lg navbar-light bg-black">
                    <a href="../index.php" class="navbar-brand" href="#">
                        <h2 style="color: red;font-style: italic	;	font-family: Impact,Haettenschweiler,Franklin Gothic Bold,Charcoal,Helvetica Inserat,Bitstream Vera Sans Bold,Arial Black,sans serif; 
;  text-shadow: 1px 1px #ff0000;">Articles</h2>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="include/contact.php" style="color: black;text-decoration:none">
                        <h7>Contact us</h7>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item">
                                <a class="nav-link" href="#"></a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-6">
                            <input class="form-control" type="search" placeholder="Places , Events , Movie , People">
                            <button type="submit"
                                style="  border-radius: 25px; margin-left:3px; color:white;background-color:black">Search</button>
                        </form>
                    </div>

                </nav>
            </div>
            <div class="col-2" style="margin-top: 20px;">
                <div>
                    <div class="nav-item dropdown" style="margin-top: 6px;">
                        <i class="far fa-bell fa-2x" style="color:#A9A9A9	;"></i>

                        <a class="" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user fa-2x" style="color:#A9A9A9	;"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li> <a href="include/my_articles.php" class="dropdown-item" href="#"> <i
                                        class="fas fa-user"></i> My Profile</a></li>
                            <li> <a href="include/profile_setting.php" class="dropdown-item" href="#"><i
                                        class="fas fa-cogs"></i> Profile Setting</a></li>
                            <li>
                                <?php 
                    if(!empty($_SESSION['username'])){

          echo " <a href='include/logout.php' class='dropdown-item' href='#'><i class='fas fa-sign-out-alt'></i> Logout</a>";
           }else{
            echo " <a href='include/signup.php' class='dropdown-item' href='#'><i class='fas fa-sign-in-alt'></i> signup</a>  <a href='include/login.php' class='dropdown-item' href='#'><i class='fas fa-sign-in-alt'></i> signin</a> ";
          }
          
          ?>
                            </li>
                        </div>
                    </div>
                </div>
            </div>

<div class="container">
  <div class="row">
    <div class="col-sm-1" style="border-right: 1px solid black;">
        <div class="all">
        <i class="fas fa-bars" style="margin-top: 10px;margin-left:15px;"></i>
        </div>
        
    <div class="img" style="margin-top:30px;">
    <?php 
        if (isset($_SESSION['username'])){ 
          $username = $_SESSION['username'] ;
          $user_img = new users();
        $roww = $user_img->fetch_user($username);
        }
        ?>
        <img src="uplodaimage/<?php echo $roww['Image'];?>" width="38px" height="37px">
        
    </div>
    <div class="add" style="margin-top:30px;margin-left:10px">
    <i class="fas fa-plus-square"></i>
    </div>
    <div class="bell" style="margin-top:30px;margin-left:10px">
    <i class="fas fa-bell"></i>
    </div>
    <div class="message" style="margin-top:30px;margin-left:10px">
    <i class="fas fa-envelope"></i>
    </div>
    <div class="search" style="margin-top:30px;margin-left:10px">
    <i class="fas fa-search"></i>
    </div>
    </div>
    
    <div class="col-sm-9">
    <?php 
    $friend_articles = new article();
    $friend_id = $_GET['fid'];
    $rows = $friend_articles->fetch_friends_articles($friend_id);
    if(!empty($rows)){
    foreach ($rows as $row){

    ?>
    <div class="author" style="margin-top: 10px;">
       <a href="include/my_articles.php" > <img src="uplodaimage/<?php echo $row['Image'];?>" width="50px" height="50px" style="border-radius: 50px;"></a>
        <a href="include/my_articles.php" >  <h8 style="color:black ;"><?php echo $row['name'];?></h8></a> | <a href=""><?php echo $row['Name'];?></a>  |   <a href="" style="color: black;"><?php echo $row['title'];?></a> 
       </div> 
       <div class="img" style="transform: translate(50px);">
      <a href="include/single-post.php"> <img src="uplodaimage/<?php echo $row['image'];?>" width="700px" height="300px">  </a> 
       </div>  
       <?php 
       $comment = new comment();
       $aid = $row['id'];
       $rows = $comment->comment_num($aid);?>
       <div class="comment" style="transform: translate(50px);background-color:#D3D3D3;margin-right:85px;width:700px;margin-bottom:30px">
         <h7 style="margin-right: 15px;margin-left:5px;"><i class="far fa-comment"></i> <?php echo $rows['Num'];?> </h7>
         <?php 
         $fav = new favourite();
         $aid = $row['id'];
        $rowss = $fav->favourite_num($aid);
?>
        <h7 style="margin-right: 10px;"><i class="fas fa-heart"></i> <?php echo $rowss['num'];?> </h7>
        <h7 style="margin-right: 222px;"><i class="far fa-clock"></i> <?php echo $row['date'];?></h7>
        <button class="btn btn-danger" style="transform: translatey(-50px); padding:10px 20px;margin-left:550px"><?php echo $row['type'];?></button>
       </div>   
       <div style="transform: translate(50px)">
       <p style="width: 700px; height:auto;word-wrap: break-word;padding:5px;border:1px dotted black"><?php echo $row['description'];?></p>

       </div>  
     <div class="comment" style="margin-top: 30px;">
<?php 
$comments = new comment();
$id = $row['id'];
$row = $comments->fetch_comments($id);
if(!empty($row)){
foreach($row as $roow){
?>
<label style="margin-right: 20px;margin-left:60px;;width:320px;transform:translatey(-5px);" ><img src="uplodaimage/<?php echo $roow['Image'];?>" width="60px" height="50px" style="border-radius: 50px;">  
<?php echo $roow['username'];?> | <i class="far fa-clock"></i> <?php echo $roow['create_date'];?></label>
<p style="width: 500px;height:55px;resize:none;background-color:#F0F8FF;margin-bottom:5px;margin-left:60px"><?php echo $roow['comment'];?></p>
<?php
}
}
?>
<?php
}
}
?>
</div>

</div>
</div>
</div>
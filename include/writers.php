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
                        <h2 style="color: #FFA500;font-style: italic	;	font-family: Impact,Haettenschweiler,Franklin Gothic Bold,Charcoal,Helvetica Inserat,Bitstream Vera Sans Bold,Arial Black,sans serif; 
;  text-shadow: 4px 2px 4px black;">Articles</h2>
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
        $articles_info = new article();
       $row = $articles_info->fetch_article_info();
       if ($row){
       foreach ($row as $rows){
       ?>
    <div class="author" style="margin-top: 10px;">
       <a href="include/my_articles.php" > <img src="uplodaimage/<?php echo $rows['Image'];?>" width="50px" height="50px" style="border-radius: 50px;"></a>
        <a href="include/my_articles.php" >  <h8 style="color:black ;"><?php echo $rows['name'];?></h8></a> | <a href=""><?php echo $rows['Name'];?></a> | <a href="" style="color: black;"><?php echo $rows['title'];?></a>     
       </div> 
       <div class="img" style="transform: translate(50px);">
      <a href="include/single-post.php"> <img src="uplodaimage/<?php echo $rows['image'];?>" width="700px" height="300px">  </a> 
       </div>  
       <div class="comment" style="transform: translate(50px);background-color:#D3D3D3;margin-right:85px;width:700px;margin-bottom:30px">
       <?php 
       $comment_num = new comment();
       $aid = $rows['id'];
       $ro =$comment_num->comment_num($aid);
       ?>
         <h7 style="margin-right: 15px;margin-left:5px;"><i class="far fa-comment"></i><?php echo $ro['Num'];?> </h7>
         <?php 
         $favourite_num = new favourite();
         $aid = $rows['id'];
        $ro =   $favourite_num->favourite_num($aid);
        ?>
        <h7 style="margin-right: 10px;"><i class="fas fa-heart"></i><?php echo $ro['num'];?> </h7>
        <h7 style="margin-right: 222px;"><i class="far fa-clock"></i> <?php echo $rows['date'];?></h7>
        <button class="btn btn-danger" style="transform: translatey(-50px); padding:10px 20px;margin-left:550px"><?php echo $rows['type'];?></button>
       </div> 
       <div class="comment" style="margin-top:10px">
       <?php 
       $comments = new comment();
       $id = $rows['id'];
      $roow = $comments->fetch_comments($id);
      if (!empty($roow)){
      foreach($roow as $roo){
     ?>
       <label style="margin-right: 10px;margin-left:40px;margin-bottom:10px;width:400px;transform:translatey(-10px)" ><img src="uplodaimage/<?php echo $roo['Image'];?>" width="65px" height="55px" style="border-radius: 50px;">  
         <?php echo $roo['name'];?> | <i class="far fa-clock"></i> <?php echo $roo['create_date'];?></label>
        <p  style="width: 450px;height:55px;resize:none;background-color:#F0F8FF;margin-left:53px"><?php echo $roo['comment'];?></p>
        <?php
    }
}
    ?>
     </div>
      <?php 
      }
    }
      ?>
    </div>
    <div class="col-sm-2">
      <div class="writer" style="background-color:wheat;margin-left:7px">
          <h4 style="margin-left:30px;">WRITERS</h4>
      </div>
      <?php 
      if (isset($_GET['wid'])){
          $friend_id = $_GET['wid'];
          $user_id = $roww['id'];
          $frined  = new friends();
          $frined->add_friends($user_id,$friend_id);
      }
      
    
      $writers = new users();
     $rows = $writers->Select_users();
     if(!empty($rows)){
     foreach ($rows as $row){
?>
   <div class="card" style="margin-top: 10px;margin-left: 10px;" >
  <img src="uplodaimage/<?php echo $row['Image'];?>" class="card-img-top" alt="..." height="140px" width="140px">
  <a href="writers.php?wid=<?php echo $row['id'];?>" style="color: black;"><input class="fas fa-plus-square" style="margin-left: 120px;transform: translatey(-10px);background-color:white"></a>

  <div class="card-body">
    <a href="writers_articles.php?fid=<?php echo $row['id'];?>" style="color:black"> <center> <h6><?php echo $row['username'];?> </h6></center></a>
  </div>
  </div>
<?php 
}
}
?>

    </div>
  </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/all.min.js"> </script>

  </body>
</html>
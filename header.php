<?php include "admin/Classes/dp.php";
include "admin/Classes/article.php";
include "admin/Classes/comment.php";
  include "admin/Classes/favourite.php";
 include "admin/Classes/friends.php";
 include "admin/Classes/users.php";
 include "admin/Classes/topic.php";
 include "admin/Classes/comments_event.php";
 include "admin/Classes/favourite_event.php";
 include "admin/Classes/attend.php";
 include "admin/Classes/not_attend.php";
 include "admin/Classes/view_event.php";
 include "admin/Classes/event.php";

 
session_start();
     if (isset($_SESSION['username'])){
        if (isset($_POST['submit'])){
            $username = $_SESSION['username'];
            $topic = $_POST['topic'];
            $title = $_POST['title'];
            $description = $_POST['desc'];
            $image_name = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image = rand(0,1000).'_'.$image_name;
            move_uploaded_file($image_tmp,"include/uplodaimage\\".$image);
            $add_article = new article();
            $row = $add_article->fetch_user($username);
                $user_id = $row['id'];
                $add_articles = new article();
                $add_articles->add_article($topic,$user_id,$title,$description,$image);
            }
          }
  
     if (isset($_SESSION['username'])){
         if (isset($_POST['add'])){
         $username = $_SESSION['username'];
         $topic_id = $_POST['event_topic'];
         $title = $_POST['event_title'];
         $desc = $_POST['description'];
         $event_date = $_POST['date'];
         $img_name = $_FILES['image2']['name'];
         $img_tmp = $_FILES['image2']['tmp_name'];
         $img = rand(0,1000).'_'.$img_name;
         move_uploaded_file($img_tmp,"include/uplodaimage\\".$img);
         $place = $_POST['place'];
         $add_event = new event();
        $row= $add_event->fetch_user($username);
         $user_id = $row['id'];
         $add_event = new event();
         $add_event->add_event($topic_id,$user_id,$title,$desc,$place,$event_date,$img);
     }
    }
    
                ?>


<!doctype html>
<html lang="en">

<head>
    <title>Articles</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" src="css/all.min.css">
    <!-- <script type="text/javascript" src="js/jquery-3.5.1.min"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>



    

<script>
                              
          $("document").ready(function() {
 $("#search").click(function(){
    var someData = $("#se").val();
            var ByJson = {
                text: someData,
            }
    $.ajax({
        type: 'post', 
        url: 'include/ajax2.php',         
        data: ByJson,
        erroe: function() {},

        success: function (response) {
            console.log(response);
            // $('#article').html(null);
            $('#res').html(response);
              
        },
    });
   
 });   
 
});
</script>

</head>

<body style="background-color: #F5F5F5;">
    <!-- Start Navbar-->
    <div class="container" style="background-color: #F5F5F5;">
        <div class="row">
            <div class="col-9">
                <nav class="navbar navbar-expand-lg navbar-light bg-black">
                <a href="../index.php" class="navbar-brand" href="#">
                        <h2 style="color: #FFA500;font-style: italic	;	font-family: Impact,Haettenschweiler,Franklin Gothic Bold,Charcoal,Helvetica Inserat,Bitstream Vera Sans Bold,Arial Black,sans serif; 
;  text-shadow: 4px 2px 4px black;">Articles</h2>
                    </a>
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

                    
                        <form class="form-inline my-2 my-lg-6" method="post" id="form2">
                            <input class="form-control" type="text" placeholder="search" id="se" name="se">
                         <button type="button"  style="border-radius: 25px; margin-left:3px; color:white;background-color:black"  id="search" name="search">search</button>
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
            <div class="col-1" style="margin-top: 18px;"
                style="background-color: wheat;box-shadow: 2px 3px 5px 2px #DCDCDC">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                    data-whatever="@mdo" style="border-radius:20px;padding:4px 7px;"><i class="fas fa-plus"></i>
                    Add</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Add New Article</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label"
                                            style="margin-right: 300px;">Section:
                                            <select name="topic">
                                                <?php 
              $topic = new article();
              $rows = $topic->fetch_topic();
              if (!empty($rows)){
              foreach ($rows as $row){
                ?>
                                                <option value="<?php echo $row['id'];?>"><?php echo $row['Name'];?>
                                                </option>
                                                <?php 
            }
        }
            ?>
                                            </select>

                                        </label>

                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="recipient-name" placeholder="Title"
                                            name="title">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="message-text" placeholder="Description"
                                            style="height: 150px;" name="desc"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file" id="customFile" lang="es">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                aria-describedby="fileHelp" name="image">
                                            <label class="custom-file-label" for="exampleInputFile">
                                                <h7>Select image... </h7>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <a href=""> <input type="submit" class="btn btn-secondary" data-dismiss="modal"
                                                value="Close"></a>
                                        <input type="submit" class="btn btn-primary" value="Publish" name="submit">
                                    </div>
                                    <hr>
                                             <!-------------ADD Event------------------>
                                             
                                    <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Add New Event</h5>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label"
                                            style="margin-right: 300px;">Section:
                                            <select name="event_topic">   
                                            <?php 
                                            $fetch_topic = new event();
                                            $row =$fetch_topic->fetch_topic();
                                            if(!empty($row)){
                                                foreach($row as $rows){
                                                    ?>
                                                <option value="<?php echo $rows['id'];?>"><?php echo $rows['Name'];?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </select>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="recipient-name" placeholder="Title"
                                            name="event_title">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="recipient-name" placeholder="Place"
                                            name="place">
                                    </div>
                                    <div class="form-group">
                                        <input type="date" class="form-control" id="recipient-name" placeholder="Place"
                                            name="date">
                                    </div>
                                    
                                    <div class="form-group">
                                        <textarea class="form-control" id="message-text" placeholder="Description"
                                            style="height: 150px;" name="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file" id="customFile" lang="es">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                aria-describedby="fileHelp" name="image2">
                                            <label class="custom-file-label" for="exampleInputFile">
                                                <h7>Select image... </h7>
                                            </label>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <a href=""> <input type="submit" class="btn btn-secondary" data-dismiss="modal"
                                                value="Close"></a>
                                        <input type="submit" class="btn btn-primary" value="Publish" name="add">
                                    </div>

                                </form>
                                
                            </div>




                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div>
            <!-- End Nav Bar-->
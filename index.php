<?php include "header.php";?>
<!-- Start Home page-->
<div class="content">
<div class="container" style="margin-top: 15px;">
    <div class="row">
        <div class="col-md-2" style="background-color: #F5F5F5;box-shadow: 20px 20px 30px 2px #DCDCDC;">
            <div class="home" style="margin-top: 10px;">
                <a href="">
                    <h5 style="color: #191970;"> <i class="fas fa-home"> </i> Home </h5>
                </a>
                <hr>
            </div>
            <div class="like">
           
                
            </div>
            <div class="Topic">

                <a href="">
                    <h5 style="color: #191970;"><i class="fas fa-paperclip"></i> Topics</h5>
                </a>
                <?php $select_topic = new topic();
                $rowww = $select_topic->Select_topic(); 
                foreach($rowww as $rooo){    
                ?>
                <li style="list-style: none;"><a href="include/writers.php?"> <?php echo $rooo['Name'];?></a> </li>
                
               <?php 
            }
        
            ?>
              
                <hr>
            </div>
            <div class="invite">
                <a href="">
                    <h5><i class="fas fa-user-friends"></i>  Friends</h5>
                    </a>
                    <?php 
                       if (isset($_GET['fid']) &&  ($_GET['user_id'])){
                           $fr_id = $_GET['fid'];
                           $user_id = $_GET['user_id'];
                           $delete_friend = new friends();
                           $delete_friend->delete_friend($fr_id,$user_id);
                       }
                    if (isset($_SESSION['username'])){    
                    $username = $_SESSION['username'];
                    $user= new users();
                   $roo= $user->fetch_user($username);
                   $user_id = $roo['id'];
                 
                    $friend = new friends();
                  $rows = $friend->fetch_friends($user_id);
                    if ($rows){
                   foreach ($rows as $row){                   
                  ?>
                  <li style="list-style: none;"><a href="include/writers_articles.php?fid=<?php echo $row['friend_id'];?>" style="color:black ;"><?php echo $row['username'];?> </a><a href="index.php?fid=<?php echo $row['friend_id'];?>&user_id=<?php echo $roo['id'];?>"  style="color: black;"><input type="submit" class="fas fa-backspace fa-1x" name="delete_friend"></a></li>
                  <?php  
                   
                } 
            }
        }
                ?>
                
                <hr>
            </div>
            <div class="Writers">
                <a href="include/writers.php">
                    <h5><i class="fas fa-male"></i> Writers</h5>
                </a>
                <hr>
            </div>

            <div class="favorites">
                <h6><i class="far fa-star"></i>Favorite Articles</h6>
                <?php 
                if (isset($_GET['article_id']) &&  ($_GET['user_id'])){
                    $user_id = $_GET['user_id'];
                    $favid = $_GET['article_id'];
                    $delete_fav = new favourite();
                    $delete_fav->delete_fav($favid,$user_id);
                }
                if (isset($_GET['event_id']) &&  ($_GET['user_id'])){
                    $user_id = $_GET['user_id'];
                    $fav_ev_id = $_GET['event_id'];
                    $delete_fav = new favourite_event();
                    $delete_fav->delete_fav_ev($fav_ev_id,$user_id);
                }
                if (isset($_SESSION['username'])){

                
                $users = new favourite();
                $username = $_SESSION['username'];
             $roww =  $users->fetch_users($username);
                $user_id = $roww['id'];
                $favourite = new favourite();
              $rows =  $favourite->fetch_favourite($user_id);
              if ($rows){
                foreach($rows as $row){
              
         
?>
               
                <li style="list-style: none;"><i class="far fa-star"></i> <a href="include/single-post.php?id=<?php echo $row['Id'];?>" style="color: black;text-decoration:none"> <?php echo $row['title'];?> </a> <a href="index.php?article_id=<?php echo $row['article_id'];?>&user_id=<?php echo $roww['id'];?>" style="color: black;"><input type="submit" class="fas fa-backspace fa-1x" name="delete_fav"></a> </li>
    <?php 
}
}
}
?>
<hr>
<div class="favourite_event">
<h6><i class="far fa-star"></i>Favorite Events</h6>
<?php
if(isset($_SESSION['username'])){
    $users = new favourite_event();
    $username = $_SESSION['username'];
 $roww =  $users->fetch_users($username);
    $user_id = $roww['id'];
    $favourite_event = new favourite_event();
  $rows=  $favourite_event->fetch_favourite_event($user_id);
   if($rows){
       foreach($rows as $rowss){
?>
                <li style="list-style: none;"><i class="far fa-star"></i> <a href="include/event.php?id=<?php echo $rowss['Id'];?>" style="color: black;text-decoration:none"> <?php echo $rowss['title'];?> </a> <a href="index.php?event_id=<?php echo $rowss['event_id'];?>&user_id=<?php echo $roww['id'];?>" style="color: black;"><input type="submit" class="fas fa-backspace fa-1x" name="delete_fav"></a> </li>

<?php
    }
}
}
?>
</div>
            </div>
        </div>
       
    <div class="col-md-7" id="res">
    <?php 
      $article = new article();
      $rows = $article->fetch_article_info();
      if ($rows){
       foreach($rows as $row){
        ?>
      <div class="article_info" id="article">      
            <div class="author" style="margin-top: 10px;transform: translate(45px)">
                <a href="include/my_articles.php"> <img src="include/uplodaimage/<?php echo $row['Image'];?>"
                        width="50px" height="50px" style="border-radius: 50px;"></a>
                <a href="include/my_articles.php">
                    <h8 style="color:black ;"> <?php echo $row['name'];?>
                </a> </h8> | <a href=""> <?php echo $row['Name'];?> </a>| <a href="include/single-post.php?id=<?php echo $row['id'];?>" style="color: black;"> <?php echo $row['title'];?> </a>

            </div>
            <div class="img" style="transform: translate(100px);">
                <a href="include/single-post.php?id=<?php echo $row['id'];?>"> <img
                        src="include/uplodaimage/<?php echo $row['image'];?>" width="550px" height="300px"> </a>
            </div>
            <div class="article-detailes" style="transform: translate(100px);background-color:#f5f5f5;margin-right:px;padding :3px;width:550px">
                <?php 
                $comment = new comment();
                $aid = $row['id'];
                $roow = $comment->comment_num($aid);
                ?>
    <a href="index.php?cid=<?php echo $roow['articles_id'];?>" class="" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="color: black;text-decoration:none">
      <i class="far fa-comment"> </i>  <?php echo $roow['Num'];?>  
       </a>
                <?php 
                $fav = new favourite();
                $aid = $row['id'];
              $ro =  $fav->favourite_num($aid);
              ?>
                <h7 style="margin-right: 10px;"><i class="fas fa-heart"></i> <?php echo $ro['num'];?> </h7>
                <h7 style="margin-right: 222px;"><i class="far fa-clock"></i> <?php echo $row['date'];?></h7>
                <p style="margin:10px 0px 5px 10px;font-size:19px;height:70px; word-wrap: break-word;"><?php
          if (strlen($row['description'])>80){
             $row['description'] = substr($row['description'],0,130)." ...";  
           }          
           echo $row['description'];
           ?>
          <a href="include/single-post.php?id=<?php echo $row['id'];?>" ><input type="button" class="btn btn-outline-dark" style="color:white;padding: 3px;border-radius:20px;background-color:#A9A9A9" value="see more" ></a>
                </p>       
             <button class="btn btn-danger" style="transform: translatey(-138px); padding:10px 20px;margin-left:440px"><?php echo $row['type'];?></button>
        
        <?php 
   $show_comments = new comment();

   $id = $row['id'];
 $rows = $show_comments->fetch_comments($id);
if($rows){
 foreach($rows as $roww){
?>    
      <div class="collapse" id="collapseExample">
<label style="margin-right: 0px;transform: translatey(-10px);margin-left:20px;width:320px"><img src="include/uplodaimage/<?php echo $roww['Image'];?>" width="45px" height="42px" style="border-radius: 50px;">  
<?php echo $roww['username'];?>  <i class="far fa-clock"></i> <?php echo $roww['create_date'];?></label>
<p  style="width: 420px;height:50px;resize:none;background-color:#F0F8FF;margin-bottom:12px;margin-left:20px;word-wrap: break-word"><?php echo $roww['comment'];?></p>

</div>
<?php 
 }
}
 ?>   
  
</div>
            <?php 
    }
}
    ?>
    
     <?php 
     $event = new event();
      $row = $event->fetch_event_info();
      if($row){
          foreach($row as $rows){

      ?>

            <div class="event" style="transform: translate(45px)">
       <div class="img" style="transform: translate(50px);">
      <a href="include/event.php?id=<?php echo $rows['id'];?>"> <img src="include/uplodaimage/<?php echo $rows['image'];?>" width="550px" height="300px">  </a> 
      <div class="conten" style="background: rgba(0,0,0,0.4);color:white;width:550px ">
      <h7> <img src="include/uplodaimage/<?php echo $rows['Image'];?>" width="65px" height="55px" style="border-radius: 50px;opacity: 0.5">
    By <?php echo $rows['username'];?> - <?php echo $rows['event_date'];?> <i class="far fa-clock"></i></h7>

      </div>
       </div>  

       <div class="comment" style="transform: translate(50px);margin-right:85px;width:550px; padding:0px 13px;">
       <?php 
          $view_num = new view();
          $aid = $rows['id'];
       $rowe =   $view_num->view_num($aid);
       ?>
       <h7 style="margin-right: 10px;"> <i class="fas fa-eye"></i> <?php echo $rowe['NUm'];?></h7>
       <?php $comments_num = new commnets_event();
       $id = $rows['id'];
     $roow =  $comments_num ->comments_count($id);
?>
             <h7 style="margin-right: 15px;margin-left:5px;"><i class="far fa-comment"></i> <?php echo $roow['Num'];?></h7>
      
             <?php 
             $favourite_event_num = new favourite_event();
             $id = $rows['id'];
         $rooow =  $favourite_event_num->favourite_event_num($id);
             ?>
    <h7 style="margin-right: 222px;"> <i class="fas fa-heart"></i> <?php echo $rooow['num'];?></h7>
    <button class="btn btn-danger" style=" transform: translatey(-25px) translate(68px); padding:8px 15px;"><?php echo $rows['Name'];?></button>

       </div> 
       <div class="place" style="transform: translate(80px);width:490px;background-color:#D3D3D3">
           <h7 style="margin-left:5px;padding:10px 30px;margin-right:10px"><?php echo $rows['event_date'];?> </h7> | <h7 style="margin-right:0px 10px;padding: 10px 45px"><?php echo $rows['title'];?></h7> | <h7 style="margin-right: 0px;padding: 10px 20px;"><?php echo $rows['place'];?> <i class="fas fa-map-marker-alt"></i></h7>

       </div>
       <div class="disc" style="margin-top:10px;background-color:#FDF5E6;margin-left:85px;margin-right:35px;width:470px">
          
        <p  style="font-size:17px;height:70px;word-wrap: break-word;"> <?php 
        if (strlen($rows['description'])>80){
             $rows['description'] = substr($rows['description'],0,130)." ... ";  
           }          
           echo $rows['description'];
           ?>
            <a href="include/event.php?id=<?php echo $rows['id'];?>" ><input type="button" class="btn btn-outline-dark" style="color:white;padding: 3px;border-radius:20px;background-color:#A9A9A9" value="see more" ></a>
         </p>
     </div>
     <div class="place" style="transform: translate(80px);width:490px;background-color:#D3D3D3;margin-bottom:30px">
     <?php 
     $attend_num = new attend();
     $id = $rows['id'];
     $rro = $attend_num->attend_num($id);
     ?>
     <?php $not_attend_num = new not_attend();
       $id = $rows['id'];
       $rroo = $not_attend_num->not_attend_num($id);
       ?>

           <h7 style="margin-left:5px;padding:3px 40px;">Attend </h7>| <h7 style="margin-left:5px;padding:3px 25px;"> <?php echo $rro['NUM'];?> </h7>  <h7 style="margin-left:5px;padding:3px 40px;">Not Attend </h7>| <h7 style="margin-left:5px;padding:3px 25px;"> <?php echo $rroo['NuM'];?></h7>

       </div>
      
            </div>                            
<hr>
              <?php
    }
}
?>    
 

        

        </div>
    </div>



<?php include "include/footer.php";?>
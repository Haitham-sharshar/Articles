<?php
include "../admin/Classes/dp.php";
include "../admin/Classes/article.php"; 
include "../admin/Classes/comment.php";
include "../admin/Classes/favourite.php";
    $data = $_POST['text'];
    
$search_article = new article();
 $rows =$search_article->search($data);
if (!empty($rows)){

    foreach ($rows as $row){
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
  
       <div class="collapse" id="collapseExample">
      
<?php 
$show_comments = new comment();

$id = $row['id'];
$rows = $show_comments->fetch_comments($id);
if(!empty($rows)){
foreach($rows as $roww){
?>
<label style="margin-right: 0px;transform: translatey(-10px);margin-left:20px;width:320px"><img src="include/uplodaimage/<?php echo $roww['Image'];?>" width="45px" height="42px" style="border-radius: 50px;">  
<?php echo $roww['username'];?>  <i class="far fa-clock"></i> <?php echo $roww['create_date'];?></label>
<p  style="width: 420px;height:50px;resize:none;background-color:#F0F8FF;margin-bottom:12px;margin-left:20px;word-wrap: break-word"><?php echo $roww['comment'];?></p>
<?php 
}
}
?>
         
</div>
</div>
<?php
    }
  }
  ?>
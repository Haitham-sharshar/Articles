<?php include "../header.php";?>
<?php
 if (isset($_POST['favourite'])){
  $articleId = $_GET['id'];
  $user = new article();
  $username = $_SESSION['username'];
  $rows = $user->fetch_user($username);
  $userId = $rows['id'] ;
  $favourite = new favourite();
  $articleId = $_GET['id'];
  $userId =  $rows['id']  ;
  $favourite->insert_favourite($articleId,$userId);
}
?>
<div class="container">
    <div class="row">
    <div class="col-md-1">
      <form method="post">
    <div class="favourite" style="margin-top:420px; transform:translate(40px)" ;">
     <button type="submit" name="favourite" style="padding: 5px 5px;margin:8px 4px"><i class="far fa-star"></i></button>
     <button type="submit" name="facebook" style="padding: 5px 5px;margin:10px 5px"> <i class="fab fa-facebook"></i></button>

     <button type="submit" name="twitter" style="padding: 5px 5px;margin:10px 5px"><i class="fab fa-twitter"></i></button>

     <button type="submit" name="share" style="padding: 5px 5px;margin:10px 6px"> <i class="fas fa-share-alt"></i></button>
    </div>
    </form>
</div>
        <div class="col-md-11">
        <?php 
          $single = new article();
          $id = $_GET['id'];
          $row = $single->fetch_articles_info($id);
       
        ?>
        
        <div class="img" style="background-color: wheat;width:900px;margin-top:10px" >
       <img src="uplodaimage/<?php echo $row['image'];?>" width="100%" height="300px">         
       </div>  
       <div class="author" style="margin-top: 10px;background-color: #c0c0c0;width:900px;margin-left:px">

    <img src="uplodaimage/<?php echo $row['Image'];?>" width="80px" height="70px" style="border-radius: 50px;">
    <h8><?php echo $row['name'];?></h8> | <h8><?php echo $row['Name'];?></h8>
    <h7 style="margin-right: 222px;"><i class="far fa-clock"></i> <?php echo $row['date'];?></h7>
       </div>
       <button class="btn btn-danger" style=" padding:10px 15px;margin-left:780px;transform: translatey(-22px);"><?php echo $row['type'];?></button>

     

  <div class="disc"style="background-color:#f5f5f5;width:750px;margin-left:50px;word-wrap: break-word;padding:4px;transform: translatey(px)">

           <h7><?php echo $row['description'];?>  </h7>   
</div>

  <div class="comment" id="comment" style="margin-top: 40px;width:750px;margin-left:30px;transform: translatey(px)">
        <?php 
   $singlee_post = new comment();

   $id = $_GET['id'];
 $rows = $singlee_post->fetch_comments($id);
 if (!empty($rows)){

 foreach($rows as $roww){
?>
<label style="margin-right: 0px;transform: translatey(-10px);margin-left:20px;width:320px"><img src="uplodaimage/<?php echo $roww['Image'];?>" width="45px" height="42px" style="border-radius: 50px;">  
<?php echo $roww['username'];?>  <i class="far fa-clock"></i> <?php echo $roww['create_date'];?></label>
<p  style="width: 420px;height:50px;resize:none;background-color:#F0F8FF;margin-bottom:12px;margin-left:20px;word-wrap: break-word" id="r"><?php echo $roww['comment'];?></p><?php 
/*
if ($_SESSION['username'] = $roww['username']){
      $uid = $roww['id'];
      $user_id = $roww['us_id'];
  
    if ($uid == $user_id){
        echo "ddssdsd";
    }
}
*/
?>

<br>
<?php
 }
}
 ?>
 </div>
<div class="comment-add" style="margin-top: 20px;margin-bottom:0px"  >
<script>
$("document").ready(function() {
    $("#add").click(function(){
            $.ajax({
        url:"ajax.php",
        type:"post",
        data: $("form").serialize(),
        success:function(r){
          var data = JSON.parse(r); 
          console.log(data.comment);
          var string = '<label style="margin-right: 0px;transform: translatey(-10px);margin-left:20px;width:320px"><img src="uplodaimage/'+data.Image+'" width="45px" height="42px" style="border-radius: 50px;">'+data.username+'  <i class="far fa-clock"></i> '+data.create_date+'</label> <p  style="width: 420px;height:50px;resize:none;background-color:#F0F8FF;margin-bottom:12px;margin-left:20px;word-wrap: break-word" id="r">'+data.comment+'</p>';
          $("#comment").append(string);
          $('#add_comment').trigger("reset");
        

        },
        error: function (xhr, ajaxOptions, thrownError){
        console.log("aa"+xhr.status);
        console.log("bb"+thrownError);
      }
      })
    })
  })
</script>

<form method="post" id="add_comment">
<img src="uplodaimage/<?php echo $row['Image'];?>" width="50px" height="40px" style="border-radius: 50px;margin-bottom:5px" >
<input type="text" placeholder="comment" style="width: 600px;" name="comm" style="background-color:#F0F8FF;" id="comment">
<input type="hidden"  value="<?php echo $_SESSION['username'];?>" name="user_id">
<input type="hidden"  value="<?php echo $_GET['id'];?>"  name="article_id">
<button type="button" class="btn btn-primary" style="padding: 2px 5px;transform: translatey(-4px);border-radius:10px;margin-left:5px" name="add" id="add">add</button> 
</form>
</div>
        </div>
    </div>
</div>



<?php include "footer.php";?>










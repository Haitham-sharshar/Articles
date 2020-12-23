<?php include "../header.php";?>



      


<center><h4 style="  font-style: italic;color:red">Your Articles</h4></center>
<div class="container">
    <div class="row">
        <div class="col-md-7" style="transform: translate(200px);">
        <?php 
        if (isset($_SESSION['username'])){
          $username = $_SESSION['username'];
          $my_article = new article();
       $row = $my_article->fetch_user($username);
        $user_id = $row['id'] ;     
        $my_article = new article();
       $rows = $my_article->fetch_myarticle_info($user_id);
      if (!empty($rows)){
       foreach ($rows as $row){
       ?>
        <div class="author" style="margin-top: 10px;">
           <img src="uplodaimage/<?php echo $row['Image'];?>" width="50px" height="50px" style="border-radius: 50px;">
           <h8><?php echo $row['name'];?></h8> | <a href=""><?php echo $row['Name'];?> </a>| <a href="" style="color: black;"><?php echo $row['title'];?> </a>
 <!-- Button trigger modal -->
 <a href="my_articles_edit.php?uid=<?php echo $row['id'];?> "> <input class="fas fa-edit" type="submit"   style="transform: translate(300px);color:#778899"></a>
  <i class="fas fa-backspace fa-1x"  type="button"  data-toggle="modal" data-target="#exampleModal2" style="transform: translate(301px);color:#778899"></i>
     
</div> 
       <div class="img" style="transform: translate(50px);">
      <img src="uplodaimage/<?php echo $row['image'];?>" width="550px" height="300px">          
       </div>  

       <div class="article-info" style="transform: translate(50px);background-color:#D3D3D3;margin-right:85px;">
       <?php 
                $comment = new comment();
                $aid = $row['id'];
                $roow = $comment->comment_num($aid);
                ?>

           <?php 
                $fav = new favourite();
                $aid = $row['id'];
              $ro =  $fav->favourite_num($aid);
              ?>
         <h7 style="margin-right: 15px;margin-left:5px;"><i class="far fa-comment"></i> <?php echo $roow['Num'];?>  </h7>
        <h7 style="margin-right: 10px;"><i class="fas fa-heart"></i> <?php echo $ro['num'];?> </h7>
        <h7 style="margin-right: 222px;"><i class="far fa-clock"></i> <?php echo $row['date'];?></h7>
        <button class="btn btn-danger" style="transform: translatey(-50px); padding:10px 20px;margin-left:440px"><?php echo $row['type'];?></button>

        <p style=" word-wrap: break-word;transform: translatey(-35px);padding:5px 7px"><?php
                   echo $row['description'];
           ?>
        </p>   

     </div>

     <hr>
     <?php
    }
  }
}
     ?>
        </div>
    </div>
</div>

<!-- Start model Edit-->
<?php /*
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal3">Edit Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
        <div class="form-group" >
            <label for="recipient-name" class="col-form-label" >Section:
            <select>
              <option></option>
            </select>
            </label>
            </div>
          <div class="form-group">
              <label>Title:</label>
            <input type="text" class="form-control" id="recipient-name" value="Travelling">
          </div>
          <div class="form-group">
            <textarea class="form-control" id="message-text" placeholder="Description" style="height: 150px;" >Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde sequi essevel dolores libero maxime minus recusandae non facilismodi commodi eos tempora saepe illo ...</textarea>
          </div>
          <div class="form-group">
          <div class="custom-file" id="customFile" lang="es">
        <input type="file" class="custom-file-input" id="exampleInputFile" aria-describedby="fileHelp">
        <label class="custom-file-label" for="exampleInputFile">
           <h7>Select image... </h7>
        </label>
            </div>
            </div>
            </form>
            <div class="modal-footer">
      <input type="submit" class="btn btn-secondary" data-dismiss="modal" value="Close">
        <input type="submit" class="btn btn-primary" value="Save">
      </div>
   
        </div>
</div>
</div>
        
 </div>
 */
 ?>
<!--End moderl Edit-->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe3" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabe3"></h5>
       
      </div>
      <div class="modal-body">
        
      <div class="author" style="margin-top: 10px;">
           <img src="../img/mohamed.jpg" width="50px" height="50px" style="border-radius: 50px;">
           <h8>Mohamed</h8> | <a href="">Travelling </a>
 <!-- Button trigger modal -->

 <i class="fas fa-edit" type="submit"  data-toggle="modal" data-target="#exampleModal3" style="transform: translate(340px);color:#778899" name="edit"></i>
 <i class="fas fa-backspace fa-1x" type="button"  data-toggle="modal" data-target="#exampleModal2" style="transform: translate(345px);color:#778899"></i>
       </div> 
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
         <input type="submit" class="btn btn-primary" value="Yes">
      </div>
    </div>
  </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe2" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabe2"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center><h4 style="color: red;">Are you sure ?</h4></center>
      </div>
      <div class="modal-footer">
        <?php 
          $username = $_SESSION['username'];
          $showuser_id = new article;
           $row =   $showuser_id -> fetch_user($username);
            $dd =   $row['id'] ;

           
        ?>
        <?php 
           $delete = new article();
           $delete = new article;
           $row =   $showuser_id -> fetch_user($username);
           $dd =   $row['id'] ;
           $delete = new article();
           $rows= $delete->select_article($dd);
           
        ?>
        <?php
          if (isset($_GET['id'])){

             
$delete = new article();
$rows= $delete->select_article($dd);
$did = $rows['id'];
$showuser_id = new article;
$username = $_SESSION['username'];
$row =   $showuser_id -> fetch_user($username);
$dd =   $row['id'] ;

$delete = new article();
$delete->delete($dd,$did);

  
  }
  ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
     <a href="my_articles?id=<?php echo $rows['id'];  ?>" type="submit" class="btn btn-primary" name="delete" > Yes </a>
      </div>
     
    </div>
  </div>
</div>
<!--End model Delete-->


<?php include "footer.php";?>
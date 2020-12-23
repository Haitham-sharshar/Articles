<?php include "header.php";?>
<?php include "CLasses/dp.php";
include "Classes/article.php";
?>

<?php 
if (isset($_GET['id'])){
  $id = $_GET['id'];
  $delete = new article();
  $delete->delete_article($id);
  echo "<div class='alert alert-success'>The Article Deleted Sucessfully</div>";
}
?>
<div class="container">
  <div class="row">
    <div class="col-sm-2" style="border-right: 1px solid black;">
     <div style="margin-top: 20px;">
    <a href="topic.php" style="color: black;text-decoration:none"> <h5 > <i class="fas fa-paperclip"></i> Topics</h5></a>
    </div>
     <div style="margin-top: 30px;">
    <a href="article.php"style="color: black;text-decoration:none"> <h5 > <i class="fas fa-book-open"></i> Articles</h5></a>
    </div>
    <div style="margin-top: 30px;">
    <a href="comments.php"style="color: black;text-decoration:none"> <h5 > <i class="far fa-comment"></i> Comments</h5></a>
    </div>
    <div style="margin-top: 30px;">
    <a href="contact.php"style="color: black;text-decoration:none"> <h5 > <i class="fas fa-file-signature"></i> Contact</h5></a>
    </div>
    <div style="margin-top: 30px;">
    <a href="users.php"style="color: black;text-decoration:none"> <h5 > <i class="fas fa-users"></i> Users</h5></a>
    </div>
    <div style="margin-top: 30px;">
    <a href="writers.php"style="color: black;text-decoration:none"> <h5 > <i class="fas fa-male"></i> Writers</h5></a>
    </div>
</div>
    <div class="col-sm-10">
    <table class="table table-dark" style="margin-top: 20px;">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">username</th>
      <th scope="col">User Image</th>
      <th scope="col">Section</th>
      <th scope="col">Type</th>
      <th scope="col">Description</th>
      <th scope="col">Article image</th>
      <th scope="col">Date</th>
      <th scope="col">Delete</th>
      <th scope="col">Update</th>
      

    </tr>
  </thead>
  <tbody>
    <?php
  
  $articles = new article();
  $rows = $articles->fetch_article_info();
   if ($rows){
   foreach($rows as $row){
    ?>
 
    <tr>
      <th><?php echo $row['id'];?></th>
      <th><?php echo $row['username'];?></th>
      <th><img src="../include/uplodaimage/<?php echo $row['Image'];?>" style="width: 80px; height:60px"></th>
      <td><?php echo $row['Name'];?></td>
      <td><?php echo $row['type'];?></td>
      <td><?php echo $row['description'];?></td>
      <td><img src="../include/uplodaimage/<?php echo $row['image'];?>" style="width: 80px; height:60px"></td>
      <td><?php echo $row['date'];?></td>
      <td><a href="article.php?id=<?php echo $row['id'];?>" type="submit" value="Delete" class="btn btn-danger">Delete</a></td>
    </tr>
   <?php 
   }
  }
   ?>
  </tbody>
</table>
    </div>
  </div>
</div>


<?php include "footer.php";?>
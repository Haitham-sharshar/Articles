<?php include "header.php";?>
<?php include "Classes/dp.php";
 include "Classes/users.php"; ?>

 <?php 
 if (isset($_GET['id'])){
   $id = $_GET['id'];
   $delete = new users();
   $delete->delete_users($id);
   echo "<div class='alert alert-success'>The user Deleted Sucessfully</div>";
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
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>      
      <th scope="col">Gender</th>
      <th scope="col">Password</th>
      <th scope="col">Image</th>
      <th scope="col">Biography</th>
      <th scope="col">Delete</th>
      

    </tr>
  </thead>
  <tbody>
  <?php $users = new users();
  $rows = $users->Select_users();
  if($rows){
  foreach($rows as $row){
  ?>
    <tr>
      <td><?php echo $row['id'];?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['username'];?></td>
      <td><?php echo $row['gender'];?></td>
      <td><?php echo $row['password'];?></td>
      <td><img src="../include/uplodaimage/<?php echo $row['Image'];?>" style="width: 70px; height:80px"></td>
      <td><?php echo $row['biography'];?></td>
      <td><a href="users.php?id=<?php echo $row['id'];?>" type="submit"  class="btn btn-danger">Delete</a></td>
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
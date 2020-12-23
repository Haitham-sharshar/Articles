<?php include "header.php";?>
<?php include "Classes/dp.php";?>
<?php include "Classes/contact.php";?>
<?php
if (isset($_GET['id'])){
  $id = $_GET['id'];
  $delete_contact = new contact();
  $delete_contact->delete_contact($id);
  echo "<div class='alert alert-success'>The Message Deleted Successfully</div>";
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
      <th scope="col">Subject</th>  
      <th scope="col">Message</th>      
      <th scope="col">Date</th>
      <th scope="col">Delete</th>
      

    </tr>
  </thead>
  <tbody>
<?php 
$contact = new contact();
$rows = $contact->fetch_contact();
if (!empty($rows)){
foreach($rows as $row){
?>
    <tr>
      <td><?php echo $row['id'];?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['subject'];?></td>
      <td><?php echo $row['message'];?></td>
      <td><?php echo $row['send_date'];?></td>
      <td><a href="contact.php?id=<?php echo $row['id'];?>" type="submit"  class="btn btn-danger">Delete</a></td>
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
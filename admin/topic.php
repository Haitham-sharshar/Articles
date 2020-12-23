<?php include "Classes/dp.php";
include "Classes/topic.php";?>
<?php 
if (isset($_POST['submit'])){
  $name = $_POST['name'];
  $type = $_POST['type'];
  $add_topic = new topic();
  $add_topic->Add_Topic($name,$type);
  echo "<div class='alert alert-success'>The Topic Added Sucessfully</div>";
}
if (isset($_GET['id'])){
  $id = $_GET['id'];
  $delete_topic = new topic();
  $delete_topic->delete_topic($id);
  echo "<div class='alert alert-success'>The Topic Deleted Sucessfully</div>";

}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" src="css/all.min.css">
</head>

  <body>
      <!-- start navbar-->
  <nav class="navbar navbar-dark bg-dark">
  <h3 style=" color:red;" >Dashboard Control</h3>
  </nav>
</div>
   <!-- End navbar-->
   <div class="container">
  <div class="row">
    <div class="col-sm-2" style="border-right: 1px solid black;">
     <div style="margin-top: 20px;">
    <a href="tobic.php" style="color: black;text-decoration:none"> <h5 > <i class="fas fa-paperclip"></i> Topics</h5></a>
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
      <form method="post">
        <div style="margin-top: 10px;">
      <input type="text" class="form-control" placeholder="Write Topic Name" name="name">
    </div>
    <div style="margin-top: 10px;">
      <input type="text" class="form-control" placeholder="Write Topic type" name="type">
      <input type="submit" value="Add" class="btn btn-primary" style="margin-top: 5px; margin-left:870px;border-radius:15px" name="submit">
    </div>
    </form>
    <table class="table table-dark" style="margin-top: 10px;">
  <thead>
    <tr>
      <th >id</th>
      <th>Name</th>
      <th >Type</th>
      <th>Delete</th>

     
    </tr>
  </thead>
  <tbody>
    <?php 
    $fetch_topic = new topic();
   $rows = $fetch_topic->Select_topic();
   if($rows){
   foreach ($rows as $row){
   ?>
 <tr>
  <td><?php echo $row['id'];?></td>
  <td><?php echo $row['Name'];?></td>
  <td><?php echo $row['type'];?></td>
  <td><a href="topic.php?id=<?php echo $row['id'];?>" type="submit" value="Delete" class="btn btn-danger">Delete</a></td>
  <td><a href="edit_topic.php?uid=<?php echo $row['id'];?>" type="submit" value="Delete" class="btn btn-primary">Update</a></td>

</tr>
<?php 
}
}
?>
  </tbody>
</table>
  </div>
</div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/all.min.js"></script> 
</body>
</html>
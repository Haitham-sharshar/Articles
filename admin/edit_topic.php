<?php include "Classes/dp.php";
include "Classes/topic.php";?>
<?php 
if (isset($_POST['submit'])){
 $uid = $_GET['uid'];
  $Name = $_POST['name'];
  $Type = $_POST['type'];
  $update = new topic();
  $update->update_topic($Name,$Type,$uid);
  echo "<div class='alert alert-success'>The Topic Updated Sucessfully</div>";
  header("Refresh:1; url=topic.php");

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
      <form method="post">
      <?php 
   $select_topic = new topic();
   $uid = $_GET['uid'];
   $row = $select_topic->select_topic_edit($uid);
   ?>
 

        <div style="margin-top: 10px;">
      <input type="text" class="form-control" placeholder="Write Topic Name" name="name" value="<?php echo $row['Name'];?>">
    </div>
    <div style="margin-top: 10px;">
      <input type="text" class="form-control" placeholder="Write Topic type" name="type" value="<?php echo $row['type'];?>">
     <input  type="submit"  class="btn btn-primary" value="Update" style="margin-top: 5px; margin-left:870px;border-radius:15px" name="submit">
    </div>
    </form>

</div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/all.min.js"></script> 
</body>
</html>
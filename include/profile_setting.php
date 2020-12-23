<?php include "../admin/Classes/dp.php";?>
<?php include "../admin/Classes/users.php";
session_start()?>

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



</head>

<center style="margin-top: 25px;"><h3>Profile Settings</h3></center>
<hr>
<?php 
if (isset($_SESSION['username'])){
    $fetch_users = new users();
    $user_name = $_SESSION['username'];
  $row =  $fetch_users->fetch_users($user_name);
}

if (isset($_POST['submit'])){
    $update = new users();
    $user_name = $_SESSION['username'];
    $name = $_POST['name'];
    $email = $_POST ['email'];
    $username = $_POST ['username'];
    $password = $_POST ['password'];
    $image_name = $_FILES['Image']['name'];
    $image_tmp = $_FILES['Image']['tmp_name'];
    $image = rand(0,1000).'_'.$image_name;
    move_uploaded_file($image_tmp,"uplodaimage\\".$image);
    $biography = $_POST['biography'];
    $update->update($name,$email,$username,$password,$image,$biography,$user_name);
    echo "<div class='alert alert-success'>Your Profile Setting Updated Sucessfully</div>";
}
?>
<form action="" method="post" enctype="multipart/form-data">
<div class="form-group" style="margin-left: 300px;">
<label ><h6>Your name :</h6> </label>
<input type="text" name="name" class="" style="margin-left: 60px;border-radius:15px;width:350px" value="<?php echo $row['name'];?>" >
</div>
<div class="form-group" style="margin-left: 300px;">
<label ><h6>Email :</h6> </label>
<input type="mail" name="email" class="" style="margin-left: 98px;border-radius:15px;width:350px" value="<?php echo $row['email'];?>">
</div>
<div class="form-group" style="margin-left: 300px;">
<label ><h6>User name :</h6> </label>
<input type="text" class="" name="username" style="margin-left: 60px;border-radius:15px;width:350px" value="<?php echo $row['username'];?>">
</div>
<div class="form-group" style="margin-left: 300px;">
<label ><h6>Password :</h6> </label>
<input type="password" class="" name="password" style="margin-left: 68px;border-radius:15px;width:350px" value="<?php echo $row['password'];?>">

</div>
<div class="form-group" style="margin-left: 300px;">
<label ><h6>Your Picture :</h6> </label>
<input type="file" class="" name="Image" style="margin-left: 68px;width:350px" value="<?php echo $row['Image'];?>">

</div>
<div class="form-group" style="margin-left: 300px;">
<h6 >Biography :</h6> 
<textarea style="margin-left: 150px;border-radius:20px;width:350px;height:100px;transform: translateY(-25px);resize:none" name="biography"><?php echo $row['biography'];?></textarea>
</div>
<center><input type="submit" class="btn btn-primary " style="width: 250px;border-radius:20px" name="submit" ></center>

</form>
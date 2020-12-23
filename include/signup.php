<?php
ob_start();
include "../admin/Classes/dp.php";
include "../admin/Classes/users.php";
 
if (isset($_POST['submit'])){
    $isAdmin = '';
    $image = '';
    $biography ='';
    $writer = '';
    if(empty($_POST['name'])){
        echo "<div class='alert-danger'> Your name is required! </div>";
      }
        else if (empty($_POST['email'])){
        echo " <div class='alert-danger'> Your Email is required! </div>";
      }
        else if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
        echo " <div class='alert-danger'>Your Email is invalid </div>";
      }
        else if (empty($_POST['username'])){
        
        echo " <div class='alert-danger'>Your Username is required! </div>";
        }
        else if (empty($_POST['password'])){
        echo "<div class='alert-danger'>Your password is required! </div>";
        }
        else if ($_POST['password']!=$_POST['re_password']){
        echo " <div class='alert-danger'>Your password not matched with confirm password! </div>";
      }else{
      $signup = new users();
      $name = $_POST['name'];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $gender = $_POST['gender'];
      $password = $_POST['password'];
      $signup->signup($name,$email,$username,$gender,$password,$image,$biography,$isAdmin,$writer);
      }
    }
?>
<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style2.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <form action="" method="post">
                    <center><h3 style="color: red;text-shadow: 1px 1px #B22222;  font-family: Times New Roman, Times, serif;">Registration </h3></center><br>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="mail" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="radio" name="gender" value="M" checked /> Male <br>
                        <input type="radio" name="gender" value="F" checked /> Female 

                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" name="re_password" class="form-control" placeholder="Confirm Password">
                    </div>
                    <input type="submit" class="btn btn-primary" name="submit" value="Signup" style="color: wheat; transform:translate(130px);border-radius: 15p0x;margin:0 10px;padding:7px 10px">

                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
<?php 
ob_start();
include "../admin/Classes/dp.php";
include "../admin/Classes/users.php";

if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = new users();
    $login->login($username,$password);
    
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
    <style>
        body{
    background-image: url("../img/edusite5.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}
.col-sm-offset-4{
    transform: translate(400px);
    margin-top: 90px;
}
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <form action="" method="post">
                    <center><h3 style="color: red;text-shadow: 1px 1px #B22222;  font-family: Times New Roman, Times, serif;">Sign in </h3></center><br>
                    
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="username"><br>
                    </div>
                    
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">  
                    <input type="submit" class="btn btn-primary" value="Login" name="submit" style="color: wheat; transform:translate(155px);  border-radius: 15px;margin:0 10px;padding:7px 10px" >
                    </div>
                 <div class="form-group">
                 <label>you don't have any account ? <a href="signup.php" class="btn btn-success" style=" border-radius: 15px;margin:4px 10px;padding:7px 7px">Sign up </a> </label>
                 </div>
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
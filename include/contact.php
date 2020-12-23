<?php include "../admin/Classes/dp.php";
include "../admin/Classes/contact.php";?>
<?php 
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
?>
<!doctype html>
<html lang="en">
  <head>
    <title>contact</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script type="text/javascript" src="js/jquery-3.5.1.min"></script>
<script>function sendmail(){
<?php
$msg='';
if (isset($_POST['send'])){
    if (empty($_POST['name']))
    echo "<div class='alert alert-danger '>Please, Write Your Name </div>";
    else if (empty($_POST['email']))
        echo "<div class='alert alert-danger '>Please, Write Your Email </div>";
    else if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
      echo "<div class='alert alert-danger '>Your Email is invalid </div>";
    else if (empty($_POST['subject']))
        echo "<div class='alert alert-danger '>Please, Write Your Subject </div>";
    else if (empty($_POST['message']))
        echo "<div class='alert alert-danger '>Please, Write Your Message </div>";
    else {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        require_once "vendor/autoload.php";
        $mail = new PHPMailer();
        $mail->IsSMTP(); // send via SMTP
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = 2;
        $mail->Host = 'ssl://smtp.gmail.com';
        $mail->Username = 'haithamhefzy9@gmail.com';
        $mail->Password = '1111222233334444';
        $mail->Port = 465; // 465 for ssl
        $mail->setFrom($email,$name);
        $mail->addAddress('haithamhefzy9@gmail.com','Haitham');
        
        //----------------subject mail-------------------//
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body =$message;
        $mail->AltBody = "This is the body when user views in plain text format"; //Text Body
        //$mail->addAttachment('man.jpg','Attachment');
        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } 
        $send_message = new contact();
        $send_message->insert_message($name,$email,$subject,$message);
        $msg = "<div class='alert alert-success'>The Message Sent Successfully</div>";
    }
    
}
?>
}


 </script>
        <style>
            body{
    background-image: url("../img/edusite5.jpg");
    background-repeat: no-repeat;
    background-size: cover;
}

        </style>
</head>
<body>
  <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4" style="transform: translate(400px);margin-top:50px">
          <h5 style="text-align: center;">  <?php echo $msg;?></h5>
                <form action="" method="post">
                    <center><h3 style="color: red;text-shadow: 1px 1px #B22222;  font-family: Times New Roman, Times, serif;">Contact us </h3></center><br>
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="mail" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" name="subject" class="form-control" placeholder="Subject">
                    </div>
                 
                 <div class="form-group">
                     <textarea placeholder="Message" name="message" style="width: 350px;height:100px"></textarea>
                 </div>
                    <input type="submit" class="btn btn-primary" onclick="sendmail" name="send" value="Send" style="color: wheat; transform:translate(130px);border-radius: 15px;margin:0 10px;padding:7px 10px">

                </form>
            </div>
        </div>
    </div>
 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
include "../admin/Classes/dp.php";
include "../admin/Classes/comment.php";
?>
<?php



$comment = new comment();

  $username = $_POST['user_id'];
  $rows = $comment->fetch_user($username);
  
 $res = $comment->comment_ajax($_POST['comm'],$rows['id'],$_POST['article_id']);
 
 echo json_encode($comment->fetch_comment((int)$res));
?>
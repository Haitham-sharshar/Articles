<?php 
include "../admin/Classes/dp.php";
include "../admin/Classes/comments_event.php";
?>
<?php

$comment = new commnets_event();

  $username = $_POST['user_id'];
  $rows = $comment->fetch_user($username);
  
 $res = $comment->comments_ajax($_POST['comm'],$rows['id'],$_POST['events_id']);
 
 echo json_encode($comment->fetch_comments((int)$res));
?>
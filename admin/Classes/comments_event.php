<?php 
class commnets_event extends DB{
public function comments_count($id){
 $sql = "SELECT COUNT(comment) AS Num , event_comments.event_id , event_comments.user_id FROM event_comments INNER JOIN events on event_comments.event_id = events.id where events.id = '$id'";
 $result = $this->connect()->prepare($sql);
 $result->execute(array($id));
 $roow = $result->fetch();
 return $roow;
}
public function fetch_comment($id){
    $sql = "SELECT event_comments.comment ,event_comments.created_date,event_comments.user_id,event_comments.event_id, users.username,users.name,users.Image  FROM event_comments INNER JOIN users on event_comments.user_id = users.id INNER JOIN events on event_comments.event_id = events.id WHERE events.id = '$id'";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($id));
    if ($result->rowCount()>0){
        while ($rowww = $result->fetch()){
           $data [] = $rowww ;   
        } return $data; 
     }
}
public function fetch_comments($id){
   $sql = "SELECT event_comments.id, event_comments.comment ,event_comments.create_date , event_comments.user_id, users.name ,users.username, users.id,users.Image FROM event_comments INNER JOIN users WHERE users.id = event_comments.user_id AND event_comments.id = :id";
   $result = $this->connect()->prepare($sql);
   $result->execute(['id' => $id]);
   $row = $result->fetch();
   return $row;
  
 }
public function comments_ajax($comment,$user_id,$events_id){

   $conn = new PDO('mysql:dbname=articles;host=127.0.0.1', 'root', '');
   $sth = $conn->query('INSERT INTO event_comments (comment,user_id,event_id) VALUES (:comment,:user_id,:events_id)');
   $sth->execute([':comment' => $comment , ':user_id' =>$user_id, ':event_id'=> $events_id]);
   return $conn->lastInsertId();
 }
 public function fetch_user($username){
   $sql = "  SELECT * FROM  users WHERE username = ? ";
   $result = $this->connect()->prepare($sql);
   $result->execute(array($username));
   $row = $result->fetch();
   return $row;
 }
}
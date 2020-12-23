<?php
class not_attend extends DB{
    public function insert_not_attend($user_id,$id){
        $sql = "INSERT INTO not_attend_event (user_id,event_id)VALUES(?,?)";
        $result = $this->connect()->prepare($sql);
        $result->execute(array($user_id,$id));
    }
 public function not_attend_num($id){
    $sql =" SELECT COUNT(not_attend_event.user_id) AS NuM FROM not_attend_event  INNER JOIN events on not_attend_event.event_id = events.id WHERE not_attend_event.event_id = '$id'";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($id));
   $rroo = $result->fetch();
   return $rroo; 
 }
}
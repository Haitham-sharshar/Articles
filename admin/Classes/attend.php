<?php 
class attend extends DB{
    public function insert_attend($user_id,$id){
        $sql = "INSERT INTO attend_event (user_id,event_id)VALUES(?,?)";
        $result = $this->connect()->prepare($sql);
        $result->execute(array($user_id,$id));
    }
    public function attend_num($id){
       $sql =" SELECT COUNT(attend_event.user_id) AS NUM FROM attend_event INNER JOIN events on attend_event.event_id = events.id WHERE attend_event.event_id = '$id'";
       $result = $this->connect()->prepare($sql);
       $result->execute(array($id));
      $rro = $result->fetch();
      return $rro; 
    }
}
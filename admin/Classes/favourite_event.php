<?php 
class favourite_event extends DB{
    public function add_favourite($user_id,$id){
        $sql = "INSERT INTO favourite_event(user_id,event_id)VALUES(?,?)";
        $result = $this->connect()->prepare($sql);
        $result->execute(array($user_id,$id));
    }
    public function favourite_event_num($id){
    $sql = "SELECT COUNT(favourite_event.user_id) as num from favourite_event INNER JOIN events on favourite_event.event_id = events.id WHERE favourite_event.event_id ='$id' ";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($id));
    $rooow = $result->fetch();
    return $rooow;
}
public function fetch_users($username){
    $sql = "  SELECT * FROM  users WHERE username = ? ";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($username));
    $row = $result->fetch();
    return $row;
}
public function fetch_favourite_event($user_id){
    $sql = "SELECT events.title , users.id, favourite_event.event_id,events.id as Id ,favourite_event.user_id FROM favourite_event INNER JOIN events on favourite_event.event_id = events.id INNER JOIN users on favourite_event.user_id = users.id WHERE users.id = '$user_id' limit 5";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($user_id));
    if ($result->rowCount()>0){
        while ($rowss = $result->fetch()){
            $data [] = $rowss;
        }return $data;
    }
}
public function delete_fav_ev($fav_ev_id,$user_id){
    $sql = "DELETE FROM favourite_event WHERE event_id = '$fav_ev_id' and user_id = '$user_id'";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($fav_ev_id,$user_id));
}
}
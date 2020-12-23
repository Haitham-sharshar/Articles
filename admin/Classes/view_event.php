<?php 
class view extends DB{
    public function insert_view($user_id,$id){
        $sql = "INSERT INTO view_event(user_id,event_id) VALUES(?,?)";
        $result = $this->connect()->prepare($sql);
        $result->execute(array($user_id,$id));
    }
    public function view_num($aid){
        $sql = "SELECT COUNT(view_event.user_id)as NUm from view_event INNER JOIN events on view_event.event_id = events.id WHERE view_event.event_id = '$aid'";
        $result = $this->connect()->prepare($sql);
        $result->execute(array($aid));
        $rowe = $result->fetch();
        return $rowe;
    }
}
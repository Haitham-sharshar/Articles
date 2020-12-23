<?php 
class event extends DB {
    public function add_event($topic_id,$user_id,$title,$desc,$place,$event_date,$img){
        $sql = "INSERT INTO events(topic_id,user_id,title,description,place,event_date,image) VALUES (?,?,?,?,?,?,?)";
        $result = $this->connect()->prepare($sql);
        $result->execute(array($topic_id,$user_id,$title,$desc,$place,$event_date,$img));
    }
    
    public function fetch_user($username){
        $sql = "  SELECT * FROM  users WHERE username = ? ";
        $result = $this->connect()->prepare($sql);
        $result->execute(array($username));
        $row = $result->fetch();
        return $row;
      }
      public function fetch_topic(){
        $sql = "SELECT * FROM topic";
        $result=$this->connect()->query($sql);
        $result->execute();
        if ($result->rowCount()>0){
            while ($rows = $result->fetch()){
                $data [] = $rows;
            }return $data;
        }
    }
    public function fetch_event_info(){
        $sql = "SELECT events.description ,events.id ,events.title,events.place,events.event_date ,events.image ,users.name,users.Image ,users.username , topic.Name FROM events INNER JOIN users on events.user_id = users.id INNER JOIN topic on events.topic_id = topic.id ";
        $result = $this->connect()->prepare($sql);
        $result->execute();
        if($result->rowCount()>0){
            while($row = $result->fetch()){
                $data []= $row;
            }return $data;
        }
    }
    public function fetch_single_event($id){
        $sql ="SELECT events.image , events.description,events.title ,events.id,events.event_date ,events.place , users.name ,users.username, users.Image, topic.Name  FROM events INNER JOIN users on users.id = events.user_id INNER JOIN topic on topic.id = events.topic_id WHERE events.id = '$id'"; 
        $result = $this->connect()->prepare($sql);
        $result->execute(array($id));
        $rows = $result->fetch();
        return $rows;
    }
}
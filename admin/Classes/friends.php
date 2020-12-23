<?php 
class friends extends DB {
    public function add_friends($user_id,$friend_id){
        $sql = "INSERT INTO friends (user_id,friend_id) VALUES (?,?)";
        $result = $this->connect()->prepare($sql);
        $result->execute(array($user_id,$friend_id));
    }
    public function fetch_friends($user_id){
        $sql = "SELECT friends.friend_id  , users.username , users.name , friends.user_id  FROM friends INNER JOIN users on friends.friend_id = users.id WHERE friends.user_id = '$user_id'";
       $result = $this->connect()->prepare($sql);
       $result->execute(array($user_id));
       if ($result->rowCount()>0){
           while($rows = $result->fetch()){
            $data [] = $rows;           
           }return $data;
        }
    }
    public function delete_friend($fr_id,$user_id){
        $sql = "DELETE FROM friends WHERE friend_id = ? and user_id = ? " ;
        $result = $this->connect()->prepare($sql);
        $result->execute(array($fr_id,$user_id));
    }
    
   
}
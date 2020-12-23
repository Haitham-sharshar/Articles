<?php 
class article extends DB {

    public function add_article($topic,$user_id,$title,$description,$image){
        $sql = "INSERT INTO article(topic_id,user_id,title,description,image) VALUES (?,?,?,?,?)";
        $result = $this->connect()->prepare($sql);
        $result->execute(array($topic,$user_id,$title,$description,$image));
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

    public function fetch_user($username){
      $sql = "  SELECT * FROM  users WHERE username = ? ";
      $result = $this->connect()->prepare($sql);
      $result->execute(array($username));
      $row = $result->fetch();
      return $row;
    }

    
    public function fetch_article_info (){
        $sql ="SELECT article.image , article.description,article.title ,article.id,article.date,users.name ,users.username, users.Image, topic.Name, topic.type from article INNER JOIN users on users.id = article.user_id INNER JOIN topic on topic.id = article.topic_id
        ";
        $result = $this->connect()->prepare($sql);
        $result->execute();
        if ($result->rowCount()>0){
            while ($rows = $result->fetch()){
                $data[] = $rows;
            }return $data;
        }
}
public function delete_article($id){
$sql = "DELETE FROM article WHERE id = '$id'";
$result = $this->connect()->prepare($sql);
$result->execute(array($id));
}

public function fetch_myarticle_info ($user_id){
    $sql ="SELECT article.image , article.description,article.id, article.date,users.name ,article.title , users.Image, topic.Name, topic.type from article INNER JOIN users on users.id = article.user_id INNER JOIN topic on topic.id = article.topic_id WHERE article.user_id = '$user_id'";
     $result = $this->connect()->prepare($sql);
    $result->execute(array($user_id));
    if ($result->rowCount()>0){
        while ($rows = $result->fetch()){
            $data[] = $rows;
        }return $data;
    }

}
public function delete ($dd,$did){
    $sql  ="DELETE FROM article WHERE user_id = '$dd' and id = '$did'";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($dd,$did));
   
}
public function select_article($dd){
    $sql = "SELECT id FROM article WHERE user_id = ? ";
    $result= $this->connect()->prepare($sql);
    $result->execute(array($dd));
    $rows = $result->fetch();
    return $rows;
}
public function update_article($topic_id,$title,$desc,$img,$uid){
   $sql = "UPDATE article SET topic_id = '$topic_id' , title = '$title' , description = '$desc' , image = '$img' WHERE id = '$uid' ";
   $result = $this->connect()->prepare($sql);
   $result->execute(array($topic_id,$title,$desc,$img,$uid));
   header("Refresh:1; url=my_articles.php");

}
public function  select_article_once($uid){
    $sql = "SELECT article.image ,article.title, article.topic_id , article.id ,article.description, topic.Name , topic.type FROM article INNER JOIN topic on article.topic_id = topic.id WHERE article.id = $uid";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($uid));
    $rows = $result->fetch();
    return $rows; 
}


/*
public function delete2(){
$sql = "SELECT users.id , article.id , article.title from article INNER JOIN users on users.id = article.user_id WHERE users.id = article.user_id";
$result = $this->connect()->prepare($sql);
$result->execute();
$rows = $result->fetch();
return $rows;
}
*/
public function fetch_friends_articles ($friend_id){
    $sql ="SELECT article.image , article.description,article.id, article.date,users.name ,article.title , users.Image, topic.Name, topic.type from article INNER JOIN users on users.id = article.user_id INNER JOIN topic on topic.id = article.topic_id WHERE article.user_id = '$friend_id'";
     $result = $this->connect()->prepare($sql);
    $result->execute(array($friend_id));
    if ($result->rowCount()>0){
        while ($rows = $result->fetch()){
            $data[] = $rows;
        }return $data;
    }
}
public function search ($data){
    $sql ="SELECT article.image , article.description,article.title ,article.id,article.date,users.name ,users.username, users.Image, topic.Name, topic.type from article INNER JOIN users on users.id = article.user_id INNER JOIN topic on topic.id = article.topic_id  WHERE article.title Like '%" .$data. "%' ORDER by article.id desc";
    $result = $this->connect()->query($sql);
    
    if ($result->rowCount()>0){
        while ($row = $result->fetch()){
            $dataa[] = $row;

        }
        return $dataa;
    }
}
public function fetch_articles_info ($id){
    $sql ="SELECT article.image , article.description,article.title ,article.id,article.date,users.name ,users.username, users.Image, topic.Name, topic.type from article INNER JOIN users on users.id = article.user_id INNER JOIN topic on topic.id = article.topic_id WHERE article.id = '$id'";
    
    $result = $this->connect()->prepare($sql);
    $result->execute(array($id));
    $rows = $result->fetch();
    return $rows;
}

}
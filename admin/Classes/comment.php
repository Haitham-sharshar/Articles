<?php 
class comment extends DB {
    public function fetch_single_post($id){
        $sql = "SELECT comments.comment ,article.topic_id,comments.create_date, article.description , article.title ,article.image , article.date , users.name ,users.Image FROM comments INNER JOIN article on comments.articles_id = article.id INNER JOIN users on comments.user_id = users.id WHERE article.id = ?";
        $result = $this->connect()->prepare($sql);
        $result->execute(array($id)); 
      $row = $result->fetch();      
       return $row;      
        } 
        public function fetch_topic_name($id){
          $sql = "  SELECT topic.Name , topic.type from topic inner JOIN article on topic.id = article.topic_id where article.id = ?";
          $result = $this->connect()->prepare($sql);
          $result->execute(array($id));
          $rows = $result->fetch();  
          return $rows;  
        }
    
    public function fetch_comments($id){
      $sql = "SELECT comments.comment ,comments.create_date , comments.user_id as us_id, article.user_id , users.name ,users.username, users.id,users.Image FROM comments INNER JOIN article on comments.articles_id = article.id INNER JOIN users on comments.user_id = users.id WHERE article.id = ?";
      $result = $this->connect()->prepare($sql);
      $result->execute(array($id)); 
      if ($result->rowCount()>0){
         while ($roww = $result->fetch()){
            $data [] = $roww ;   
         } return $data; 
      }
    }
    public function fetch_comment($id){
      $sql = "SELECT comments.id, comments.comment ,comments.create_date , comments.user_id, users.name ,users.username, users.id,users.Image FROM comments INNER JOIN users WHERE users.id = comments.user_id AND comments.id = :id";
      $result = $this->connect()->prepare($sql);
      $result->execute(['id' => $id]);
      $row = $result->fetch();
      return $row;
     
    }
    
    public function comment_num($aid){
    $sql = "  SELECT COUNT(COMMENT) AS Num , article.id , articles_id FROM comments INNER JOIN article on comments.articles_id = article.id where article.id = '$aid'";
     $result = $this->connect()->prepare($sql);
     $result->execute(array($aid));
     $roow = $result->fetch();
     return$roow;
    }
    public function comment_ajax($comment,$user_id,$articles_id){

      $conn = new PDO('mysql:dbname=articles;host=127.0.0.1', 'root', '');
      $sth = $conn->prepare('INSERT INTO comments (comment,user_id,articles_id) VALUES (:comment,:user_id,:articles_id)');
      $sth->execute([':comment' => $comment , ':user_id' =>$user_id, ':articles_id'=> $articles_id]);
      return $conn->lastInsertId();
    
    }
    /*
   public function user_comment($username){
     $sql = "SELECT * FROM users WHERE username = ? ";
     $result = $this->connect()->prepare($sql);
     $result->execute(array($username));
     $rowa = $result->fetch();
     return $rowa;

   }
   public function fetch_comments_user($username){
    $sql = "SELECT comments.user_id ,users.name, users.username , users.id FROM comments INNER JOIN users on comments.user_id = users.id WHERE users.name = ?  ";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($username)); 
   $rowe = $result->fetch();
    
    return $rowe;
   }
   */
  
  public function fetch_user($username){
    $sql = "  SELECT * FROM  users WHERE username = ? ";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($username));
    $row = $result->fetch();
    return $row;
  }
  
}
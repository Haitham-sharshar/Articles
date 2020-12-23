<?php 
class favourite extends DB {
   public function insert_favourite($articleId , $userId ){
       $sql = "INSERT INTO favorite (article_id,user_id) VALUES (?,?)";
       $result = $this->connect()->prepare($sql);
       $result->execute(array($articleId,$userId));

   }
   public function fetch_favourite($user_id){
       $sql = "SELECT article.title , users.id, favorite.article_id,article.id as Id ,favorite.user_id FROM favorite INNER JOIN article on favorite.article_id = article.id INNER JOIN users on favorite.user_id = users.id WHERE users.id = '$user_id' limit 5";
     $result = $this->connect()->prepare($sql);
     $result->execute(array($user_id));
     if ($result->rowCount()>0){
         while ($rows = $result->fetch()){
             $data [] = $rows;
         }return $data;
     }
   }
   public function fetch_users($username){
    $sql = "  SELECT * FROM  users WHERE username = ? ";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($username));
    $row = $result->fetch();
    return $row;
  }
  public function favourite_num($aid){
      $sql = "SELECT COUNT(favorite.user_id)as num from favorite INNER JOIN article on favorite.article_id = article.id WHERE favorite.article_id = '$aid'";
      $result = $this->connect()->prepare($sql);
      $result->execute(array($aid));
      $ro = $result->fetch();
      return $ro;
  }
  public function delete_fav($favid,$user_id){
      $sql = "DELETE FROM favorite WHERE article_id = '$favid' and user_id = '$user_id'";
      $result = $this->connect()->prepare($sql);
      $result->execute(array($favid,$user_id));
  }
}
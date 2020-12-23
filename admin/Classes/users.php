<?php 

class users extends DB{
    public function signup($name,$email,$username,$gender,$password,$image,$biography,$isAdmin,$writer){
        $sql = "SELECT Count(username) AS Num FROM users WHERE username = ? ";
        $result = $this->connect()->prepare($sql);
        $result->execute(array($username));
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if ($row['Num'] >0 ){
            echo "<div class='alert-danger'> username is exists</div>";

        }else {
            $sql = "INSERT INTO users(name,email,username,gender,password,image,biography,isAdmin,writer) VALUES (?,?,?,?,?,?,?,?,?)";
            $result = $this->connect()->prepare($sql);
            $result->execute(array($name,$email,$username,$gender,$password,$image,$biography,$isAdmin,$writer));
            header("location:login.php");

        }
    }
    public function login($username,$password){
    $sql = "SELECT  * FROM users WHERE username = ? AND password = ? ";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($username,$password));
    if ($result->rowCount()==1){
        $row=$result->fetch();
        session_start();
        $_SESSION['username']=$username;
        if ($row['isAdmin']=="")
        header("location:../index.php");
        else
        header("location:../admin/dashboard.php");
    }else{
        echo "<div class='alert-danger'> Your Username or Password is invalid!</div>";

    }
}

public function fetch_users ($user_name){
    $sql ="SELECT * FROM users WHERE username = ?";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($user_name));
    $row = $result->fetch(PDO::FETCH_ASSOC);
    return $row;
}
public function update ($name,$email,$username,$password,$image,$biography,$user_name){
    $sql = "UPDATE users SET name = ? , email = ? , username = ? , password = ? , Image = ? , biography = ? WHERE username = ?";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($name,$email,$username,$password,$image,$biography,$user_name));
}
public function Select_users(){
  $sql = "SELECT * FROM users";
  $result = $this->connect()->prepare($sql);
  $result->execute();
  if ($result->rowCount()>0){
      while ($row = $result->fetch()){
          $data [] = $row;
      }return $data;
  }
}
public function delete_users($id){
    $sql = "DELETE FROM users WHERE id = '$id'";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($id));
}

public function fetch_user ($username){
    $sql ="SELECT * FROM users WHERE username = ?";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($username));
    $roww = $result->fetch();
    return $roww;
}
}
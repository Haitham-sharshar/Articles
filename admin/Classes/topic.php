<?php 
class topic extends DB{
    public function Select_topic(){
        $sql = "SELECT COUNT(Name) as num FROM topic";
        $result=$this->connect()->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        if ($row['num']>0){        
        $sql = "SELECT * FROM topic ";
        $result=$this->connect()->prepare($sql);
        $result->execute();
        if ($result->rowCount()>0){
            while ($rows = $result->fetch()){
                $data [] = $rows;
            }return $data;
        }
    }
}
public function Add_Topic($name,$type){
    $sql = "INSERT INTO topic (Name,type)Values (?,?)";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($name,$type));
}
public function delete_topic($id){
    $sql = "DELETE FROM topic WHERE id = '$id'";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($id));
}
public function update_topic($Name,$Type,$uid){
    $sql = "UPDATE topic SET Name = '$Name' , type = '$Type' WHERE id = '$uid' ";
    $result = $this->connect()->prepare($sql);
    $result->execute(array($Name,$Type,$uid));
}
public function select_topic_edit($uid){
    $sql = "SELECT * FROM topic WHERE id = '$uid'";
    $result = $this->connect()->prepare($sql);
     $result->execute(array($uid));
     $row = $result->fetch();
    return $row;

    
}
}
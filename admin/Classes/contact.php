<?php 
class contact extends DB {
    public function insert_message($name,$email,$subject,$message){
        $sql ="INSERT INTO contact (name,email,subject,message)VALUES (?,?,?,?)";
        $result = $this->connect()->prepare($sql);
        $result->execute(array($name,$email,$subject,$message));
    }
   public function fetch_contact(){
       $sql="SELECT * FROM contact ";
       $result= $this->connect()->prepare($sql);
       $result->execute();
       if ($result->rowCount()>0){
           while($row = $result->fetch()){
               $data[] = $row;
           }return $data;
       }
   }
   public function delete_contact($id){
       $sql= "DELETE FROM contact WHERE id ='$id' ";
       $result= $this->connect()->prepare($sql);
       $result->execute();
   }
}
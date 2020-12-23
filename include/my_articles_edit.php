<?php ob_start();?>
<?php include "../header.php";?>
<?php 
  if (isset($_POST['submit'])){
    $uid = $_GET['uid'];

    $topic_id = $_POST['topic'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $img = rand(0,1000).'_'.$image_name;
    move_uploaded_file($image_tmp,"uplodaimage\\".$img);
 
    $update = new article();
    $update->update_article($topic_id,$title,$desc,$img,$uid);
    echo "<div class='alert alert-success'>The Article Updates Sucessfully</div>";

}
     
?>

<form  method="POST"  enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label"
                                            style="margin-right: 300px;">Section:
                                            <select name="topic">
                                            <?php 
              $topic = new article();
              $rows = $topic->fetch_topic();
              foreach ($rows as $row){
                ?>
                                                <option value="<?php echo $row['id'];?>"><?php echo $row['Name'];?>
                                                </option>
                                                <?php 
            }
            ?>
                                            </select>
            
                                        </label>

                                    </div>
                <?php 
                $select_once = new article();
                $uid = $_GET['uid'];
               $rows = $select_once->select_article_once($uid);
?>
                                   <div class="form-group">
                                        <input class="form-control"  type="text" name="title" value="<?php echo $rows['title'];?>">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="message-text" placeholder="Description"
                                            style="height: 150px;" name="desc"><?php echo $rows['description'];?> </textarea>
                                    </div>
                                    <div class="form-group">
                                            <input type="file" name="image" value="<?php echo $rows['image'];?>">
                                          
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                       
                                        <input type="submit" class="btn btn-primary" value="Save" name="submit" style="padding: 10px 20px;border-radius:15px">
                                    </div>
                                </form>
                            </div>



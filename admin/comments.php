<?php include "header.php";?>

<div class="container">
  <div class="row">
    <div class="col-sm-2" style="border-right: 1px solid black;">
     <div style="margin-top: 20px;">
    <a href="topic.php" style="color: black;text-decoration:none"> <h5 > <i class="fas fa-paperclip"></i> Topics</h5></a>
    </div>
     <div style="margin-top: 30px;">
    <a href="article.php"style="color: black;text-decoration:none"> <h5 > <i class="fas fa-book-open"></i> Articles</h5></a>
    </div>
    <div style="margin-top: 30px;">
    <a href="comments.php"style="color: black;text-decoration:none"> <h5 > <i class="far fa-comment"></i> Comments</h5></a>
    </div>
    <div style="margin-top: 30px;">
    <a href="contact.php"style="color: black;text-decoration:none"> <h5 > <i class="fas fa-file-signature"></i> Contact</h5></a>
    </div>
    <div style="margin-top: 30px;">
    <a href="users.php"style="color: black;text-decoration:none"> <h5 > <i class="fas fa-users"></i> Users</h5></a>
    </div>
    <div style="margin-top: 30px;">
    <a href="writers.php"style="color: black;text-decoration:none"> <h5 > <i class="fas fa-male"></i> Writers</h5></a>
    </div>
</div>
    <div class="col-sm-10">
    <table class="table table-dark" style="margin-top: 20px;">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Comment</th>
      <th scope="col">Name</th>
      <th scope="col">Image</th>      
      <th scope="col">Date</th>
      <th scope="col">Delete</th>
      

    </tr>
  </thead>
  <tbody>
    <tr>
      
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><input type="submit" value="Delete" class="btn btn-danger"></td>
    </tr>
   
  </tbody>
</table>
    </div>
  </div>
</div>







<?php include "footer.php";?>
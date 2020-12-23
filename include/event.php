<style type="text/css">
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
      height: 200px;
    }


  </style>
<?php
include "../header.php"; 
if (isset($_SESSION['username'])){
if (isset($_POST['attend'])){
  $id = $_GET['id'];
  $username = $_SESSION['username'] ;
  $user = new users();
$rooo = $user->fetch_user($username);
$user_id = $rooo['id'];
$attend = new attend();
$attend->insert_attend($user_id,$id);
}
}
if (isset($_SESSION['username'])){
    if (isset($_POST['not_attend'])){
      $id = $_GET['id'];
      $username = $_SESSION['username'] ;
      $user = new users();
    $rooo = $user->fetch_user($username);
    $user_id = $rooo['id'];
    $not_attend = new not_attend();
    $not_attend->insert_not_attend($user_id,$id);
    }
    }
    if (isset($_SESSION['username'])){
        if (isset($_POST['favourite'])){
          $id = $_GET['id'];
          $username = $_SESSION['username'] ;
          $user = new users();
        $rooo = $user->fetch_user($username);
        $user_id = $rooo['id'];
        $fav = new favourite_event();
        $fav->add_favourite($user_id,$id);
        }
        }
    if (isset($_SESSION['username'])){
    if (isset($_GET['id'])){
      $id = $_GET['id'];
      $username = $_SESSION['username'] ;
      $user = new users();
    $rooo = $user->fetch_user($username);
    $user_id = $rooo['id'];
    $view = new view();
    $view->insert_view($user_id,$id);
    }
  }
?>

<div class="container">
  <div class="row">
    <div class="col-sm-1" style="border-right: 1px solid black;">
        <div class="all">
        <i class="fas fa-bars" style="margin-top: 10px;margin-left:15px;"></i>
        </div>
        
    <div class="img" style="margin-top:30px;">
    <?php 
        if (isset($_SESSION['username'])){ 
          $username = $_SESSION['username'] ;
          $user_img = new users();
        $roww = $user_img->fetch_user($username);
        
        ?>
        <img src="uplodaimage/<?php echo $roww['Image'];?>" width="38px" height="37px">
        <?php
        }
        ?>
    </div>
    <div class="add" style="margin-top:30px;margin-left:10px">
    <i class="fas fa-plus-square"></i>
    </div>
    <div class="bell" style="margin-top:30px;margin-left:10px">
    <i class="fas fa-bell"></i>
    </div>
    <div class="message" style="margin-top:30px;margin-left:10px">
    <i class="fas fa-envelope"></i>
    </div>
    <div class="search" style="margin-top:30px;margin-left:10px">
    <i class="fas fa-search"></i>
    </div>
    </div>
    <div class="col-sm-9">
    <div class="event" style="transform: translate(45px)">
          <?php $single_event = new event();
          $id = $_GET['id'];
          $rows = $single_event->fetch_single_event($id); 
 ?>
          <div class="img" style="transform: translate(20px);">
         <a href=""> <img src="uplodaimage/<?php echo $rows['image'];?>" width="700px" height="300px">  </a> 
         <div class="conten" style="background: rgba(0,0,0,0.4);color:white;width:700px ">
         <h7> <img src="uplodaimage/<?php echo $rows['Image'];?>" width="65px" height="55px" style="border-radius: 50px;opacity: 0.5">
       By <?php echo $rows['username'];?> - <?php echo $rows['event_date'];?> <i class="far fa-clock"></i></h7>
   
         </div>
          </div>  
   
          <div class="comment" style="transform: translate(20px);margin-right:85px;width:700px; padding:0px 30px;">
          <?php 
          $view_num = new view();
          $aid = $rows['id'];
       $rowe =   $view_num->view_num($aid);
       ?>
          <h7 style="margin-right: 10px;"> <i class="fas fa-eye"></i> <?php echo $rowe['NUm'];?></h7>
          <?php $comments_num = new commnets_event();
       $id = $rows['id'];
     $roow =  $comments_num ->comments_count($id);
?>
             <h7 style="margin-right: 15px;margin-left:5px;"><i class="far fa-comment"></i> <?php echo $roow['Num'];?></h7>
      
             <?php 
             $favourite_event_num = new favourite_event();
             $id = $rows['id'];
         $rooow =  $favourite_event_num->favourite_event_num($id);
             ?>
    <h7 style="margin-right: 100px;"> <i class="fas fa-heart"></i> <?php echo $rooow['num'];?></h7>
    <form method="post" style="transform: translatey(-22px) translate(200px);">
       <input type="submit" value="Attend" class="btn btn-success" style="padding:6px 8px ; border-radius:12px;margin-right:10px;margin-top:5px" name="attend">
       <input type="submit" value="Not-Attend" class="btn btn-dark" style="padding:5px 5px ; border-radius:15px;margin-top:5px;margin-right:5px" name="not_attend">
      
       <button type="submit" name="favourite" style="padding: 2px 5px;margin:4px 4px 0px 2px;transform: translatey(5px);background-color:#FF7F50;color:white" name="favourite"><i class="far fa-star"></i></button>
       
       <button class="btn btn-danger" style=" transform: translatey(-25px) translate(100px); padding:3px 20px;"><?php echo $rows['Name'];?></button>
       </form>
          </div> 
          <div class="place" style="transform: translate(85px);width:520px;background-color:#D3D3D3;margin-top:10px">
              <h7 style="margin-left:5px;padding:10px 40px"><?php echo $rows['event_date'];?> </h7> | <h7 style="margin-right: 0px;padding: 10px 55px"><?php echo $rows['title'];?></h7> | <h7 style="margin-right: 0px;padding: 10px 55px"><?php echo $rows['place'];?> <i class="fas fa-map-marker-alt"></i></h7>
   
          </div>
          <div class="disc" style="margin-top:10px;background-color:#FDF5E6;margin-left:90px;margin-right:35px;width:510px">
             
           <p  style="font-size:17px;word-wrap: break-word;"><?php echo $rows['description'];?></p>
        </div>
        <div class="place" style="transform: translate(85px);width:520px;background-color:#D3D3D3">
        <?php 
     $attend_num = new attend();
     $id = $rows['id'];
     $rro = $attend_num->attend_num($id);
     ?>
     <?php $not_attend_num = new not_attend();
       $id = $rows['id'];
       $rroo = $not_attend_num->not_attend_num($id);
       ?>

           <h7 style="margin-left:5px;padding:3px 40px;">Attend </h7>| <h7 style="margin-left:5px;padding:3px 25px;color:red"> <?php echo $rro['NUM'];?> </h7>  <h7 style="margin-left:5px;padding:3px 40px;">Not Attend </h7>| <h7 style="margin-left:5px;padding:3px 25px;color:red"> <?php echo $rroo['NuM'];?></h7>
       

    <script>
      (function(exports) {
        "use strict";
       var marker;
       var infowindow;
      //  var markers = [

      //     {
      //        position : {lat:31.205753 , lng:29.924526},
      //        title : "Alex",
      //        info: "THis is alex"

      //     },
      //     {
      //        position : {lat:27.91582 , lng:34.32995},
      //        title : "Sharm el-Sheikh",
      //        info: "THis is sharm"
      //     },
      //     {
      //        position : {lat: 30.033333 , lng:31.233334},
      //        title : "Cairo, Egypt",
      //        info: "THis is cairo"
      //     }

      //  ]
        function initMap() {
          exports.map = new google.maps.Map(document.getElementById("map"), {
            center: {
              lat: 30.033333,
              lng: 31.233334
            },
            zoom: 4
          });
          
         marker = new google.maps.Marker({
    position: {
              lat: 30.033333,
              lng: 31.233334
            },
    map: map,
    title: 'Cairo, Egypt',
    map:map,
  });
  infowindow =  new google.maps.InfoWindow({
    content: "<h4>This is nice City</h4>"
  });
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });
  // markers.forEach(function(loc){
  //   var marker = new google.maps.Marker({
  //     position :loc.position,
  //     title:loc.title,
  //     map:map
  //   });
  //   infowindow =  new google.maps.InfoWindow({
  //    content: loc.info
  //  });
  //    marker.addListener('click', function() {
  //    infowindow.open(map, marker);
  //  });
  // });
  
        }

        exports.initMap = initMap;
      })((this.window = this.window || {}));
    </script> 
    <div id="map"></div>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjBJ5SoLhD-u58Ll3VC86Kyra9DmfybfI&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
          </div>
           <?php $event_comment = new commnets_event();
          $id = $_GET['id'];
          $roww = $event_comment->fetch_comment($id);
          if (!empty($roww)){
              foreach($roww as $rowww){
           ?>   
          <div class="comments" style="margin-top: 25px;transform: translate(40px);" id="comment">
         
          <label style="margin-right: 0px;transform: translatey(-10px);margin-left:35px;width:320px"><img src="uplodaimage/<?php echo $rowww['Image'];?>" width="45px" height="42px" style="border-radius: 50px;"> <?php echo $rowww['name'];?>
     <i class="far fa-clock"></i> <?php echo $rowww['created_date'];?></label>
   
   <p  style="width: 300px;height:50px;resize:none;background-color:#F0F8FF;margin-bottom:12px;margin-left:35px;word-wrap: break-word"><?php echo $rowww['comment'];?></p>
   </div>
   <?php
              }
            }
            ?>
            
          
          <div class="comment-add" style="margin-top: 20px;margin-bottom:0px"  >
<script>
$("document").ready(function() {
    $("#add").click(function(){
            $.ajax({
        url:"ajax3.php",
        type:"post",
        data: $("form").serialize(),
        success:function(r){
          console.log(r)
          var data = JSON.parse(r); 
          console.log(data.comment);
          var string = ' <label style="margin-right: 0px;transform: translatey(-10px);margin-left:35px;width:320px"><img src="uplodaimage/'+data.Image+' width="45px" height="42px" style="border-radius: 50px;">'+data.username+'<i class="far fa-clock"></i>'+data.created_date+'</label> <p  style="width: 300px;height:50px;resize:none;background-color:#F0F8FF;margin-bottom:12px;margin-left:35px;word-wrap: break-word">'+data.comment+'</p>'
          $("#comment").append(string);
          $('#add_comment').trigger("reset");
        

        },
        error: function (xhr, ajaxOptions, thrownError){
        console.log("aa"+xhr.status);
        console.log("bb"+thrownError);
      }
      })
    })
  })
</script>

<form method="post" id="add_comment">
<img src="uplodaimage/<?php echo $rows['Image'];?>" width="50px" height="40px" style="border-radius: 50px;margin-bottom:5px" >
<input type="text" placeholder="comment" style="width: 600px;" name="comm" style="background-color:#F0F8FF;" id="comment">
<input type="hidden"  value="<?php echo $_SESSION['username'];?>" name="user_id">
<input type="hidden"  value="<?php echo $_GET['id'];?>"  name="events_id">
<button type="button" class="btn btn-primary" style="padding: 2px 5px;transform: translatey(-4px);border-radius:10px;margin-left:5px" name="add" id="add">add</button> 
</form>
</div>

   
               </div>                            
   
     </div>
    <div class="col-sm-2">
      <div class="writer" style="background-color:wheat;margin-left:7px">
          <h4 style="margin-left:30px;">WRITERS</h4>
      </div>
      <?php 
      if (isset($_GET['wid'])){
          $friend_id = $_GET['wid'];
          $user_id = $roww['id'];
          $frined  = new friends();
          $frined->add_friends($user_id,$friend_id);
      }
      
    
      $writers = new users();
     $rows = $writers->Select_users();
     if(!empty($rows)){
     foreach ($rows as $row){
?>
   <div class="card" style="margin-top: 10px;margin-left: 10px;" >
  <img src="uplodaimage/<?php echo $row['Image'];?>" class="card-img-top" alt="..." height="140px" width="140px">
  <a href="event.php?wid=<?php echo $row['id'];?>" style="color: black;"><input class="fas fa-plus-square" style="margin-left: 120px;transform: translatey(-10px);background-color:white"></a>

  <div class="card-body">
    <a href="writers_articles.php?fid=<?php echo $row['id'];?>" style="color:black"> <center> <h6><?php echo $row['username'];?> </h6></center></a>
  </div>
  </div>
<?php 
}
}
?>

    </div>
  </div>
</div>

<?php include "footer.php";?>
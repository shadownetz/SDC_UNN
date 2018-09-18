<?php
$query = "SELECT * ";
$query .= "FROM users ";
$query .= "WHERE id =$member_id";
$result = mysqli_query($db, $query);
       	while ($row = mysqli_fetch_array($result) ) {
                $member_count =  mysqli_num_rows($result);
                $fname = $row['fname'];
				        $uname = $row['uname'];
                $lname = $row['lname'];
                $picture = $row['picture'];
                $imagepath = "photo/".$picture;

        }
        ?>
	<?php

  if(isset($_POST["submit_file"])){

      $host = "localhost";
      $user = "root";
      $pass = "";
      $database = "sdc";

      move_uploaded_file($_FILES["file"]["tmp_name"],"photo/".$_FILES["file"]["name"]);

  	move_uploaded_file($_FILES["file"]["tmp_name"],"../posts/photo/".$_FILES["file"]["name"]);

      $connection = mysqli_connect($host,$user,$pass,$database);

      $myfiles = $_FILES["file"]["name"];

      $update_profile_query = "UPDATE users SET picture = '$myfiles' WHERE id=$member_id";

      $execute_update_profile_query = mysqli_query($connection,$update_profile_query);
  	if ($execute_update_profile_query) {
  					?>


  		<script type="text/javascript">
  	alert("Profile Picture Updated Successfully");
  	window.location="dashboard.php";
  		</script>

  				<?php
  	}
    }

 ?>
 		<script>
   function previewFile(){
       var preview = document.querySelector('img'); //selects the query named img
       var file    = document.querySelector('input[type=file]').files[0]; //sames as here
       var reader  = new FileReader();

       reader.onloadend = function () {
           preview.src = reader.result;
       }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           preview.src = "photo/user.png";
       }
  }

  previewFile();  //calls the function named previewFile()
  </script>
  <div class="col-md-12" style="padding:0px;display:block;padding-top:50px">
    <div class="row" style="height:100%;padding-left:5px;overflow:auto">
  <div class="col-sm-12" style="padding:0px 0px 0px 10px;background:#333;z-index:1">
  <div class="topnav" id="myTopnav">
    <!-- <a class="active">Menu</a> -->
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
    <center>
      <img src="<?php echo $imagepath; ?>" class="user-image img-responsive" id="user-img" alt="user-image"></center>
    <div id="dp_form_holder">

  <form method="post" action="dashboard.php" enctype="multipart/form-data" style="padding-left:10px">
<center><input type="submit" class="btn btn-default" value="Upload" size="" name="submit_file" id="submit_file"></center>
<center><label class="btn btn-default" style="width:50%;height:35px"><strong>Change Image</strong><br><input name="file" style="visibility:hidden" type="file" size="" onchange="previewFile()"></label></center>
</form>
<br>

    <a href="dashboard.php" ><i class="fa fa-dashboard fa-3x"></i>Dashboard</a>
    <a href="profile.php"><i class="fa fa-desktop fa-3x"></i>Profile</a>
    <a href="writeposts.php"><i class="fa fa-qrcode fa-3x"></i>Chatroom
<span><?php global $new_message_count; if($new_message_count!=0){echo '('.$new_message_count.')';} ?></span>
    </a>
    <a href="#tutorials" onclick="displayList()"><i class="fa fa-sitemap fa-3x"></i>Tutorials<span class="fa arrow"></span></a>
    <div id="tutorial-list" class="list">
      <ul>
        <i><a href="ebooks.php"> ebooks</a></i>
        <i><a href="videos.php"> videos</a> </i>
      </ul>
    </div>
</div>
</div>
</div>

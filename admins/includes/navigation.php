<?php
$query = "SELECT * ";
$query .= "FROM admin ";
$query .= "WHERE id =$admin_id";
$result = mysqli_query($db, $query);
       	while ($row = mysqli_fetch_array($result) ) {
                $admin_count =  mysqli_num_rows($result);
                $fname = $row['fname'];
				$uname = $row['uname'];
                $picture = $row['picture'];
                $imagepath = "photo/".$picture;
				$group_views = $row['group_views'];
				$exco_views = $row['exco_views'];
        }
$query = "SELECT * ";
$query .= "FROM posts ";
$query .= "WHERE status = '1' ";
$result = mysqli_query($db, $query);
	$posts_count = 0;
       	while ($row = mysqli_fetch_array($result) ) {
                $posts_count =  mysqli_num_rows($result);
				$new_message_count = $posts_count - $group_views;

        }
$query = "SELECT * ";
$query .= "FROM excochat ";
$query .= "WHERE status = '1' ";
$result = mysqli_query($db, $query);
	$exco_count = 0;
       	while ($row = mysqli_fetch_array($result) ) {
                $exco_count =  mysqli_num_rows($result);
				$new_exco_message_count = $exco_count - $exco_views;

				$total_chat = $new_exco_message_count + $new_exco_message_count;

        }


if(isset($_POST["submit_file"])){

    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "sdc";

    move_uploaded_file($_FILES["file"]["tmp_name"],"photo/".$_FILES["file"]["name"]);
    move_uploaded_file($_FILES["file"]["tmp_name"],"../posts/photo/".$_FILES["file"]["name"]);

    $connection = mysqli_connect($host,$user,$pass,$database);

    $myfiles = $_FILES["file"]["name"];

    $update_profile_query = "UPDATE admin SET picture = '$myfiles' WHERE id=$admin_id";

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
 <?php
 $query = "SELECT * ";
$query .= "FROM admin ";
$query .= "WHERE status = '1' ";
$result = mysqli_query($db, $query);
	$admin_count = 0;
       	while ($row = mysqli_fetch_array($result) ) {
                $admin_count =  mysqli_num_rows($result);
        }
$query = "SELECT * ";
$query .= "FROM admin ";
$query .= "WHERE status = '0' ";
$result = mysqli_query($db, $query);
	$admin1_count = 0;
       	while ($row = mysqli_fetch_array($result) ) {
                $admin1_count =  mysqli_num_rows($result);
        }

$query = "SELECT * ";
$query .= "FROM users ";
$query .= "WHERE status = '1' ";
$result = mysqli_query($db, $query);
	$members_count = 0;
       	while ($row = mysqli_fetch_array($result) ) {
                $members_count =  mysqli_num_rows($result);

        }

$query = "SELECT * ";
$query .= "FROM users ";
$query .= "WHERE status = '2' ";
$result = mysqli_query($db, $query);
	$new_members = 0;
       	while ($row = mysqli_fetch_array($result) ) {
                $new_members =  mysqli_num_rows($result);

        }

$query = "SELECT * ";
$query .= "FROM users ";
$query .= "WHERE status = '0' ";
$result = mysqli_query($db, $query);
	$members1_count = 0;
       	while ($row = mysqli_fetch_array($result) ) {
                $members1_count =  mysqli_num_rows($result);

                //echo $_SESSION['fname'];
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
  <div class="col-sm-12" style="padding:0px 0px 0px 10px;z-index:1">
  <div class="topnav" id="myTopnav">
    <!-- <a class="active">Menu</a> -->
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
    <center>
      <img src="<?php echo $imagepath; ?>" class="user-image img-responsive" id="user-img" alt="user-image">
    </center>
    <div id="dp_form_holder">

  <form method="post" action="dashboard.php" enctype="multipart/form-data" style="padding-left:10px">
<center><label class="btn btn-default" style="width:50%;height:35px"><strong>Change Image</strong><input name="file" style="visibility:hidden" type="file" onchange="previewFile()"></label><center>
<center><input type="submit" class="btn btn-default" value="Upload" size="" name="submit_file" id="submit_file"></center><br>
</div>
</form>

    <a href="dashboard.php" ><i class="fa fa-dashboard fa-3x"></i>Dashboard</a>
    <a href="profile.php"><i class="fa fa-database fa-3x"></i>Profile</a>
    <a href="#" onclick="displayList()"><i class="fa fa-users fa-3x"></i>Users<span class="fa arrow"></span></a>
    <div id="tutorial-list" class="list animated fadeInDown">
      <ul class="nav nav-second-level">
        <li><a href="newmembers.php">New Members</a></li>
        <li><a href="viewstaff.php">Active Users</a> </li>
        <li><a href="inactivestaff.php">In-Active Users</a> </li>
      </ul>
    </div>
    <a href="#" onclick="displayList1()"><i class="fa fa-mortar-board fa-3x"></i>Tutorials<span class="fa arrow"></span></a>
    <div id="tutorial-list1" class="list animated fadeInDown">
      <ul class="nav nav-second-level">
      <li><a href="nonvideos.php">Ebooks</a></li>
      <li><a href="videos.php">Videos</a> </li>
      <li><a href="managetutorials.php">Manage Tutorials</a> </li>
      </ul>
    </div>
    <a href="#" onclick="displayList2()"><i class="fa fa-wechat fa-3x"></i>Chats<span class="fa arrow"></span>
<span><?php if($total_chat!=0){ ?>(<?php echo $total_chat; ?>)<?php } ?></span>
    </a>
    <div id="tutorial-list2" class="list animated fadeInDown">
      <ul class="nav nav-second-level">
      <li><a href="writeposts.php">Chat Room
<span><?php if($new_exco_message_count!=0){ ?>(<?php echo $new_exco_message_count; ?>)<?php } ?></span>
</a></li>
      <li><a href="excochat.php">Exco Chat Room
<span><?php if($new_exco_message_count!=0){ ?>(<?php echo $new_exco_message_count; ?>)<?php } ?></span>
</a> </li>
    <li><a href="manageposts.php">Manage Chats</a> </li>
      </ul>
    </div>
    <a href="#" onclick="displayList3()"><i class="fa fa-user-md fa-3x"></i>Admins<span class="fa arrow"></span></a>
    <div id="tutorial-list3" class="list animated fadeInDown">
      <ul class="nav nav-second-level">
      <li><a href="viewadmins.php">View Admins</a></li>
      <li><a href="createadmins.php">Create Admins</a> </li>
      </ul>
    </div>

    <a href="#" onclick="displayList4()"><i class="fa fa-archive fa-3x"></i>Public Posts<span class="fa arrow"></span></a>
    <div id="tutorial-list4" class="list animated fadeInDown">
      <ul class="nav nav-second-level">
      <li><a href="publicposts.php">Recent Posts</a></li>
      <li><a href="removedposts.php">Removed Posts</a> </li>
      </ul>
    </div>

    <a href="#" onclick="displayList5()"><i class="fa fa-file-video-o fa-3x"></i>Gallery<span class="fa arrow"></span></a>
    <div id="tutorial-list5" class="list animated fadeInDown">
      <ul class="nav nav-second-level">
      <li><a href="addgallery.php">Add Gallery </a></li>
      <li><a href="managegallery.php">Manage Gallery</a> </li>
      <li><a href="removedgallery.php">Removed Gallery</a> </li>
      </ul>
    </div>
  <a href="sendmail.php" onclick="displayList5()"><i class="fa fa-envelope fa-3x"></i>Send Mail</a>
    <div id="u"></div>
</div>
</div>
</div>
<div class="col-sm-12 col-md-12  dash-box">
<div class="col-md-12 col-sm-12 dash-inner">

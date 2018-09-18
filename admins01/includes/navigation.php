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
                
                //echo $_SESSION['fname'];
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
				
				$total_chat = $new_message_count + $new_exco_message_count;
					
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
                <nav class="navbar-default navbar-side" role="navigation" >
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
				<span id="my_profile_picture"></span>
<img src="<?php echo $imagepath; ?>" class="user-image img-responsive" alt="user-image">

                    <div id="dp_form_holder">
						<center><form method="post" action="dashboard.php" enctype="multipart/form-data">
							  <input name="file" type="file" onchange="previewFile()"/>
							  <input type="submit" value="Upload" name="submit_file" id="submit_file"/>
						</form></center>
					</div>
				</li>
				
					
                    <li>
                        <a class="active-menu"  href="dashboard.php" ><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                     <li>
                        <a  href="profile.php"><i class="fa fa-desktop fa-3x"></i>Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                        <li>
                                <a href="newmembers.php">New Members</a>
                            </li>
                            <li>
                                <a href="viewstaff.php">Active Users</a>
                            </li>
							<li>
                                <a href="inactivestaff.php">In-Active Users</a>
                            </li>
                        </ul>
                      </li>
                      <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Admins<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="viewadmins.php">View Admins</a>
                            </li>
                            <li>
                                <a href="createadmins.php">Create Admins</a>
                            </li>
                           
                        </ul>
                      </li>
					  <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Tutorials<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="nonvideos.php">Ebooks</a>
                            </li>
                            <li>
                                <a href="videos.php">Videos</a>
                            </li>
							<li>
                                <a href="managetutorials.php">Manage Tutorials</a>
                            </li>
                           
                        </ul>
                      </li>
					  <li>
                        <a href="#"><i class="fa fa-qrcode fa-3x"></i>Chats<span><?php if($total_chat!=0){ ?><h5 slyle="color:green">(<?php echo $total_chat; ?>)</h5><?php } ?></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
							<li>
                                <a href="writeposts.php">Chat Room<span><?php if($new_message_count!=0){ ?><h5 slyle="color:green">(<?php echo $new_message_count; ?>)</h5><?php } ?></span></a>
                            </li>
                            <li>
                                <a href="excochat.php">Excos Chat Room<?php if($new_exco_message_count!=0){ ?><h5 slyle="color:green">(<?php echo $new_exco_message_count; ?>)</h5><?php } ?></span></a>
                            </li>
							<li>
                                <a href="manageposts.php">Manage Chats</a>
                            </li>
                        </ul>
                      </li>
					 <li>
					  <a  href="#"><i class="fa fa-sitemap fa-3x"></i>Public Posts<span class="fa arrow"></span></a>
						<ul class="nav nav-second-level">
                            
							<li>
                                <a  href="publicposts.php"><i class="fa fa-qrcode fa-3x"></i>Rescent Posts</a>
                            </li>
							<li>
                                <a  href="removedposts.php"><i class="fa fa-qrcode fa-3x"></i>Removed Posts</a>						
                            </li>
                        </ul>
					
					</li>
					  <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i>Gallery<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="addgallery.php">Add Gallery</a>
                            </li>
							<li>
                                <a href="managegallery.php">Manage Gallery</a>
                            </li>
							<li>
                                <a href="removedgallery.php">Removed Gallery</a>
                            </li>
                       </ul>
                      </li>
                      <li>
                        <a href="sendmail.php"><i class="fa fa-qrcode fa-3x"></i>Send Mail<span class="fa arrow"></span></a>
                    </li>					  					                  
                </ul>
               
            </div>
            
        </nav> 

<?php
include ("includes/connect.php");
session_start();
$member_id = $_SESSION['id'];


$record = mysqli_query($db, "SELECT * FROM users WHERE id=$member_id");

while ( $row = mysqli_fetch_array($record) ) {


       $last_logged = $row['last_logged'];
}
?>
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

        if (isset($_POST['submit'])) {

        	$message = $_POST['message'];



        		$sql = mysqli_query($db, "INSERT INTO  posts SET picture='$picture', uname='$uname', status='1', post='$message', date=NOW()");
        		if($sql) {
                 ?>
        		   <script type="text/javascript">
        //		alert("Post Sent ");
        		window.location="post.php";																	//header location
        			</script>
        		<?php

        				}else{
        					?>
        		   <script type="text/javascript">
        //		alert("Unable to send post! ");
        		window.location="post.php";																//header location
        			</script>
        		<?php
        		die();
        				}



        }
        ?>
<!DOCTYPE html>
<html>
<head>
  <link href="assets/css/style.css" rel="stylesheet">
  <!-- BOOTSTRAP STYLES-->
 <link href="assets/css/bootstrap.css" rel="stylesheet" />
      <!-- FONTAWESOME STYLES-->
 <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/animate.min.css">
  <link rel="stylesheet" href="stylechat.css">
</head>
<body>
<div class="col-md-12">

    <div class="chatlogs" id="chatlogs" name="chatlogs">
  <?php
  $member_id = $_SESSION['id'];

  $query = "SELECT * FROM posts WHERE status='1' ORDER BY id ASC ";

  $result = mysqli_query($db, $query);

  					while ( $row = mysqli_fetch_array($result) ) :



  //		$row_counter =  mysql_num_rows($result);
                  $id =$row['id'];
  //		$_SESSION['uname'] =$row['uname'];
                  $uname = $row['uname'];
                  $_SESSION['post'] =$row['post'];
  //		$_SESSION['post']= $row['post'];
                  $post = $row['post'];
  //		$_SESSION['picture']= $row['picture'];
  				$picture = $row['picture'];
                $imagepath = "../posts/photo/".$picture;



  $query1 = "SELECT * FROM users WHERE id='$member_id' ";
  $result1 = mysqli_query($db, $query1);
  $get_profile = mysqli_fetch_assoc($result1);

  if($row['uname'] == $get_profile['uname']){

      if($get_profile['picture']==""){
  ?>
  		<div class="chat self" id="self">
  			<p class="chat-message"><span><?php echo $row['uname']; ?></span><?php echo $row['post']?></p>
  		</div>
  <?php
  	}else{

  		$username_picture = $get_profile['picture'];
  ?>
          <div class="chat self" id="self">
  				<p class="chat-message"><span><?php echo $row['uname']; ?></span><br><?php echo $row['post']?></p>
      </div>
  <?php
  		}

   }else{

   	if($get_profile["picture"]==""){
  ?>
         <div class="chat friend" id="friend">

  			<div class="user-photo"><img src="../posts/photo/user.png" alt=""></div>
  			<p class="chat-message"><span><?php echo $row['uname']; ?></span><br><?php echo $row['post']?></p>
  		</div>
  <?php
  	   }else{

  		  $username_picture = $imagepath;
  ?>
         <div class="chat friend" id="friend">

  			<div class="user-photo"><img src="<?php echo $username_picture; ?>" alt=""></div>
  			<p class="chat-message"><span><?php echo $row['uname']; ?></span><br><?php echo $row['post']?></p>
  		</div>
  <?php
      }

   }

  endwhile; ?>

</div>


          </div>



  <script src="assets/js/postscript.js"></script>
</body>
</html>

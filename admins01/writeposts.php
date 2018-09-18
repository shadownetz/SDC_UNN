<meta http-equiv="refresh" content="10">
<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<?php $update_my_posts = mysqli_query($db, "UPDATE admin SET group_views='$posts_count' WHERE id=$admin_id"); ?>
<?php
	

if (isset($_POST['submit'])) {

	$message = $_POST['message'];



		$sql = mysqli_query($db, "INSERT INTO  posts SET picture='$picture', uname='$uname', status='1', post='$message', date=NOW()");
		if($sql) {
         ?>	
		   <script type="text/javascript">
//		alert("Post Sent ");
		window.location="writeposts.php";																	//header location
			</script>
		<?php
            
				}else{
					?>	
		   <script type="text/javascript">
//		alert("Unable to send post! ");
		window.location="writeposts.php";																//header location
			</script>
		<?php
		die();
				}
			
		
	
}
?>

 


<br>

	<div id="page-wrapper" >
            <div id="page-inner">
<div class="column">
<div class="col-sm-12">
      <div class="chatbox">
        <div class="chatlogs">
<?php
$admin_id = $_SESSION['id'];
					
$query = "SELECT * FROM posts WHERE status='1' ORDER BY id ASC ";
					
$result = mysqli_query($db, $query);
	
					while ( $row = mysqli_fetch_array($result) ) :
										
						
						
//		$row_counter =  mysql_num_rows($result);
                $id =$row['id'];
//		$_SESSION['uname'] =$row['uname'];
                $uname = $_SESSION['uname'];
                $_SESSION['post'] =$row['post'];
//		$_SESSION['post']= $row['post'];
                $post = $row['post'];
//		$_SESSION['picture']= $row['picture'];
				$picture = $row['picture'];
              $imagepath = "../posts/photo/".$picture;
                


$query1 = "SELECT * FROM admin WHERE id='$admin_id' ";					
$result1 = mysqli_query($db, $query1);
$get_profile = mysqli_fetch_assoc($result1);

if($row['uname'] == $get_profile['uname']){
	
    if($get_profile['picture']==""){
?>		
		<div class="chat self" id="self">
			<div class="user-photo"><img src="../posts/photo/user.png" alt=""></div>
			<h5 style="background-color:white; color:black;"><?php echo $row['uname']; ?></h5>
			<p class="chat-message"><?php echo $row['post']?></p>
		</div>
<?php
	}else{
		
		$username_picture = $get_profile['picture'];
?>
        <div class="chat self" id="self">
			<div class="user-photo"><img src="photo/<?php echo $username_picture; ?>" alt="" /></div>
			<h5 style="background-color:white; color:black;"><?php echo $row['uname']; ?></h5>
			<p class="chat-message"><?php echo $row['post']?></p>
		</div>
<?php		
		}

 }else{
		
 	if($get_profile["picture"]==""){
?>
       <div class="chat friend" id="friend">
			<h5 style="background-color:white; color:black;"><?php echo $row['uname']; ?></h5>
			<div class="user-photo"><img src="../posts/photo/user.png" alt=""></div>
			<p class="chat-message"><?php echo $row['post']?></p>
		</div>
<?php		
	   }else{
		   
		  $username_picture = $imagepath;
?>
       <div class="chat friend" id="friend">
			<h5 style="background-color:white; color:black;"><?php echo $row['uname']; ?></h5>
			<div class="user-photo"><img src="<?php echo $username_picture; ?>" alt=""></div>
			<p class="chat-message"><?php echo $row['post']?></p>
		</div>
<?php
    }

 }			
				
endwhile; ?>			
						

        </div>
<form name="contact-form" method="post" action="writeposts.php">
        <div class="chat-form">
            <textarea name="message" id="message" required="required" cols="30" rows="10" class="form-control"></textarea>
            <button type="submit" name="submit" class="btn btn-success btn-lg">Send</button>
        </div>
</form>
    </div>
	</div>
	
	<br>
 
			

			
            
        </div> <!--/.container-->

	</div>


 

	
	<?php include("includes/footer.php"); ?> 
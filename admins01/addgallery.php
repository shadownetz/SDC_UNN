<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<?php
//include ("../connect.php");
//session_start();
$admin_id = $_SESSION['id'];

		
			
		
	$errors   = array();
function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .",\n";
			}
		echo '</div>';
	}
}
     
	if (isset($_POST['submit'])) {
		
		$album = $_POST['album'];

		$message1 = $_POST['img1-msg'];$message2 = $_POST['img2-msg'];$message3 = $_POST['img3-msg'];
        $message4 = $_POST['img4-msg'];$message5 = $_POST['img5-msg'];$message6 = $_POST['img6-msg'];
        $message7 = $_POST['img7-msg'];$message8 = $_POST['img8-msg'];$message9 = $_POST['img9-msg'];
        $message10 = $_POST['img10-msg'];
		
	// Image validation: ensure that the form is correctly filled image files
	if (empty($album)) {
		array_push($errors, "Album is required"); 
	}
	$fileName = $_FILES['file1']['name'];
		$fileType = $_FILES['file1']['type'];
					$fileExt = explode('.',$fileName);
						$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpeg','JPEG','jpg','JPG','png','PNG');
		if (!in_array($fileActualExt, $allowed)){
			array_push($errors, "Another file type used in Image Slot1");
		}
	$fileName = $_FILES['file2']['name'];
		$fileType = $_FILES['file2']['type'];
					$fileExt = explode('.',$fileName);
						$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpeg','JPEG','jpg','JPG','png','PNG');
		if (!in_array($fileActualExt, $allowed)){
			array_push($errors, "Another file type used in Image Slot2");
		}
	$fileName = $_FILES['file3']['name'];
		$fileType = $_FILES['file3']['type'];
					$fileExt = explode('.',$fileName);
						$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpeg','JPEG','jpg','JPG','png','PNG');
		if (!in_array($fileActualExt, $allowed)){
			array_push($errors, "Another file type used in Image Slot3");
		}
	$fileName = $_FILES['file4']['name'];
		$fileType = $_FILES['file4']['type'];
					$fileExt = explode('.',$fileName);
						$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpeg','JPEG','jpg','JPG','png','PNG');
		if (!in_array($fileActualExt, $allowed)){
			array_push($errors, "Another file type used in Image Slot4");
		}
	$fileName = $_FILES['file5']['name'];
		$fileType = $_FILES['file5']['type'];
					$fileExt = explode('.',$fileName);
						$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpeg','JPEG','jpg','JPG','png','PNG');
		if (!in_array($fileActualExt, $allowed)){
			array_push($errors, "Another file type used in Image Slot5");
		}
	$fileName = $_FILES['file6']['name'];
		$fileType = $_FILES['file6']['type'];
					$fileExt = explode('.',$fileName);
						$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpeg','JPEG','jpg','JPG','png','PNG');
		if (!in_array($fileActualExt, $allowed)){
			array_push($errors, "Another file type used in Image Slot6");
		}
	$fileName = $_FILES['file7']['name'];
		$fileType = $_FILES['file7']['type'];
					$fileExt = explode('.',$fileName);
						$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpeg','JPEG','jpg','JPG','png','PNG');
		if (!in_array($fileActualExt, $allowed)){
			array_push($errors, "Another file type used in Image Slot7");
		}
	$fileName = $_FILES['file8']['name'];
		$fileType = $_FILES['file8']['type'];
					$fileExt = explode('.',$fileName);
						$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpeg','JPEG','jpg','JPG','png','PNG');
		if (!in_array($fileActualExt, $allowed)){
			array_push($errors, "Another file type used in Image Slot8");
		}
	$fileName = $_FILES['file9']['name'];
		$fileType = $_FILES['file9']['type'];
					$fileExt = explode('.',$fileName);
						$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpeg','JPEG','jpg','JPG','png','PNG');
		if (!in_array($fileActualExt, $allowed)){
			array_push($errors, "Another file type used in Image Slot9");
		}
	$fileName = $_FILES['file10']['name'];
		$fileType = $_FILES['file10']['type'];
					$fileExt = explode('.',$fileName);
						$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpeg','JPEG','jpg','JPG','png','PNG');
		if (!in_array($fileActualExt, $allowed)){
			array_push($errors, "Another file type used in Image Slot10");
		}
	
	
	
	
	if (count($errors) == 0) {
		
		move_uploaded_file($_FILES["file1"]["tmp_name"],"../gallery/photo/".$_FILES["file1"]["name"]);
		move_uploaded_file($_FILES["file2"]["tmp_name"],"../gallery/photo/".$_FILES["file2"]["name"]);
		move_uploaded_file($_FILES["file3"]["tmp_name"],"../gallery/photo/".$_FILES["file3"]["name"]);
		move_uploaded_file($_FILES["file4"]["tmp_name"],"../gallery/photo/".$_FILES["file4"]["name"]);
		move_uploaded_file($_FILES["file5"]["tmp_name"],"../gallery/photo/".$_FILES["file5"]["name"]);
		move_uploaded_file($_FILES["file6"]["tmp_name"],"../gallery/photo/".$_FILES["file6"]["name"]);
		move_uploaded_file($_FILES["file7"]["tmp_name"],"../gallery/photo/".$_FILES["file7"]["name"]);
		move_uploaded_file($_FILES["file8"]["tmp_name"],"../gallery/photo/".$_FILES["file8"]["name"]);
		move_uploaded_file($_FILES["file9"]["tmp_name"],"../gallery/photo/".$_FILES["file9"]["name"]);
		move_uploaded_file($_FILES["file10"]["tmp_name"],"../gallery/photo/".$_FILES["file10"]["name"]);

		$myfiles1 = $_FILES["file1"]["name"];
		$myfiles2 = $_FILES["file2"]["name"];
		$myfiles3 = $_FILES["file3"]["name"];
		$myfiles4 = $_FILES["file4"]["name"];
		$myfiles5 = $_FILES["file5"]["name"];
		$myfiles6 = $_FILES["file6"]["name"];
		$myfiles7 = $_FILES["file7"]["name"];
		$myfiles8 = $_FILES["file8"]["name"];
		$myfiles9 = $_FILES["file9"]["name"];
		$myfiles10 = $_FILES["file10"]["name"];

		
		$sql = mysqli_query($db, "INSERT INTO gallery SET album='$album', image1='$myfiles1', image2='$myfiles2', image3='$myfiles3', image4='$myfiles4', image5='$myfiles5', image6='$myfiles6', image7='$myfiles7', image8='$myfiles8', image9='$myfiles9', image10='$myfiles10',imageMessage1='$message1',imageMessage2='$message2',imageMessage3='$message3',imageMessage4='$message4',imageMessage5='$message5',imageMessage6='$message1',imageMessage7='$message7',imageMessage8='$message8',imageMessage9='$message9',imageMessage10='$message10', no_of_images=5, status=0, date=NOW() ");
		
		if($sql) {
         ?>	
		   <script type="text/javascript">
		alert("Upload Successful! ");
		window.location="addgallery.php";
			</script>
		<?php
            
				}else{
					?>	
		   <script type="text/javascript">
		alert("Unable to Upload! ");
		window.location="addgallery.php";
			</script>
		<?php
		die();
				}
		
	}
	
	}



	 
?>

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
               
                <div class="col-md-5 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
					<marquee><?php echo display_error(); ?></marquee>
                        <strong>Add Album</strong>  
                            </div>
                            <div class="panel-body"> 
                                <form action="addgallery.php" method="POST" role="form" enctype="multipart/form-data">
<br/>				
                                        <label>Album Name</label>
										<div class="form-group input-group">
                                            <span class="input-group-addon"></span>
                                            <input type="text" class="form-control" placeholder="Album Name" name="album"/>
                                        </div>
										<label>Images</label>
										<div class="form-group input-group">
                                            <span class="input-group-addon">1</span>
                                            <input name="file1" type="file" class="form-control" required="required"/>
                                            <label>Message</label>
                                            <span><input type="text" class="form-control" placeholder="message" name="img1-msg" required></span>
                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">2</span>
                                            <input name="file2" type="file" class="form-control" required="required"/>
                                            <label>Message</label>
                                            <span><input type="text" class="form-control" placeholder="message" name="img2-msg" required></span>
                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">3</span>
                                            <input name="file3" type="file" class="form-control" required="required"/>
                                            <label>Message</label>
                                            <span><input type="text" class="form-control" placeholder="message" name="img3-msg" required></span>
                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">4</span>
                                            <input name="file4" type="file" class="form-control" required="required"/>
                                            <label>Message</label>
                                            <span><input type="text" class="form-control" placeholder="message" name="img4-msg" required></span>
                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">5</span>
                                            <input name="file5" type="file" class="form-control" />
                                            <label>Message</label>
                                            <span><input type="text" class="form-control" placeholder="message" name="img5-msg" ></span>
                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">6</span>
                                            <input name="file6" type="file" value="" class="form-control"/>
                                            <label>Message</label>
                                            <span><input type="text" class="form-control" placeholder="message" name="img6-msg" ></span>
											</div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">7</span>
                                            <input name="file7" type="file" value="" class="form-control">
                                            <label>Message</label>
                                            <span><input type="text" class="form-control" placeholder="message" name="img7-msg" ></span>
											</div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">8</span>
                                            <input name="file8" type="file" value="" class="form-control" >
                                            <label>Message</label>
                                            <span><input type="text" class="form-control" placeholder="message" name="img8-msg" ></span>
											</div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">9</span>
                                            <input name="file9" type="file" value="" class="form-control" >
                                            <label>Message</label>
                                            <span><input type="text" class="form-control" placeholder="message" name="img9-msg" ></span>
											</div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">10</span>
                                            <input name="file10" type="file" value="" class="form-control" >
                                            <label>Message</label>
                                            <span><input type="text" class="form-control" placeholder="message" name="img10-msg" ></span>
										</div>
                                     
                                     <button type="submit" name="submit" class="btn btn-info" required="required">Upload</button>                                    <hr />
                                </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
            </div>
         <!-- /. PAGE WRAPPER  -->
<?php include("includes/footer.php"); ?>
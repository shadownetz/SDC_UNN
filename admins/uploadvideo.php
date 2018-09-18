<?php include("includes/connect.php"); ?>
<?php

if (isset($_POST['submit'])){
	
	$vname = $_POST ['vname'];
	$file = $_FILES['file'];
	
	$fileName = $_FILES['file']['name'];
//	print_r($fileName);
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];
	
	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('mp4','MP4');

	if (in_array($fileActualExt, $allowed)) {
		# code...
		if ($fileError === 0) {
			# code...
			if($fileSize < 1000000000){ //allowing 1GB and below file size.
				$fileNameNew = uniqid('', true).".".$fileActualExt;

				$fileDestination = 'videos/html/'.$fileName;
				move_uploaded_file($fileTmpName, $fileDestination);
				
				
				

		
					$sql = mysqli_query($db, "INSERT INTO videos SET vname='$vname', name='$fileName', status=1, date=NOW() ");
					
					if($sql) {
					 ?>	
					   <script type="text/javascript">
					alert("File Upload Successful! ");
					window.location="managetutorials.php";
						</script>
					<?php
						
							}else{
								?>	
					   <script type="text/javascript">
					alert("Unable to Upload! ");
					window.location="managetutorials.php";
						</script>
					<?php
					die();
							}
				
				
				
				
				
				
				
//				header("location: managetutorials.php?uploadsuccess");
			}else{
				echo "Your File is too Big!";
			}
			
		}else {
			echo "Error Uploading File";
		}
	}else {
		echo "You are not allowed to upload this type of file";
	}
	











}
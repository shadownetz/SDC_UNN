<?php
if (isset($_POST['update'])) {
	if(empty($_POST['id']) || empty($_POST['password']) || empty($_POST['password1'])){
header("location:../SDC_Web_Prog/recover.php");
	die();
	}
			$password = mysqli_real_escape_string($db,$_POST['password']);
			$password1 = mysqli_real_escape_string($db,$_POST['password1']);

			$id = mysqli_real_escape_string($db,$_POST['id']);

	// form validation: ensure that the form is correctly filled

	if (empty($password)) {
		array_push($errors, "Password is required");
	}elseif( strlen($password) < 6  ) {
		array_push($errors, "Password length should be greater than 5 characters!");
	}elseif( $password !=$password1  ) {
		array_push($errors, "Password do not match");
	}elseif (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database

		$update = mysqli_query($db, "UPDATE users SET password='$password' WHERE id=$id");
		if($update) {	?>
				<script>alert('Profile Updated Successfully');
					window.location="login.php";
				</script>
			<?php
		}else{
			header("location:../SDC_Web_Prog/recover.php");
			die();	}
	}
	}

 ?>

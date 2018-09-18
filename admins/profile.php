<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<?php
$query = "SELECT * ";
$query .= "FROM admin ";
$query .= "WHERE id =$admin_id";
          $index = 0;
 $result = mysqli_query($db, $query);
 $counter=1;
       	while ( $row = mysqli_fetch_array($result) ) {
            $fname = $row['fname'];
			$lname = $row['lname'];
            $uname = $row['uname'];
            $email = $row['email'];
            $password = $row['password'];
             $phone = $row['phone'];
            $gender = $row['gender'];
             $date = $row['date'];
			 $id = $row['id'];
        }

?>
<?php
if (isset($_POST['update'])) {
	// receive all input values from the form. Call the e() function
    // defined below to escape form values
			$fname = mysqli_real_escape_string($db,$_POST['fname']);
			$lname = mysqli_real_escape_string($db,$_POST['lname']);

			$password = mysqli_real_escape_string($db,$_POST['password']);
			$password1 = mysqli_real_escape_string($db,$_POST['password1']);
			$email = mysqli_real_escape_string($db,$_POST['email']);
			$phone = mysqli_real_escape_string($db,$_POST['phone']);
			$gender = mysqli_real_escape_string($db,$_POST['gender']);
			$id = mysqli_real_escape_string($db,$_POST['id']);

	// form validation: ensure that the form is correctly filled
	if (empty($fname)) {
		array_push($errors, "Firstname must be filled!");
	}elseif (empty($lname)) {
		array_push($errors, "Lastname must be filled!");
	}elseif (empty($password)) {
		array_push($errors, "Password is required!");
	}elseif( strlen($password) <= 10  ) {
		array_push($errors, "Password is too short!");
	}elseif( $password !=$password1  ) {
		array_push($errors, "Password do not match!");
	}elseif (empty($email)) {
		array_push($errors, "Lastname is required!");
	}elseif (empty($phone)) {
		array_push($errors, "Phone number is required!");
	}elseif (empty($level)) {
		array_push($errors, "Enter Your Level!");
	 }elseif (empty($gender)) {
		array_push($errors, "Gender is required!");
	}else
	// update users details if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database

		$update = mysqli_query($db, "UPDATE admin SET fname='$fname', lname='$lname', password='$password', email='$email', phone='$phone', gender='$gender', date= NOW() WHERE id=$id");
		if($update) {	?>
				<script>alert('Admin Profile Updated Successfully');
					window.location="profile.php";
				</script>
			<?php
		}else{
			?>
				<script>alert('Admin Profile Not Updated');
					window.location="profile.php";
				</script>
			<?php

		}
	}
	}

 ?>

 	<div class="col-md-12"><h2>Admin Profile</h2></div>
 <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

 <div class="container-fluid">
  <center><img src="<?php echo $imagepath; ?>" alt="user image" height="100" class="col-lg-offset-5 img-rounded user-image"></center>
 <?php echo display_error(); ?>
 </div>
 <div class="form-group col-md-12">
  <div class="row">
  <input type="hidden" class="form-control transparent" placeholder="Id"  name="id" value="<?php echo $id; ?>"/>

 <div class="col-md-6 push_Up"><label for="fname">Firstname</label><input type="text" class="form-control" name="fname" placeholder="enter firstname" value="<?php echo $fname;?>"></div>

 <div class="col-md-6 push_Up"><label for="lname">Lastname</label><input type="text" class="form-control" name="lname" placeholder="enter lastname" value="<?php echo $lname; ?>"></div>

 <div class="col-md-6 push_Up"><label for="email">Email</label><input type="email" class="form-control" name="email" placeholder="enter email" value="<?php echo $email;?>"></div>

 <div class="col-md-6 push_Up"><label for="password">New Password (min:10)</label><input type="password" class="form-control" name="password" placeholder="password"></div>

 <div class="col-md-6 push_Up"><label for="password">Re-enter Password</label><input type="password" class="form-control" name="password1" placeholder="re-enter password"></div>

 <div class="col-md-6 push_Up"><label for="phone">Phone-number</label><input type="tel" class="form-control" name="phone" placeholder="phone number" value="<?php echo $phone;?>"></div>

 <div class="col-md-6 push_Up"><label for="level">Level</label>
  <select name="level" class="form-control" required>
 		 <option value="<?php echo $level ?>">Select Level</option>
 		 <option value="100">100</option>
 		 <option value="200">200</option>
 		 <option value="300">300</option>
 		 <option value="400">400</option>
 		 <option value="500">500</option>
 		 <option value="other">Other</option>
  </select>
 </div>

 <div class="col-md-6 push_Up"><label for="gender">Gender</label>
  <select name="gender" class="form-control">
 <option value="<?php echo $gender;?>"><?php echo $gender; ?></option>
 <option value="male">Male</option>
 <option value="female">Female</option>
  </select>
 </div>


 <div class="col-md-12 push_Up">
  <center><input type="submit" class="btn btn-warning" name="update" value="Update Info"></center>
 </div>

 </div>

 </div>

 </form>

 </div>
 </div>
 <?php include("includes/footer.php"); ?>

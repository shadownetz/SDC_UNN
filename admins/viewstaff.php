<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>

<?php
$fname = "";
$lname = "";
$uname = "";
$password = "";
$email = "";
$gender = "";
$id = 0;


	if (isset($_GET['deactivate'])) {
		$id = $_GET['deactivate'];
		$result = mysqli_query($db, "UPDATE users SET status='0' WHERE id=$id");
		}


	if (isset($_POST['update'])) {
	// receive all input values from the form. Call the e() function
    // defined below to escape form values
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$password = $_POST['password'];
			$password1 = $_POST['password1'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$gender = $_POST['gender'];
			$id = $_POST['id'];

	// form validation: ensure that the form is correctly filled
	if (empty($fname)) {
		array_push($errors, "Fullname must be filled");
	}

	if (empty($lname)) {
		array_push($errors, "Lastname must be filled");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}
	if( strlen($password) < 6  ) {
		array_push($errors, "Password is too short");
	}
	if( $password !=$password1  ) {
		array_push($errors, "Password do not match");
	}
	if (empty($email)) {
		array_push($errors, "email is required");
	}
	if (empty($phone)) {
		array_push($errors, "Phone number is required");
	}
	if (empty($gender)) {
		array_push($errors, "Gender is required");
	}

	// update users details if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database

	$sql = mysqli_query($db, "UPDATE users SET fname='$fname', lname='$lname', password='$password', email='$email', phone='$phone', gender='$gender' WHERE id=$id");
	if($sql){
			?>
				<script>alert('User Profile Updated Successfully');
					window.location="viewstaff.php";
				</script>
			<?php
		}
	}
	}
	if (isset($_GET['admin'])) {
		$id = $_GET['admin'];
		$record = mysqli_query($db, "SELECT * FROM users WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$fname = $n['fname'];
			$lname = $n['lname'];
			$uname = $n['uname'];
			$level = $n['level'];
			$phone = $n['phone'];
			$last_logged = $n['last_logged'];
			$password = $n['password'];
			$email = $n['email'];
			$gender = $n['gender'];
			$uniqid = $n['uniqid'];
			$date = $n['date'];


		$sql = mysqli_query($db, "INSERT INTO admin SET uname='$uname', level='$level', last_logged='$last_logged', picture='user.png', uniqid='$uniqid', status='1', fname='$fname', lname='$lname', password='$password', email='$email', date='$date', phone='$phone', gender='$gender' ");
		$sqlUpdate = mysqli_query($db, "UPDATE users SET status='3' WHERE id=$id");
		if($sql && $sqlUpdate){
			?>
				<script>alert('New Admin Created Successfully');
					window.location="viewstaff.php";
				</script>
			<?php
		}else{
			?>
				<script>alert('Unable to create admin');
					window.location="viewstaff.php";
				</script>
			<?php
		}

		}
	}

 ?>

                <div class="row">
                  <div class="col-md-12"><h2>Active Users</h2></div>
                </div>
                 <!-- /. ROW  -->
                 <hr />

            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                     <thead>
                            <tr>
                                <th>id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
								<th>Username</th>
                                <th>Email</th>

                                <th>Phone Number</th>


                                <th>Gender</th>
                                <th>Picture</th>
								<th>Last Logged</th>
                                <!--<th>status</th>-->

                                <th>Created</th>
                                <th>Control</th>
                                <th>Control</th>
								<th>Make Admin</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$query = "SELECT * ";
$query .= "FROM users ";
$query .= "WHERE status = '1' ";
          $index = 0;
 $result = mysqli_query($db, $query);
 $counter=1;
       	while ( $row = mysqli_fetch_array($result) ) {
		//$row_count =  mysql_num_rows($result);
                $id =$row['id'];
		$_SESSION['fname'] =$row['fname'];
//                $fname = $_SESSION['fname'];
                $_SESSION['uname'] =$row['uname'];
		$_SESSION['email']= $row['email'];
                $picture = $row['picture'];
                $imagepath = "../users/photo/".$picture;

                ?>
                <tr>
                        <td><?php echo $counter;?></td>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
						<td><?php echo $row['uname'];?></td>

                        <td><?php echo $row['email']?></td>

                        <td><?php echo $row['phone']?></td>


                        <td><?php echo $row['gender']?></td>
                        <td><img src="<?php echo $imagepath; ?>" alt="user image" height="50" class="img-rounded"></td>
                        <!--<td><?php echo $row['status']?></td>-->
						<td><?php echo $row['last_logged']?></td>
                        <td><?php echo $row['date']?></td>

                        <td>
				<a href="viewstaff.php?edit=<?php echo $row['id']; ?>" class="edit_btn" style="color:blue;"><button class="btn btn-success">Edit</button></a>
						</td>
						<td>
				<a href="viewstaff.php?deactivate=<?php echo $row['id']; ?>" class="deactivate_btn" style="color:blue;"><button class="btn btn-danger">De-Activate</button></a>
						</td>
						<td>
				<a href="viewstaff.php?admin=<?php echo $row['id']; ?>" class="admin_btn" style="color:blue;"><button class="btn btn-success">Make Admin</button></a>
						</td>
                      </tr>


                <?php
                $counter++;
        }
        ?>
          </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
<?php
		if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$record = mysqli_query($db, "SELECT * FROM users WHERE id=$id");

		if (mysqli_num_rows($record) == 1 ) {
			$n = mysqli_fetch_array($record);
            $fname = $n['fname'];
            $lname = $n['lname'];
			$password = $n['password'];
			$email = $n['email'];
			$phone = $n['phone'];
			$gender = $n['gender'];
			$picture = $n['picture'];
			$id = $n['id'];
		}

?>
			<div class="row">
                <div class="col-md-12">

<form method="post" action="viewstaff.php">
<marquee><?php echo display_error(); ?></marquee>

        <h2 class="col-sm-offset-5" style="color: #232347">Admin Edit Page</h2>
         <hr>
                     <br>


<br>
										<div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"></span></span>
                                            <input type="hidden" class="form-control transparent" placeholder="Id"  name="id" value="<?php echo $id; ?>"/>

                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user">Firstname</span><span class="input-text"></span></span>
                                            <input type="text" class="form-control transparent" placeholder="Fullname"  name="fname" value="<?php echo $fname; ?>"/>

                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user">Lastname</span><span class="input-text"></span></span>
                                            <input type="text" class="form-control transparent" placeholder="Lastname"  name="lname" value="<?php echo $lname; ?>"/>

                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-email">Email</span><span class="input-text"></span></span>
                                            <input type="text" class="form-control" placeholder="Email" name="email"  value="<?php echo $email; ?>"/>

                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-email">Phone number</span><span class="input-text"></span></span>
                                            <input type="text" class="form-control" placeholder="Phone Number" name="phone"  value="<?php echo $phone; ?>"/>

                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-email"></span>Gender<span class="input-text"></span></span>
                                            <input type="text" class="form-control" placeholder="Gender" name="gender"  value="<?php echo $gender; ?>"/>

                                        </div>

                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user">Password</span><span class="input-text"></span></span>
                                            <input type="password" class="form-control" placeholder="Password" name="password"/>

                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user">Retype Password</span><span class="input-text"></span></span>
                                            <input type="password" class="form-control" placeholder="Re-Enter Password" name="password1"/>

                                        </div>
                                         <center><button class="btn btn-success" type="submit" name="update" style="background: green;" >Update</button></center>
          </form>
		</div>
		</div>
<?php
}
?>

                <!-- /. ROW  -->

                <!-- /. ROW  -->

                <!-- /. ROW  -->
        </div>

    </div>
<?php include('includes/footer.php'); ?>

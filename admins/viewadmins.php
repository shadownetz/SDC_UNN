<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<?php
$fname = "";
$lname = "";
$password = "";
$email = "";
$gender = "";
$id = 0;


	if (isset($_GET['deactivate'])) {
		$id = $_GET['deactivate'];
		$result = mysqli_query($db, "UPDATE admin SET status='0' WHERE id=$id");
		}


	if (isset($_GET['activate'])) {
		$id = $_GET['activate'];
		$result = mysqli_query($db, "UPDATE admin SET status='1' WHERE id=$id");
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
		array_push($errors, "Firstname must be filled");
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
		array_push($errors, "Lastname is required");
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

		mysqli_query($db, "UPDATE admin SET fname='$fname', lname='$lname', password='$password', email='$email', phone='$phone', gender='$gender' WHERE id=$id");
			?>
				<script>alert('Profile Updated Successfully');
					window.location="viewadmins.php";
				</script>
			<?php
	}
	}

 ?>
                 <div class="row">
                    <div class="col-md-12">

                                 <hr>
                     <br>

                    </div>
                </div>
                 <!-- /. ROW  -->


            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h2 class="col-sm-offset-5" style="color: #232347">Active Admins</h2>

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                     <thead>
                            <tr>
                                <th>id</th>
                                <th>Fistname</th>
                                <th>Lastname</th>
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
                            </tr>
                        </thead>
                        <tbody>
<?php
$query = "SELECT * ";
$query .= "FROM admin ";
$query .= "WHERE status = '1' ";
          $index = 0;
 $result = mysqli_query($db, $query);
 $counter=1;
       	while ( $row = mysqli_fetch_array($result) ) {
		//$row_count =  mysql_num_rows($result);
                $id =$row['id'];
		$_SESSION['fname'] =$row['fname'];;
//                $fname = $_SESSION['fname'];
                $_SESSION['uname'] =$row['uname'];
		$_SESSION['email']= $row['email'];
                $picture = $row['picture'];
                $imagepath = "photo/".$picture;

                ?>
                <tr>
                        <td><?php echo $counter;?></td>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['uname'];?></td>
                        <td><?php echo $row['email']?></td>

                        <td><?php echo $row['phone']?></td>

                        <td><?php echo $row['gender']?></td>
                        <td><img src="<?php echo $imagepath; ?>" alt="sender image" height="50" class="img-rounded"></td>
                        <!--<td><?php echo $row['status']?></td>-->
						<td><?php echo $row['last_logged']?></td>
                        <td><?php echo $row['date']?></td>
                        <td>
				<a href="viewadmins.php?edit=<?php echo $row['id']; ?>" class="edit_btn" style="color:blue;"><button class="btn btn-success">Edit</button></a>
						</td>
						<td>
				<a href="viewadmins.php?deactivate=<?php echo $row['id']; ?>" class="deactivate_btn" style="color:blue;"><button class="btn btn-danger">De-Activate</button></a>
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
			            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h2 class="col-sm-offset-5" style="color: #232347">In-Active Admins</h2>

                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                     <thead>
                            <tr>
                                <th>id</th>
                                <th>Fistname</th>
                                <th>Lastname</th>
                                <th>Username</th>
                                <th>Email</th>

                                <th>Phone Number</th>


                                <th>Gender</th>
                                <th>Picture</th>
                                <!--<th>status</th>-->
                                <th>Date</th>
                                <th>Control</th>

                            </tr>
                        </thead>
                        <tbody>
<?php
$query = "SELECT * ";
$query .= "FROM admin ";
$query .= "WHERE status = '0' ";
          $index = 0;
 $result = mysqli_query($db, $query);
 $counter=1;
       	while ( $row = mysqli_fetch_array($result) ) {
		//$row_count =  mysql_num_rows($result);
                $id =$row['id'];
		$_SESSION['fname'] =$row['fname'];
                $fname = $_SESSION['fname'];
                $_SESSION['lname'] =$row['lname'];
		$_SESSION['email']= $row['email'];
                $picture = $row['picture'];
                $imagepath = "photo/".$picture;

                ?>
                <tr>
                        <td><?php echo $counter;?></td>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['uname'];?></td>
                        <td><?php echo $row['email']?></td>

                        <td><?php echo $row['phone']?></td>

                        <td><?php echo $row['gender']?></td>
                        <td><img src="<?php echo $imagepath; ?>" alt="sender image" height="50" class="img-rounded"></td>
                        <!--<td><?php echo $row['status']?></td>-->
                        <td><?php echo $row['date']?></td>

						<td>
				<a href="viewadmins.php?activate=<?php echo $row['id']; ?>" class="activate_btn" style="color:blue;"><button class="btn btn-success">Activate</button></a>
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
		$record = mysqli_query($db, "SELECT * FROM admin WHERE id=$id");

		if (mysqli_num_rows($record) == 1 ) {
			$n = mysqli_fetch_array($record);
            $fname = $n['fname'];
            $lname = $n['lname'];
//			$uname = $n['uname'];
			$password = $n['password'];
			$email = $n['email'];
			$phone = $n['phone'];
			$gender = $n['gender'];
			$picture = $n['picture'];
		}

?>

                <div class="row">
                <div class="col-md-12">

<form method="post" action="viewadmins.php">
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
                                            <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"></span></span>
                                            <input type="text" class="form-control transparent" placeholder="Fistname"  name="fname" value="<?php echo $fname; ?>"/>

                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"></span></span>
                                            <input type="text" class="form-control transparent" placeholder="Lastname"  name="lname" value="<?php echo $lname; ?>"/>

                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text"></span></span>
                                            <input type="text" class="form-control" placeholder="Email" name="email"  value="<?php echo $email; ?>"/>

                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text"></span></span>
                                            <input type="text" class="form-control" placeholder="Phone Number" name="phone"  value="<?php echo $phone; ?>"/>

                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-email"></span><span class="input-text"></span></span>
                                            <input type="text" class="form-control" placeholder="Gender" name="gender"  value="<?php echo $gender; ?>"/>

                                        </div>

                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"></span></span>
                                            <input type="password" class="form-control" placeholder="Password" name="password"/>

                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><span class="input-icon input-icon-user"></span><span class="input-text"></span></span>
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

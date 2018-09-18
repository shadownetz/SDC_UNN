<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<?php
$id = 0;
if (isset($_GET['activate'])) {
		$id = $_GET['activate'];
		$result = mysqli_query($db, "UPDATE users SET status='1' WHERE id=$id");
		}
?>

                <div class="row">
                    <div class="col-md-12"><h2>Deactivated Users</h2></div>
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
                                <!--<th>status</th>-->
                                <th>Date</th>
                                <th>Control</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$query = "SELECT * ";
$query .= "FROM users ";
$query .= "WHERE status = '0' ";
          $index = 0;
 $result = mysqli_query($db, $query);
 $counter=1;
       	while ( $row = mysqli_fetch_array($result) ) {
		//$row_count =  mysql_num_rows($result);
                $id =$row['id'];
		$_SESSION['fname'] =$row['fname'];
                $first = $_SESSION['fname'];
                $_SESSION['lname'] =$row['lname'];
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
                        <td><?php echo $row['date']?></td>
                        <td>
				<a href="inactivestaff.php?activate=<?php echo $row['id']; ?>" class="activate_btn" style="color:blue;"><button class="btn btn-success">Activate</button></a>
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
                <!-- /. ROW  -->

                <!-- /. ROW  -->

                <!-- /. ROW  -->

                <!-- /. ROW  -->
        </div>

    </div>
<?php include('includes/footer.php'); ?>

<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<?php include("includes/connect.php"); ?>
<?php
$admin_id = $_SESSION['id'];
?>
<?php


	if (isset($_GET['deactivatev'])) {

			$id = $_GET['deactivatev'];
			$result = mysqli_query($db, "UPDATE videos SET status='0' WHERE id=$id");


	}
	if (isset($_GET['activatev'])) {

			$id = $_GET['activatev'];
			$result = mysqli_query($db, "UPDATE videos SET status='1' WHERE id=$id");


	}
	if (isset($_GET['deactivatee'])) {

			$id = $_GET['deactivatee'];
			$result = mysqli_query($db, "UPDATE ebooks SET status='0' WHERE id=$id");


	}
	if (isset($_GET['activatee'])) {

			$id = $_GET['activatee'];
			$result = mysqli_query($db, "UPDATE ebooks SET status='1' WHERE id=$id");


	}





?>

                                <div class="row">

                <div class="column">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="background-color:white;">
                        <center><strong>MANAGE TUTORIALS</strong></center>
                            </div>
							<div class="col-sm-6">
								<div class="panel-body">
									<form action="uploadvideo.php" method="POST" role="form" enctype="multipart/form-data">
	<br/>
											<label>Video Upload</label>
											<div class="form-group input-group">
												<span class="input-group-addon">1</span>
												<input name="vname" type="text" placeholder="Name To be Refered to Video file" class="form-control" required="required"/>
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon">2</span>
												<input name="file" type="file" class="form-control" required="required"/>
											</div>

										 <button type="submit" name="submit" class="btn btn-info" required="required">Upload</button>                                    <hr />
									</form>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="panel-body">
									<form action="uploadebooks.php" method="POST" role="form" enctype="multipart/form-data">
	<br/>
											<label>Ebook Upload</label>
											<div class="form-group input-group">
												<span class="input-group-addon">1</span>
												<input name="ename" type="text" placeholder="Name To be Refered to Ebook file" class="form-control" required="required"/>
											</div>
											<div class="form-group input-group">
												<span class="input-group-addon">2</span>
												<input name="file" type="file" class="form-control" required="required"/>
											</div>

										 <button type="submit" name="submit" class="btn btn-info" required="required">Upload</button>                                    <hr />
									</form>
								</div>
							</div>

                        </div>
                    </div>


        </div>
		 <div class="row">

                                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
					<div class="panel-heading" style="background-color:white;">
                        <center><strong>ACTIVE VIDEO TUTORIALS</strong></center>
                            </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                     <thead>
                            <tr>
                                <th>id</th>

								<th>Display Name</th>
								<th>Name</th>


                                <th>Date</th>

                                <th>Control</th>

                            </tr>
                        </thead>
                        <tbody>
<?php
$query = "SELECT * ";
$query .= "FROM videos ";
$query .= "WHERE status = '1' ";
          $index = 0;
 $result = mysqli_query($db, $query);
 $counter=1;
       	while ( $row = mysqli_fetch_array($result) ) {
		//$row_count =  mysql_num_rows($result);
                $id1 =$row['id'];
                // $name = $_SESSION['name'];
				$date = $row['date'];



                ?>
                <tr>
                        <td><?php echo $counter;?></td>
						<td><?php echo $row['vname'];?></td>
                        <td><?php echo $row['name'];?></td>
						<td><?php echo $row['date']?></td>


						<td>
				<a href="managetutorials.php?deactivatev=<?php echo $row['id']; ?>" class="deactivatev_btn" style="color:blue;"><button class="btn btn-danger">Deactivate</button></a>
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
					<div class="panel-heading" style="background-color:white;">
                        <center><strong>DEACTIVATED VIDEO TUTORIALS</strong></center>
                            </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                     <thead>
                            <tr>
                                <th>id</th>

							   <th>Display Name</th>
								<th>Name</th>


                                <th>Date</th>

                                <th>Control</th>

                            </tr>
                        </thead>
                        <tbody>
<?php
$query = "SELECT * ";
$query .= "FROM videos ";
$query .= "WHERE status = '0' ";
          $index = 0;
 $result = mysqli_query($db, $query);
 $counter=1;
       	while ( $row = mysqli_fetch_array($result) ) {
		//$row_count =  mysql_num_rows($result);
                $id1 =$row['id'];
                $name = $_SESSION['name'];
				$date = $row['date'];



                ?>
                <tr>
                        <td><?php echo $counter;?></td>
                        <td><?php echo $row['vname'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['date']?></td>


						<td>
				<a href="managetutorials.php?activatev=<?php echo $row['id']; ?>" class="activatev_btn" style="color:blue;"><button class="btn btn-warning">Activate</button></a>
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
					<div class="panel-heading" style="background-color:white;">
                        <center><strong>ACTIVE EBOOKS</strong></center>
                            </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                     <thead>
                            <tr>
                                <th>id</th>

								<th>Display Name</th>
								<th>Name</th>


                                <th>Date</th>

                                <th>Control</th>

                            </tr>
                        </thead>
                        <tbody>
<?php
$query = "SELECT * ";
$query .= "FROM ebooks ";
$query .= "WHERE status = '1' ";
          $index = 0;
 $result = mysqli_query($db, $query);
 $counter=1;
       	while ( $row = mysqli_fetch_array($result) ) {
		//$row_count =  mysql_num_rows($result);
                $id1 =$row['id'];
                // $name = $_SESSION['name'];
				$date = $row['date'];



                ?>
                <tr>
                        <td><?php echo $counter;?></td>
                        <td><?php echo $row['ename'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['date']?></td>


						<td>
				<a href="managetutorials.php?deactivatee=<?php echo $row['id']; ?>" class="deactivate_btn" style="color:blue;"><button class="btn btn-danger">Deactivate</button></a>
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
					<div class="panel-heading" style="background-color:white;">
                        <center><strong>DEACTIVATED EBOOKS</strong></center>
                            </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                     <thead>
                            <tr>
                                <th>id</th>

								<th>Display Name</th>
								<th>Name</th>


                                <th>Date</th>

                                <th>Control</th>

                            </tr>
                        </thead>
                        <tbody>
<?php
$query = "SELECT * ";
$query .= "FROM ebooks ";
$query .= "WHERE status = '0' ";
          $index = 0;
 $result = mysqli_query($db, $query);
 $counter=1;
       	while ( $row = mysqli_fetch_array($result) ) {
		//$row_count =  mysql_num_rows($result);
                $id1 =$row['id'];
                $name = $_SESSION['name'];
				$date = $row['date'];



                ?>
                <tr>
                        <td><?php echo $counter;?></td>
                        <td><?php echo $row['ename'];?></td>
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['date']?></td>


						<td>
				<a href="managetutorials.php?activatee=<?php echo $row['id']; ?>" class="activatee_btn" style="color:blue;"><button class="btn btn-warning">Activate</button></a>
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
</div>
<?php include("includes/footer.php"); ?>

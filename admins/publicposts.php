<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<?php
	if (isset($_GET['seen'])) {
		$id = $_GET['seen'];
		$result = mysqli_query($db, "UPDATE public_messages SET status='0' WHERE id=$id");
		}


	if (isset($_GET['remove'])) {
		$id = $_GET['remove'];
		$result = mysqli_query($db, "UPDATE public_messages SET status='2' WHERE id=$id");
		}
?>
	<div class="col-md-12 col-md-offset-4"><h2>Sent Public Messages</h2></div>
			<div class="row contact-wrap">

                <div class="status alert alert-success" style="display: none"></div>
                  <div class="row">

					<div  class="col-sm-12">
	<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						 <thead>
							<th>id</th>
							<td>Name</td>
							<td>Email</td>
							<td>Phone</td>
							<td>Company</td>
							<td>Subject</td>
							<td>Messages</td>
							<td>Date</td>
							<td>Mark</td>
						</thead>
					<?php

$query = "SELECT * FROM  public_messages WHERE status='1' ";

$result = mysqli_query($db, $query);
$counter=1;
					while ( $row = mysqli_fetch_array($result) ) {
//		$row_counter =  mysql_num_rows($result);
                $id =$row['id'];
		$_SESSION['Sender'] =$row['Sender'];
                $Sender = $_SESSION['Sender'];


                ?>

					<tbody>
                <tr>
                        <td><?php echo $counter;?></td>

                        <td><?php echo $row['Sender'];?></td>
                        <td><?php echo $row['Message']?></td>
						<td><?php echo $row['email']?></td>
						<td><?php echo $row['phone']?></td>
						<td><?php echo $row['company']?></td>
						<td><?php echo $row['subject']?></td>
						<td><?php echo $row['date']?></td>

						<td>
						<a href="publicposts.php?seen=<?php echo $row['id']; ?>" class="mark_btn" style="color:blue;"><button class="btn btn-warning">Seen</button></a>
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
					<br>


            </div><!--/.row-->
			<div class="row contact-wrap">
			<div class="col-md-12 col-md-offset-4"><h2>Seen Public Messages</h2></div>
                <div class="status alert alert-success" style="display: none"></div>
                  <div class="column">

					<div  class="col-sm-12">
	<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						 <thead>
							<th>id</th>
							<td>Name</td>
							<td>Email</td>
							<td>Phone</td>
							<td>Company</td>
							<td>Subject</td>
							<td>Messages</td>
							<td>Date</td>
							<td>Mark</td>
						</thead>
					<?php

$query = "SELECT * FROM  public_messages WHERE status='0' ";

$result = mysqli_query($db, $query);
$counter=1;
					while ( $row = mysqli_fetch_array($result) ) {
//		$row_counter =  mysql_num_rows($result);
                $id =$row['id'];
		$_SESSION['Sender'] =$row['Sender'];
                $Sender = $_SESSION['Sender'];


                ?>

					<tbody>
                <tr>
                        <td><?php echo $counter;?></td>

                        <td><?php echo $row['Sender'];?></td>
                        <td><?php echo $row['Message']?></td>
						<td><?php echo $row['email']?></td>
						<td><?php echo $row['phone']?></td>
						<td><?php echo $row['company']?></td>
						<td><?php echo $row['subject']?></td>
						<td><?php echo $row['date']?></td>

						<td>
						<a href="publicposts.php?remove=<?php echo $row['id']; ?>" class="mark_btn" style="color:blue;"><button class="btn btn-danger">Remove</button></a>
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
					<br>


            </div><!--/.row-->
        </div><!--/.container-->

	</div>


	<?php include("includes/footer.php"); ?>

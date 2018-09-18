<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<?php
//include ("../connect.php");
//session_start();
$admin_id = $_SESSION['id'];

?>

  <style>
	body {
		background-color:white;
		}
	hr	{
	margin-top:20px;
	margin-bottom:40px;
}
  </style>

 <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
               
                    <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        
						<center><h3>LIST OF EBOOK TUTORIALS</h3></center>
                        <div class="panel-body">
<hr>



<?php
					
$query = "SELECT * FROM ebooks WHERE status='1' ";
					
$result = mysqli_query($db, $query);
$counter=1;	
					while ( $row = mysqli_fetch_array($result) ) {

                $id =$row['id'];
				$name =$row['name'];
				$ename =$row['ename'];
 
    ?>
	
	<div class="column">
		<div class="col-sm-12">
			<h5><?php echo $counter;?>  &nbsp; <a href="ebooks/<?php echo $name;?>"><?php echo $ename;?></a></h5>
		</div>
	</div>
	
	<?php
		$counter++;
}
	?>




<hr>
						</div>
                    </div>
                    <!--End Advanced Tables -->
					</div>
				</div>
			</div>
		</div>
				
	<!-- /. PAGE WRAPPER  -->
<?php include("includes/footer.php"); ?>
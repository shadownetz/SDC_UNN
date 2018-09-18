<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<div class="col-sm-12 col-md-12  dash-box">
<div class="col-md-12 col-sm-12 dash-inner">
<div class="col-md-12"><h2>Video Tutorials</h2></div>
  <table class="table">


	<?php

$query = "SELECT * FROM videos WHERE status='1' ";

$result = mysqli_query($db, $query);
$counter=1;
					while ( $row = mysqli_fetch_array($result) ) {

                $id =$row['id'];
				$name =$row['name'];
				$vname =$row['vname'];

    ?>

	<tr class="e-row">
	<td><h5 style="float:left; margin-top:80px;"><?php echo $counter;?></h5></td>
	<td>
    <video width="200px" height="100px" controls>
			<source src="videos/html/<?php echo $name;?>" type="video/mp4">
        <source src="videos/html/<?php echo $name;?>" type="video/webm">
		</video>
</td>
	<td><h3 style="text-align:center"><a href="videos/html/<?php echo $name;?>" target="_blank"><?php echo $vname;?></a></h3></td>
	</tr>

	<?php
		$counter++;
}
	?>

</table>
			</div>
<?php include("includes/footer.php"); ?>

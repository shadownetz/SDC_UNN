<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<div class="col-sm-12 col-md-12  dash-box">
<div class="col-md-12 col-sm-12 dash-inner">
<div class="col-md-12"><h2>E-books</h2></div>
<hr/>
<table class="table">
  <?php

  $query = "SELECT * FROM ebooks WHERE status='1' ";

  $result = mysqli_query($db, $query);
  $counter=1;
  					while ( $row = mysqli_fetch_array($result) ) {

                  $id =$row['id'];
  				$name =$row['name'];
  				$ename =$row['ename'];

      ?>
<tr class="e-row">
<td>	<h5><?php echo $counter;?>  &nbsp; <a href="../admins/ebooks/<?php echo $name;?>" target="_blank"><?php echo $ename;?></a></h5></td>
</tr>
<?php
  $counter++;
}
?>
</table>
</div>
<?php include("includes/footer.php"); ?>

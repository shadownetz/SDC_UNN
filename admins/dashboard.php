<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<?php
//include ("../connect.php");
//session_start();
$admin_id = $_SESSION['id'];


        $hour = date("H");
        if($hour >= 22){
            $greeting = "Good Night ". $fname . " , Have a good night rest.";
        }elseif ($hour > 17) {
            $greeting = "Good Evening ". $fname ." , Hope you enjoyed your day?";
        }elseif ($hour > 11) {
            $greeting = "Good Afternoon ". $fname . ", How is your day coming?";
        }elseif ($hour < 12) {
            $greeting = "Good Morning ". $fname .", How was your night?";
        }

?>
  <div class="col-md-12 dash-intro">
    <h1>THE SOFTWARE DEVELOPERS CLUB UNN </h1>
      <h4><?php echo $greeting; ?></h4>
    </div>
  <div class="row">

  <div class="col-md-3 col-sm-12 dash-default">
<a href="newmembers.php">
  <div class="col-md-12 alert-box">
<i class="fa fa-users box-content fa-5x"></i>
<div>New Members(<?php echo $new_members; ?>)</div>
</div>
</a>

  </div>

  <div class="col-md-3  col-sm-12  dash-default">
  <a href="#noti">
<div class="col-md-12 info-box">
<i class="fa fa-inbox box-content fa-5x"></i>
<div>Notifications()</div>
</div>
</div>
</a>

<div class="col-md-3  col-sm-12  dash-default">
    <a href="viewstaff.php">
<div class="col-md-12 info-box">
<i class="fa fa-user box-content fa-5x"></i>
<div>Active Members(<?php echo $members_count; ?>)</div>
</div>
</div>
</a>
</div>


<div class="row" style="padding-top:10px">
  <div class="col-md-3  col-sm-12  dash-default">
  <a href="inactivestaff.php">
<div class="col-md-12 msg-box">
<i class="fa fa-user box-content fa-5x"></i>
<div>Inactive Members(<?php echo $members1_count; ?>)</div>
</div>
</div>
</a>

<div class="col-md-3  col-sm-12  dash-default">
<a href="viewadmins.php">
<div class="col-md-12 info-box">
<i class="fa fa-user-md box-content fa-5x"></i>
<div>Active Admins(<?php echo $admin_count; ?>)</div>
</div>
</div>
</a>

<div class="col-md-3  col-sm-12  dash-default">
<a href="#noti">
<div class="col-md-12 info-box">
<i class="fa fa-bug box-content fa-5x"></i>
<div>Inactive Admins(<?php echo $admin1_count; ?>)</div>
</div>
</div>
</a>

</div>

</div>
</div>
<?php include("includes/footer.php"); ?>

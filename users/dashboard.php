<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<div class="col-sm-12 col-md-12  dash-box">
<div class="col-md-12 col-sm-12 dash-inner">
  <div class="col-md-12 dash-intro">
    <h1>THE SOFTWARE DEVELOPERS CLUB UNN </h1>
      <h5><?php echo $greeting; ?></h5>
    </div>

  <div class="col-md-3 col-sm-12 dash-default">
<a href="writeposts.php">
  <div class="col-md-12 msg-box">
<i class="fa fa-envelope box-content fa-5x"></i>
<div>Messages(<?php global $new_message_count; if($new_message_count!=0){echo $new_message_count;} ?>)</div>
</div>
</a>

  </div>

  <div class="col-md-3  col-sm-12  dash-default">
<div class="col-md-12 info-box">
<i class="fa fa-info box-content fa-5x"></i>
<div>Notifications()</div>
</div>
</div>

<div class="col-md-3  col-sm-12  dash-default">
<div class="col-md-12 alert-box">
<i class="fa fa-warning box-content fa-5x"></i>
<div>Alerts()</div>
</div>
</div>

</div>
</div>
<?php include("includes/footer.php"); ?>

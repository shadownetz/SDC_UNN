<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
    <div class="col-sm-12 col-md-12  dash-box">
        <div class="col-md-12 col-sm-12 dash-inner">
<iframe src="post.php" name="chat">

</iframe>
<div class="col-md-11">

  <form name="contact-form" class="chat-form" method="post" action="post.php" target="chat" autofocus>
    <div class="row">
    <div class="col-md-10 send-area">
              <textarea name="message" id="message" cols="20" rows="" class="form-control" required autofocus></textarea>
</div>
<div class="col-md-1 col-sm-1" >
<button id="send" type="submit" name="submit"><i class="fa fa-send fa-2x"></i></button>
</div>
</div>
  </form>
</div>
</div>
</div> <!--End of dash-box -->
<?php include("includes/footer.php"); ?>

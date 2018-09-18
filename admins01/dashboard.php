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

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Module</h2>   
                        <h3><?php echo $greeting; ?></h2>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">New Members: <?php echo $new_members; ?></p>
                    <p class="text-muted">New Members</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Members: <?php echo $members_count; ?></p>
                    <p class="text-muted">Active Members</p>
                </div>
             </div>
		     </div>
			 <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Members: <?php echo $members1_count; ?></p>
                    <p class="text-muted">In-Active Members</p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Admins: <?php echo $admin_count; ?></p>
                    <p class="text-muted">Active Admins</p>
                </div>
             </div>
		     </div>
			 <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Admins: <?php echo $admin1_count; ?></p>
                    <p class="text-muted">In-Active Admins</p>
                </div>
             </div>
		     </div>
                    
                
			</div>
                 <!-- /. ROW  -->
                <hr />                
                
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
<?php include("includes/footer.php"); ?>
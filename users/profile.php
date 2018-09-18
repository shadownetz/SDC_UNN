<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
 <div class="col-sm-12 col-md-12  dash-box">
 <div class="col-md-12 col-sm-12 dash-inner">
   <div class="col-md-12"><h2>User Profile</h2></div>
<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">

<div class="container-fluid">
  <center><img src="<?php echo $imagepath; ?>" alt="user image" height="100" class="col-lg-offset-5 img-rounded user-image"></center>
<?php echo display_error(); ?>
</div>
<div class="form-group col-md-12">
  <div class="row">
  <input type="hidden" class="form-control transparent" placeholder="Id"  name="id" value="<?php echo $id; ?>"/>

<div class="col-md-6 push_Up"><label for="fname">Firstname</label><input type="text" class="form-control" name="fname" placeholder="enter firstname" value="<?php echo $fname;?>"></div>

<div class="col-md-6 push_Up"><label for="lname">Lastname</label><input type="text" class="form-control" name="lname" placeholder="enter lastname" value="<?php echo $lname; ?>"></div>

<div class="col-md-6 push_Up"><label for="email">Email</label><input type="email" class="form-control" name="email" placeholder="enter email" value="<?php echo $email;?>"></div>

<div class="col-md-6 push_Up"><label for="password">New Password (min:10)</label><input type="password" class="form-control" name="password" placeholder="password"></div>

<div class="col-md-6 push_Up"><label for="password">Re-enter Password</label><input type="password" class="form-control" name="password1" placeholder="re-enter password"></div>

<div class="col-md-6 push_Up"><label for="phone">Phone-number</label><input type="tel" class="form-control" name="phone" placeholder="phone number" value="<?php echo $phone;?>"></div>

<div class="col-md-6 push_Up"><label for="level">Level</label>
  <select name="level" class="form-control" required>
      <option value="<?php echo $level ?>">Select Level</option>
      <option value="100">100</option>
      <option value="200">200</option>
      <option value="300">300</option>
      <option value="400">400</option>
      <option value="500">500</option>
      <option value="other">Other</option>
  </select>
</div>

<div class="col-md-6 push_Up"><label for="gender">Gender</label>
  <select name="gender" class="form-control">
<option value="<?php echo $gender;?>"><?php echo $gender; ?></option>
<option value="male">Male</option>
<option value="female">Female</option>
  </select>
</div>


<div class="col-md-12 push_Up">
  <center><input type="submit" class="btn btn-warning" name="update" value="Update Info"></center>
</div>

</div>

</div>

</form>

 </div>
 </div>
<?php include("includes/footer.php"); ?>

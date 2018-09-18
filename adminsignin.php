<?php include("includes/header.php"); ?> 
	
<br>
<br>

	
	<section id="contact-page">
        <div class="container">
		<div class="center">        
                <h3 style="margin-left:60px;">Admin Login</h3>
            </div>
		<div class="col-xs-8 col-md-offset-3">
             
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="process_adminsignin.php">
                    <div class="col-sm-8 col-sm-offset-1">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="uname" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required="required">
                        </div>
                       <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit</button>
                        </div>
                                             
                    </div>
                    
                </form> 
            </div>
			</div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#contact-page-->
	
	<?php include("includes/footer.php"); ?> 
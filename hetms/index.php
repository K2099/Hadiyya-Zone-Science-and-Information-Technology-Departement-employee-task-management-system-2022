<?php
require 'authentication.php'; 
if(isset($_SESSION['admin_id'])){
  $user_id = $_SESSION['admin_id'];
  $user_name = $_SESSION['admin_name'];
  $security_key = $_SESSION['security_key'];
  if ($user_id != NULL && $security_key != NULL) {
    header('Location: task-info.php');
  }
}

if(isset($_POST['login_btn'])){
 $info = $obj_admin->admin_login_check($_POST);
}

$page_name="Login";
include("include/login_header.php");

?>
<style>
	html, body{
		height:100%;
		width:100%;
		margin:unset !important
	}
	.main{
		display:flex;
		align-items:center;
		justify-content:center;
		height:100%;
		width:100%;
		margin:unset !important
		
	}
</style>
<div class="col-lg-4 col-md-6 col-sm-12">
	<div class="well rounded-0" style="background:rgba(0, 0, 0.1);" !important>
	
	<center><h4 style="margin-top:1px;">Hadiyya Zone Science and Information Technology Departement Task Management System </h2></center>
	<center><h4 style="margin-top:1px;"> የሀዲያ ዞን ሳይንስና እንፎርሜሽን ቴክኖሎጂ መምርያ የተግባር አስተዳደር ስርዓት</h2></center>
	<form class="form-horizontal form-custom-login" action="" method="POST">
			<div class="form-heading">
			<h3 class="text-center">Login Panel | መግቢያ ፓነል</h2>
			
			</div>
			
			
			<?php if(isset($info)){ ?>
			<h5 class="alert alert-danger"><?php echo $info; ?></h5>
			<?php } ?>
			<div class="form-group">
			<input type="text" class="form-control rounded-0" placeholder="Username" name="username" required/>
			</div>
			<div class="form-group" ng-class="{'has-error': loginForm.password.$invalid && loginForm.password.$dirty, 'has-success': loginForm.password.$valid}">
			<input type="password" class="form-control rounded-0" placeholder="Password" name="admin_password" required/>
			</div>
			
			<center><button type="submit" name="login_btn" class="btn btn-info pull">Login | ግባ </button></center>
			
		</form>
	</div>
</div>


<?php

include("include/footer.php");

?>

<?php
session_start();
include "dbconfig.php";
if (isset($_POST['save'])) {
	$q1="INSERT INTO `user`(`username`, `password`, `name`,`year`,`semester`,`rollno`) VALUES ('".$_POST['email']."','".$_POST['password']."','".$_POST['name']."','".$_POST['year']."','".$_POST['semester']."','".$_POST['rollno']."')";
	$status=mysqli_query($con,$q1);
	if ($status) {
		echo '1';	
	}
	else{
		echo '0';
	}
	exit();
}
else if (isset($_POST['username_check'])) {
	$q="select username from user where username='".$_POST['emailid']."'";
	$result=mysqli_query($con,$q);
	$num=mysqli_num_rows($result);
	if ($num){
		echo '1';
	}
	else{
		echo '0';
	}

	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="js/jQuery.js"></script>

	<style>
		label{
			font-size: 16px;
			font-weight: bold;
			text-transform: uppercase;
		}
		body{
			background-image:linear-gradient(to top,cyan,black);
			height: 100vh;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md">
				<form class="mt-5 bg-light pt-5 pb-5 pr-5 pl-5">
					<div id="error_msg"  class="bg-info text-center text-light font-weight-normal p-3 d-block mb-2 ">Fill the following Form Carefully</div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md">
								
								<div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required autofocus>
									<span id="msg" class="text-success">Remember ! Your Email Id will be treated as your User Id</span>
								</div>
							</div>
							<div class="col-md">
								
								<div class="form-group">
									<label for="exampleInputPassword1">Password</label>
									<input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md">
								
								<div class="form-group">
									<label for="exampleInputPassword1">Roll No</label>
									<input type="password" class="form-control" name="rollno" id="rollno" placeholder="Roll Number" required>
								</div>

							</div>
							<div class="col-md">
								
								<div class="form-group">
									<label for="exampleInputPassword1">Your Full Name</label>
									<input type="text" class="form-control" name="name" id="name" placeholder="eg. John Doe" required>
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col-md">
								
								<div class="form-group mb-3">
									<div class="input-group-prepend">
										<label>Year</label>
									</div>
									<select class="custom-select" name="role" value=this.value id="inputGroupSelect01">
										<option selected>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
									</select>
								</div>
							</div>
							<div class="col-md">
								


								<div class="form-group mb-3">
									<div class="input-group-prepend">
										<label>Semester</label>
									</div>
									<select class="custom-select" name="role" value=this.value id="inputGroupSelect02">
										<option selected>1</option>
										<option>2</option>
										<option>3</option>
										<option>4</option>
										<option>5</option>
										<option>6</option>
										<option>7</option>
										<option>8</option>
									</select>
								</div>
							</div>
						</div>


					</div>

					<button type="button" class="btn btn-dark btn-block" id="register_btn" name="register">Register</button>
					<center class="pt-4">Already Registered? <a href="Login.php" class="">Login</a></center>	
				</form>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			var flag=0;
			$("#email").on('blur', function(event) {
				event.preventDefault();
				/* Act on the event */
				var username=$("#email").val();
				if (username=='') {
					flag=0;
					return;
				}
				else{
					$.ajax({
						url: 'register.php',
						method:'post',
						data : { emailid: username,username_check:1 },
						success:function(response){
							if (response==1) {
								flag=0;
								$("#msg").removeClass();
								$("#msg").addClass('text-danger font-weight-bold');
								$("#msg").text("Email has already been taken");
							}
							else if(response==0){
								flag=1;
								$("#msg").removeClass();
								$("#msg").addClass('text-success font-weight-bold');
								$("#msg").text("Email is available");

							}

						}
					});

				}

			});
			$("#register_btn").on('click',function(event) {
				event.preventDefault();
				/* Act on the event */
				if (flag==0) {
					$("#error_msg").addClass('text-success font-weight-bold');
					$("#error_msg").text("Please Fill Up The correct Details");
				}
				else{
					var password=$("#password").val();
					var username=$("#email").val();
					var name=$("#name").val();
					var year=$("#inputGroupSelect01").val();
					var semester=$("#inputGroupSelect02").val();
					var rollno=$("#rollno").val();
					$.ajax({
						url: 'register.php',
						method:'post',
						data : { email: username,save:1,password:password,name:name,year:year,semester:semester,rollno:rollno },
						success:function(response){
							if (response==1) {
								$("#error_msg").removeClass();
								$("#error_msg").addClass('bg-success text-center text-light font-weight-normal p-3 d-block mb-2 ');
								$("#error_msg").text("Successfully Registered");
							}
							else if(response==0){
								$("#error_msg").removeClass();
								$("#error_msg").addClass('bg-danger text-center text-light font-weight-normal p-3 d-block mb-2 ');
								$("#error_msg").text("Some Problem Occured ! Please try Again");

							}

						}
					});
				}
			});
		});
	</script>
</body>
</html>
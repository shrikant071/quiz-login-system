<?php
session_start();
include "dbconfig.php";
if (isset($_POST['login'])) {
	if ($_POST['role']=='student') {
		$q2="select *from user where username='".$_POST['email']."'&&password='".$_POST['password']."'";
		$result=mysqli_query($con,$q2);
		$num=mysqli_num_rows($result);
		if ($num==1) {
			$_SESSION['student']=$_POST['email'];
			header("location:individual.php");
		}
		else{
			echo "<script>";
			echo 'alert("username or Password in Incorrect !")';
			echo "</script>";

		}
	}
	if ($_POST['role']=='admin') {
		$q2="select *from admin where username='".$_POST['email']."'&&password='".$_POST['password']."'";
		$result=mysqli_query($con,$q2);
		$num=mysqli_num_rows($result);
		if ($num==1) {			
			$_SESSION['admin']=$_POST['email'];
			$_SESSION['student']=$_POST['email'];

			header("location:admin_home.php");

		}
		else{
			echo "<script>";
			echo 'alert("username or Password in Incorrect !")';
			echo "</script>";
		}
	}	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<style>
		body{
			background-image: linear-gradient(to right,red,violet);
			background-repeat: no-repeat;
			height: 100vh;
		}
		label{
			font-size: 16px;
			font-weight: bold;
			text-transform: uppercase;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<form class="mt-5 p-5 bg-light" action="login.php" method="post">


					<div class="form-group mb-3">
						<div class="input-group-prepend">
							<label>Select your role</label>
						</div>
						<select class="custom-select" name="role" value=this.value id="inputGroupSelect01">
							<option selected>student</option>
							<option>admin</option>
						</select>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
					</div>

					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" name="password" required>
					</div>
					<button type="submit" class="btn btn-dark btn-block" name="login">Login</button>
					  <center class="pt-4">Not Registered? <a href="register.php" class="">Register Here</a></center>	

				</form>
			</div>
		</div>
	</div>
</body>
</html>

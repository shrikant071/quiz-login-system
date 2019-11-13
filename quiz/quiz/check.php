<?php
session_start();
include "dbconfig.php";
$right=0;
$Attempted=0;
$wrong=0;
$notAttempted=0;
$emailid=$_SESSION['student'];
$question=array();
foreach ($_POST as $key => $value) {
	array_push($question,$value);
}
for ($i=0,$j=1; $i <count($question); $i+=2,$j+=2) { 
	$q="SELECT * FROM `quiz_table` WHERE `question`='$question[$i]' AND `answer`='$question[$j]'";
	$result=mysqli_query($con,$q);
	$num=mysqli_num_rows($result);
	if ($num){
		$right++;
		$Attempted++;
	}
	elseif ($question[$j]=='not_attempted') {
		$notAttempted++;
	}
	elseif ($question[$j]!=='not_attempted'&&$num) {
		$Attempted++;
	}
	else{
		$wrong++;
		$Attempted++;
	}
}
$q3="SELECT name FROM `user` WHERE username='$emailid'";
$tell=mysqli_query($con,$q3);
$row1=mysqli_fetch_array($tell);
$q2="INSERT INTO `result`(`name`, `emailid`, `marks`) VALUES ('".$row1['name']."','".$_SESSION['student']."','$right')";
mysqli_query($con,$q2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Quiz</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<style>
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
			<div class="col-md-8">
				<div class="jumbotron">	
					<h2 class="display-4 text-center">Your Score</h2>
					<table class="table table-bordered">
						<tr>
							<th>Total Questions</th>
							<th><?php echo $Attempted+$notAttempted;?></th>
						</tr>

						<tr>
							<th>You Have Attempted</th>
							<th><?php echo $Attempted;?></th>
						</tr>

						<tr>
							<th>Not Attempted</th>
							<th><?php echo $notAttempted;?></th>
						</tr>

						<tr>
							<th>Wrong Answers</th>
							<th><?php echo $wrong;?></th>
						</tr>

						<tr>
							>
							<th>Your Marks</th>
							<th><?php echo $right;?></th>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script>

	</script>
</body>
</html>
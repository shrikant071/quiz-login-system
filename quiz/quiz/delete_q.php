<?php
include "dbconfig.php";
if (isset($_POST['delete'])) {
	$q="DELETE FROM `quiz_table` WHERE q_id='".$_POST['id']."'";
	$result=mysqli_query($con,$q);
	if ($result) {
		echo $_POST['id'];
	}
}
else
header("location:login.php");
?>

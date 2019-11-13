<?php
include "dbconfig.php";
if (isset($_POST['update'])) {
	$q="SELECT * FROM `quiz_table` WHERE q_id='".$_POST['id']."'";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_array($result);
   echo json_encode($row);

}
else if (isset($_POST['question'])) {
	$q="UPDATE `quiz_table` SET `question`='".$_POST['question']."',`option1`='".$_POST['option1']."',`option2`='".$_POST['option2']."',`option3`='".$_POST['option3']."',`option4`='".$_POST['option4']."',`answer`='".$_POST['answer']."' WHERE q_id='".$_POST['q_id']."'";
	$result=mysqli_query($con,$q);
	if($result){
		echo "Updated Successfully !";
	}
	else
		echo "Failure";
}
else
header("location:login.php");
?>
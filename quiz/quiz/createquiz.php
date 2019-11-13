<?php
include "dbconfig.php";
$question=$_POST['question'];
$option1=$_POST['option1'];
$option2=$_POST['option2'];
$option3=$_POST['option3'];
$option4=$_POST['option4'];
$answer=$_POST['answer'];
$q="INSERT INTO `quiz_table`(`question`, `option1`, `option2`, `option3`, `option4`, `answer`) VALUES ('$question','$option1','$option2','$option3','$option4','$answer')";
$result=mysqli_query($con,$q);
if ($result) {
	echo "Question has been Added Successfully";
}
?>
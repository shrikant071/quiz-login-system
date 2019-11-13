<?php
session_start();
include "dbconfig.php";
if (isset($_SESSION['student'])) {
$q="SELECT `question`,`option1`, `option2`, `option3`, `option4` FROM `quiz_table`";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if ($num==0) {
  echo "sorry there are no questions";
}
}
else
header("location:login.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Quiz</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/jQuery.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <a class="navbar-brand display-2 font-weight-bold" href="index.php">BUIT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mr-5">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Photos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>

          </ul>
        </div>
      </nav>
<div class="container-fluid">
  <div class="jumbotron mt-3">
    <h3 class="text-success font-weight-normal">Read the instructions carefully :</h3>
    <ul>
      <li>There are Total 20 Questions in the Quiz</li>
      <li>All Questions carry Equal Marks</li>
      <li>There is no <b>Negative</b> Marking</li>
      <li>It's not Compulsary to Attempt All the Questions</li>
    </ul>
        <h3 class="text-danger font-weight-bold">Warning :</h3>
    <ul><li>If you will try to minimize the browser window then you will be disqualified</li>
      <li>If you will try to open a new tab of the browser then also you will be disqualified</li>
      <li>If you will try to open any application then  you will be disqualified</li></ul>
  </div>
	<div class="row justify-content-center">
		<div class="col-md">
				<form class="mt-1" action="check.php" method="post" id="myform">
  <?php
  for ($i=0; $i < $num; $i++) { 
    $row=mysqli_fetch_array($result);
  ?>
    <div class="section bg-success pb-1 mt-2 pl-3 pt-2">
      <div class="form-group">
    <label for="exampleInputEmail1" class="font-weight-bold"><?php echo $i+1;echo ") ".$row['question'];?></label>
    <input type="hidden" class="form-control" placeholder="question" name="question<?php echo $i;?>"
    value="<?php echo $row['question'];?>">
  </div>
  <div class="form-check text-light">
  <input class="form-check-input" type="radio" name="option<?php echo $i;?>" value="1">
  <label class="form-check-label" for="option1">
    <?php echo $row['option1'];?>
  </label>
</div>
<div class="form-check text-light">
  <input class="form-check-input" type="radio" name="option<?php echo $i;?>"  value="2">
  <label class="form-check-label" for="option1">
    <?php echo $row['option2'];?>
  </label>
</div><div class="form-check text-light">
  <input class="form-check-input" type="radio" name="option<?php echo $i;?>"  value="3">
  <label class="form-check-label" for="option1">
    <?php echo $row['option3'];?>
  </label>
</div>
<div class="form-check text-light mb-3">
  <input class="form-check-input" type="radio" name="option<?php echo $i;?>"  value="4">
  <label class="form-check-label" for="option1">
    <?php echo $row['option4'];?>
  </label>
</div>
 <div class="form-check bg-info text-light">
  <input class="form-check-input" type="radio" style="display: none" name="option<?php echo $i;?>" value="not_attempted" checked>
  </div>
    </div>

    <?php
  }
  ?>
  <button type="button" id="submitbtn" class="btn btn-dark mb-2 btn-block mt-3">Submit</button>
</form>


<div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title text-danger font-weight-bold" id="exampleModalLabel">Warning</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

		</div>
	</div>
</div>
<script type = "text/javascript">
$(document).ready(function() {
  $("#submitbtn").click(function(event) {
    var response=confirm("Do You Want To Continue ?");
    if (response) {
      $("#myform").submit();
    }
  });
});
$(document).ready(function() {
  var count=0;
    $(window).on('focus', function(event) {
      event.preventDefault();
      /* Act on the event */

      count++;
      if (count==1) {
      $(".modal-body").html('<ul><li>Now If you will try to minimize the browser window then you will be disqualified</li><li>Now If you will try to open a new tab of the browser then also you will be disqualified</li><li>Now if you will try to open any application then  you will be disqualified</li></ul>');
      $("#alertModal").modal('show');
      }
      if (count==2) {
      $(".modal-body").text('You are Now Disqualified');
      $("#alertModal").modal('show');
      }
    });

});
      </script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
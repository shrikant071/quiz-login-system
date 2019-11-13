<?php
session_start();
include "dbconfig.php";
if (isset($_SESSION['admin'])) {
	$q2="select *from result order by marks desc";
	$result=mysqli_query($con,$q2);
	$num=mysqli_num_rows($result);


	$q4="SELECT `userid`, `username`, `name` FROM `user`";
	$result4=mysqli_query($con,$q4);
	$num4=mysqli_num_rows($result4);


	$q5="SELECT * FROM `quiz_table`";
	$result5=mysqli_query($con,$q5);
	$num5=mysqli_num_rows($result5);
}
else
	header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Online Quiz</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="js/jQuery.js"></script>

	<style>
		label{
			font-size: 16px;
			font-weight: bold;
			text-transform: uppercase;
		}
		#update_profile,#view_project,#view_student
		{
			display: none;
		}
		body{
			padding:0;
			margin:0;
			background-color: #ffffff;
		}

	</style>
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
		<div class="row" style="height: 100vh;">
			<div class="col-md-2 bg-dark p-4">
				<button class="btn-lg btn btn-block btn-light" onclick="showdata(event,'update_profile');">DashBoard</button>
				<button class="btn-lg btn btn-block btn-light" onclick="showdata(event,'add_project');">Make Quiz</button>
				<button class="btn-lg btn btn-block btn-light" onclick="showdata(event,'view_project');">View Result</button>
				<button class="btn-lg btn btn-block btn-light" onclick="showdata(event,'view_student');">Candidates List</button>
			</div>
			<div class="col-md-10">
				<div id="view_project" class="divcont">
					<table class="table table-bordered text-center table-responsive-sm">
						<thead class="thead-light">
							<tr>
								<th scope="col">S.No</th>
								<th scope="col">ID</th>
								<th scope="col">Name</th>
								<th scope="col">Email ID</th>
								<th scope="col">Marks</th>
							</tr>
						</thead>
						<tbody>
							<?php
							for ($i=0; $i <$num ; $i++) { 
								$row=mysqli_fetch_array($result);
								?>
								<tr>
									<th><?php echo $i+1;?></th>
									<th scope="row"><?php echo $row['id']; ?></th>
									<td><?php echo $row['name']; ?></td>
									<td><?php echo $row['emailid']; ?></td>
									<td><?php echo $row['marks']; ?></td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>

				</div>


				<div id="update_profile" class="divcont">
					<h1 class="display-4">Dashboard</h1><hr>
					<div class="container mt-2 bg-light">
						<div class="row justify-content-center">
							<div class="col-md-4 bg-warning text-center p-3">
								<h3>Students Participated</h3>
								<h2 class="display-3"><?php echo $num4;?></h2>
							</div>
							<div class="col-md-4 bg-info text-center p-3">
								<h3>Students Participated</h3>
								<h2 class="display-3">48</h2>
							</div>
							<div class="col-md-4 bg-success text-center p-3">
								<h3>Students Participated</h3>
								<h2 class="display-3">48</h2>
							</div>
						</div>


						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal">
							Launch demo modal
						</button>


					</div>
				</div> 

				<div id="view_student" class="divcont">
					<h1 class="display-5">Students List</h1>
					<table class="table table-bordered text-center table-responsive-sm">
						<thead class="thead-light">
							<tr>
								<th scope="col">S.No</th>
								<th scope="col">ID</th>
								<th scope="col">Name</th>
								<th scope="col">Email ID</th>
							</tr>
						</thead>
						<tbody>
							<?php
							for ($i=0; $i <$num4 ; $i++) { 
								$row4=mysqli_fetch_array($result4);
								?>
								<tr>
									<th><?php echo $i+1;?></th>
									<th><?php echo $row4['userid']; ?></th>
									<td><?php echo $row4['name']; ?></td>
									<td><?php echo $row4['username']; ?></td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>

				</div>               

				<div id="add_project" class="divcont">
					<h1 class="text-center bg-warning p-2">Create Quiz Area</h1>
					<div class="container">
						<div class="row bg-primary p-2">
							<div class="col-md-10">

								<h1 class="mr-auto text-light">Questions Count : <?php echo $num5;?></h1></span>
							</div>
							<div class="col-md-2 mt-1 text-center">
								<a href="#" class="btn btn-light btn-lg" id="add_btn" data-toggle="modal" data-target="#updateModal">ADD</a>
							</div>
						</div>
					</div>
					<table class="table mt-3 table-responsive">
						<thead class="thead-light">
							<tr>
								<th scope="col">S.No.</th>
								<th scope="col">Q_Id</th>
								<th scope="col">Question</th>
								<th scope="col">Option 1</th>
								<th scope="col">Option 1</th>
								<th scope="col">Option 1</th>
								<th scope="col">Option 1</th>
								<th scope="col">Answer</th>
								<th scope="col">Update</th>
								<th scope="col">Delete</th>
							</tr>
						</thead>
						<tbody>
							<?php
							for ($i=0; $i <$num5 ; $i++) { 
								$row5=mysqli_fetch_array($result5);
								?>
								<tr id="<?php echo $row5['q_id']?>">
									<th><?php echo $i+1; ?></th>
									<th><?php echo $row5['q_id']; ?></th>
									<td><?php echo $row5['question']; ?></td>
									<div class="collapse" id="collapseExample">
  <div class="card card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div>

									<td><?php echo $row5['option1']; ?></td>
									<td><?php echo $row5['option2']; ?></td>
									<td><?php echo $row5['option3']; ?></td>
									<td><?php echo $row5['option4']; ?></td>
									<td><?php echo $row5['answer']; ?></td>
									<td><button class="btn btn-success" id="update_btn" data-toggle="modal" data-target="#updateModal" onclick="update_q(<?php echo $row5['q_id']; ?>);">UPDATE</button></td>
									<td><buttn class="btn btn-danger" id="delete_btn" onclick="delete_q(<?php echo $row5['q_id']; ?>);">DELETE</button></td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
					<span id="msg1"></span>
					<!-- Modal -->
					<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Add Modal</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									...
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>

					<!-- Modal -->
					<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Update Modal</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">

									<div class="container-fluid">
										<div class="row">
											<div class="col-md">
												<form id="update_form">
													<div class="form-group">
														<input type="hidden" class="form-control" id="q_id" name="q_id">
													</div>
													<div class="form-group">
														<label for="exampleInputEmail1">Enter the Question</label>
														<textarea class="form-control" id="question" name="question">hello</textarea>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md">
													<div class="form-group">
														<label for="exampleInputPassword1">option 1</label>
														<input type="text" class="form-control" id="option1" value="hello" placeholder="option 1" name="option1">
													</div>
												</div>
												<div class="col-md">
													<div class="form-group">
														<label for="exampleInputPassword1">option 2</label>
														<input type="text" class="form-control" id="option2" placeholder="option 1" name="option2">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md">
													<div class="form-group">
														<label for="exampleInputEmail1">option 3</label>
														<input type="text" class="form-control" id="option3" placeholder="option 2" name="option3">
													</div>
												</div>
												<div class="col-md">
													<div class="form-group">
														<label for="exampleInputPassword1">option 4</label>
														<input type="text" class="form-control" id="option4" placeholder="option 3" name="option4">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md">
													<div class="form-group">
														<label for="exampleInputPassword1">answer</label>
														<input type="text" class="form-control" id="answer" placeholder="1 or 2 or 3 or 4" name="answer">
													</div>
												</div>
											</div>

										</div>
										<div class="text-center text-light">
											<h1 id="msg3" class="bg-success"></h1>

										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" id="update-btn" class="btn btn-primary">Save changes</button>
									</div>
								</form>
							</div>
						</div>
					</div>
<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Link with href
  </a>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Button with data-target
  </button>
</p>
					<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
					<form id="data">
						<div class="form-group">
							<label for="exampleInputEmail1">Enter the Question</label>
							<textarea class="form-control" placeholder="question" name="question"></textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">option 1</label>
							<input type="text" class="form-control" placeholder="option 1" name="option1">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">option 2</label>
							<input type="text" class="form-control" placeholder="option 2" name="option2">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">option 3</label>
							<input type="text" class="form-control" placeholder="option 3" name="option3">
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">option 3</label>
							<input type="text" class="form-control" placeholder="option 4" name="option4">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">answer</label>
							<input type="text" class="form-control" placeholder="1 or 2 or 3 or 4" name="answer">
						</div>

						<center><input type="submit" class="btn btn-primary mb-4" value="Add Question" id="submitbtn" onclick="addquestion();"></center>
					</form>
				</div> 
			</div>
		</div>
	</div>
	<script>
		function showdata(event,id)
		{
			var i,divcontent;
			divcontent=document.getElementsByClassName("divcont");
			for (i=0; i <divcontent.length; i++) {
				divcontent[i].style.display="none";
			}
			document.getElementById(id).style.display="block";
		}
		function addquestion(){
			$("#data").submit(function(e) {
				e.preventDefault();
				$.ajax({
					url:"createquiz.php",
					type: 'POST',
					data: new FormData(this),
					contentType: false,
					processData: false,
					success: function (data) {
						alert(data);
						location.reload(true);
					}

				});
			});
		}
		function delete_q(id) {
			$.ajax({
				url: 'delete_q.php',
				method:'post',
				data : { id: id,delete:1 },
				success:function(response){
					$("#"+response).hide('fast', function() {

					});
				}
			});

		}
		function update_q(id) {
			$.ajax({
				url: 'update.php',
				method:'post',
				data : { id: id,update:1 },
				dataType:'json',
				success:function(response){
					$("#q_id").val(id);
					$("#question").val(response.question);
					$("#option1").val(response.option1);
					$("#option2").val(response.option2);
					$("#option3").val(response.option3);
					$("#option4").val(response.option4);
					$("#answer").val(response.answer);
				}
			});

		}
		$(document).ready(function() {
			$("#update_form").submit(function(event) {
				/* Act on the event */
				event.preventDefault();
				$.ajax({
					url:'update.php',
					method:'post',
					data:new FormData(this),
					contentType: false,
					processData: false,
					success:function(response){
						$("#msg3").html(response);
					}
				});
			});
		});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
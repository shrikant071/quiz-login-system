<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/jQuery.js"></script>
	<script src="js/bootstrap.min.js"></script>

	<title>BUIT QUIZ</title>
</head>
<body>
	<div class="contain">
		<img src="images/quiz.jpg" alt="img">
		<div class="content">
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
			<div class="container-main">
				<h3 class="display-4">Welcome to Buit Quiz Competiton</h3>
				<a class="btn btn-outline-light btn-lg" href="register.php">Start Quiz</a>
			</div>
		</div>
	</div>


	<script>
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
	</script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
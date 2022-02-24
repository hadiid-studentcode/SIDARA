<?php
include "function.php";

if (isset($_POST["login"])) {

	if (login($_POST) > 0) {
		echo "<script>
            alert('sukses login !');
        </script>";
	} else {
		echo mysqli_error($conn);
	}
}


?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="shortcut icon" href="images/logosidara.png">
	<title>Login</title>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

		* {
			box-sizing: border-box;
			margin: 0;
			padding: 0;
			font-family: Raleway, sans-serif;
		}

		body {
			background: linear-gradient(90deg, #C7C5F4, #d9d7ec);
		}

		.container {
			display: flex;
			align-items: center;
			justify-content: center;
			min-height: 100vh;
		}

		.screen {
			background: linear-gradient(90deg, #5D54A4, #7C78B8);
			position: relative;
			height: 600px;
			width: 360px;
			box-shadow: 0px 0px 24px #5C5696;
		}

		.screen__content {
			z-index: 1;
			position: relative;
			height: 100%;
		}

		.screen__background {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			z-index: 0;
			-webkit-clip-path: inset(0 0 0 0);
			clip-path: inset(0 0 0 0);
		}

		.screen__background__shape {
			transform: rotate(45deg);
			position: absolute;
		}

		.screen__background__shape1 {
			height: 520px;
			width: 520px;
			background: #FFF;
			top: -50px;
			right: 120px;
			border-radius: 0 72px 0 0;
		}

		.screen__background__shape2 {
			height: 220px;
			width: 220px;
			background: #6C63AC;
			top: -172px;
			right: 0;
			border-radius: 32px;
		}

		.screen__background__shape3 {
			height: 540px;
			width: 190px;
			background: linear-gradient(270deg, #5D54A4, #6A679E);
			top: -24px;
			right: 0;
			border-radius: 32px;
		}

		.screen__background__shape4 {
			height: 400px;
			width: 200px;
			background: #7E7BB9;
			top: 420px;
			right: 50px;
			border-radius: 60px;
		}

		.login {
			width: 320px;
			padding: 30px;
			padding-top: 156px;
		}

		.login__field {
			padding: 20px 0px;
			position: relative;
		}

		.login__icon {
			position: absolute;
			top: 30px;
			color: #7875B5;
		}

		.login__input {
			border: none;
			border-bottom: 2px solid #D1D1D4;
			background: none;
			padding: 10px;
			padding-left: 24px;
			font-weight: 700;
			width: 75%;
			transition: .2s;
		}

		.login__input:active,
		.login__input:focus,
		.login__input:hover {
			outline: none;
			border-bottom-color: #6A679E;
		}

		.login__submit {
			background: #fff;
			font-size: 14px;
			margin-top: 30px;
			padding: 16px 20px;
			border-radius: 26px;
			border: 1px solid #D4D3E8;
			text-transform: uppercase;
			font-weight: 700;
			display: flex;
			align-items: center;
			width: 100%;
			color: #4C489D;
			box-shadow: 0px 2px 2px #5C5696;
			cursor: pointer;
			transition: .2s;
		}

		.login__submit:active,
		.login__submit:focus,
		.login__submit:hover {
			border-color: #6A679E;
			outline: none;
		}

		.button__icon {
			font-size: 24px;
			margin-left: auto;
			color: #7875B5;
		}

		.social-login {
			position: absolute;
			height: 140px;
			width: 160px;
			text-align: center;
			bottom: 0px;
			right: 0px;
			color: #fff;
		}

		.social-icons {
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.social-login__icon {
			padding: 20px 10px;
			color: #fff;
			text-decoration: none;
			text-shadow: 0px 0px 8px #7875B5;
		}

		.social-login__icon:hover {
			transform: scale(1.5);
		}

		.alert {
			color: red;
			font-size: 14px;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="screen">

			<div class="screen__content">
				<img src="images/logosidarapng.png" class="rounded mx-auto d-block" alt="..." height="200" style="position: fixed;">


				<form class="login" action="" method="POST">
					<?php
					if (isset($_GET['pesan'])) {

						if ($_GET['pesan'] == "gagal") {
							echo "<div class = 'alert'>Username dan password tidak sesuai !</div>";
						}
					}
					?>


					<div class="login__field">
						<i class="login__icon fas fa-user"></i>
						<input type="text" class="login__input" placeholder="User name" name="username" autofocus>
					</div>
					<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" class="login__input" placeholder="Password" name="password">
					</div>
					<button class="button login__submit" name="login">
						<span class="button__text">Log In Now</span>
						<i class="button__icon fas fa-chevron-right"></i>
					</button>
				</form>

			</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
			</div>
		</div>
	</div>

	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
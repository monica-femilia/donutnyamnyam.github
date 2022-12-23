<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register | DONUT NYAM NYAM</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body id="bg-login">
	<div class="box-login">
		<h2>Register</h2>
		<form action="" method="POST">
			<input type="text" name="user" placeholder="Username" class="input-control"> 
			<input type="text" name="email" placeholder="Email" class="input-control"> 
			<input type="password" name="pass" placeholder="Password" class="input-control"> 
			<input type="password" name="pass" placeholder="Confirm Password" class="input-control"> 
			<input type="submit" name="submit" value="Register" class="btn"> 
			<p class="Login-register-text">Have an Account? <a href="userlogin.php">Log in</a></p>
		</form>
		<?php 
			if(isset($_POST['submit'])){
				session_start();
				include 'database.php';

				$user = mysqli_real_escape_string($conn, $_POST['user']);
				$pass = mysqli_real_escape_string($conn, $_POST['pass']);

				$cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '".$user."' AND password = '".($pass)."'");
				if (mysqli_num_rows($cek) > 0){
					$d = mysqli_fetch_object($cek);
					$_SESSION['status_login'] = true;
					$_SESSION['a_global'] = $d;
					$_SESSION['id'] =$d->user_id;
					echo '<script>window.location="userlogin.php"</script';
				}else{
					echo '<script>alert("Username atau Password anda salah!")</script>';
				}
			}
		 ?>
	</div>
</body> 
</html>
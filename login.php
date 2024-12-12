<?php
session_start();
include "db.php";

?>
 <html>
	<head>
		<title>Login Website</title>
		<style>
			body {
                background : linear-gradient(180deg, #C8B39B, #5D768B);
				margin: 0;
				padding: 0;
				font-family: Arial, sans-serif;
				height: 100vh;
				display: flex;
			}
			.container {
				display: flex;
				width: 100%;
				height: 100%;
			}
			.login-section {
				width: 100%;
				background-color: linear-gradient(180deg, #C8B39B, #5D768B); 
				color: white;
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				padding: 70px;
			}
			.login-section h3 {
				margin-bottom: 20px;
				font-size: 28px;
				font-weight: bold;
			}
			.login-section form {
				width: 100%;
				max-width: 350px;
			}
			.login-section input[type="text"], 
			.login-section input[type="password"] {
				width: 100%;
				padding: 12px;
				margin: 10px 0;
				border: none;
				border-radius: 5px;
			}
			.login-section button {
				width: 100%;
				padding: 12px;
				background-color: #C8B39B/*#ebaa12*/ ;
				color: white;
				border: none;
				border-radius: 5px;
				font-size: 16px;
				cursor: pointer;
			}
			.login-section button:hover {
				background-color: #e9e9e9;
			}
			.login-section a {
				margin-top: 10px;
				color: white;
				text-decoration: underline;
				font-size: 14px;
			}
			
			
		
				
				
			
			

			
		</style>
	</head>
	<body background-color="linear-gradient(180deg, #C8B39B, #5D768B)">
		<div class="container">
			<div class="login-section">
				<h3>Login</h3> 
				<?php
					if (isset($_POST['username'])) {
						$username = $_POST['username'];
						$password = ($_POST['password']);

						$query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' and password = '$password'");

						if (mysqli_num_rows($query) > 0) {
							$data = mysqli_fetch_array($query);
							$_SESSION['users'] = $data;
							echo '<script>alert("Selamat Datang, '.$data['nama'].'"); location.href="index.php";</script>';
						} else {
							echo '<script>alert("Username/password tidak sesuai");</script>';
						}
					}
				?>
				<form method="post" action="index.php">
					<input type="text" name="username" placeholder="Username" required>
					<input type="password" name="password" placeholder="Password" required>
					<button type="submit">Login</button>
				</form>
				<a href="register.php"><h4>Belum punya akun? Daftar Sekarang</h4></a>
			</div>
		</div>
	</body>
</html>
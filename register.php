<?php
session_start();
include "db.php";
?>
<html>
	<head>
		<title>login website</title>
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
	<body>
	<div class="container">
		<div class="login-section">
		<h3>Register</h3>
		<?php
		if (isset($_POST['username'])) {
		    // Ambil data dari form
		    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
		    $username = mysqli_real_escape_string($conn, $_POST['username']);
		    $password = ($_POST['password']); // Pastikan hashing sesuai kebutuhan

		    // Validasi data input
		    if (empty($nama) || empty($username) || empty($password)) {
		        echo '<script>alert("Semua kolom wajib diisi!");</script>';
		    } else {
		        // Query untuk memasukkan data ke database
		        $query = mysqli_query($conn, "INSERT INTO users (nama, username, password) VALUES ('$nama', '$username', '$password')");

		        if ($query) {
		            echo '<script>alert("Selamat, pendaftaran Anda berhasil. Silakan login."); location.href="login.php";</script>';
		        } else {
		            echo '<script>alert("Pendaftaran gagal, coba lagi.");</script>';
		        }
		    }
		}
		?>
		

		<form method="post" action="">
			<input type="text" name="nama" placeholder="name" required>
			<input type="text" name="username" placeholder="Username" required>
			<input type="password" name="password" placeholder="Password" required>
			<button type="submit">Login</button>
		</form>
		</div>
		
		</div>
	</body>
</html>
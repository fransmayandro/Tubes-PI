<!DOCTYPE html>
<html>
<head>
	<title>Form Registrasi</title>
	<style>
		form {
			width: 400px;
			margin: auto;
			padding: 20px;
			border: 1px solid #ccc;
			border-radius: 5px;
		}
		input[type="text"], input[type="email"], input[type="password"] {
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border: 1px solid #ccc;
			border-radius: 3px;
			font-size: 16px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 3px;
			cursor: pointer;
			font-size: 16px;
		}
	</style>
</head>
<body>
	<form method="post" action="register_process.php">
		<h2>Form Registrasi</h2>
		<label>Nama Lengkap</label>
		<input type="text" name="username" required>
		<label>Email</label>
		<input type="email" name="email" required>
		<label>Password</label>
		<input type="password" name="password" required>
		<input type="submit" value="Daftar">
	</form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>Php-Login</title>

	<style type="text/css">
		.red{
			color: red;
		}
	</style>

</head>
<body>

	<?php

	$username = $password = $check = "";
	$usernameErr = $passwordErr = $checkErr = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

		#User Name Verification
		if (empty($_POST["username"])) {
			$usernameErr = "User Name is required";
		}
		else{
			$username = $_POST["username"];

			if (!preg_match("/^[a-zA-Z-0-9' ]*$/", $username)) {
				$usernameErr = "Only letters and white space allowed";
			}
			else if (strlen($_POST["username"])<2) {
				$usernameErr = "Name must contain at least 2 characters";
			}
		}

		#Password Verification
		if (empty($_POST["password"])) {
			$passwordErr = "Password is required";
		}
		else{
			$password = $_POST["password"];

			if (strlen($password) < 8) {
				$passwordErr = "Password must be contain at least 8 characters";
			}
						
		}		
	}
	?>

	<div class="container" style="width: 300px;">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>
			<fieldset>
				<legend> <h2>Login</h2></legend>

				<label>User Name:</label>
				<input type="text" name="username" value="<?php echo $username;?>"><span class="red">*<?php echo $usernameErr ?></span> <br><br>

				<label>Password:</label>
				<input type="text" name="password" value="<?php echo $password;?>"><span class="red">*<?php echo $passwordErr ?></span> <br><br>

				<input type="checkbox" name="check" value="Remember Me<?php echo $check?>">Remember Me<br>

				<hr>

				<input type="submit" name="submit">
				<a href=""> Forgot Password? </a>
			</fieldset>

		</form>
	</div>

</body>
</html>
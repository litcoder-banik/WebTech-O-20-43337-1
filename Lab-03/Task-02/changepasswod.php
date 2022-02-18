<!DOCTYPE html>
<html>
<head>
	<title>Password Change</title>
</head>
<body>

	<style type="text/css">
		.red{
			color: red;
		}
	</style>

	<?php

	$currentpassword = $newpassword = $retypepassword = "";
	$currentpasswordErr = $newpasswordErr = $retypepasswordErr = "";
	$setuppassword = "banikparthib401";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		echo '<pre>';
		print_r($_POST);
		echo '</pre>';

		#Current Password Varificaion
		if (empty($_POST["currentpassword"])) {
			$currentpasswordErr = "Current password is required";
		}
		else{
			$currentpassword = $_POST["currentpassword"];
			
			if ($setuppassword !== $currentpassword) {
				$currentpasswordErr = "Current password is not match";
			}
		}

		#New Password Verification
		if (empty($_POST["newpassword"])) {
			$newpasswordErr = "New password is required";
		}
		else{
			$newpassword = $_POST["newpassword"];

			if($newpassword == $currentpassword){
				$newpasswordErr = "New password should not be same as current password";
			}
		}

		#Retype New Password
		if (empty($_POST["retypepassword"])) {
			$retypepasswordErr = "Retype password is required";
		}
		else{
			$retypepassword = $_POST["retypepassword"];

			if ($retypepassword != $newpassword) {
				$retypepasswordErr = "Password is not same as New password";
			}
		}
	}
	?>
	
	<div class="container" style="width: 600px;">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" novalidate>
			<fieldset>
				<legend><h2>Change Password</h2></legend>

				<table>

					<tr>
						<td>Current Password</td>
						<td>:</td>
						<td><input type="text" name="currentpassword" value="<?php echo $currentpassword;?>"><span class="red">*<?php echo $currentpasswordErr ?></span></td>
					</tr>

					<tr>
						<td>New Password</td>
						<td>:</td>
						<td><input type="text" name="newpassword" value="<?php echo $newpassword;?>"><span class="red">*<?php echo $newpasswordErr ?></span></td>
					</tr>

					<tr>
						<td>Retype New Password</td>
						<td>:</td>
						<td><input type="text" name="retypepassword" value="<?php echo $retypepassword;?>"><span class="red">*<?php echo $retypepasswordErr ?></span></td>
					</tr>
					
				</table>

				<hr>

				<input type="submit" name="submit">

			</fieldset>
		</form>
	</div>
</body>
</html>
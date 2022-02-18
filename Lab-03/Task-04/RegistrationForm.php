<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>

	<style type="text/css">
		.red{
			color: red;
		}
	</style>

	<?php

	$name = $email = $username = $password = $confirmpassword = $gender = $dob = "";
	$nameErr = $emailErr = $usernameErr = $passwordErr = $confirmpasswordErr = $genderErr = $dobErr = "";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
	 	
	 	echo '<pre>';
	 	print_r($_POST);
	 	echo '</pre>';


	 	#Name Varification
	 	if (empty($_POST["name"])) {
	 		$nameErr = "Name is required";
	 	}
	 	else{
	 		$name = $_POST["name"];

	 		if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
	 			$nameErr = "Only letters and white space allowed";
			}
			else if (str_word_count($_POST["name"])<2) {
				$nameErr = "Name must contain at least 2 word";
			}	 		
	 	}

	 	# Email Verification
		if (empty($_POST["email"])) {
				$emailErr = "Email is required";
			}	
		else{
			$email = $_POST["email"];

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
			}
		}

		#User Name Varification
	 	if (empty($_POST["username"])) {
	 		$usernameErr = "User Name is required";
	 	}
	 	else{
	 		$username = $_POST["username"];

	 		if (!preg_match("/^[a-zA-Z-0-9' ]*$/", $username)) {
	 			$usernameErr = "User name must contain a number";
			}	 		
	 	}

	 	#Password Verification
		if (empty($_POST["password"])) {
			$passwordErr = "New password is required";
		}
		else{
			$password = $_POST["password"];
		}

		#Confirm Password
		if (empty($_POST["confirmpassword"])) {
			$confirmpasswordErr = "Confirm password is required";
		}
		else{
			$confirmpassword = $_POST["confirmpassword"];

			if ($confirmpassword != $password) {
				$confirmpasswordErr = "Confirm Password did not match";
			}
		}


		#Gender Varification
		if (empty($_POST["gender"])) {
			$genderErr = "Gender is required";
  	} 
  	else {
  		$gender = $_POST["gender"];
  	}

  	#Date of Birth Varification
  	if (empty($_POST["dob"])) {
  		$dobErr = "Date of Birth is required";
  	}
  	else{
  		$dob = $_POST["dob"];
  	}

	} 

	if(file_exists('data.json')){

		$current_data = file_get_contents('data.json');

		$array_data = json_decode($current_data, true);

		$new_data = array(  
                     'name'            =>     $_POST["name"],  
                     'e-mail'          =>     $_POST["email"],  
                     'username'        =>     $_POST["username"],  
                     'password'        =>     $_POST["password"],  
                     'confirm password'=>     $_POST["confirmpassword"],
                     'gender'  				 =>     $_POST["gender"],
                     'date of birth'   =>     $_POST["dob"] 
                );  

		$array_data[] = $new_data;  
    $final_data = json_encode($array_data);

    if(file_put_contents('data.json', $final_data)) {

                     $message = "<label class='text-success'>File Appended Successfully</p>";  
                }
	}

	else{
	  $error = 'JSON File does not exits';  
      }

	?>


	<div class="container" style="width: 600px;">
		<form method="post" action="<?php echo ($_SERVER['PHP_SELF']);?>" novalidate>

			<fieldset>
				<legend><h2>Registration</h2></legend>

				<table>

					<tr>
						<td>Name</td>
						<td>:</td>
						<td><input type="text" name="name" value="<?php echo $name?>"><span class="red">*<?php echo $nameErr?></span></td>
					</tr>

					<tr>
						<td>Email</td>
						<td>:</td>
						<td><input type="email" name="email" value="<?php echo $email?>"><span class="red">*<?php echo $emailErr?></span></td>
					</tr>

					<tr>
						<td>User Name</td>
						<td>:</td>
						<td><input type="text" name="username" value="<?php echo $username?>"><span class="red">*<?php echo $usernameErr?></span></td>
					</tr>

					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="text" name="password" value="<?php echo $password?>"><span class="red">*<?php echo $passwordErr?></span></td>
					</tr>

					<tr>
						<td>Confirm Password</td>
						<td>:</td>
						<td><input type="text" name="confirmpassword" value="<?php echo $confirmpassword?>"><span class="red">*<?php echo $confirmpasswordErr?></span></td>
					</tr>

				</table>

				<fieldset>
					<legend>Gender</legend>

					<input type="radio" name="gender"	<?php if (isset($gender) && $gender=="male") echo "checked";?> value="male"> Male
					<input type="radio" name="gender"	<?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
					<input type="radio" name="gender"	<?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other<span class="red">*<?php echo $genderErr ?></span>

					<span></span>
				</fieldset>

				<fieldset>
					<legend>Date of Birth</legend>
					<input type="date" name="dob" value="<?php echo $dob?>"><span class="red">*<?php echo $dobErr?></span>
				</fieldset>
				<br>

				<?php

				if (isset($message)) {
					echo $message;
				}

				?>
				<input type="submit" name="submit" value="Submit">
				<input type="reset" name="reset" value="Reset">
			</fieldset>
		</form>
		
	</div>

</body>
</html>
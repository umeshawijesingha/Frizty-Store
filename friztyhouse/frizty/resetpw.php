<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>frizty house
    </title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
	<link rel="stylesheet" href="./resources/css/home/Regstyle.css">
</head>
<body>
	<!-- container class goes here -->
	<div class="container">

		<!-- reset form goes here -->
		<form action="recover.php" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 500;">Reset Password</p>
            <p class="login-register-text">Enter the New password then your password will Change!</p>
			<p class="login-register-text">Don't forget again :)</p>
					<hr>

			<input type="hidden" name="resetToken" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">

			<br>
				<input type="hidden" name="email" style="width:360px;" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>">
			
	
			<div class="input-group">
				<input type="password" placeholder="Enter New Password" name="NewPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
			</div>
            <div class="input-group">
				<input type="password" placeholder="Enter Confirmation Password" name="Conpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" required>
			</div>
			
			<div class="input-group">
				<button type="submit" name="password_update" class="btn">Update Password</button>
			</div>
			
		</form>
		<!-- reset form ends
		 here -->
	</div>
	<!-- container class ends here -->
	
</body>
</html>


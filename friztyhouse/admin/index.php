<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 

	// check for form submission
	if (isset($_POST['submit'])) {

		$errors = array();

		// check if the username and password has been entered
		if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) {
			$errors[] = 'Username is Missing / Invalid';
		}

		if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ) {
			$errors[] = 'Password is Missing / Invalid';
		}

		// check if there are any errors in the form
		if (empty($errors)) {
			// save username and password into variables
			$email 		= mysqli_real_escape_string($connection, $_POST['email']);
			$password 	= mysqli_real_escape_string($connection, $_POST['password']);
			$hashed_password = sha1($password);

			// prepare database query
$query = "SELECT * FROM admin
						WHERE email = '{$email}' 
						AND password = '{$password}' 
						LIMIT 1";

			$result_set = mysqli_query($connection, $query);

			verify_query($result_set);

			if (mysqli_num_rows($result_set) == 1) {
				// valid user found
				$user = mysqli_fetch_assoc($result_set);
				$_SESSION['user_id'] = $user['admin_id'];
				$_SESSION['first_name'] = $user['first_name'];
				$_SESSION['product_id'] = $user['product_id'];
				// updating last login
		

				$result_set = mysqli_query($connection, $query);

				verify_query($result_set);

				// redirect to users.php
				header('Location: users.php');
			} else {
				// user name and password invalid
				$errors[] = 'Invalid Username / Password';
			}
		}
	}
?>

<!DOCTYPE>
<html>
<head>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/logstyle.style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>	

    		body{
	height: 100vh;
background-image: linear-gradient(to right top, #051937, #104067, #136b99, #089bcb, #00cef9);
	background-size: cover;
	
	flex-direction: column;
margin-left: 0;
}
.card{
overflow:hidden;
border: 0;
border-radius: 20px;
/*box-shadow:*/  
}
.img-left{
width: 45%;
background-image:url("assets/asdf.jpg"); 
background-size: cover; 
}
.card-body{
	padding: 2rem;}
.title{margin-bottom: 10px; }

.form-input input{
	width: 100%;
	height: 45px;
	padding-left: 40px;
	margin-bottom:20px;
	box-sizing: border-box;
	border: 1px solid ;
	border-radius: 60px;
	box-shadow: none;
	outline: none;
}

.form-input span{
position: absolute;
top: 10px;
padding-left: 10px;
color: #007bff;


}

.mb-3 button{
	width: 40%;
	height: 45px;
	padding-left: 10px;
	margin-bottom:20px;
	border-radius: 60px;
	box-shadow: none;
	outline: none;
	background-color: #007bff;
	font-weight: bold;
	border: 2px solid #00000;
}

.forget{
	text-align: center;
}

p.error {
	background: red;
	color: white;
	padding: 10px;
}

    </style>	

</head>
<body>



   <div class="container">
		<div class="row px-3 my-5">
			<div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
				<div class="img-left d-none d-md-flex">
				</div>
				<div class="card-body">
					<h4 class="title text-center mt-4">
					Admin Login!
					</h4>
					<form class="form-box px-3" action="index.php" method="post">


				<?php 
					if (isset($errors) && !empty($errors)) {
						echo '<p style="background: red;color: white;padding: 10px;">Invalid Username / Password</p>';
					}
				?>

				<?php 
					if (isset($_GET['logout'])) {
						echo '<p style="background: green;color: white;padding: 10px;">You have successfully logged out from the system</p>';
					}
				?>	<div class="form-input">
							
							<input type="email" placeholder="Iinput your Email" name="email" tabindex="20" required="">
						</div>
					
						<div class="form-input">
							
							<input type="password" placeholder="*********" name="password" tabindex="10" required="">
						</div>	
						<div class="mb-3">
							<button type="submit" class="btn btn-block text-capitalize" name="submit">Login</button>
							
						</div>
					
					</form>
				</div>
				
            </div>
        </div>
    </div>
</body>
</html>


<?php mysqli_close($connection); ?>
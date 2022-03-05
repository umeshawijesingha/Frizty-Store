<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	// checking if a user is logged in
		if (!isset($_SESSION['user_id'])) {
		header('Location: index.php');
	}


	
	$errors = array();
	$first_name = '';
	$last_name = '';
	$email = '';
	$password = '';

	if (isset($_POST['submit'])) {
		
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		// checking required fields
		$req_fields = array('first_name', 'last_name', 'email', 'password');
		$errors = array_merge($errors, check_req_fields($req_fields));

		// checking max length
		$max_len_fields = array('first_name' => 50, 'last_name' =>50, 'email' => 50, 'password' => 20);
		$errors = array_merge($errors, check_max_len($max_len_fields));

		// checking email address
		if (!is_email($_POST['email'])) {
			$errors[] = 'Email address is invalid.';
		}

		// checking if email address already exists
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$query = "SELECT * FROM admin WHERE email = '{$email}' LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				$errors[] = 'Email address already exists';
			}
		}

		if (empty($errors)) {
			// no errors found... adding new record
			$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
			$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
			$password = mysqli_real_escape_string($connection, $_POST['password']);
			// email address is already sanitized
			$hashed_password = sha1($password);

			$query = "INSERT INTO admin( ";
			$query .= "first_name, last_name, email, password, is_deleted";
			$query .= ") VALUES (";
			$query .= "'{$first_name}', '{$last_name}', '{$email}', '{$hashed_password}', 0";
			$query .= ")";

			$result = mysqli_query($connection, $query);

			if ($result) {
				// query successful... redirecting to users page
				header('Location: users.php?user_added=true');
			} else {
				$errors[] = 'Failed to add the new record.';
			}

		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add New User</title>
	<link rel="stylesheet" href="css/main.css">





<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

.mb-3 button{
	width: 40%;
	height: 45px;
	padding-left: 10px;
	margin-bottom:20px;
	border-radius: 60px;
	box-shadow: none;
	outline: none;
	background-color: white;
	font-weight: bold;
	border: 2px solid #00000;
}
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body style="background: linear-gradient(90deg, rgba(85,85,85,1) 0%, rgba(150,146,146,1) 72%, rgba(85,85,85,1) 100%);
">


<div class="sidebar" style="background-image: linear-gradient(to right top, #051937, #104067, #136b99, #089bcb, #00cef9);
	background-size: cover;">


<div class="logo" class="float-left ml-0">
			<img   src="assets/image/logo.jpg" width="200px" border-style="solid" >
		</div>
	<div class="loggedin" style="color: black; text-align: center; font-weight: bold; font-size: 24px; " >Welcome <?php echo $_SESSION['first_name']; ?></div>
 <a href="users.php" class="brand" style="color: black; ">Users Details</a>
  <a href="add-user.php" class="brand" style="color:black ;" >Add new User</a>
   <a href="add-product.php" class="brand" style="color: black; "> Add Products</a>
    <a href="products.php" class="brand" style="color:black;" >Products Details</a>
          <a href="orders_details.php" class="brand" style="color: black;" >orders details</a>
          <a href="selll_products.php" class="brand" style="color: black;" >Sold product</a>
         <div> <a href="logout.php">Log Out</a></div>
</div>


<div class="content">

	<main>
		<h1 style="font-size: 40px;">Add New User</h1>
		<?php 

			if (!empty($errors)) {
				display_errors($errors);
			}

		 ?>

		<form action="add-user.php" method="post" class="userform">
			
			<p><h3>
				<label for="">First Name:</label>
				<input type="text" name="first_name" <?php echo 'value="' . $first_name . '"'; ?>>
			</h3></p>
			<p><h3>
				<label for="">Last Name:</label>
				<input type="text" name="last_name" <?php echo 'value="' . $last_name . '"'; ?>>
			</h3></p>
			<p><h3>
				<label for="">Email Address:</label>
				<input type="text" name="email" <?php echo 'value="' . $email . '"'; ?>>
			</h3></p>
			<p><h3>
				<label for="">New Password:</label>
				<input type="password" name="password">

			</h3></p>
			
			<div  class="mb-3">
			<p><h3>
				<label for="">&nbsp;</label>
				<button type="submit" name="submit">Save</button>
			</h3></p>
			</div>

		</form>		
	</main>
</div>
</form>
</body>
</html>
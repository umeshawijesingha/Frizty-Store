<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['user_id'])) {
		header('Location: index.php');
	}

	$user_list = '';

	// getting the list of users
	$query = "SELECT * FROM customer WHERE is_deleted=0 ORDER BY first_name";
	$users = mysqli_query($connection, $query);

	verify_query($users);

	while ($user = mysqli_fetch_assoc($users)) {
		$user_list .= "<tr>";
		$user_list .= "<td>{$user['first_name']}</td>";
		$user_list .= "<td>{$user['last_name']}</td>";
		$user_list .= "<td>{$user['address']}</td>";
		$user_list .= "<td><a href=\"delete-user.php?user_id={$user['customer_id']}\">Delete</a></td>";
		$user_list .= "</tr>";
	}
 ?>
<!DOCTYPE html>
<html lang="en">
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

	<main>
		<h1 style="font-size: 40px;">Users Details</h1>

		<table class="masterlist">
			<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>address</th>
				<th>Delete</th>
			</tr>
			<?php echo $user_list; ?>
		</table>
		
		
	</main>
	</div>
</body>
</html>
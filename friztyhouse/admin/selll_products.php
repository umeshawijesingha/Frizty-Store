

<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	// checking if a user is logged in


	$user_list = '';

//SELECT `payment_id`, `customer_id`, `cart_id`, `point_id`, `total_cost`, `paid_date` FROM `payment` WHERE 1
	// getting the list of users
	//SELECT `payment_id`, `customer_id`, `point_id`, `total_cost`, `paid_date` FROM `payment` WHERE 1
	$query = "SELECT * FROM payment WHERE 1 ORDER BY paid_date";
	$users = mysqli_query($connection, $query);
	verify_query($users);
    

    while ($user = mysqli_fetch_assoc($users))
{
		$user_list .= "<tr>";
		$user_list .= "<td>{$user['payment_id']}</td>";
		$user_list .= "<td>{$user['customer_id']}</td>";
		$user_list .= "<td>{$user['total_cost']}</td>";
		$user_list .= "<td>{$user['paid_date']}</td>";
	
	
		$user_list .= "<td><a href=\"delete-product.php?payment_id={$user['payment_id']}\">Delete</a></td>";
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

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }


}
</style>
</head>
<body style="background-color: #555;
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
          <a href="orders_details.php" class="brand" style="color: black;" >Orders details</a>
          <a href="selll_products.php" class="brand" style="color: black;" >Sold product</a>

         <div> <a href="logout.php">Log Out</a></div>
</div>


<div class="content">


	<main>
		<h1 style="font-size: 40px;">Product Details</h1>
		
		<table class="masterlist">
			<tr>
				<th>payment_id</th>
				<th>customer_id</th>
		
				<th>total_cost</th>
				<th>paid_date</th>
		
				<th>Delete</th>				
			</tr>

			<?php echo $user_list; ?>

		</table>
		
		
	</main>
</div>
</body>
</html>
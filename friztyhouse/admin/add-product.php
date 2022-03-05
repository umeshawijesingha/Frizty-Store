<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	// checking if a user is logged in
		if (!isset($_SESSION['user_id'])) {
		header('Location: index.php');
	}

	$errors = array();
		$product_name =  '';
		$product_price ='';
		$discount='';
		$category_id='';
		$product_sub_category_id= '';
		$product_image= '';
		$product_description= '';

	

	if (isset($_POST['submit'])) {
		
	
		$product_name =  $_POST['product_name'];
		$product_price =  $_POST['product_price'];
		$discount=  $_POST['discount'];
		$category_id= $_POST['category_id'];
		$product_sub_category_id= $_POST['product_sub_category_id'];
		$product_image= $_POST['product_image'];
		$product_description= $_POST['product_description'];

		// checking required fields
		$req_fields = array('product_name', 'product_price', 'discount', 'category_id','product_sub_category_id','product_image','product_description');
		$errors = array_merge($errors, check_req_fields($req_fields));

		

		if (empty($errors)) {
			// no errors found... adding new record
			$product_name = mysqli_real_escape_string($connection, $_POST['product_name']);
			$product_price = mysqli_real_escape_string($connection, $_POST['product_price']);
			$discount= mysqli_real_escape_string($connection, $_POST['discount']);
			$category_id= mysqli_real_escape_string($connection, $_POST['category_id']);
			$product_sub_category_id= mysqli_real_escape_string($connection, $_POST['product_sub_category_id']);
			$product_image= mysqli_real_escape_string($connection, $_POST['product_image']);
			$product_discription= mysqli_real_escape_string($connection, $_POST['product_description']);

			$query = "INSERT INTO product( ";
			$query .= "product_name, product_price, discount, category_id, product_sub_category_id, product_image,product_description";  
			$query .= ") VALUES (";
			$query .= "'{$product_name}', '{$product_price}', '{$discount}', '{$category_id}', '{$product_sub_category_id}','{$product_image}','{$product_description}'";
			$query .= ")";


			$result = mysqli_query($connection, $query);

			if ($result) {
				// query successful... redirecting to users page
				header('Location:products.php?user_added=true');
			} else {
				$errors[] = 'Failed to add the new record.';
			}


		}



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
		<h1 style="font-size: 40px;">Add New Products<span> 

		<?php 

			if (!empty($errors)) {
				display_errors($errors);
			}

		 ?>
           <form action="add-product.php" method="post" class="userform">
			
			<p>
				<h2><label for="">product_name:</label>
				<input type="text" name="product_name" <?php echo 'value="' . $product_name . '"'; ?>>
			</p></h2>

			<p>
				<h2><label for="">product_price:</label>
				<input type="text" name="product_price" <?php echo 'value="' .$product_price . '"'; ?>>
			</p></h2>

			<p>
				<h2><label for="">discount:</label>
				<input type="text" name="discount" <?php echo 'value="' . $discount. '"'; ?>>
			</p></h2>

			<p>
				<h2><label for="">category_id:</label>
				<input type="text" name="category_id" <?php echo 'value="' . $category_id. '"'; ?>>
			</p></h2>

				<p>
				<h2><label for="">product_sub_category_id:</label>
				<input type="text" name="product_sub_category_id" <?php echo 'value="' . $product_sub_category_id. '"'; ?>>
			</p></h2>

			<p>
				<h2><label for="">product_description:</label>
				<input type="text" name="product_description" <?php echo 'value="' . $product_description. '"'; ?>>
			</p></h2>

				<p>
				<h2><label for="">product_image:</label>
				<h2><input type="file" name="product_image" <?php echo 'value="' . $product_image. '"'; ?>>
			</p></h2>

			<div  class="mb-3"><p>
				<h2><label for="">&nbsp;</label>
				<button type="submit" name="submit">Save</button>
			</p></h2>
		</div>
		</form>

			</main>

			</div>

</body>
</html>



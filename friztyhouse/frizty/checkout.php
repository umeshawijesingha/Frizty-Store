<?php
include "headers.php";
?>
<!DOCTYPE html>
<html>
<head>

<?php
include "db.php";

 

if(isset($_SESSION['cart'])){
	//echo 'Cart is set';
	$product_id=array_column($_SESSION['cart'],'product_id');


 $sql = "SELECT * FROM product";

 $result=mysqli_query($con,$sql);
    $resultCheck=0;
    if($result){
    $resultCheck=mysqli_num_rows($result);
}




if($resultCheck > 0){
while($row=mysqli_fetch_assoc($result)){

  foreach ($product_id as $id ) {
    if($row['product_id']==$id){
    	
    
   

}
}
}
}
}
                         
?>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/logstyle.style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<style>

.row-checkout {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
  margin-top: 20px;
  
}

.container-checkout {
  
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.checkout-btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.checkout-btn:hover {
  background-color: #45a049;
}



hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

@media (max-width: 800px) {
  .row-checkout {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>

	<title></title>
</head>
<body style="background-image: linear-gradient(to right top, #051937, #104067, #136b99, #089bcb, #00cef9);
	height: 100vh;background-size:200% 200%;">

	<!-- <form method="post" action="https://sandbox.payhere.lk/pay/checkout">  -->
		<form method="post" action="details.php"> 
	 <input type="hidden" name="merchant_id" value="1218367">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="http://localhost/friztyajax/return_url.php">
    <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
    <input type="hidden" name="notify_url" value="http://localhost/friztyajax/notify_url.php"> 
     
    				
<section class="section">       
	<div class="container-fluid">
		<div class="row-checkout">
		<?php
		if(isset($_SESSION["user_id"])){
			$sql = "SELECT * FROM customer WHERE customer_id='{$_SESSION['user_id']}'";
			$query = mysqli_query($con,$sql);
			$row=mysqli_fetch_array($query);

			?>
		
		
			<div class="col-75">
				<div class="container">
				
					<div class="row-checkout">
					
					<div class="col-50">
						<h3 style="font-size: 40px;"><strong>Billing Address</strong></h3>
						<label for="fname"><i class="fa fa-user" ></i> First Name</label> 
						<input style="width: 100%; border-radius: 10px;  padding: 16px 16px; margin: 8px; box-sizing: border-box;" type="text" required  name="first_name" <?php echo 'value="' . $row["first_name"] . '"'; ?>  >

						<label for="lname"><i class="fa fa-user" ></i> Last Name</label>
						<input  style="width: 100%; border-radius: 10px; padding: 16px 16px; margin: 8px ; box-sizing: border-box;"type="text" required  name="last_name" <?php echo 'value="' . $row["last_name"] . '"'; ?>  >
						<label for="email"><i class="fa fa-user" ></i> Email</label>
						<input  style="width: 100%; border-radius: 10px; padding: 16px 16px; margin: 8px; box-sizing: border-box;"type="text"  required name="email" <?php echo 'value="' . $row["email"] . '"'; ?>  >
						<label for="phone"><i class="fa fa-user" ></i> Phone Number</label>
						<input  style="width: 100%; border-radius: 10px; padding: 16px 16px; margin: 8px; box-sizing: border-box;"type="text"  required name="phone" <?php echo 'value="' . $row["phone_number"] . '"'; ?>  >
						<label for="address"><i class="fa fa-user" ></i> Address</label>
						<input  style="width: 100%; border-radius: 10px; padding: 16px 16px; margin: 8px; box-sizing: border-box;"type="text"  required name="address" <?php echo 'value="' . $row["address"] . '"'; ?>  >
						<label for="city"><i class="fa fa-user" ></i> City</label>
						<input  style="width: 100%; border-radius: 10px; padding: 16px 16px; margin: 8px; box-sizing: border-box;"type="text" name="city" value="" required>
						
						<input type="hidden" name="country" value="" >

				</div>
			
		</div>
			<?php 
		}else{
			echo"<script>window.location.href = 'account.php'</script>";
		}
		?>

			<div class="col-25">
				<div class="container-checkout">



					<?php 
								 $y=0;
						 $y=count($_SESSION['c']);
						$q=0;
								?>


					<div  class="container" style="border-radius: 40px; color: white; font-weight: bold; font-size: 20px;">
						<div class="row">
							<h6><strong>PRICE DETAILS</strong></h6>
						</div>
						<br>
						<div class="row">
							<div class="col-6">
								<h6 style="text-align: center;"><strong>Price</strong></h6>
							</div>
							<div class="col-6">
								
								<h6 style="text-align: left;"><strong><?php echo ($_SESSION['c'][$y-1]['Total']);?></strong></h6>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-6">
								<h6 style="text-align: center;"><strong>Dilivery Charges</strong></h6>
							</div>
							<div class="col-6">
								<h6><strong>FREE</strong></h6>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-6">
								<h6 style="text-align: center;"><strong>Total Amount</strong></h6>
							</div>
							<div class="col-6">
		
								<h6><strong><?php echo ($_SESSION['c'][$y-1]['Total']);?></strong></h6>
								<input type="hidden" name="order_id" value="ItemNo123456">
								<input type="hidden" name="items" value="Total Amount"><br>
 <input type="hidden" name="currency" value="LKR">
    <input type="hidden" name="amount" value=<?php echo ($_SESSION['c'][$y-1]['Total']);?>>  

							</div>
						</div>
					</div>

				

			</div>



<?php 
 $z=0;
						 $z=count($_SESSION['c']);

						// echo $z;
						//print_r($_SESSION['c']);
// echo $_SESSION['c'][0]['Product_id'];

for($k=0;$k<$z;$k++){
	$sql="SELECT * from cart where customer_id={$_SESSION['user_id']}  && product_id ={$_SESSION['c'][$k]['Product_id']} order by cart_id DESC LIMIT 1";
	$result=mysqli_query($con,$sql);

  $resultCheck=0;
    if($result){
    $resultCheck=mysqli_num_rows($result);
}


if($resultCheck > 0){
	
	$sql="UPDATE cart SET quantity = {$_SESSION['c'][$k]['Item_quantity']} WHERE customer_id ={$_SESSION['user_id']} ";
	mysqli_query($con,$sql);

}else {//echo "not have";


	$sql="INSERT INTO cart (product_id,quantity,total_price,customer_id) VALUES ({$_SESSION['c'][$k]['Product_id']},{$_SESSION['c'][$k]['Item_quantity']},{$_SESSION['c'][$k]['Item_price']},{$_SESSION['user_id']})";

// $sql="INSERT INTO cart (product_id,quantity,total_price,customer_id) VALUES (16,1,1500,7)";

//echo $_SESSION['c'][$k]['Total'];

mysqli_query($con,$sql);

}
}


 ?>

			<div class="container">
				<div class="row" >
					<div style="padding-bottom: 30px; border-radius: : 80px; width: 120px; color: black;  ">
						<br>
				
				<input type="submit" value="Proceed Checkout" width="50px" style="color: white;   border-radius: 20px; height: 50px; width: 170px; background-color: green;" onclick="" >
				
				<br>

					</div>
				</div>
			</div>
		</div>

	</div>


	</div>

</div>
</div>
</section>
</form>	
<?php




include "footer.php";
  	
  ?>



</body>
</html>
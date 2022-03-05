<?php

include 'db.php';
session_start();
$rand=rand();
 $y=0;
						 $y=count($_SESSION['c']);
						
$first_name = mysqli_real_escape_string( $con,$_POST['first_name']);
			$last_name = mysqli_real_escape_string( $con,$_POST['last_name']);
			$phone_number = mysqli_real_escape_string($con, $_POST['phone']);
			$address= mysqli_real_escape_string($con, $_POST['address']);
			$email= mysqli_real_escape_string($con,$_POST['email']);
			$city= mysqli_real_escape_string($con, $_POST['city']);


			

include 'db.php';

$sql="INSERT INTO order_info (customer_id,first_name,last_name,email,phone_number,address,city,total_amount,order_key) VALUES ({$_SESSION['user_id']},'{$first_name}','{$last_name}','{$email}','{$phone_number}','{$address}','{$city}',{$_SESSION['c'][$y-1]['Total']},{$rand})";
mysqli_query($con,$sql);

$coun=count($_SESSION['c']);

for($i=0;$i<$coun;$i++){
	
	$sql="INSERT INTO orders (customer_id,product_id,qty,total_price,order_key) VALUES ({$_SESSION['user_id']},{$_SESSION['c'][$i]['Product_id']},{$_SESSION['c'][$i]['Item_quantity']},{$_SESSION['c'][$i]['Sub_total']},{$rand}) ";


	
	mysqli_query($con,$sql);
}

?>
<form id="jsform" method="post" action="https://sandbox.payhere.lk/pay/checkout"> 
	 <input type="hidden" name="merchant_id" value="1218384">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="http://localhost/myphp/friztyhouse/frizty/return_url.php">
    <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
    <!-- <input type="hidden" name="notify_url" value="http://sample.com/notify"> 
 -->

  <input type="hidden" name="notify_url" value="http://localhost/friztyshop/notify.php">
    
     
     					<input type="hidden" name="first_name" value=<?php echo $first_name; ?>  >


						<input type="hidden" name="last_name" value=<?php echo $last_name; ?> >
						
						<input type="hidden" name="email" value=<?php echo $email; ?> >
						
						<input type="hidden" name="phone" value= <?php echo $phone_number; ?> >
						
						<input type="hidden" name="address" value=<?php echo $address; ?> >
						
						<input type="hidden" name="city" value=<?php echo $city; ?> >
						
						<input type="hidden" name="country" value="" >

						<input type="hidden" name="order_id" value=<?php echo $rand; ?> >
						<input type="hidden" name="items" value="Total Amount"><br>
 						<input type="hidden" name="currency" value="LKR">
    					<input type="hidden" name="amount" value=<?php echo ($_SESSION['c'][$y-1]['Total']);?>>  

    					<input type="hidden" name="user_id" value=<?php echo $_SESSION['user_id']; ?> >
    					
</form>

<script type="text/javascript">
  document.getElementById('jsform').submit();
</script>
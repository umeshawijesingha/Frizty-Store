<?php



$merchant_id         = $_POST['merchant_id'];
$order_id             = $_POST['order_id'];
$payhere_amount     = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];
$payment_id				=$_POST['payment_id'];
$user_id				=$_POST['user_id'];

$merchant_secret = '8m7BtiYkL1r4vVsgMzDXNb4ed3n7znUW38m4cIvR1QCB'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
       
       $sql="INSERT INTO pay(payid) VALUES (25)";

       mysqli_query($con,$sql);


}





?>
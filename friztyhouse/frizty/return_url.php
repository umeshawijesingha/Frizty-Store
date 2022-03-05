<!DOCTYPE html>
<html>
<head>
  <title></title>


<?php
session_start();
include 'db.php';



$sql="UPDATE order_info SET is_paid = 1 WHERE order_key={$_GET['order_id']}";

mysqli_query($con,$sql);

$sql="UPDATE orders SET is_paid = 1 WHERE order_key={$_GET['order_id']}";

mysqli_query($con,$sql);
$sql="SELECT * from order_info where order_key={$_GET['order_id']}";

$result=mysqli_query($con,$sql);
    $resultCheck=0;
    if($result){
    $resultCheck=mysqli_num_rows($result);
}



$row=mysqli_fetch_assoc($result);
$customer_id=$row['customer_id'];
$total_cost=$row['total_amount'];

$sql="INSERT INTO payment (customer_id,total_cost) VALUES ({$customer_id},{$total_cost})";

mysqli_query($con,$sql);



$sql = "SELECT * FROM cart where customer_id={$customer_id}";

 $result=mysqli_query($con,$sql);
    $resultCheck=0;
    if($result){
    $resultCheck=mysqli_num_rows($result);
}


if($resultCheck > 0){
while($row=mysqli_fetch_assoc($result)){
$id=$row['product_id'];







  

      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $id){
              unset($_SESSION['cart'][$key]);
             // echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }



      
  
}


 

}

$y=count($_SESSION['c']);

$payment=$_SESSION['c'][$y-1]['Total'];



if(($payment>=2000) AND ($payment<4000)){
  $point=10;
  
}else if(($payment>=4000) AND ($payment<5000)){
  $point=20;
  
}else if(($payment>=5000) AND ($payment<8000)){
  $point=30;
  
}else if(($payment>=8000) AND ($payment<12000)){
  $point=50;
  
}else {
  $point=100;
 
}

$sql="SELECT * from customer where customer_id={$customer_id}";
$result=mysqli_query($con,$sql);
    $resultCheck=0;
    if($result){
    $resultCheck=mysqli_num_rows($result);
}


if($resultCheck > 0){
$row=mysqli_fetch_assoc($result);

$totalpoint=$row['point_amount']+$point;


 $sql="UPDATE customer SET point_amount={$totalpoint} where customer_id={$customer_id}";


mysqli_query($con,$sql);


}

// $sql="SELECT point_id from point where point_range_from>{$totalpoint} AND point_range_to<{$totalpoint}";
$sql="SELECT point_id from point where point_range_from<={$totalpoint} AND point_range_to>={$totalpoint}";

$result=mysqli_query($con,$sql);
    $resultCheck=0;
    if($result){
      

    $resultCheck=mysqli_num_rows($result);
}


if($resultCheck > 0){
$row=mysqli_fetch_assoc($result);


$sql="SELECT gift_name from gift where point_id={$row['point_id']}";

$result=mysqli_query($con,$sql);
$resultCheck=0;
if($result){
  $resultCheck=mysqli_num_rows($result);
  if($resultCheck>0){

    
    $row=mysqli_fetch_assoc($result);
    
    $giftname=$row['gift_name'];
  }
}


}





$sql="DELETE from cart where customer_id={$customer_id}";

mysqli_query($con,$sql);
 
//header('Location: cart.php');

?>

<style type="text/css">
  *{
    margin: 0;
    padding: 0;
  }
  body{
    background-image:url("assets/loging pic.jpg");
    background-position: ;
    background-size: cover;
    font-family: sans-serif;
    margin-top: 0px;
        }


    div.main{
      
      width: 400px;
      margin:100px 40px 40px 300px;
     }
     div.register{
      background-color: rgb(0,0,0,0.6); 
      width: 200%;
      
      border-radius: 10px;
      border:1px solid rgba(255,255,255,0.3);
      box-shadow: 2px 2px 15px rgba(0,0,0,0.4);
      color: #fff;

     }

     div.tclass{
      text-align: center;


     }

     </style><style type="text/css">
  *{
    margin: 0;
    padding: 0;
  }
  body{
    background-image:url("assets/congrtz.jpg");
    background-position: ;
    background-size: cover;
    font-family: sans-serif;
    margin-top: 0px;
        }


    div.main{
      
      width: 400px;
      margin:100px 40px 40px 300px;
     }
     div.register{
      background-color: rgb(0,0,0,0.6); 
      width: 200%;
      
      border-radius: 10px;
      border:1px solid rgba(255,255,255,0.3);
      box-shadow: 2px 2px 15px rgba(0,0,0,0.4);
      color: #fff;

     }

     div.tclass{
      text-align: center;


     }

     </style>

</head>
<body>
 <div class="main">
    
    <div class="register">
      <div class="tclass">
      
    <h1>congratulations!</h1>

    <br>  <br> 
<h1 >Your order is successful</h1>
<br>  <br> 


<h2>You will receive <?php echo $giftname ?> with your purchase.</h2>

 <br>  <br>  <br>  <br> 
      </div>
    </div>
    
  </div>
</body>
</html>
  

<?php header("Refresh: 10;url=profile.php"); ?>
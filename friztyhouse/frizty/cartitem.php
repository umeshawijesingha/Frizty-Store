<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<?php 
 include 'db.php';

$total=0;

$discount;
$total;
$a=1;
$change=0;
$_SESSION['prcount']=0;
//$prname="";
if(!isset($_SESSION['cart'])){
if(isset($_SESSION['user_id']) ){

$sql="SELECT * from cart where customer_id={$_SESSION['user_id']}";

$result=mysqli_query($con,$sql);
    $resultCheck=0;







    if($result){

    $resultCheck=mysqli_num_rows($result);
   // $row=mysqli_fetch_assoc($result);
while($row=mysqli_fetch_assoc($result)){
  // $_SESSION['prcount']=$_SESSION['prcount']+$row['quantity'];
  // echo $_SESSION['prcount'];
$sql="SELECT * from product where product_id={$row['product_id']}";

$result1=mysqli_query($con,$sql);
    $resultCheck1=0;

    if($result1){

    $resultCheck1=mysqli_num_rows($result1);
    

   

while($row1=mysqli_fetch_assoc($result1)){

//$prname=$row['product_name'];





 if(isset($_SESSION['cart'])){
    
    $item_array_id=array_column($_SESSION['cart'], "product_id");
    $item_array_id1=array_column($_SESSION['cart'], "quantity");
   

    if(in_array($row1['product_id'],$item_array_id)){
      echo "<script>alert('Product is already added in the cart...!')</script>";
    }else{
      $count=count($_SESSION['cart']);

      $item_array=array(
       'product_id'=>$row1['product_id']
       
    );

      $_SESSION['cart'][$count]=$item_array;
     //  print_r($item_array);
    }






  }else{
    
    $item_array=array(
       'product_id'=>$row1['product_id']
       
    );
// print_r($item_array);
    //create new session variable
    $_SESSION['cart'][0]=$item_array;
   // print_r($_SESSION['cart']);
  }





$change=1;







    ?>

     
<form name="f1" method="post" class="cart-items">
    <div class="border rounded">
        <div class="row bg-white">
            <div class="col-md-3 pl-0">
                <?php echo '<img class="img-fluid" src="data:image;base64,'.base64_encode($row1['product_image']).'">'; ?>
            </div>
            <div class="col-md-6">
                <h5 class="pt-2" name="pname">
                    <?php echo $row1['product_name'] ?>
                </h5>
                <h5 class="pt-2">Rs
                    <?php echo $row1['product_price'] ?>
                </h5>
                <h6 class="pt-2">Discount :
                   <?php echo $row1['discount']?></h6>
                <!--   <button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button> -->
                <button class="btn btn-danger mx-2"><a href="cart.php?remove=<?php echo $row1['product_id'] ?>">remove</a></button>
            </div>
            <div class="col-md-3 py-5">
                <div>
                    
                    <input type="hidden" class="iprice" value=<?php echo $row1['product_price']?>>
                    <input type="hidden" class="idiscount" value=<?php echo $row1['discount']?>>
                    <input type="hidden" class="id" value=<?php echo $row1['product_id'] ?>>
                    <input type="hidden" class="iname" value=<?php echo $row1['product_id'] ?>>
                    <input type="number" class="quantity" name="quantity" onchange="subTotal()" value=<?php echo $row['quantity']?> min=1 class="form-control w-15 d-inline">
                   
                    <div class="itotal"></div>
                  
                </div>
            </div>
        </div>
    </div>
</form>








    <?php
  }
  }
  }
}
}
}

?>

<?php 

// if($resultCheck > 0){
//   echo "cart already have";
//   echo "    ";
//   //$row=mysqli_fetch_assoc($result);
//   //print_r($row['cart_id']);


// while($row=mysqli_fetch_assoc($result)){


// echo $row['cart_id'];
//  echo "    ";

// }
// }


if(isset($_SESSION['cart']) && $change==0){

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



$prname=$row['product_name'];
  
     
     ?>

<form name="f1" method="post" class="cart-items">
    <div class="border rounded">
        <div class="row bg-white">
            <div class="col-md-3 pl-0">
                <?php echo '<img class="img-fluid" src="data:image;base64,'.base64_encode($row['product_image']).'">'; ?>
            </div>
            <div class="col-md-6">
                <h5 class="pt-2" name="pname">
                    <?php echo $row['product_name'] ?>
                </h5>
                <h5 class="pt-2">Rs
                    <?php echo $row['product_price'] ?>
                </h5>
                <h6 class="pt-2">Discount :
                    <?php echo $row['discount'] ?>%</h6>
                <!--   <button type="submit" class="btn btn-danger mx-2" name="remove">Remove</button> -->
                <button class="btn btn-danger mx-2"><a href="cart.php?remove=<?php echo $id ?>">remove</a></button>
            </div>
            <div class="col-md-3 py-5">
                <div>
                    
                    <input type="hidden" class="iprice" value=<?php echo $row['product_price']?>>
                    <input type="hidden" class="idiscount" value=<?php echo $row['discount']?>>
                    <input type="hidden" class="id" value=<?php echo $row['product_id'] ?>>
                    <input type="hidden" class="iname" value=<?php echo $prname ?>>
                    <input type="number" class="quantity" name="quantity" onchange="subTotal()" value=1 min=1 class="form-control w-15 d-inline">
                   
                    <div class="itotal"></div>
                  
                </div>
            </div>
        </div>
    </div>
</form>
<?php  



    }
  }

}
}

}else{

 // echo '<h5>Cart is Empty</h5>';
}

 ?>

 <?php         if(isset($_SESSION['cart'] )) {  if(count($_SESSION['cart'])!=0){?>
</div>
</div>
<div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
    <div class="pt-4">
        <h6>PRICE DETAILS</h6>
        <hr>
        <div class="row price-details">
            <div class="col-md-6">
                <?php 
              if(isset($_SESSION['cart'])){
                $count=count($_SESSION['cart']);
                echo '<h6>Price</h6>';
                
              }else{
                echo '<h6>Price </h6>';
              }

            ?>
                <h6>Dilevery Charges</h6>
                <hr>
                <h6>Total Amount</h6>
            </div>
            <div class="col-md-6">
                <h6 id="total1">
                </h6>
                <h6 class="text-success">FREE</h6>
                <hr>
                <h6 id="total" name="total">
                    Rs.
                </h6>
            </div>
            <?php if(isset($_SESSION['user_id'])) {?>
            <!-- <input type="submit" name="submitt" value="checkout" > -->
            <button id="check" style="border-radius: 10px; background-color:  black; color: white; width: 360px; height: 45px; font-size: 19px; text-decoration-color: white;"><a href="checkout.php">checkout </a></button>
            <?php }
            else { ?>
            <button id="check"> <a href="account.php">checkout </a></button>
            <?php   } ?>
           
        </div>
    </div>

</div>
</form>
</div>
</div>
<?php }}?>
<script type="text/javascript">
var iprice = document.getElementsByClassName('iprice');
var discount = document.getElementsByClassName('idiscount');
var quantity = document.getElementsByClassName('quantity');
var itotal = document.getElementsByClassName('itotal');
var id = document.getElementsByClassName('id');
var total = document.getElementById('total');

var arr = [];
var gt = 0;


function subTotal() {
    gt = 0;
    itemPrice = 0;

    for (i = 0; i < iprice.length; i++) {
      
        itotal[i].innerText = ((((iprice[i].value) - iprice[i].value * discount[i].value / 100) * (quantity[i].value)) * 1.00).toFixed(2);
        itemPrice = ((((iprice[i].value) - iprice[i].value * discount[i].value / 100) * (quantity[i].value)) * 1.00).toFixed(2);
        gt = gt + ((((iprice[i].value) - iprice[i].value * discount[i].value / 100) * (quantity[i].value)) * 1.00);


        arr[i] = {
            Product_id: id[i].value,
            Item_price: iprice[i].value,
            Item_quantity: quantity[i].value,
            Item_discount: discount[i].value,
            Sub_total: itemPrice,
            Total: gt.toFixed(2)


        }


        $.ajax({
            url: "ajax.php",
            type: "POST",
            dataType: 'json',
            data: {
                res: arr
            },
            success: function(result) {
                alert(result);
            }
        });

    }
  

    total.innerText = "Rs. " + gt.toFixed(2);
    total1.innerText = "Rs. " + gt.toFixed(2);

    var xhr = new XMLHttpRequest();
}
   
subTotal();
</script>
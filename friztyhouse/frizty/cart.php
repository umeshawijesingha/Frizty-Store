<!--cart</!-->
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/all.css">
<link rel="stylesheet" href="css/style.css">
  <?php
    include 'header.php';

//     if(isset($_SESSION['user_id'])&&$_SESSION['first_name']){

// echo $_SESSION['user_id'];
// echo $_SESSION['first_name'];


// }
//        $_SESSION['first_name'] ;

// if(isset($_POST['add'])){
//   //print_r($_POST['product_id']);
// //   echo "product_id";
// //   echo $_POST['product_id'];
// // echo "product_id";

// $product_id=$_POST['product_id'];

// $sql="SELECT * from cart where customer_id={$_SESSION['user_id']} && product_id={$product_id}";

// $result=mysqli_query($con,$sql);
//     $resultCheck=0;

//   if($result){
//     $resultCheck=mysqli_num_rows($result);
//     if($resultCheck>0){
//        echo "have";
//      }else echo "no";
   
// } 




//   if(isset($_SESSION['cart'])){
    
//     $item_array_id=array_column($_SESSION['cart'], "product_id");
//     $item_array_id1=array_column($_SESSION['cart'], "quantity");
//     // echo $_POST['product_id'];
//     // echo "Hi";
//     // echo $_POST['quantity'];
//     // echo $_POST['pname'];
//     // print_r ($_SESSION['cart'][0]) ;
//     //  print_r ($_SESSION['cart']) ;


//     if(in_array($_POST['product_id'],$item_array_id)){
//       echo "<script>alert('Product is already added in the cart...!')</script>";
//     }else if($resultCheck > 0){

//     $resultCheck=mysqli_num_rows($result);
//    // $row=mysqli_fetch_assoc($result);




// }

//     else{
//       $count=count($_SESSION['cart']);

//       $item_array=array(
//        'product_id'=>$_POST['product_id'],
//        'quantity'=>$_POST['quantity']
//     );

//       $_SESSION['cart'][$count]=$item_array;
//        print_r($item_array);
//     }






//   }else{
    
//     $item_array=array(
//        'product_id'=>$_POST['product_id'],
//        'quantity'=>$_POST['quantity']
//     );
//  print_r($item_array);
//     //create new session variable
//     $_SESSION['cart'][0]=$item_array;
//    // print_r($_SESSION['cart']);
//   }

// }

if(isset($_POST['add'])){
  //print_r($_POST['product_id']);

  if(isset($_SESSION['cart'])){
    
    $item_array_id=array_column($_SESSION['cart'], "product_id");
    $item_array_id1=array_column($_SESSION['cart'], "quantity");
    // echo $_POST['product_id'];
    // echo "Hi";
    // echo $_POST['quantity'];
    // echo $_POST['pname'];
    // print_r ($_SESSION['cart'][0]) ;
    //  print_r ($_SESSION['cart']) ;


    if(in_array($_POST['product_id'],$item_array_id)){
      echo "<script>alert('Product is already added in the cart...!')</script>";
    }else{
      $count=count($_SESSION['cart']);

      $item_array=array(
       'product_id'=>$_POST['product_id'],
       'quantity'=>$_POST['quantity']
    );

      $_SESSION['cart'][$count]=$item_array;
      // print_r($item_array);
    }






  }else{
    
    $item_array=array(
       'product_id'=>$_POST['product_id'],
       'quantity'=>$_POST['quantity']
    );
 //print_r($item_array);
    //create new session variable
    $_SESSION['cart'][0]=$item_array;
   // print_r($_SESSION['cart']);
  }

}














if(isset($_GET['remove'])){
  // echo "remove";
  // echo $_GET['remove'];
  $product_id=$_GET['remove'];

  $sql="DELETE FROM cart where customer_id={$_SESSION['user_id']} && product_id={$product_id}";
$result=mysqli_query($con,$sql);
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['remove']){
              unset($_SESSION['cart'][$key]);
             // echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }



      
  
}






//     if (isset($_POST['remove'])){
//   if ($_GET['action'] == 'remove'){
//       foreach ($_SESSION['cart'] as $key => $value){
//           if($value["product_id"] == $_GET['id']){
//               unset($_SESSION['cart'][$key]);
//              // echo "<script>alert('Product has been Removed...!')</script>";
//               echo "<script>window.location = 'cart.php'</script>";
//           }
//       }



      
//   }
// }

  ?>
  
<div class="container-fluid">
  <div class="row px-5">
    <div class="col-md-7">
      <div class="shopping_cart">
        <h5>My Cart</h5>
        <hr>

        <?php
      
  include 'cartitem.php';


         ?>

 
<?php 

session_start();


// if(isset($_POST['add'])){
// 	//print_r($_POST['product_id']);

// 	if(isset($_SESSION['cart'])){
		
// 		$item_array_id=array_column($_SESSION['cart'], "product_id");

// 		if(in_array($_POST['product_id'],$item_array_id)){
// 			echo "<script>alert('Product is already added in the cart...!')</script>";
// 		}else{
// 			$count=count($_SESSION['cart']);

// 			$item_array=array(
// 			 'product_id'=>$_POST['product_id']
// 		);

// 			$_SESSION['cart'][$count]=$item_array;
			
// 		}






// 	}else{
		
// 		$item_array=array(
// 			 'product_id'=>$_POST['product_id']
// 		);

// 		//create new session variable
// 		$_SESSION['cart'][0]=$item_array;
// 		print_r($_SESSION['cart']);
// 	}

// }
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title> |Frizty House| </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">   <!-- nav bar icons-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Girassol&display=swap" rel="stylesheet"> <!-- font type import-->


    <link rel="stylesheet" href="assets/style.css">

<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="text/css" href="css/logstyle.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

   <script>

        $(document).ready(function(){
            $(".profile").click(function(){
            $(".drp_box").toggleClass("open")
            });
        });

    </script>


</head>

<body>
	
	<div class="header">			
		<nav>




			<div class="menu_bar">

<ul>
	
			<div class="container">
		<div class="navbar">
		<div class="logo" class="float-left ml-0">
			<img class="img1" src="assets/image/logo.jpg" width="100px" border-style="solid" >
		</div>

	</div>
</div>

</ul>
	


			<ul >
			

				<li class="active"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>  <!class active for active the tab>
				<li><a href="#"><i class="fa fa-product-hunt"></i> Product</a>
					<div class="sub_menu_1">
						<ul>
							<li class="hover-me"><a href="#">Men's Wear</a><i class="fa fa-angle-right"></i>
								<div class="sub_menu_2">
									<ul>
										
										
										<li><a href="Product.php?cat=1&subcat=1&start=500&end=5000"> T-shirts </a><i class="fa fa-angle-right"></i></li>
										<li><a href="Product.php?cat=1&subcat=2&start=500&end=5000"> Shirts </a><i class="fa fa-angle-right"></i></li>
										<li><a href="Product.php?cat=1&subcat=3&start=500&end=5000"> Trousers </a><i class="fa fa-angle-right"></i></li>
										<li><a href="Product.php?cat=1&subcat=4&start=500&end=5000"> Shorts </a><i class="fa fa-angle-right"></i></li>
									</ul>
								</div>
							</li>
							<li class="hover-me"><a href="#">Women's Wear</a><i class="fa fa-angle-right"></i>
								<div class="sub_menu_2">
									<ul>
										
										<li><a href="Product.php?cat=2&subcat=5"> Blouse </a><i class="fa fa-angle-right"></i></li>
										<li><a href="Product.php?cat=2&subcat=6"> Frocks </a><i class="fa fa-angle-right"></i></li>
										<li><a href="#"> Shirts </a><i class="fa fa-angle-right"></i></li>
										<li><a href="#"> Trousers </a><i class="fa fa-angle-right"></i></li>
									
									</ul>
								</div>
							</li>
							<li class="hover-me"><a href="#"> Kids Wear</a><i class="fa fa-angle-right"></i>
								<div class="sub_menu_2">
									<ul>
										
										<li><a href="#"> Boy </a><i class="fa fa-angle-right"></i></li>
										<li><a href="#"> Girl </a><i class="fa fa-angle-right"></i></li>
										
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</li>
				<li><a href="about.php"><i class="fa fa-user"></i> About</a></li>
				<li><a href="contact.php"><i class="fa fa-phone"></i> Contact</a></li>
				<li><a href="account.php"><i class="fa fa-clone"></i> Account</a></li>
				





				<li><a href="cart.php"><i class="fa fa-cart-arrow-down"></i> Cart 
					<?php 

						if(isset($_SESSION['cart'])){
							$count=count($_SESSION['cart']);
							echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
						}else{
							echo "<span id=\"cart_count\" class=\"text-warning bg-success\">0</span>";
						}
					?>
				</a></li>

<li><?php
                             include "db.php";
                            if(isset($_SESSION["user_id"])){
                                $sql = "SELECT first_name FROM customer WHERE customer_id='$_SESSION[user_id]'";
                                $query = mysqli_query($connection,$sql);
                                $row=mysqli_fetch_array($query);
                                
                                echo '
                                   
       
          							<a href="#"><i class="fa fa-product-hunt"></i>'.$row["first_name"].'</a>
         								 <div class="sub_menu_1">
            								<ul>
            								  <li class="hover-me"><a href="profile.php">profile</a> 
          
             								 <li ><a href="logout.php"> logout </a> </i>
            								</ul>
          								</div>';
                }

                else
                	  echo '
                	<a href="account.php"><i class="fa fa-clone"></i>Log In</a>

                	';

                                             ?>
                               
</li>		
	
			</ul>
			



			</div>
		</nav>
	</div>
</body>
</html>
	




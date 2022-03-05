
  <?php 
session_start();
  include 'db.php'; 
  
  $sql="SELECT * from customer";
  $result=mysqli_query($con,$sql);
  $resultCheck=0;
  if($result){
    $resultCheck=mysqli_num_rows($result);
  }

 
    $row=mysqli_fetch_assoc($result);
       
   
  
  ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>  
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/all.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />


<style>
    .nav-item{
        padding: 20px;
    }
    img {
  width: 150px;
  border-bottom: 1px solid lightgrey;

}
</style>



</head>
<body >
    <div class="container-fluid">
  <div class="row">
    <div class="col-sm" style="border-bottom: 1px solid lightgrey; border-top: 1px solid lightgrey; height:60px; padding: 0; background-color: white;" >
     






<a href="index.php"><img class="img1" src="assets/image/logo.jpg" width="150px"border-style="solid" style="height: 59px; border-color: : 5px solid black;"></a> 





    </div>

   
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-sm" style="border-bottom: 1px solid lightgrey; height:60px; padding: 0;">
     



<nav class="navbar navbar-light navbar-expand-md  justify-content-center" style="height: 100%;">
    
    <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
        <ul class="navbar-nav mx-auto text-center">

            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-user fa-2x"></i></a> 
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="//codeply.com"><i class="fas fa-list fa-2x"></i></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="index.php"><i class="fas fa-shopping-cart fa-2x"></i></a>
            </li>
            
        </ul>
        
    </div>
</nav>







    </div>
    
   
  </div>
</div>



<div  >

<div class="container-fluid">
    <div class="row">
    <div class="col-3" style="background-color:#e8e8e896; height:630px; padding: 30px;">
        <div class="row" style="margin-bottom: 20px;">
        <div class="col-3" style="background-color: #ea4c89; color:white;height:120px;padding: 15px;width: 90%;">
            <li style="list-style-type: none; text-align: center;" >
                <h2><i class="fa fa-user fa-7x"></i></h2>
            <h3 >My Profile</h3>
            </li>
            

    </div>
    </div>

    <div class="row">
        <div class="col-3" style="background-color:#725bb9; color:white; height:120px;padding: 15px; width: 90%; margin-bottom: 50px;">

            <li style="list-style-type: none; text-align: center;" >
                <h2><i class="fas fa-list"></i></h2>
            <h3>My Orders</h3>
            </li>

    </div>
    </div>

    </div>
    <div class="col-9" style="background-color:#e8e8e896;border:1px solid white; height:630px; padding-top: 25px;">
        <div class="container-fluid" style="background-color: white; height: 450px; padding: 0px; ">
            <h2 style="background-color:#0c4879; color: white; height: 50px; padding-left: 20px;">Account Details</h2>
            <div class="container-fluid">
            <div class="row">
                <div class="col-2" >
                    <p>Name</p>
                    <p>Address</p>
                    <p>Contact No</p>
                    <p>Email</p>
                    <p>Point Amount</p>
                </div>
            <div class="col-10" >
                <p><?php echo $row['first_name'] ." ".$row['last_name']; ?></p>
                <p><?php echo $row['address']; ?></p>
                <p><?php echo $row['phone_number']?></p>
                <p><?php echo $row['email']?></p>
                <p><?php echo $row['point_amount']?></p>

            </div>
            </div>
            </div>
            
        </div>



    </div>
</div>
  </div>



 
</div>


   


</body>
</html>
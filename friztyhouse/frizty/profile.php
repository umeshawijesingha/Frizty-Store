<?php require_once('headers.php'); ?>
<?php 

  include 'db.php'; 
  
  $sql="SELECT * from customer where customer_id={$_SESSION['user_id']}";
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

     </style>
  
}
</style>



<body style="background-image: linear-gradient(to right top, #051937, #104067, #136b99, #089bcb, #00cef9);
    height: 100vh;background-size:200% 200%;">
<div class="container-fluid">
    <div class="row">
    <div class="col-3" style=" background-color: rgb(0,0,0,0.6); 
      width: 100%;
      height: 150%;
      
      border-radius: 10px;
      border:1px solid rgba(255,255,255,0.3);
      box-shadow: 2px 2px 15px rgba(0,0,0,0.4);
      color: #fff;">
        <div class="row" style="margin-bottom: 20px;">
        <div class="col-3" style="background-color: gray ; color:white;height:120px;padding: 15px;width: 90%;">
            <li style="list-style-type: none; text-align: center;" >
                <h2><i class="fa fa-user fa-7x"></i></h2>
            <h3 >My Profile</h3>
            </li>
            

    </div>
    </div>

    <div class="row" >
        <div class="col-3" style="background-color:gray; color:white; height:120px;padding: 15px; width: 90%; margin-bottom: 50px;">

            <li style="list-style-type: none; text-align: center;" >
                <h2><i class="fas fa-list"></i></h2>
            <h3 >My Profile</h3>
            </li>

    </div>
    </div>

    </div>
    <div class="col-9" style="background-image: linear-gradient(to right top, #051937, #104067, #136b99, #089bcb, #00cef9);
    height: 100vh;background-size:200% 200%;">
        <div class="register" style=" background-color: rgb(0,0,0,0.6); 
      width: 90%;
      height: 50%;
     margin-left:  50px;
      border-radius: 20px;
      border:1px solid rgba(255,255,255,0.3);
      box-shadow: 2px 2px 15px rgba(0,0,0,0.4);
      color: #fff;">
            <h2 style="background-color:#0c4879; color: white; height: 50px; padding-left: 20px; text-align: center; font-weight: bold;">Account Details</h2>
           
            <div class="container-fluid">
            <div class="row">
                <div class="col-2" style="font-size: 20px;">
                    <p>Name</p>
                    <p>Address</p>
                    <p>Contact No</p>
                    <p>Email</p>
                    <p>Point Amount</p>
                </div>
            <div class="col-10"  style="font-size: 20px; font-family: sans-serif;">
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
<?php include 'footer.php'?>
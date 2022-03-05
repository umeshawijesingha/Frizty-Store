                     



<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />


<h2 class="title">Featured Products</h2>

                      <?php include 'db.php'; ?>

                       
                        <?php

   


    
    $sql="SELECT product.product_name,product.product_price,product.product_image FROM product INNER JOIN home_product ON product.product_id=home_product.product_id ;";
    

    
    
    $result=mysqli_query($con,$sql);
    
    $resultCheck=0;
    if($result){
    $resultCheck=mysqli_num_rows($result);
}
    
   
    if($resultCheck >0){
        while($row = mysqli_fetch_assoc($result))
        { 
    ?>                  

                        <div class="small-container">
    
    <div class="row">

        <div class="col-4">
           <?php echo '<img src="data:image;base64,'.base64_encode($row['product_image']).'">'; ?>
            <h4><?php echo $row['product_name']; ?></h4>
            Rs <p><?php echo $row['product_price']; ?></p>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
                <i class="fa fa-star-o"></i>
            </div>
        </div>
    

    
    
    </div>
 
                    <?php   

        }
    }

    ?>
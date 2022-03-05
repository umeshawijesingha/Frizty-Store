    <?php include 'db.php';?>

                       
                        <?php

   
    $id=$_GET['id'];


    
    $sql="SELECT * from product ;";
    
    
    $result=mysqli_query($con,$sql);
    $resultCheck=0;
    if($result){
    $resultCheck=mysqli_num_rows($result);
}
    
   
    if($resultCheck >0){
        $row = mysqli_fetch_assoc($resultCheck);
         $id=$row['product_id'];

    ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="product-cate">
                                <div>
                                   <?php echo '<img src="data:image;base64,'.base64_encode($row['product_image']).'">'; ?>
                                   
                                   
                                </div>
                            </div>
                    </div>
                    <?php   

        }
    

    ?>
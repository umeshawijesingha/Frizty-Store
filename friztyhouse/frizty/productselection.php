  <?php include 'db.php';?>

<?php 


$_SESSION['category']=1;
$_SESSION['subcategory']=1;
$category=1;
$subcategory=1;
$name;

?>

   <?php if(!isset($_GET["search"])){?>               
<section class="category px-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div>
                       

                        <aside class="side-area product-side side-shadow mt-5">

                            <div class="side-title ">
                               <!-- <h3>Product-Filter</h3>-->
                               <h3>Price Filter</h3>
                            </div>
                            <div class="side-content">
                                <ul class="list">
                                   
                                <ul class="list">
                                    <div class="container">
                                        <form action="" method="get">
                                        <div class="form-group">
                                            <label for="Price">Price</label><br />
                                            <input type="number" name="start" value=<?php if(isset($_GET['start'])){
                       echo $_GET['start'];





                        
                   }else echo 500 ?> min="100" class="form-control mt-3">
                                            <input type="number" name="end" value="<?php if(isset($_GET['end'])){
                       echo $_GET['end'];           
                        
                   }else echo 5000 ?>" class="form-control mt-3">

                   <input type="hidden" name="cat" value="<?php if(isset($_GET['cat'])){
                       echo $_GET['cat'];           
                        
                   }else echo $_SESSION['category']; ?>" class="form-control mt-3">
                   <input type="hidden" name="subcat" value="<?php if(isset($_GET['subcat'])){
                       echo $_GET['subcat'];           
                        
                   }else echo $_SESSION['subcategory']; ?>" class="form-control mt-3">
                                            <button type="submit" class="btn btn-primary px-4 mt-3">Filter</button>
                                            
                                        </div>
                                        </form>
                                    </div>
                                </ul>



                                
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-top d-flex justify-content-between align-items-center">
                                <div class="product-sec product-item">
                                    <!-- <h2 class="my-5">Men's T-Shirts</h2> -->
                                    
                                </div>
                            </div>
                        </div>
            
            <?php }?>    



 <?php if(isset($_GET["search"])){?>               
<section class="category px-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div>
                       

                        <aside class="side-area product-side side-shadow mt-5">

                            <div class="side-title ">
                               <!-- <h3>Product-Filter</h3>-->
                               <h3 style="background-color: #444546; height: 70px;"></h3>
                            </div>
                            <div class="side-content">
                                <ul class="list">
                                   
                                <ul class="list">
                                    <div class="container">
                                        <form action="" method="get">
                                        <div class="form-group">
                                           <li><a href="Product.php?cat=1&subcat=1&start=500&end=5000"> Men T-shirts </a></li>

                                           <li><a href="Product.php?cat=1&subcat=2&start=500&end=5000"> Men Shirts </a></li>
                                        <li><a href="Product.php?cat=1&subcat=3&start=500&end=5000"> Men Trousers </a></li>
                                        <li><a href="Product.php?cat=1&subcat=4&start=500&end=5000"> Men Shorts </a></li>

                                        <li><a href="Product.php?cat=2&subcat=5&start=500&end=5000"> Woman Blouse </a></li>
                                        <li><a href="Product.php?cat=2&subcat=6&start=500&end=5000"> Woman Frocks </a></li>
                                        <li><a href="Product.php?cat=2&subcat=7&start=500&end=5000"> Woman Shirts </a></li>
                                        <li><a href="Product.php?cat=2&subcat=8&start=500&end=5000"> Woman Trousers </a></li>

                                        <li><a href="Product.php?cat=3&subcat=9&start=500&end=5000"> Kid Boy Wear </a></li>
                                        <li><a href="Product.php?cat=3&subcat=10&start=500&end=5000"> Kid Girl Wear </a></li>
                                            
                                            
                                        </div>
                                        </form>
                                    </div>
                                </ul>



                                
                            </div>
                        </aside>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="product-top d-flex justify-content-between align-items-center">
                                <div class="product-sec product-item">
                                    <!-- <h2 class="my-5">Men's T-Shirts</h2> -->
                                    
                                </div>
                            </div>
                        </div>
            
            <?php }?> 





     <?php

     //    $start=$_GET['start'];
     //   $end=$_GET['end'];
     //   $category=$_GET['cat'];
     // $subcategory=$_GET['subcat'];

     // echo $start;
     // echo $end;
     // echo $category;
     // echo $subcategory;
    
    //$sql="SELECT * from product where category_id=$category AND product_sub_category_id=$subcategory;";



if (isset($_GET["search"])){
    $search=$_GET["search"];
  //  $lsearch=str_replace("+", "", $search);
  //  $lsearch=trim($search);
    $lsearch=strtolower($search);
    // echo "hi";
    // echo $lsearch;
    // echo "hi";
// $_SESSION['user_id'] ;
// $_SESSION['first_name'];

//         $category=1;
//     $subcategory=2;
//     $_SESSION['category']=$category;
//     $_SESSION['subcategory']=$subcategory;

// echo $category;
// echo $subcategory;
// echo "jjj";
// echo $_SESSION['category'];
// echo $_SESSION['subcategory'];
// if(($category==1)&&($subcategory==2)){
//     $name="Men's Shirt";
   

// }else if(($category==1)&&($subcategory==1)){
//     $name="Men's T-shirts";
// }




    if($lsearch=="men t-shirt" || $lsearch=="man t-shirt" || $lsearch=="t-shirt" ||$lsearch=="t-shirts" ||$lsearch=="men's t-shirt"||$lsearch=="man's t-shirt" || $lsearch=="men t-shirts"||$lsearch=="man's t-shirts"||$lsearch=="men's t-shirts"||$lsearch=="man's t-shirts" ||$lsearch=='tshirt'||$lsearch=='tshirts'||$lsearch=="t shirt"||$lsearch=="t shirts"){
    
         $sql="SELECT * FROM Product where (product_name LIKE 'Men%' && (product_name LIKE '%T-Shirt'||product_name LIKE '%T-Shirt%'))";
         $name="Men's T-Shirt";
    

    }else if($lsearch=="men shirt" || $lsearch=="man shirt" || $lsearch=="shirt" ||$lsearch=="shirts" ||$lsearch=="men's shirt"||$lsearch=="man's shirt" || $lsearch=="men shirts"||$lsearch=="man's shirts"||$lsearch=="men's shirts"||$lsearch=="man's shirts"){
       
         $sql="SELECT * FROM Product where ((product_name LIKE 'Men%shirts' || product_name LIKE '%Shirt%')||(product_name LIKE 'shirt%')) && (product_name NOT LIKE '%T-Shirt' && product_name NOT LIKE '%T-Shirt%' && product_name NOT LIKE 'Woman%shirt') ";
        $name="Men's Shirt";


    }else if($lsearch=="men trouser" || $lsearch=="man trouser" || $lsearch=="trouser" ||$lsearch=="trousers" ||$lsearch=="men's trouser"||$lsearch=="man's trouser" || $lsearch=="men trousers"||$lsearch=="man's trousers"||$lsearch=="men's trousers"||$lsearch=="man's trousers"){
       
         $sql="SELECT * FROM Product where (( product_name LIKE 'Men%trouser%')||(product_name LIKE '%men%trouser%')) && (product_name NOT LIKE '%Girls Trouser' && product_name NOT LIKE '%Girls Trouser%') ";
        $name="Men's Trouser";


 }else if($lsearch=="men short" || $lsearch=="man short" || $lsearch=="short" ||$lsearch=="shorts" ||$lsearch=="men's short"||$lsearch=="man's short" || $lsearch=="men shorts"||$lsearch=="man's shorts"||$lsearch=="men's shorts"||$lsearch=="man's shorts"){
       
         $sql="SELECT * FROM Product where ( product_name LIKE 'Men%Short%')||(product_name LIKE 'Men%short')  ";
        $name="Men's Short";


 }else if($lsearch=="woman blouse" || $lsearch=="girl blouse" || $lsearch=="blouse" ||$lsearch=="blouses" ||$lsearch=="women's blouse"||$lsearch=="woman's blouse" || $lsearch=="women blouse"||$lsearch=="girl's blouse"||$lsearch=="women's blouse"||$lsearch=="woman's blouses"){
       
         $sql="SELECT * FROM Product where ( product_name LIKE 'Women%blouses%')||(product_name LIKE 'Woman%blouse') ||(product_name LIKE '%blouse')  ";
        $name="Woman's Blouse";


 }else if($lsearch=="woman frock" || $lsearch=="girl frock" || $lsearch=="frock" ||$lsearch=="frocks" ||$lsearch=="women's frock"||$lsearch=="woman's frock" || $lsearch=="women frock"||$lsearch=="girl's frock"||$lsearch=="women's frocks"||$lsearch=="woman's party frocks"||$lsearch=="girls's party frocks"||$lsearch=="party frocks"||$lsearch=="party frock"||$lsearch=="girl party frocks"){
      

         $sql="SELECT * FROM Product where ( product_name LIKE 'Women%frocks%')||(product_name LIKE 'Woman%frock') ||(product_name LIKE '%frock') ||( product_name LIKE '%frock%')  ";
        $name="Woman's Frock";


 }else if($lsearch=="woman shirt" || $lsearch=="girl shirt" ||$lsearch=="women's shirt"||$lsearch=="woman's shirt" || $lsearch=="women shirt"||$lsearch=="girl's shirt"||$lsearch=="women's shirts"){
      

         $sql="SELECT * FROM Product where ( product_name LIKE 'Women%shirts%')||(product_name LIKE 'Woman%shirt') ||(product_name LIKE 'Woman%shirt')  ";
        $name="Woman's Shirt";


 }else if($lsearch=="woman trouser" || $lsearch=="girl trouser" ||$lsearch=="women's trouser"||$lsearch=="woman's trouser" || $lsearch=="women trouser"||$lsearch=="girl's trouser"||$lsearch=="women's trousers"||$lsearch=="woman's jeans"||$lsearch=="girls's jeans"||$lsearch=="jeans"||$lsearch=="jean"||$lsearch=="girl jeans"){
       
         $sql="SELECT * FROM Product where ( product_name LIKE 'Women%trousers%')||(product_name LIKE 'Woman%trouser') ||(product_name LIKE 'Woman%trouser')  ";
        $name="Woman's Trouser";


 }else if($lsearch=="baby girl" || $lsearch=="baby girl trouser" ||$lsearch=="baby girl wear"||$lsearch=="baby girl's wear" || $lsearch=="baby frock"||$lsearch=="baby girl frock"||$lsearch=="baby girl skirt"||$lsearch=="baby girl's frock"||$lsearch=="baby girl frocks"||$lsearch=="baby girls frock"||$lsearch=="frock for baby girl"||$lsearch=="for baby girl"){
      
         $sql="SELECT * FROM Product where ( product_name LIKE 'Girl%wear%')||(product_name LIKE 'Girl%wear') ||(product_name LIKE 'Girl%wear') ||(product_name LIKE 'Girl%') ||(product_name LIKE '%baby girl%') ";
        $name="Girl Kids Wear";


 }else if($lsearch=="kids wear" || $lsearch=="kid wear" ||$lsearch=="baby wear"||$lsearch=="baby's wear" || $lsearch=="baby boy"||$lsearch=="baby wear boy"||$lsearch=="baby shirt"||$lsearch=="kids wear for boy"||$lsearch=="baby'trousers"||$lsearch=="baby dress"||$lsearch=="baby dress for boy"||$lsearch=="baby"||$lsearch=="baby boy"||$lsearch=="kid"||$lsearch=="kids"){
      
         $sql="SELECT * FROM Product where ( product_name LIKE 'Boy%wear%')||(product_name LIKE 'Boy%') ||(product_name LIKE 'Boy%wear'||(product_name LIKE '%baby boy%'))  ";
        $name="Boy Kids Wear";


 }else{
        $name="";
        echo "<h2 style=\"color:black;text-align:center;margin-top:150px;\">Search No Result</h2>";
        echo "<h6 style=\"color:grey;text-align:center;\">We're sorry. We cannot find any matches for your search term.</h6>";
    }

   
   
}else{




//echo "else blockkkkkkkkkkkkk";
//echo $_SESSION['category'];

      $category=$_GET['cat'];
    $subcategory=$_GET['subcat'];
     $start=$_GET['start'];
        $end=$_GET['end'];

        
if(($category==1)&&($subcategory==2)){
    $name="Men's Shirt";
   

}else if(($category==1)&&($subcategory==1)){
    $name="Men's T-shirts";
}else if(($category==1)&&($subcategory==2)){
    $name="Men's Shirtt";
}else if(($category==1)&&($subcategory==3)){
    $name="Men's Trouser";
}else if(($category==1)&&($subcategory==4)){
    $name="Men's Short";
}else if(($category==2)&&($subcategory==5)){
    $name="Women's Blouse";
}else if(($category==2)&&($subcategory==6)){
    $name="Women's Frock";
}else if(($category==2)&&($subcategory==7)){
    $name="Women's Shirtt";
}else if(($category==2)&&($subcategory==8)){
    $name="Women's Trouser";

}else if(($category==3)&&($subcategory==9)){
    $name="Boy's collection";
}else if(($category==3)&&($subcategory==10)){
    $name="Girl's collection";
}
    
    $sql="SELECT * from product where category_id=$category AND product_sub_category_id=$subcategory AND product_price BETWEEN $start AND $end";
}

?>
<div>
    <h2 style="color:darkblue;text-align:left;"><?php echo $name ?></h2>
</div>
 


<?php
    $result=mysqli_query($con,$sql);
    $resultCheck=0;
    if($result){
    $resultCheck=mysqli_num_rows($result);
}
    
   
    if($resultCheck >0){
        while($row = mysqli_fetch_assoc($result))
        { $id=$row['product_id'];

         $category=$row['category_id'];
         $subcategory=$row['product_sub_category_id'];
        // echo "ggggggggg";
        // echo $category;
        //echo $subcategory;

    ?>                  











                        <div class="col-lg-3 col-sm-6">
                            <form action="cart.php" method="post">
                            <div class="product-cate">
                                <div>
                                  <?php echo '<img src="data:image;base64,'.base64_encode($row['product_image']).'">'; ?>
                                    <div class="product-icon">
                                        <ul>
                                            <!-- <?php// echo 'cart.php?id='.$id; ?>"><i class="fas fa-shopping-cart"></i></a> </li> -->

                                            <?php 
                                            if(isset($_SESSION['user_id'])){ ?>
                                                <button type="submit" class="btn btn-warning my-3" name="add">Add to cart <i class="fas fa-shopping-cart"></i></button>
                                           <?php } else{ ?>
                                           <i class="fas fa-shopping-cart"><a style="width: 100px; color: yellow;" href="account.php" >Add to cart</a></i> 

                                          <?php }
                                            ?>
                                            
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                        </ul>
                                    </div>
                                    <!------>
                                    <div class="product-des">
                                        <h5>
                                            <?php echo $row['product_name']; ?>
                                        </h5>
                                        <p>
                                            <?php echo $row['product_price'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>
                    <?php   

        }
    }



    ?>

    











   
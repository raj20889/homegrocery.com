<!--connection link-->
<?php
    include("..\includes\connect.php");

  if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $category_id = $_POST['select_category'];
    $brand_id = $_POST['select_brand'];

    $product_price = $_POST['product_price'];

    $product_status ="true";


    //accessing image

    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2= $_FILES['product_image2']['name'];
    $product_image3= $_FILES['product_image3']['name'];

//accessing imgage temprory name
$temp_image1 = $_FILES['product_image1']['tmp_name'];
$temp_image2= $_FILES['product_image2']['tmp_name'];
$temp_image3= $_FILES['product_image3']['tmp_name'];


if(!$product_title && !$product_description && !$product_keywords && !$category_id && !$brand_id && $product_image1 && !$product_image2 && !$product_image3 && !$product_price  ){
  echo "<script>alert('Please enter the missing data')</script>";


}
else {

  move_uploaded_file($temp_image1,"./product_images/$product_image1");
  move_uploaded_file($temp_image2,"./product_images/$product_image2");
  move_uploaded_file($temp_image3,"./product_images/$product_image3");
 
 


  $insert_products = "insert into `products`(product_title,product_description,product_keywords,	category_id,brand_id,product_img1,product_img2,product_img3,product_price,date,status) values ('$product_title','$product_description','$product_keywords',$category_id,$brand_id,'$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

  $result_query = mysqli_query($con,$insert_products);

if($insert_products){
  echo "<script>alert('successfull')</script>";
}
else echo "<script>alert('product not inserted')</script>";
  


};







  };


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INSERT PRODUCT- ADMIN</title>
<!--Css link-->

<link rel="stylesheet" href="../style.css">

  <!-- FontAwesome Link -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<!-- Bootstrap link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head >

<body class="bg-light">
  <div class="container">
    <h1 class="text-center">INSERT PRODUCT - ADMIN</h1>

<!-- FROM -->
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_title" >Product Title</label>
    <input type="text" name="product_title" width-50% class="form-control" placeholder="Enter The Product Title " required="required">
  </div>

  <!--description-->
  <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_description" >Product Description</label>
    <input type="text" name="product_description" width-50% class="form-control" placeholder="Enter The Product description " required="required">
  </div>

  <!--keyword-->
  <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_keyword" >Product Keywords</label>
    <input type="text" name="product_keywords" width-50% class="form-control" placeholder="Enter The Product Keywords " required="required">
  </div>

  <!--Cattegories-->
  <div class="form-outline mb-4 w-50 m-auto">
    <select name="select_category" class="form-select">
      <option value="">CATEGORY SELECT</option>

      <?php
          
          $select_query = "select * from `categories`";
          $result_query = mysqli_query($con,$select_query);
         // $row_data = mysqli_fetch_assoc( $result_brand);
         // echo $row_data['brand_title']
  while($row_data = mysqli_fetch_assoc( $result_query)){
    $cat_title = $row_data['Categories_title'];
    $cat_id = $row_data['categories_id'];
    echo  "   <option ' value=' $cat_id'>$cat_title</option>";
  }
        ?>
   
    </select>
  </div>

   <!--brand-->
   <div class="form-outline mb-4 w-50 m-auto">
    <select name="select_brand" class="form-select">
      <option value="">BRAND SELECT</option>
      <?php
          
          $select_brand = "select * from `brand`";
          $result_brand = mysqli_query($con,$select_brand);
         // $row_data = mysqli_fetch_assoc( $result_brand);
         // echo $row_data['brand_title']
  while($row_data = mysqli_fetch_assoc( $result_brand)){
    $brand_title = $row_data['brand_title'];
    $brand_id = $row_data['brand_id'];
    echo "  <option value=' $brand_id'>$brand_title</option>";
  }
        ?>
  
      
    </select>
  </div>

   <!--image1-->
   <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_image1" >Product Image1</label>
    <input type="file" name="product_image1" width-50% class="form-control" placeholder="Enter The Product Keyword " required="required">
  </div>

  <!--image2-->
  <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_image2" >Product Image2</label>
    <input type="file" name="product_image2" width-50% class="form-control" placeholder="Enter The Product Keyword " required="required">
  </div>

  <!--image3-->
  <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_image3" >Product Image3</label>
    <input type="file" name="product_image3" width-50% class="form-control" placeholder="Enter The Product Keyword " required="required">
  </div>


  <!--Price-->
  <div class="form-outline mb-4 w-50 m-auto">
    <label for="product_keyword" >Product Price</label>
    <input type="text" name="product_price" width-50% class="form-control" placeholder="Enter The Product Price" required="required">
  </div>

  
  <!--Submit-->
  <div class="form-outline mb-4 w-50 m-auto">
    
    <input type="submit" name="insert_product" class="btn btn-info mb-5 px-3" value="Insert Product">
  </div>

</form>
  </div>
  
</body>
</html>
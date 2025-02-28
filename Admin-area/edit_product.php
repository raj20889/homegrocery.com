<?php
if(isset($_GET['edit_product'])){
  $eid=$_GET['edit_product'];
  $get_product = "select * from `products` where product_id = $eid";
  $product_query = mysqli_query($con,$get_product);
  $product_data = mysqli_fetch_assoc($product_query);
  $product_title=$product_data['product_title'];
  $product_description=$product_data['product_description'];
  $product_keywords=$product_data['product_keywords'];
  $category_id=$product_data['category_id'];
  $brand_id=$product_data['brand_id'];
  $product_img1=$product_data['product_img1'];
  $product_img2=$product_data['product_img2'];
  $product_img3=$product_data['product_img3'];
  $product_price=$product_data['product_price'];


//fetching categories
$select_category = "select * from `categories` where categories_id = $category_id";
$result_cat=mysqli_query($con,$select_category);
$row = mysqli_fetch_assoc($result_cat);
$category_title =$row['Categories_title'];


//fetching brand
$select_brand = "select * from `brand` where brand_id= $brand_id";
$result_brand=mysqli_query($con,$select_brand);
$row_brand = mysqli_fetch_assoc($result_brand);
$brand_title =$row_brand['brand_title'];

}
?>



<div  class="container mt-5">

<h1 class="text-center">Edit Product</h1>
<form action="" method="post" enctype="multipart/form-data">
  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_title" class="form-label">Product Title</label>
    <input type="text" id="product_id" name="product_title" value="<?php echo $product_title ?>" class="form-control" required="required">
  </div>

  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_desc" class="form-label">Product Description</label>
    <input type="text" id="product_desc" name="product_desc" value="<?php echo $product_description ?>" class="form-control" required="required">
  </div>

  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_keywords" class="form-label">Product Keywords</label>
    <input type="text" id="product_keywords" name="product_keywords" class="form-control" required="required"  value="<?php echo $product_keywords ?>">
  </div>


  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_cat" class="form-label">Product Category</label>
    <select name="product_cat" class="form-control">
      <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>

      <?php
      //fetching categories
$select_all_category = "select * from `categories`";
$result_total_cat=mysqli_query($con,$select_all_category);
while($all_cat_row = mysqli_fetch_assoc($result_total_cat)){
  $category_title =$all_cat_row['Categories_title'];

  echo "<option value='$category_title'>$category_title</option>";

}




      ?>
      
     
    </select>
  </div>
  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_brand" class="form-label">Product Brand</label>
    <select name="product_brand" class="form-control">
      <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
      <?php
      //fetching categories
$select_all_brands = "select * from `brand`";
$result_total_brands=mysqli_query($con,$select_all_brands);
while($all_brands_row = mysqli_fetch_assoc($result_total_brands)){
  $brand_title =$all_brands_row['brand_title'];

  echo "<option value='$brand_title'>$brand_title</option>";

}




      ?>
    </select>
  </div>


  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_img1" class="form-label">Product Image1</label>
    <div class="d-flex">
    <input type="file" id="product_img1" name="product_img1" class="form-control w-90 m-auto " required="required">
    <img src="product_images/<?php echo $product_img1 ?>" width="100px">
    </div>
  
  </div>


  

  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_img2" class="form-label">Product Image2</label>
    <div class="d-flex">
    <input type="file" id="product_img2" name="product_img2" class="form-control w-90 m-auto " required="required">
    <img src="product_images/<?php echo $product_img2 ?>" width="100px">
    </div>
  
  </div>

   

  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_img3" class="form-label">Product Image3</label>
    <div class="d-flex">
    <input type="file" id="product_img3" name="product_img3" class="form-control w-90 m-auto " required="required">
    <img src="product_images/<?php echo $product_img3 ?>" width="100px">
    </div>
  
  </div>


  <div class="form-outline w-50 m-auto mb-4">
    <label for="product_price" class="form-label">Product Price</label>
    <input type="text" id="product_price" name="product_price" value="<?php echo $product_price ?>" class="form-control" required="required">
  </div>

<div class="text-center">
  <input type="submit" name="edit_product" value="Update Product " class="btn btn-info px-3 mb-3">
</div>

</form>
</div>


<?php
//editing products

if(isset($_POST['edit_product'])){
  
  $product_title = $_POST['product_title'];
  $product_desc = $_POST['product_desc'];
  $product_keywords = $_POST['product_keywords'];
  $product_cat = $_POST['product_cat'];
  $product_brand = $_POST['product_brand'];
  $product_price= $_POST['product_price'];

  $product_img1= $_FILES['product_img1']['name'];
  $product_img2= $_FILES['product_img2']['name'];
  $product_img3= $_FILES['product_img3']['name'];

  $temp_img1= $_FILES['product_img1']['tmp_name'];
  $temp_img2= $_FILES['product_img2']['tmp_name'];
  $temp_img3= $_FILES['product_img3']['tmp_name'];

  //check for empty 
  if( $product_title=='' or  $product_desc=='' or  $product_keywords=='' or  $product_cat=='' or$product_brand=='' or  $product_price=='' or $product_price=='' or $product_img1=='' or $product_img2=='' or $product_img3=='' or $product_price==''   ){
echo "<script>alert('Please fill all the fileds and continue the process!')</script>";
  }else{
    move_uploaded_file($temp_img1,"./product_images/$product_img1");
    move_uploaded_file($temp_img2,"./product_images/$product_img2");
    move_uploaded_file($temp_img3,"./product_images/$product_img3");
  }

  //update query

  $cat_update= "select * from `categories` where Categories_title ='$product_cat'";
  $cat_query=mysqli_query($con,$cat_update);
  $row=mysqli_fetch_array($cat_query);
  $cat_id=$row['categories_id'];
  
  $brand_update= "select * from `brand` where brand_title ='$product_brand'";
  $brand_query=mysqli_query($con,$brand_update);
  $row_brand=mysqli_fetch_array($brand_query);
  $brand_id=$row_brand['brand_id'];

  $sql = "update `products` set product_title='$product_title',product_description='$product_desc',product_keywords='$product_keywords',category_id=$cat_id,brand_id=$brand_id,product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',date=NOW() where product_id=$eid
  ";

  $query = mysqli_query($con,$sql);
  if($query){
    echo "<script>alert('Product updated !')</script>";
    echo "<script>window.open('./index.php','_self')</script>";
  }

}

?>
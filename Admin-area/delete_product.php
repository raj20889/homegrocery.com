<?php
if(isset($_GET['delete_product'])){
  $delete_id=$_GET['delete_product'];

  $delete ="delete from `products` where product_id=$delete_id";
  $query=mysqli_query($con,$delete);
  if($delete){
    echo "<script>alert('Product deleted !')</script>";
    echo "<script>window.open('./index.php?view_products','_self')</script>";
  
}}
?>
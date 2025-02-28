<?php
if(isset($_GET['delete_brands'])){
  $delete_id=$_GET['delete_brands'];

  $delete ="delete from `brand` where brand_id=$delete_id";
  $query=mysqli_query($con,$delete);
  if($delete){
    echo "<script>alert('Brand deleted !')</script>";
    echo "<script>window.open('./index.php?view_brands','_self')</script>";
  
}}
?>
<?php
if(isset($_GET['delete_category'])){
  $delete_id=$_GET['delete_category'];

  $delete ="delete from `categories` where categories_id=$delete_id";
  $query=mysqli_query($con,$delete);
  if($delete){
    echo "<script>alert('Category deleted !')</script>";
    echo "<script>window.open('./index.php?view_category','_self')</script>";
  
}}
?>
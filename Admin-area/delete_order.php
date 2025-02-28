<?php
if(isset($_GET['delete_order'])){
  $order_id=$_GET['delete_order'];

  $delete ="delete from `user_orders` where order_id=$order_id";
  $query=mysqli_query($con,$delete);
  if($delete){
    echo "<script>alert('Order deleted !')</script>";
    echo "<script>window.open('./index.php','_self')</script>";
  
}}
?>
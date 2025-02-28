<?php
if(isset($_GET['delete_payment'])){
  $delete_payment=$_GET['delete_payment'];

  $delete ="delete from `user_payments` where payment_id=$delete_payment";
  $query=mysqli_query($con,$delete);
  if($delete){
    echo "<script>alert('Payment deleted !')</script>";
    echo "<script>window.open('./index.php?all_payments','_self')</script>";
  
}}
?>
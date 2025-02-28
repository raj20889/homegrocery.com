<?php
if(isset($_GET['delete_user'])){
  $delete_id=$_GET['delete_user'];

  $delete ="delete from `user_table` where user_id=$delete_id";
  $query=mysqli_query($con,$delete);
  if($delete){
    echo "<script>alert('user deleted !')</script>";
    echo "<script>window.open('./index.php?lisr_users.php','_self')</script>";
  
}}
?>
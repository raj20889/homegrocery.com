
<?php
include('../includes/connect.php');
include('../functions/common-functions.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Registration</title>
  <!-- FontAwesome Link -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<!-- Bootstrap link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>

  body{
    overflow: hidden;
  }
</style>
</head>
<body>
  <div class="container-fluid m-3">
    <h2 class="text-center mb-5">Admin Registration</h2>
    <div class="row d-flex justify-content-centr align-items-center">
      <div class="col-lg-6 col-xl-5">
        <img src="./admin-photo.jpg" alt="admin image" class="img-fluid" width="50%">
      </div>
      <div class="col-lg-6 col-xl-4">
       <form action="" method="post">
        <div class="form-outline mb-4">
          <label for="username" class="form-label">Username</label>
          <input type="text" id="username" name="username" required class="form-control">
        </div>

        <div class="form-outline mb-4">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email"   name="email" required class="form-control">
        </div>


        <div class="form-outline mb-4">
          <label for="password" class="form-label">Password</label>
          <input type="text" id="password" name="password" required class="form-control">
        </div>
        
        <div class="form-outline mb-4">
          <label for="cmp_password" class="form-label">Confirm Password</label>
          <input type="password" id="cmp_password"   name="cmp_password" required class="form-control">
        </div>


        <div class="form-outline mb-4">
          
          <input type="submit" id="admin_register"  class="bg-info py-2 px-3 border-0" value="Register" name="admin_register" required="form-control">
          <p class="mt-2  fw-bold small">Already have an account ?<a href="admin_login.php" class="text-danger"> Login</a></p>
        </div>

       </form>
      </div>
    </div>
  </div>
</body>
</html>



<?php 

if(isset($_POST['admin_register'])){
  global $con;
  $user_ip= getIPAddress();
  
  $admin_username = $_POST['username'];

  $admin_email = $_POST['email'];
  $admin_password = $_POST['password'];
  //HASHING PASSWORD
  $hash_password = password_hash($admin_password,PASSWORD_DEFAULT);
  $admin_confirm_password = $_POST['cmp_password'];
  
 

//move uploaded image


//check email already exist

$check_query = "SELECT * FROM `admin_table` WHERE admin_email = '$admin_email'";

$check_result =mysqli_query($con,$check_query);
$row_count =mysqli_num_rows($check_result);
if($row_count>0){
  echo "<script>alert('Admin Already Exist With This Email!')</script>";
}

else if($admin_password!=$admin_confirm_password){
  echo "<script>preventDefault()</script>";
  echo "<script>alert('Password do not match')</script>";
}


else{

//inserting query 

$insert_admin = "insert into `admin_table` (admin_name,admin_email,admin_password) values ('$admin_username','$admin_email','$hash_password')";

$insert_query =mysqli_query($con,$insert_admin);
if($insert_query){
  echo '<script>alert("Admin Registration Successfull")</script>';
  echo "<script>window.open('admin_login.php','_self')</script>";

}
}}?>
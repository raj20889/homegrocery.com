
<?php
include('../includes/connect.php');
include('../functions/common-functions.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
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
    <h2 class="text-center mb-5">Admin Login</h2>
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
          <label for="password" class="form-label">Password</label>
          <input type="password" id="password" name="password" required class="form-control">
        </div>
        
        

        <div class="form-outline mb-4">
          
          <input type="submit" id="admin_login"  class="bg-info py-2 px-3 border-0" value="Login" name="admin_login" required="form-control">
          <p class="mt-2  fw-bold small">Don't have an account  ?<a href="admin_registration.php" class="text-danger"> Register</a></p>
        </div>

       </form>
      </div>
    </div>
  </div>
</body>
</html>



<?php

if (isset($_POST['admin_login'])) {

  $admin_username = $_POST['username'];
  $admin_password = $_POST['password'];

  $select_email = "select * from `admin_table` where admin_name = '$admin_username'";
  $run_query = mysqli_query($con, $select_email);
  $row = mysqli_num_rows($run_query);
  $row_data = mysqli_fetch_assoc($run_query);



  if ($row > 0) {
    $_SESSION['admin_username']=$admin_username;
    if (password_verify($admin_password, $row_data['admin_password'])) {

        if($row==1 && $cart_row==0){
          $_SESSION['admin_username']=$admin_username;
          echo "<script>alert('Login succssful')</script>";
          echo "<script>window.open('index.php','_self')</script>";
        }

     
    } else {
      echo "<script>alert('Invalid Credentials.')</script>";
    }
  } else {
    echo "<script>alert('Invalid Credentials.')</script>";
  }
}
?>
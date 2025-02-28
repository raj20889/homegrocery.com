<?php
include("../includes/connect.php");
include("../functions/common-functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>

  <!-- External CSS -->
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    .admin-photo {
      width: 100px;
      object-fit: contain;
      border-radius: 50%;
    }
    .admin-panel {
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
    }
    .nav-link-custom {
      color: white !important;
      background-color: #007bff !important;
      border-radius: 5px;
      margin-bottom: 10px;
      width: 100%;
    }
    .nav-link-custom:hover {
      background-color: #0056b3 !important;
    }
    .footer {
      background-color: #007bff;
      position: relative;
      bottom: 0;
      width: 100%;
      padding: 15px;
      color: white;
    }
    .sidebar-button {
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 1.1rem;
      padding: 10px;
      margin: 5px 0;
    }
    .sidebar-button:hover {
      background-color: #0056b3;
      border-radius: 5px;
    }
    .container {
      min-height: 100vh;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
      <img src="../top Products\LOGO.png" class="logo-img" style="max-width: 120px;">
      <a class="navbar-brand text-white" href="#">Welcome, Admin</a>
      <div class="ml-auto">
        <a href="admin_logout.php" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </nav>

  <!-- Admin Sidebar -->
  <div class="d-flex">
    <div class="col-md-2 bg-light p-3 admin-panel">
      <div class="text-center">
        <a href="#"><img src="admin-photo.jpg" class="admin-photo" alt="Admin Photo"></a>
        <p class="mt-3 text-dark">Mohit Raj</p>
      </div>
      <div class="d-flex flex-column">
        <button class="sidebar-button"><a href="insert_product.php" class="nav-link-custom"><i class="fas fa-plus-circle"></i> Insert Product</a></button>
        <button class="sidebar-button"><a href="index.php?view_products" class="nav-link-custom"><i class="fas fa-eye"></i> View Products</a></button>
        <button class="sidebar-button"><a href="index.php?insert_categories" class="nav-link-custom"><i class="fas fa-plus-circle"></i> Insert Categories</a></button>
        <button class="sidebar-button"><a href="index.php?view_category" class="nav-link-custom"><i class="fas fa-list"></i> View Categories</a></button>
        <button class="sidebar-button"><a href="index.php?insert_brands" class="nav-link-custom"><i class="fas fa-plus-circle"></i> Insert Brands</a></button>
        <button class="sidebar-button"><a href="index.php?view_brands" class="nav-link-custom"><i class="fas fa-eye"></i> View Brands</a></button>
        <button class="sidebar-button"><a href="index.php?list_orders" class="nav-link-custom"><i class="fas fa-clipboard-list"></i> All Orders</a></button>
        <button class="sidebar-button"><a href="index.php?all_payments" class="nav-link-custom"><i class="fas fa-credit-card"></i> All Payments</a></button>
        <button class="sidebar-button"><a href="index.php?list_users" class="nav-link-custom"><i class="fas fa-users"></i> List Users</a></button>
      </div>
    </div>

    <!-- Main Content -->
    <div class="col-md-10 p-3">
      <div class="bg-light p-3 rounded">
        <h3 class="text-center">Manage Details</h3>
      </div>

      <!-- Content Section -->
      <div class="container mt-4">
        <?php
        if (isset($_GET['insert_categories'])) {
          include('insert-categories.php');
        }

        if (isset($_GET['insert_brands'])) {
          include('insert_brands.php');
        }
        if (isset($_GET['view_products'])) {
          include('view_products.php');
        }
        if (isset($_GET['edit_product'])) {
          include('edit_product.php');
        }

        if (isset($_GET['delete_product'])) {
          include('delete_product.php');
        }
        if (isset($_GET['view_category'])) {
          include('view_category.php');
        }
        if (isset($_GET['view_brands'])) {
          include('view_brands.php');
        }
        if (isset($_GET['edit_brands'])) {
          include('edit_brands.php');
        }
        if (isset($_GET['delete_brands'])) {
          include('delete_brand.php');
        }
        if (isset($_GET['edit_category'])) {
          include('edit_category.php');
        }
        if (isset($_GET['delete_category'])) {
          include('delete_category.php');
        }
        if (isset($_GET['list_orders'])) {
          include('list_orders.php');
        }
        if (isset($_GET['delete_order'])) {
          include('delete_order.php');
        }
        if (isset($_GET['all_payments'])) {
          include('all_payments.php');
        }
        if (isset($_GET['delete_payment'])) {
          include('delete_payment.php');
        }
        if (isset($_GET['list_users'])) {
          include('list_users.php');
        }if(isset($_GET['delete_user'])){
          include('delete_user.php');
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer text-center p-3">
    <p>&copy; All Rights Reserved @ Website created by - Mohit Raj</p>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

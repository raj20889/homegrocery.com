<?php

  include('..\includes\connect.php');

  if(isset($_POST['insert_cat'])){
    $category_title = $_POST['cat_title'];

    // select data from database
    $select_query = "select * from `categories` where categories_title = ('$category_title')";
    $result_Select = mysqli_query($con,$select_query);
    $number = mysqli_num_rows($result_Select);
    if($number>0){
      echo "<script>alert('category is already added in database')</script>";
    }else{

    $insert_query = "insert into `categories` (Categories_title) values ('$category_title')";
    $result = mysqli_query($con,$insert_query);
    if($result){
      echo "<script>alert('category has been inserted successfully')</script>";
    }
  }}

  ?>
<h1 class="text-center">INSERT CATEGORIES</h1>

<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1">
    <i class="fa-solid fa-receipt"></i>
  </span>
  <input type="text" class="form-control"  name="cat_title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10 mb-2">
  <input type="submit" class="bg-info border-0 p-2 my-3" name="insert_cat" value="insert Categories">
  
</div>
</form>

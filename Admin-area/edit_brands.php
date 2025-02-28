
<?php
if(isset($_GET['edit_brands'])){
  $brand_id=$_GET['edit_brands'];
  $sql = "select * from `brand` where brand_id=$brand_id";
  $query = mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($query);
  $brand_title=$row['brand_title'];
}


if(isset($_POST['update'])){

  $update_brand=$_POST['brand_title'];

  $update="update `brand` set brand_title='$update_brand' where brand_id=$brand_id";
  $update_query=mysqli_query($con,$update);
  if($update){
    echo "<script>alert('Brand Updated!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }
}


?>



<div class="container mt-3">
  <h1 class="text-center">Edit Brand</h1>
  <form action="" method="post" class="text-center">
    <div class="form-outline mb-4 w-50  m-auto">
      <label for="brand_title" class="my-4">Brand Title</label>
      <input type="text" name="brand_title" id="brand_control" value="<?php echo $brand_title;?>" class="form-control" required>
    </div>
    <input type="submit" value="Update Brand" name="update" class="btn btn-info px-3 mb-3">
  </form>
</div>
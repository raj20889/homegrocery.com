
<?php
if(isset($_GET['edit_category'])){
  $cat_id=$_GET['edit_category'];
  $sql = "select * from `categories` where categories_id=$cat_id";
  $query = mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($query);
  $cat_title=$row['Categories_title'];
}


if(isset($_POST['update'])){

  $update_cat=$_POST['category_title'];

  $update="update `categories` set Categories_title='$update_cat' where categories_id=$cat_id";
  $update_query=mysqli_query($con,$update);
  if($update){
    echo "<script>alert('Category Updated!')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }
}


?>



<div class="container mt-3">
  <h1 class="text-center">Edit Category</h1>
  <form action="" method="post" class="text-center">
    <div class="form-outline mb-4 w-50  m-auto">
      <label for="category_title" class="my-4">Category Title</label>
      <input type="text" name="category_title" id="category_control" value="<?php echo $cat_title;?>" class="form-control" required>
    </div>
    <input type="submit" value="Update Category" name="update" class="btn btn-info px-3 mb-3">
  </form>
</div>
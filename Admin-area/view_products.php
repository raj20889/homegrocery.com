<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<h3 class="text-center text-success">All Products</h3>

<table class="table table-bordered mt-5">

<thead style="background-color: #0dcaf0;">
  <tr class="text-center">
    <th>Product ID</th>
    <th>Product Title</th>
    <th>Product image</th>
    <th>Product Price</th>
    <th>Total sold</th>
    <th>Status</th>
    <th>Edit</th>
    <th>Delete</th>

  </tr>
</thead>

<tbody class="bg-secondary text-light">
  <?php
  $get_product ="select * from `products`";
  $result = mysqli_query($con,$get_product);
  $number=0;
  while($row = mysqli_fetch_assoc($result)){
    $product_id =$row['product_id'];
    $product_title =$row['product_title'];
    $product_img =$row['product_img1'];
    $product_price =$row['product_price'];
    $total_sold=0;
    $status =$row['status'];

    $number++;
    ?>
    <tr class='text-center'>
    <td><?php echo $number ?></td>
    <td><?php echo $product_title ?></td>
    <td><img src='product_images/<?php echo $product_img?>' height=100px></td>
    <td> <?php echo $product_price?>/-</td>
    <td>  <?php 
    $count ="select * from `order_pending` where product_id=$product_id";
    $count_result =mysqli_query($con,$count);
    $row_count = mysqli_num_rows($count_result);
    echo $row_count;
    ?></td>
    <td><?php echo $status ?></td>
    <td><a href='index.php?edit_product=<?php echo $product_id ?>' ><i class='fa-solid fa-pen-to-square'></i></a></td>

    <td><a  href='index.php?delete_product=<?php echo $product_id ?>'><i class='fa-solid fa-trash'></i></a></td>
  </tr>
  <?php
  }
  ?>

</tbody>

</table>
</body>
</html>
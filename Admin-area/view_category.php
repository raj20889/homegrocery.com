<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
  <thead class="bg-info text-center">
    <tr>
      <th>Sl_ No</th>
      <th>Category Title</th>
      <td><a href='' ><i class='fa-solid fa-pen-to-square'></i></a></td>

    <td><a  href=''><i class='fa-solid fa-trash'></i></a></td>
      
    </tr>
  </thead>
  <tbody class="bg-secondary text-center text-light">

  <?php
  $select_cat ="select * from `categories`";
  $query =mysqli_query($con,$select_cat);
  $number=0;
  while($row=mysqli_fetch_assoc($query)){
    $category_id =$row['categories_id'];
    $category_title =$row['Categories_title'];
$number++;
?>
 <tr>
      <td><?php echo $number; ?></td>
      <td><?php echo $category_title; ?></td>
      <td><a href='index.php?edit_category=<?php echo $category_id;?>' ><i class='fa-solid fa-pen-to-square'></i></a></td>

    <td><a href='index.php?delete_category=<?php echo $category_id;?>'><i class='fa-solid fa-trash'></i></a></td>
      
    </tr>
    <?php
  }
  
  ?>
   
  </tbody>
</table>
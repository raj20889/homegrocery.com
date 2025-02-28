<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
  <thead class="bg-info text-center">
    <tr>
      <th>Sl_ No</th>
      <th>Brand Title</th>
      <td><a href='' ><i class='fa-solid fa-pen-to-square'></i></a></td>

    <td><a  href=''><i class='fa-solid fa-trash'></i></a></td>
      
    </tr>
  </thead>
  <tbody class="bg-secondary text-center text-light">

  <?php
  $select_brand ="select * from `brand`";
  $query =mysqli_query($con,$select_brand);
  $number=0;
  while($row=mysqli_fetch_assoc($query)){
    $brand_id =$row['brand_id'];
    $brand_title =$row['brand_title'];
$number++;
?>
 <tr>
      <td><?php echo $number; ?></td>
      <td><?php echo $brand_title; ?></td>
      <td><a href='index.php?edit_brands=<?php echo $brand_id; ?>' ><i class='fa-solid fa-pen-to-square'></i></a></td>

    <td><a  href='index.php?delete_brands=<?php echo $brand_id; ?>'><i class='fa-solid fa-trash'></i></a></td>
      
    </tr>
    <?php
  }
  
  ?>
   
  </tbody>
</table>
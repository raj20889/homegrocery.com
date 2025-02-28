<h3 class="text-center text-success">All Users</h3>
<table class=" table table-bordered mt-5">
  <thead class="bg-info text-center">

  <?php
$get_users = "select * from `user_table`";
$result = mysqli_query($con,$get_users);
$row_count = mysqli_num_rows($result);




if($row_count==0){
  echo "<tr><td colspan='7' class='bg-danger text-center'>No User Found!</td></tr>";
}else{

  echo "<tr>
  <th>Sl_no</th>
  <th>Name</th>
  <th>Email</th>
  <th>Image</th>
  <th>User IP</th>
  <th>Address</th>
  <th>Mobile</th>
 
  <th>Delete</th>
  </tr>
  </thead>
  <tbody class='bg-secondary   text-center'>
  
  ";

  $number=0;
  
  while($row_data=mysqli_fetch_assoc($result)){
   
$user_id= $row_data['user_id'];

$username= $row_data['username'];
$user_email= $row_data['user_email'];
$user_password= $row_data['user_password'];
$user_img= $row_data['user_img'];
$user_ip= $row_data['user_ip'];
$user_address= $row_data['user_address'];
$user_mobile= $row_data['user_mobile'];
$number++;

echo "  <tr>
      <td>$number</td>
      <td>$username</td>
      <td>$user_email</td>
      <td><img src='../user_area/user_photo/$user_img' width=100px></td>
      <td>$user_ip</td>
      <td>$user_address</td>
      <td>$user_mobile</td>
      
   <td><a  href='index.php?delete_user= $user_id'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";
  }
}


?>
  
  
  </tbody>
</table>
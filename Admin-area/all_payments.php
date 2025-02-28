<h3 class="text-center text-success">All Payments</h3>
<table class=" table table-bordered mt-5">
  <thead class="bg-info text-center">

  <?php
$get_payments = "select * from `user_payments`";
$result = mysqli_query($con,$get_payments);
$row_count = mysqli_num_rows($result);




if($row_count==0){
  echo "<tr><td colspan='7' class='bg-danger text-center'>No Payment Received Yet!</td></tr>";
}else{

  echo "<tr>
  <th>Sl_no</th>
  <th>Invoice Number</th>
  <th>Amount</th>
  <th>Payment Mode</th>
  <th>Order Date</th>
  <th>Delete</th>
  </tr>
  </thead>
  <tbody class='bg-secondary   text-center'>
  
  ";

  $number=0;
  
  while($row_data=mysqli_fetch_assoc($result)){
   
$order_id= $row_data['order_id'];


$payment_id= $row_data['payment_id'];
$invoice_number= $row_data['invoice_number'];
$amount= $row_data['amount'];
$payment_mode= $row_data['payment_mode'];
$date= $row_data['date'];
$number++;

echo "  <tr>
      <td>$number</td>
      <td>$invoice_number</td>
      <td>$amount</td>
      <td>$payment_mode</td>
      <td>$date</td>
    
   <td><a  href='index.php?delete_payment= $payment_id'><i class='fa-solid fa-trash'></i></a></td>
    </tr>";
  }
}


?>
  
  
  </tbody>
</table>
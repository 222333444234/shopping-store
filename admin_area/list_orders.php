<h3 class="text-center text-success">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
    <?php
    $get_order = "select * from user_orders";
        $result = mysqli_query($con, $get_order);
        $count = mysqli_num_rows($result);
        
        echo"<tr class='text-center'>
            <th>SI No.</th>
            <th>Due Amount</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr></thead>
        <tbody class='bg-secondary text-light'>";
    
    
    if($count==0){
        echo "<h3 class='text-danger text-center mt-5'>No Orders Yet</h3>";
    }else{
        $number = 0;
        while ($row_data = mysqli_fetch_assoc($result)) {
            $order_id = $row_data['order_id'];
            $user_id = $row_data['user_id'];
            $amount_due = $row_data['amount_due'];
            $invoice_number = $row_data['invoice_number'];
            $total_products = $row_data['total_products'];
            $order_date = $row_data['order_date'];
            $order_status = $row_data['order_status'];
            $number++;
            echo "<tr class='text-center'>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$order_status</td>
            <td><a href='index.php?delete_orders=$order_id' type='button' class='text-decoration-none' data-toggle='modal' data-target='#exampleModal'><img src='images/delete.png'/></a></td>
        </tr>";
        
      }  }?>
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <h4>Are you sure you want to Delete?</h4>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_orders" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_orders=<?php echo $order_id?>' type='button' class=' text-light text-decoration-none'>Yes</a></button>
      </div>
    </div>
  </div>
</div>
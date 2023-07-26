<?php

$get_username = $_SESSION['username'];
$get_details = "select * from user_table where username='$get_username'";
$detail_query = mysqli_query($con, $get_details);
$row_detail_query = mysqli_fetch_array($detail_query);
$user_id = $row_detail_query['user_id'];
?>
<h3 class="text-success text-center"> All My Orders</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>SI No.</th>
            <th>Amount Due</th>
            <th>Total Products</th>
            <th>Invoice Number</th>
            <th>Date</th>
            <th>Complete/Incomplete</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody class="bg-secondary text-light text-center">

        <?php


        $number = 1;
        $select_query = "select * from `user_orders` where user_id='$user_id'";
        $result_query = mysqli_query($con, $select_query);

        while ($row_query = mysqli_fetch_array($result_query)) {
            $order_id = $row_query['order_id'];
            $amount_due = $row_query['amount_due'];
            $invoice_number = $row_query['invoice_number'];
            $total_products = $row_query['total_products'];
            $order_date = $row_query['order_date'];
            $order_status = $row_query['order_status'];
            if ($order_status == 'pending') {
                $order_status = 'Incomplete';
            } else {
                $order_status = 'Complete';
            }
            echo "<tr>
                      <td>$number</td>
                      <td>$amount_due</td>
                      <td>$total_products</td>
                      <td>$invoice_number</td>
                      <td>$order_date</td>
                      <td>$order_status</td>";
                      ?>
                      <?php
                      if($order_status=='Complete'){
                        echo"<td>Paid</td>";
                      }else{
                        echo"<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>confirm</a></td>
                      </tr>";
                      }
            $number++;
        }
        ?>



    </tbody>
</table>
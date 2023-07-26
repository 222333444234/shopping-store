<?php

if (isset($_GET['delete_orders'])) {
  $delete_id = $_GET['delete_orders'];

  $sql = "Delete from `user_orders` where order_id='$delete_id'";
  $result = mysqli_query($con,$sql);
  if($result){
    echo "<script>alert('order is been deleted successfully')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }
}
  ?>
<?php

if (isset($_GET['delete_products'])) {
  $delete_id = $_GET['delete_products'];

  $sql = "Delete from `products` where product_id='$delete_id'";
  $result = mysqli_query($con, $sql);
  if($result){
    echo "<script>alert('Product deleted successfully')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }
}
  ?>
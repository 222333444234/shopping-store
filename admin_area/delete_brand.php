<?php

if (isset($_GET['delete_brand'])) {
  $delete_id = $_GET['delete_brand'];

  $sql = "Delete from `brands` where brand_id='$delete_id'";
  $result = mysqli_query($con, $sql);
  if($result){
    echo "<script>alert('Brand is been deleted successfully')</script>";
    echo "<script>window.open('index.php','_self')</script>";
  }
}
  ?>
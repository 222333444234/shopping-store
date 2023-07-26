<?php
if (isset($_GET['edit_brand'])) {
  $edit_brand = $_GET['edit_brand'];

  $sql = "select * from `brands` where brand_id='$edit_brand'";
  $result = mysqli_query($con,$sql);
  $row_data = mysqli_fetch_assoc($result);
  $brand_title = $row_data['brand_title'];


}

if (isset($_POST['edit_brand'])) {
  $brand_title = $_POST['brand_title'];


  if($brand_title==''){
       echo "<script>alert('Please fill all available fiels')</script>";
       exit();
   }else{


       $update_query = "update brands set brand_title='$brand_title' where brand_id='$edit_brand'";
       $update_result = mysqli_query($con,$update_query);
       if($update_result){
        echo "<script>alert('succesfully edited the Categories')</script>";
        echo "<script>window.open('index.php?view_brand','_self')</script>";
       }
   }
}
?>

<div class="container my-5">
  <h3 class="text-center">Edit Brands</h3>
  <form action="" method="post">

    <div class="form-outline w-50 m-auto mb-4 mt-4">
      <h6 for="brand_title" class="form-lable text-center">Brands Title</h6>
      <input type="text" name="brand_title" value="<?php echo $brand_title ?>" class="form-control" id="brand_title" required="required">
    </div>

    <div class="w-50 m-auto">
      <input type="submit" name="edit_brand" class="btn btn-info px-3 mb-3" value="Update Brands">
    </div>
  </form>

</div>
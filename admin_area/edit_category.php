<?php
if (isset($_GET['edit_category'])) {
  $edit_category = $_GET['edit_category'];

  $sql = "select * from `categories` where category_id='$edit_category'";
  $result = mysqli_query($con,$sql);
  $row_data = mysqli_fetch_assoc($result);
  $category_title = $row_data['category_title'];


}

if (isset($_POST['edit_category'])) {
  $category_title = $_POST['category_title'];


  if($category_title==''){
       echo "<script>alert('Please fill all available fiels')</script>";
       exit();
   }else{


       $update_query = "update categories set category_title='$category_title' where category_id='$edit_category'";
       $update_result = mysqli_query($con,$update_query);
       if($update_result){
        echo "<script>alert('succesfully edited the Categories')</script>";
        echo "<script>window.open('index.php?view_category','_self')</script>";
       }
   }
}
?>

<div class="container my-5">
  <h3 class="text-center">Edit Categories</h3>
  <form action="" method="post">

    <div class="form-outline w-50 m-auto mb-4 mt-4">
      <h6 for="category_title" class="form-lable text-center">Category Title</h6>
      <input type="text" name="category_title" value="<?php echo $category_title ?>" class="form-control" id="category_title" required="required">
    </div>

    <div class="w-50 m-auto">
      <input type="submit" name="edit_category" class="btn btn-info px-3 mb-3" value="Update Category">
    </div>
  </form>

</div>
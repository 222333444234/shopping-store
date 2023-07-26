<?php
if (isset($_GET['edit_products'])) {
  $edit_id = $_GET['edit_products'];

  $sql = "select * from `products` where product_id='$edit_id'";
  $result = mysqli_query($con, $sql);
  $row_data = mysqli_fetch_assoc($result);
  $product_title = $row_data['product_title'];
  $product_description = $row_data['product_description'];
  $product_keywords = $row_data['product_keywords'];
  $category_id = $row_data['category_id'];
  $brand_id = $row_data['brand_id'];
  $product_image1 = $row_data['product_image1'];
  $product_image2 = $row_data['product_image2'];
  $product_image3 = $row_data['product_image3'];
  $product_price = $row_data['product_price'];


  //fetching category name
  $select_category = "select * from `categories` where category_id='$category_id'";
  $category_result = mysqli_query($con,$select_category);
  $row_category_data = mysqli_fetch_array($category_result);
  $category_title = $row_category_data['category_title'];

  //fetching brand name
  $select_brand = "select * from `brands` where brand_id='$brand_id'";
  $brand_result = mysqli_query($con, $select_brand);
  $row_brand_data = mysqli_fetch_array($brand_result);
  $brand_title = $row_brand_data['brand_title'];
}

if (isset($_POST['edit_product'])) {
  $product_title = $_POST['product_title'];
  $product_description = $_POST['product_description'];
  $product_keywords = $_POST['product_keywords'];
  $product_category = $_POST['product_category'];
  $product_brand = $_POST['product_brand'];
  $product_price = $_POST['product_price'];

  $product_image1 = $_FILES['product_image1']['name'];
  $product_image2 = $_FILES['product_image2']['name'];
  $product_image3 = $_FILES['product_image3']['name'];

  $temp_image1 = $_FILES['product_image1']['tmp_name'];
  $temp_image2 = $_FILES['product_image2']['tmp_name'];
  $temp_image3 = $_FILES['product_image3']['tmp_name'];

  if($product_title=='' or $product_description=='' or $product_keywords==''or $category_id==''or $brand_id==''or $product_price==''or $product_image1==''or $product_image2==''or $product_image3==''){
       echo "<script>alert('Please fill all available fiels')</script>";
       exit();
   }else{

       move_uploaded_file($temp_image1,"./images/$product_image1");
       move_uploaded_file($temp_image2,"./images/$product_image2");
       move_uploaded_file($temp_image3,"./images/$product_image3");

       $update_query = "update products set product_title='$product_title',product_description='$product_description',product_keywords='$product_keywords',category_id='$product_category',brand_id='$product_brand',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',product_price='$product_price' where product_id='$edit_id'";
       $update_result = mysqli_query($con,$update_query);
       if($update_result){
        echo "<script>alert('succesfully edited the products')</script>";
        echo "<script>window.open('index.php?view_product','_self')</script>";
       }
   }
}
?>


<style>
  .product_img {
    width: 100px;
    object-fit: contain;
  }
</style>
<div class="container my-5">
  <h3 class="text-center">Edit Products</h3>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline w-50 m-auto mb-4">
      <label for="product_title" class="form-lable">Product Title</label>
      <input type="text" name="product_title" value="<?php echo $product_title ?>" class="form-control" id="product_title" required="required">
    </div>

    <div class="form-outline w-50 m-auto mb-4">
      <label for="product_description" class="form-lable">Product description</label>
      <input type="text" name="product_description" value="<?php echo $product_description ?>" class="form-control" id="product_description" required="required">
    </div>

    <div class="form-outline w-50 m-auto mb-4">
      <label for="product_keywords" class="form-lable">Product keywords</label>
      <input type="text" name="product_keywords" value="<?php echo $product_keywords ?>" class="form-control" id="product_keywords" required="required">
    </div>

    <div class="form-outline w-50 m-auto mb-4">
      <label for="category_id" class="form-lable">Product Category</label>
      <select name="product_category" class="form-select">
      <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
        <?php
        $select_category_all = "select * from `categories`";
        $category_result_all = mysqli_query($con, $select_category_all);
        while ($row_category_data_all = mysqli_fetch_assoc($category_result_all)) {
          $category_title = $row_category_data_all['category_title'];
          $category_id = $row_category_data_all['category_id'];
          echo "<option value='$category_id'>$category_title</option> ";
        };
        ?>
      </select>
    </div>

    <div class="form-outline w-50 m-auto mb-4">
      <label for="brand_id" class="form-lable">Product brand</label>
      <select name="product_brand" class="form-select">
      <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>

        <?php
        $select_brand_all = "select * from `brands`";
        $brand_result_all = mysqli_query($con, $select_brand_all);
        while ($row_brand_data_all = mysqli_fetch_assoc($brand_result_all)) {
          $brand_title = $row_brand_data_all['brand_title'];
          $brand = $row_brand_data_all['brand_id'];
          echo "<option value='$brand_id'>$brand_title</option> ";
        };
        ?>
      </select>
    </div>

    <div class="form-outline w-50 m-auto mb-4">
      <label for="product_image1" class="form-lable">Product Image1</label>
      <div class="d-flex">
        <input type="file" name="product_image1" class="form-control w-90 m-auto" id="product_image1" required="required">
        <img src="images/<?php echo $product_image1; ?>" alt="" class="product_img">
      </div>
    </div>

    <div class="form-outline w-50 m-auto mb-4">
      <label for="product_image2" class="form-lable">Product Image2</label>
      <div class="d-flex">
        <input type="file" name="product_image2" class="form-control w-90 m-auto" id="product_image2" required="required">
        <img src="images/<?php echo $product_image2; ?>" alt="" class="product_img">
      </div>
    </div>

    <div class="form-outline w-50 m-auto mb-4">
      <label for="product_image3" class="form-lable">Product Image3</label>
      <div class="d-flex">
        <input type="file" name="product_image3" value="<?php echo $product_image3 ?>" class="form-control w-90 m-auto" id="product_image3" required="required">
        <img src="images/<?php echo $product_image3; ?>" alt="" class="product_img">
      </div>
    </div>

    <div class="form-outline w-50 m-auto mb-4">
      <label for="product_price" class="form-lable">Product price</label>
      <input type="text" name="product_price" value="<?php echo $product_price ?>" class="form-control" id="product_price" required="required">
    </div>

    <div class="w-50 m-auto">
      <input type="submit" name="edit_product" class="btn btn-info px-3 mb-3" value="Update Products">
    </div>
  </form>

</div>
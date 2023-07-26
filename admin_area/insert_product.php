<?php
include("../includes/connect.php");
?>

<?php
if(isset($_POST['submit'])){
   $product_title = $_POST['product_title'];
   $product_description = $_POST['product_description'];
   $product_keywords = $_POST['product_keywords'];
   $product_categories = $_POST['product_categories'];
   $product_brands = $_POST['product_brands'];
   $product_price = $_POST['product_price'];
   $status = "true";
 
   $product_image1 = $_FILES['product_image1']['name'];
   $product_image2 = $_FILES['product_image2']['name'];
   $product_image3 = $_FILES['product_image3']['name'];

   $temp_image1 = $_FILES['product_image1']['tmp_name'];
   $temp_image2 = $_FILES['product_image2']['tmp_name'];
   $temp_image3 = $_FILES['product_image3']['tmp_name'];

   if($product_title=='' or $product_description=='' or $product_keywords==''or $product_categories==''or $product_brands==''or $product_price==''or $product_image1==''or $product_image2==''or $product_image3==''){
       echo "<script>alert('Please fill all available fiels')</script>";
       exit();
   }else{

       move_uploaded_file($temp_image1,"./images/$product_image1");
       move_uploaded_file($temp_image2,"./images/$product_image2");
       move_uploaded_file($temp_image3,"./images/$product_image3");

       $sql = "insert into products(product_title,product_description,product_keywords,category_id,brand_id,product_price,product_image1,product_image2,product_image3,date,status)VALUES('$product_title','$product_description','$product_keywords','$product_categories','$product_brands','$product_price','$product_image1','$product_image2','$product_image3',NOW(),'$status')";
       $result = mysqli_query($con,$sql);
       if($result){
        echo "<script>alert('succesfully inserted the products')</script>";
        echo "<script>window.open('index.php','_self')</script>";
       }
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel of ecommerce website</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">
    <div class="container-fluid mt-3">
        <h1 class="text-center">Insert Products</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <!-- product title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" class="form-control" id="product_title" name="product_title" placeholder="Enter product title" autocomplete="off" required="required">
            </div>

            <!-- product description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_description" class="form-label">Product description</label>
                <input type="text" class="form-control" id="product_description" name="product_description" placeholder="Enter product description" autocomplete="off" required="required">
            </div>

            <!-- product keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_keywords" class="form-label">Product keywords</label>
                <input type="text" class="form-control" id="product_keywords" name="product_keywords" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div>

            <!-- Categories -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_categories" id="" class="form-select">
                    <option value="">Select a category</option>
                    <?php
                    $select_category = "select * from categories";
                    $result_category = mysqli_query($con, $select_category);

                    while ($row_data = mysqli_fetch_assoc($result_category)) {
                        $category_id = $row_data['category_id'];
                        $category_title = $row_data['category_title'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Brands -->
            <div class="form-outline mb-4 w-50 m-auto">
                <select name="product_brands" id="" class="form-select">
                    <option value="">Select a brand</option>
                    <?php
          $select_brand = "select * from brands";
          $result_brand = mysqli_query($con, $select_brand);

          while ($row_data = mysqli_fetch_assoc($result_brand)) {
            $brand_id = $row_data['brand_id'];
            $brand_title = $row_data['brand_title'];
            echo "<option value='$brand_id'>$brand_title</option>";
          }
          ?>
                </select>
            </div>

            <!-- image 1 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input class="form-control" type="file" id="product_image1" name="product_image1" required="required">
            </div>

            <!-- image 2 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input class="form-control" type="file" id="product_image2" name="product_image2" required="required">
            </div>

            <!-- image 3 -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input class="form-control" type="file" id="product_image3" name="product_image3" required="required">
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product price</label>
                <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter product price" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <button type="submit" class="btn btn-primary mb-3 px-3" value="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>





    </div>



    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
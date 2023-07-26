<?php
include("./includes/connect.php");
include("common_function.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Website Using php and MySQL</title>
  <!-- Bootstrap CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- css file -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <img src="images/logo.png" alt="logo" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup>1</sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Total Price:100/-</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
      </ul>
    </nav>

    <!-- third child -->
    <div class="bg-light">
      <h3 class="text-center">Hidden Store</h3>
      <p class="text-center">Communication is at heart of e-commerce and community</p>
    </div>

    <!-- fourth child -->
    <div class="row">
      <div class="col-md-10">
        <!-- products -->
        <div class="row">
          <?php

          display_all();
          getcategory();
          getbrand();
          
          search_product();

          ?>

        </div>
      </div>

      <!-- sidebar -->
      <div class="col-md-2 bg-secondary p-0">
        <!-- brand to be displayed -->
        <ul class="navbar-nav me-auto text-center ">
          <li class="nav-item bg-info">
            <a class="nav-link text-light" href="#">
              <h4>Delivery Brands</h4>
            </a>
          </li>

          <?php
          $select_brand = "select * from brands";
          $result_brand = mysqli_query($con, $select_brand);

          while ($row_data = mysqli_fetch_assoc($result_brand)) {
            $brand_id = $row_data['brand_id'];
            $brand_title = $row_data['brand_title'];
            echo "<li class='nav-item'>
              <a class='nav-link text-light' href='index.php?brands=$brand_id'>$brand_title</a>
            </li>";
          }
          ?>

        </ul>

        <!-- categories to be displayed -->
        <ul class="navbar-nav me-auto text-center ">
          <li class="nav-item bg-info">
            <a class="nav-link text-light" href="#">
              <h4>Categories</h4>
            </a>
          </li>

          <?php
          $select_category = "select * from categories";
          $result_category = mysqli_query($con, $select_category);

          while ($row_data = mysqli_fetch_assoc($result_category)) {
            $category_id = $row_data['category_id'];
            $category_title = $row_data['category_title'];
            echo "<li class='nav-item'>
            <a class='nav-link text-light' href='index.php?category=$category_id'>$category_title</a>
          </li>";
          }
          ?>

        </ul>

      </div>
    </div>





    <!-- last child -->
    <!-- display footer -->
    <?php include('./includes/footer.php'); ?>

  </div>






  <!-- Bootstrap JS link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
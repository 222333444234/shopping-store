<?php
include("../includes/connect.php");
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
    <style>
        .admin_image {
            width: 100px;
            object-fit: contain;
        }

        .col-md-12 {
            justify-content: space-around;
        }

        .footer {
            width: 100vw;
            position: absolute;
            bottom: 0;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <form class="d-flex">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">welcome guest</a>
                        </li>
                </form>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-3">Manage Details</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/pineapplejuice.png" class="admin_image" alt=""></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="index.php?insert_product" class="nav-link text-light bg-info my-1">Insert Product</a></button>
                    <button><a href="index.php?view_product" class="nav-link text-light bg-info my-1">View Product</a></button>
                    <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="index.php?view_category" class="nav-link text-light bg-info my-1">View Caregories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brand</a></button>
                    <button><a href="index.php?view_brand" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                    <button><a href="all_payment.php" class="nav-link text-light bg-info my-1">All Payments</a></button>
                    <button><a href="list_user.php" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button><a href="logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>

        <!-- forth child -->
        <div class="container my-5 mx-10">
            <?php
            if (isset($_GET['insert_product'])) {
                include("insert_product.php");
            }
            if (isset($_GET['insert_categories'])) {
                include("insert_categories.php");
            }
            if (isset($_GET['insert_brand'])) {
                include("insert_brand.php");
            }
            if (isset($_GET['view_product'])) {
                include("view_product.php");
            }
            if (isset($_GET['edit_products'])) {
                include("edit_products.php");
            }
            if (isset($_GET['delete_products'])) {
                include("delete_products.php");
            }
            if (isset($_GET['view_category'])) {
                include("view_category.php");
            }
            if (isset($_GET['view_brand'])) {
                include("view_brand.php");
            }
            if (isset($_GET['edit_category'])) {
                include("edit_category.php");
            }
            if (isset($_GET['edit_brand'])) {
                include("edit_brand.php");
            }
            if (isset($_GET['delete_category'])) {
                include("delete_category.php");
            }
            if (isset($_GET['delete_brand'])) {
                include("delete_brand.php");
            }
            if (isset($_GET['list_orders'])) {
                include("list_orders.php");
            }
            if (isset($_GET['delete_orders'])) {
                include("delete_orders.php");
            }


            include("../includes/footer.php");
            ?>

        </div>


        <!-- last child -->
        <!-- <div class="footer bg-info p-3 text-center">
            <p>All Right Reserved &copy- Desines by ZoooZooo-2023</p>
        </div>
    </div> -->



        <!-- bootstrap js link -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
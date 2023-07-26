<?php
include("./includes/connect.php");
include("common_function.php");
session_start();
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
    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
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
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo "<li class='nav-item'>
                  <a class='nav-link' href='./user_area/profile.php'>My Account</a>
                </li>";
                        } else {
                            echo "<li class='nav-item'>
                <a class='nav-link' href='./user_area/user_register.php'>Register</a>
              </li>";
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome Guest</a>
          </li>";
                } else {
                    echo "<li class='nav-item'>
           <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
         </li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
             <a class='nav-link' href='./user_area/user_login.php'>Login</a>
           </li>";
                } else {
                    echo "<li class='nav-item'>
            <a class='nav-link' href='./user_area/logout.php'>Logout</a>
          </li>";
                }
                ?>

            </ul>
        </nav>

        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Hidden Store</h3>
            <p class="text-center">Communication is at heart of e-commerce and community</p>
        </div>

        <!-- fourth child -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center ">

                        <?php
                        //php code for dynamic table data
                        global $con;
                        $get_ip_address = getIPAddress();
                        $total_price = 0;
                        $cart_query = "select * from `cart_detail` where  ip_address='$get_ip_address'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "  <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                                <th collapse='2'>Operation</th>
                            </tr>
                        </thead>
                        <tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                $product_id = $row['product_id'];
                                $select_query = "select * from `products` where  product_id='$product_id'";
                                $result_query = mysqli_query($con, $select_query);
                                while ($row_product_price = mysqli_fetch_array($result_query)) {
                                    $product_price = array($row_product_price['product_price']);
                                    $table_price = $row_product_price['product_price'];
                                    $product_title = $row_product_price['product_title'];
                                    $product_image1 = $row_product_price['product_image1'];
                                    $product_value = array_sum($product_price);
                                    $total_price += $product_value;

                        ?>
                                    <tr>
                                        <td><?php echo $product_title ?></td>
                                        <td><img src='./admin_area/images/<?php echo $product_image1; ?>' class="cart_img"></td>
                                        <td><input type="text" name="qty" id="" class="form-input w-50"></td>
                                        <?php
                                        $get_ip_address = getIPAddress();
                                        if (isset($_POST['update_cart'])) {
                                            $quantities = $_POST['qty'];
                                            $update_query = "update `cart_detail` set quantity=$quantities where  ip_address='$get_ip_address'";
                                            $result_product_quantities = mysqli_query($con, $update_query);
                                            $total_price = $total_price * $quantities;
                                        }
                                        ?>
                                        <td><?php echo "$table_price"; ?></td>
                                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id; ?>"></td>
                                        <td>
                                            <input type="submit" name="update_cart" value="Update Cart" class="bg-info border-0 px-3 py-2 mx-3">
                                            <input type="submit" name="remove_cart" value="Remove Cart" class="bg-info border-0 px-3 py-2 mx-3">
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        } else {
                            echo "<h1 class='text-center text-danger'>Cart is empty</h1>";
                        } ?>
                        </tbody>
                    </table>
                    <div class="flex mb-5">
                        <?php
                        global $con;
                        $get_ip_address = getIPAddress();
                        $cart_query = "select * from `cart_detail` where  ip_address='$get_ip_address'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo "<h4 class='p-3'>Subtotal: <strong class='text-info'> $total_price/- </strong></h4>
                            <input type='submit' name='continue_shopping' value='Continue shopping' class='bg-info px-3 py-2 mx-3'>
                            <button class='bg-secondary px-3 py-2 mx-3'><a class='text-light text-decoration-none' href='./user_area/checkout.php'>Checkout</button></a>";
                        } else {
                            echo "<input type='submit' name='continue_shopping' value='Continue shopping' class='bg-info px-3 py-2 mx-3'>";
                        }
                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        } ?>

                    </div>
                </form>

                <!-- function to remove item -->
                <?php
                function remove_cart_item()
                {
                    global $con;
                    if (isset($_POST['remove_cart'])) {
                        foreach ($_POST['removeitem'] as $remove_id) {
                            echo "$remove_id";
                            $delete_query = "Delete from `cart_detail` where product_id='$remove_id'";
                            $run_query = mysqli_query($con, $delete_query);
                            if ($run_query) {
                                echo "<script>window.open('cart.php','_self')</script>";
                            }
                        }
                    }
                }
                echo  $remove_item = remove_cart_item();
                ?>
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
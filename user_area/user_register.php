<?php
include("../includes/connect.php");
include("../common_function.php");

?>

<?php
if (isset($_POST['user_register'])) {
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    //select query
    $select_query = "select * from `user_table` where username='$username' or user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $row_result = mysqli_num_rows($result);
    if ($row_result > 0) {
        echo "<script>alert('User or email are already exist')</script>";
    } elseif ($user_password != $conf_user_password) {
        echo "<script>alert('password do not match')</script>";
    } else {
        // insert query
        move_uploaded_file($user_image_temp, "./user_images/$user_image");
        $insert_query = "insert into `user_table`(username,user_email,user_password,user_image,user_ip,user_address,user_contact)VALUES('$username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
        $sql_query = mysqli_query($con, $insert_query);
    }

    //selecting cart item without registration
    $select_cart_item = "select * from `cart_detail` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_cart_item);
    $rows_count = mysqli_num_rows($result_cart);
    if ($rows_count > 0) {
        $_SESSION['username'] = $username;
        echo "<script>alert('you have item in your cart')</script>";
        echo "<script>window.open('./checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('../index.php','_self')</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registration of ecommerce website</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">
    <div class="container-fluid my-3">
        <h1 class="text-center">New User Registration</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <!-- Username -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autocomplete="off" required="required">
            </div>

            <!-- User Email -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="user_email" name="user_email" placeholder="Enter your email" autocomplete="off" required="required">
            </div>

            <!-- User Image -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_image" class="form-label">User Image</label>
                <input class="form-control" type="file" id="user_image" name="user_image" required="required">
            </div>

            <!-- password -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter your password" autocomplete="off" required="required">
            </div>

            <!-- confirm password -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="conf_user_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="conf_user_password" name="conf_user_password" placeholder="Enter your password" autocomplete="off" required="required">
            </div>

            <!-- address field -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_address" class="form-label">Address</label>
                <input type="text" class="form-control" id="user_address" name="user_address" placeholder="Enter your address" autocomplete="off" required="required">
            </div>

            <!-- contact field -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="user_contact" name="user_contact" placeholder="Enter your Mobilr Number" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Register" name="user_register">
                <p class="small fw-bold mt-2 py-1">Already have an account?<a href="user_login.php" class="text-danger"> Login</a></p>
            </div>
        </form>
    </div>








    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
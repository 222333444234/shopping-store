<?php
include("../includes/connect.php");
include("../common_function.php");
@session_start();
?>

<?php
if (isset($_POST['user_login'])) {
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];

    //select query
    $select_query = "select * from `user_table` where username='$username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();

    //cart item
    $select_query_cart = "select * from `cart_detail` where ip_address='$user_ip'";
    $result_cart = mysqli_query($con, $select_query_cart);
    $rows_count_cart = mysqli_num_rows($result_cart);
    if ($row_count>0) {
        $_SESSION['username'] = $username;
        if(password_verify($user_password,$row_data['user_password'])){
            // echo "<script>alert('Login successfull')</script>";
            if($row_count==1 and $rows_count_cart==0){
            $_SESSION['username'] = $username;
            echo "<script>alert('Login successfull')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username'] = $username;
                echo "<script>alert('Login successfull')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid credentialll')</script>";
        }
    }else{
        echo "<script>alert('Invalid credential')</script>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login of ecommerce website</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="bg-light">
    <div class="container-fluid my-3">
        <h1 class="text-center"> User Login</h1>

        <form action="" method="post" enctype="multipart/form-data">
            <!-- Username -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autocomplete="off" required="required">
            </div>

            <!-- password -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Enter your password" autocomplete="off" required="required">
            </div>

            <div class="form-outline mt-4 mb-4 w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" value="Login" name="user_login">

                <p class="small fw-bold mt-2 py-1">Don't have an account?<a href="user_register.php" class="text-danger"> Register</a></p>
            </div>
        </form>
    </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
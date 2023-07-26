<?php
include("../includes/connect.php");
include("../common_function.php");
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
    body{
      overflow-x: hidden;
    }
    .payment_img{
        width: 90%;
        margin: auto;
        display: block;

    }
    </style>
</head>


<body>
    <?php
      $user_ip =getIPAddress();
      $get_user = "select * from `user_table` where user_ip='$user_ip'";
      $result = mysqli_query($con,$get_user);
      $run_query = mysqli_fetch_array($result);
      $user_id = $run_query['user_id'];
    ?> 
<div class="container mt-4">
    <h2 class="text-info text-center">Payment options</h2>
    <div class="row d-flex justify-content-center align-items-center my-5">
        <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank"><img src="../images/upi.png" class="payment_img"></a>
        </div>
        <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id; ?>"><h2 class="text-center">payment offline</h2></a>
        </div>
    </div>
</div>
  



  <!-- Bootstrap JS link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
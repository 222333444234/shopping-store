<?php
include("../includes/connect.php");
session_start();

 if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];

    $select_order = "select * from user_orders where order_id='$order_id'";
    $result = mysqli_query($con,$select_order);
    $row_data = mysqli_fetch_array($result);
    $invoice_number = $row_data['invoice_number'];
    $amount_due = $row_data['amount_due'];
 }

 if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount_due'];
    $payment_mode = $_POST['payment_mode'];

    $insert_query = "insert into `user_payments`(order_id,invoice_number,amount_due,payment_mode)VALUES('$order_id','$invoice_number','$amount','$payment_mode')";
    $result_query = mysqli_query($con,$insert_query);
    if($result_query){
        echo "<h3 class='text-center text-light'>Successfully Completed the payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_order = "update user_orders set order_status='complete' where order_id='$order_id'";
    $result_update_query = mysqli_query($con,$update_order);

 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <!-- Bootstrap CSS link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<!-- Font awesome link -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- css file -->
<link rel="stylesheet" href="style.css">
</head>
<body class="bg-secondary">
    <h1 class="text-center my-5 text-light">Payment Page</h1>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount_due" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select my-4 w-50 m-auto">
                    <option>Select Payment Mode</option>
                    <option>Payoffline</option>
                    <option>UPI</option>
                    <option>Netbanking</option>
                    <option>Paypal</option>
                    <option>Cash On Delivery</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" class="bg-info py-2 px-3 border-0" name="confirm_payment" value="Confirm">
            </div>
        </form>
    </div>
    


      <!-- Bootstrap JS link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
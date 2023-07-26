<?php

if(isset($_GET['edit_account'])){
    $user_session_name = $_SESSION['username'];
    $select_query = "select * from `user_table` where username='$user_session_name'";
    $result_query = mysqli_query($con,$select_query);
    $row_data = mysqli_fetch_assoc($result_query);
    $user_id = $row_data['user_id'];
    $username = $row_data['username'];
    $user_email = $row_data['user_email'];
    $user_image = $row_data['user_image'];
    $user_address = $row_data['user_address'];
    $user_contact = $row_data['user_contact'];
}

if(isset($_POST['user_update'])){
    $update_id = $user_id;
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_temp,"./user_images/$user_image");


    $update_query = "update user_table set username='$username',user_email='$user_email',user_address='$user_address',user_contact='$user_contact',user_image='$user_image' 
    where user_id=$update_id ";
    $result_update_query = mysqli_query($con,$update_query);
    if($result_update_query){
    echo "<script>alert('Data Updated Successfully!)</script>";
    echo "<script>window.open('logout.php','_self')</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit my account</title>
</head>
<body>
    <h3 class='text-center text-success mb-4'>Edit Account</h3>
    <form method="post" enctype="multipart/form-data" class="text-center mb-4">
        <div class="form-outline mb-4">
           <input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>" name="username" >
        </div>
        <div class="form-outline mb-4">
           <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email" >
        </div>
        <div class="form-outline mb-4 w-50 m-auto d-flex">
           <input type="file" class="form-control" name="user_image" >
           <img src="./user_images/<?php echo $user_image ?>" class="edit_image" alt="">
        </div>
        <div class="form-outline mb-4">
           <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
        </div>
        <div class="form-outline mb-4">
           <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_contact ?>" name="user_contact" >
        </div>
        <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="user_update">
    </form>
</body>
</html>
<?php
include("../includes/connect.php");
if(isset($_POST['submit'])){
    $brand_title = $_POST['brand_title'];

    $select = "select * from brands where brand_title='$brand_title'";
    $result_select = mysqli_query($con,$select);
    $number = mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This Brand is present inside the database')</script>";
    }else{

    
    $sql = "insert into brands(brand_title)value('$brand_title')";
    $result = mysqli_query($con,$sql);
    if($result){
        echo "<script>alert('Brand has been inserted succesfully')</script>";
    }
}}
?>


<h1 class="text-center">Insert Brands</h1>
<form action="" method="post" class="mb-2">
        <div class="input-group w-90 mb-2">
            <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
            <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands">
        </div>
        <div class="input-group w-20 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-2" value="Insert brands" name="submit">
        </div>
    </form>
    </div>
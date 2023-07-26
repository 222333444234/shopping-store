<?php
include("../includes/connect.php");
if(isset($_POST['submit'])){
    $category_title = $_POST['category_title'];

    $select = "select * from categories where category_title='$category_title'";
    $result_select = mysqli_query($con,$select);
    $number = mysqli_num_rows($result_select);
    if($number>0){
        echo "<script>alert('This category is present inside the database')</script>";
    }else{

    
    $sql = "insert into categories(category_title)value('$category_title')";
    $result = mysqli_query($con,$sql);
    if($result){
        echo "<script>alert('category has been inserted succesfully')</script>";
    }
}}
?>


<h1 class="text-center">Insert Categories</h1>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="category_title" placeholder="Insert categories" aria-label="insert categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-20 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-2" value="Insert categories" name="submit">
    </div>
</form>
</div>
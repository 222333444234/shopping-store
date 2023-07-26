<?php
// include("./includes/connect.php");
?>
<?php


// display products
function getproducts()
{
    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brands'])) {
            $select_product = "select * from `products` order by rand() LIMIT 0,9";
            $result_select = mysqli_query($con, $select_product);

            while ($row_data = mysqli_fetch_assoc($result_select)) {
                $product_id  = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $product_description  = $row_data['product_description'];
                $category_id = $row_data['category_id'];
                $brand_id  = $row_data['brand_id'];
                $product_image1 = $row_data['product_image1'];
                $product_price  = $row_data['product_price'];
                echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin_area/images/$product_image1' class='card-img-top' alt='...'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
              </div>
            </div>
          </div>";
            }
        }
    }
}


// getting unique category
function getcategory()
{
    global $con;
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_product = "select * from `products` where category_id=$category_id";
        $result_select = mysqli_query($con, $select_product);
        $num_of_rows = mysqli_num_rows($result_select);
        if ($num_of_rows == 0) {
            echo "<h1 class='text-center text-danger'>No stock for this category</h1>";
        } else {

            while ($row_data = mysqli_fetch_assoc($result_select)) {
                $product_id  = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $product_description  = $row_data['product_description'];
                $category_id = $row_data['category_id'];
                $brand_id  = $row_data['brand_id'];
                $product_image1 = $row_data['product_image1'];
                $product_price  = $row_data['product_price'];
                echo "<div class='col-md-4 mb-2'>
<div class='card'>
<img src='./admin_area/images/$product_image1' class='card-img-top' alt='...'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text'>Price: $product_price</p>
<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
<a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>      </div>
</div>
</div>";
            }
        }
    }
}

// getting unique brands
function getbrand()
{
    global $con;
    if (isset($_GET['brands'])) {
        $brand_id = $_GET['brands'];
        $select_product = "select * from `products` where brand_id=$brand_id";
        $result_select = mysqli_query($con, $select_product);
        $num_of_rows = mysqli_num_rows($result_select);
        if ($num_of_rows == 0) {
            echo "<h1 class='text-center text-danger'>No stock for this brand</h1>";
        } else {

            while ($row_data = mysqli_fetch_assoc($result_select)) {
                $product_id  = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $product_description  = $row_data['product_description'];
                $category_id = $row_data['category_id'];
                $brand_id  = $row_data['brand_id'];
                $product_image1 = $row_data['product_image1'];
                $product_price  = $row_data['product_price'];
                echo "<div class='col-md-4 mb-2'>
<div class='card'>
<img src='./admin_area/images/$product_image1' class='card-img-top' alt='...'>
<div class='card-body'>
<h5 class='card-title'>$product_title</h5>
<p class='card-text'>$product_description</p>
<p class='card-text'>Price: $product_price</p>
<a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
<a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>      </div>
</div>
</div>";
            }
        }
    }
}

// search products
function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "select * from `products` where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h1 class='text-center text-danger'>No stock for this products</h1>";
        } else {

            while ($row_data = mysqli_fetch_assoc($result_query)) {
                $product_id  = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $product_description  = $row_data['product_description'];
                $category_id = $row_data['category_id'];
                $brand_id  = $row_data['brand_id'];
                $product_image1 = $row_data['product_image1'];
                $product_price  = $row_data['product_price'];
                echo "<div class='col-md-4 mb-2'>
<div class='card'>
  <img src='./admin_area/images/$product_image1' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'>Price: $product_price</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
    <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a></div>
</div>
</div>";
            }
        }
    }
}


// display all products
function display_all()
{
    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brands'])) {
            $select_product = "select * from `products` order by rand()";
            $result_select = mysqli_query($con, $select_product);

            while ($row_data = mysqli_fetch_assoc($result_select)) {
                $product_id  = $row_data['product_id'];
                $product_title = $row_data['product_title'];
                $product_description  = $row_data['product_description'];
                $category_id = $row_data['category_id'];
                $brand_id  = $row_data['brand_id'];
                $product_image1 = $row_data['product_image1'];
                $product_price  = $row_data['product_price'];
                echo "<div class='col-md-4 mb-2'>
      <div class='card'>
        <img src='./admin_area/images/$product_image1' class='card-img-top' alt='...'>
        <div class='card-body'>
          <h5 class='card-title'>$product_title</h5>
          <p class='card-text'>$product_description</p>
          <p class='card-text'>Price: $product_price</p>
          <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
          <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a></div>
      </div>
    </div>";
            }
        }
    }
}

// view product detail function
function view_detail()
{
    global $con;
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brands'])) {
                $product_id = $_GET['product_id'];
                $select_product = "select * from `products` where product_id=$product_id";
                $result_select = mysqli_query($con, $select_product);

                while ($row_data = mysqli_fetch_assoc($result_select)) {
                    $product_id  = $row_data['product_id'];
                    $product_title = $row_data['product_title'];
                    $product_description  = $row_data['product_description'];
                    $category_id = $row_data['category_id'];
                    $brand_id  = $row_data['brand_id'];
                    $product_image1 = $row_data['product_image1'];
                    $product_image2 = $row_data['product_image2'];
                    $product_image3 = $row_data['product_image3'];
                    $product_price  = $row_data['product_price'];
                    echo "<div class='col-md-4 mb-2'>
            <div class='card'>
              <img src='./admin_area/images/$product_image1' class='card-img-top' alt='...'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price: $product_price</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                <a href='index.php' class='btn btn-secondary'>Go Home</a>
              </div>
            </div>
          </div>
          
          <div class='col-md-8'>
          <div class='row'>
        <div class='col-md-12'>
          <h1 class='text-center text-info'>Related products</h1>
        </div>
        <div class='col-md-6'>
        <img src='./admin_area/images/$product_image2' class='card-img-top' alt='...'>
        </div>
        <div class='col-md-6'>
        <img src='./admin_area/images/$product_image3' class='card-img-top' alt='...'>
        </div>
          </div>    
       </div>";
                }
            }
        }
    }
}

// get ip address function
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


//cart added function
function cart()
{
    global $con;
    if (isset($_GET['add_to_cart'])) {
        $get_ip_address = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];

        $select_query = "select * from `cart_detail` where product_id='$get_product_id' and ip_address='$get_ip_address'";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('Item is already presented in cart')</script>";
            echo "<script>window.open=('index.php','_self')</script>";
        } else {
            $insert_query = "insert into `cart_detail`(product_id,ip_address,quantity)value('$get_product_id','$get_ip_address',0) ";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('Item is added to cart')</script>";
            echo "<script>window.open=('index.php','_self')</script>";
        }
    }
}

//cart item function

function cart_item()
{
    global $con;
    if (isset($_GET['add_to_cart'])) {
        $get_ip_address = getIPAddress();

        $select_query = "select * from `cart_detail` where  ip_address='$get_ip_address'";
        $result_query = mysqli_query($con, $select_query);
        $count_of_item = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip_address = getIPAddress();
        $select_query = "select * from `cart_detail` where  ip_address='$get_ip_address'";
        $result_query = mysqli_query($con, $select_query);
        $count_of_item = mysqli_num_rows($result_query);
    }
    echo "$count_of_item";
}

//total cart price function

function total_cart_price()
{
    global $con;
    $get_ip_address = getIPAddress();
    $total_price = 0;
    $cart_query = "select * from `cart_detail` where  ip_address='$get_ip_address'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_query = "select * from `products` where  product_id='$product_id'";
        $result_query = mysqli_query($con, $select_query);
    while($row_product_price = mysqli_fetch_array($result_query)){ 
        $product_price = array($row_product_price['product_price']);
        $product_value = array_sum($product_price);
        $total_price+=$product_value;   
    }
    
}
echo "$total_price";
}

//get user order detail
function get_user_order_details(){
    global $con;
    $get_username = $_SESSION['username'];
    $get_details = "select * from user_table where username='$get_username'";
    $result_query = mysqli_query($con,$get_details);
    while($row_query = mysqli_fetch_array($result_query)){
        $user_id = $row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders = "select * from user_orders where user_id=$user_id and order_status='pending' ";
                    $result_order_query = mysqli_query($con,$get_orders);
                    $row_count = mysqli_num_rows($result_order_query);
                    if($row_count>0){
                        echo "<h3 class='text-center my-4 mb-2'>you have <span class='text-danger'>$row_count</span> pending order</h3>
                        <p class='text-center'><a href='profile.php?my_orders'class='text-dark'>Order Details</p>";
                    }else{
                        echo "<h3 class='text-center my-4 mb-2'>you have zero pending order</h3>
                        <p class='text-center'><a href='../index.php'class='text-dark'>Explore products</p>";
                    }
        }
    }
}
}}
?>
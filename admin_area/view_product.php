<style>
    .product_img {
        width: 100px;
        object-fit: contain;
    }
</style>
<?php

?>

<h3 class="text-center text-success">All Products</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>Product id</th>
            <th>Product title</th>
            <th>Product image</th>
            <th>Product price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_products = "select * from products";
        $result = mysqli_query($con, $get_products);
        $number = 0;
        while ($row_data = mysqli_fetch_assoc($result)) {
            $product_id = $row_data['product_id'];
            $product_title = $row_data['product_title'];
            $product_image1 = $row_data['product_image1'];
            $product_price = $row_data['product_price'];
            $status = $row_data['status'];
            $number++;

            $select_pending_order = "select * from orders_pending where product_id='$product_id'";
            $result_order = mysqli_query($con, $select_pending_order);
            $num_count = mysqli_num_rows($result_order);

            echo "<tr class='text-center'>
        <td>$number</td>
        <td>$product_title</td>
        <td><img src='./images/$product_image1' class='product_img'/></td>
        <td>$product_price</td>
        <td>$num_count</td>
        <td>$status</td>
        <td><a href='index.php?edit_products=$product_id'><img src='images/edit.png'/></a></td>
        <td><a href='index.php?delete_products=$product_id'><img src='images/delete.png'/></a></td>
       </tr>
       ";
        }
        ?>

    </tbody>
</table>
<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>SI No.</th>
            <th>category title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_category = "select * from categories";
        $result = mysqli_query($con, $get_category);
        $number = 0;
        while ($row_data = mysqli_fetch_assoc($result)) {
            $category_id = $row_data['category_id'];
            $category_title = $row_data['category_title'];
            $number++;

            echo "<tr class='text-center'>
        <td>$number</td>
        <td>$category_title</td>
        <td><a href='index.php?edit_category=$category_id'><img src='images/edit.png'/></a></td>
        <td><a href='index.php?delete_category=$category_id' type='button' class='text-decoration-none' data-toggle='modal' data-target='#exampleModal'><img src='images/delete.png'/></a></td>
       </tr>
       ";
        }
        ?>

    </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <h4>Are you sure you want to Delete?</h4>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_category" class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_category=<?php echo $category_id?>' type='button' class=' text-light text-decoration-none'>Yes</a></button>
      </div>
    </div>
  </div>
</div>
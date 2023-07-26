<?php
include("../includes/connect.php");
session_start();
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
    .logo{
    width: 3%;
    height: 3%;
}
    </style>
</head>
</head>

<body>
  <!-- navbar -->
  <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <div class="container-fluid">
        <img src="../images/logo.png" alt="logo" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            <?php
                if(isset($_SESSION['username'])){
                  echo "<li class='nav-item'>
                  <a class='nav-link' href='./user_area/profile.php'>My Account</a>
                </li>";
                }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='./user_area/user_register.php'>Register</a>
              </li>";
                }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
        
          </ul>
          <form class="d-flex" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
            <input type="submit" class="btn btn-outline-light" value="search" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>


    <!-- second child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
    
        <?php
         if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }else{
         echo "<li class='nav-item'>
         <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
       </li>";
        }
         if(!isset($_SESSION['username'])){
           echo "<li class='nav-item'>
           <a class='nav-link' href='user_login.php'>Login</a>
         </li>";
         }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='logout.php'>Logout</a>
        </li>";
         }
        ?>
      </ul>
    </nav>

    <!-- third child -->
    

    <!-- fourth child -->
    <div class="row">
      <div class="col-md-10">
        <div class="row">
            <?php
              if(!isset($_SESSION['username'])){
                include("user_login.php");
              }else{
                include("payment.php");
              }
            ?>
        </div>
         
        </div>
      </div>

    <!-- last child -->
    <!-- display footer -->
    <?php include('../includes/footer.php'); ?>

  </div>






  <!-- Bootstrap JS link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
<?php

// start session
session_start();

require_once ('php/CreateDb.php');
require_once ('./php/component.php');

// create instance of Createdb Class
$database = new CreateDb("Productdb", "Producttable");

if (isset($_POST['add'])){
  if(isset($_SESSION['cart'])){

      $item_array_id = array_column($_SESSION['cart'], "product_id");


      if(in_array($_POST['product_id'], $item_array_id)){
          echo "<script>alert('Product is already added in the cart..!')</script>";
          echo "<script>window.location = 'index.php'</script>";
    }else{
      
      $count = count($_SESSION['cart']);
      $item_array = array(
          'product_id' => $_POST['product_id']
      );

      $_SESSION['cart'][$count] = $item_array;
    }

  }else{
    $item_array = array(
      'product_id'=>$_POST['product_id']
    );
    // create new session variable
    $_SESSION['cart'][0] = $item_array;
    print_r($_SESSION['cart']);
  }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>

<!-- Font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- bootstrap -->
  <link rel="stylesheet" href="bootstrap-5.2.1-dist/css/bootstrap.min.css">
  <!-- personal css -->
  <link rel="stylesheet" href="./css/main.css">
</head>
<body>

  <?php require_once("./php/header.php") ?>
  <div class="container">
    <div  class="row text-center py-5 row-personal">
      <?php
        $result = $database->getData();
        while($row = mysqli_fetch_assoc($result)){
          component($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);
        }
      ?>
    </div>
  </div>


<script src="./js/jquery.js">

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script src="bootstrap-5.2.1-dist/js/bootstrap.min.js"></script>

</body>


</html>

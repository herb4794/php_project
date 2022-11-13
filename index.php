<?php
require_once ('php/CreateDb.php');
require_once ('./php/component.php');

// create instance of Createdb class=\
$database = new CreateDb("Productdb", "Producttable");
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
  <link rel="stylesheet" href="./css/style.css">
</head>
<body>

  .<div class="container">
    <div  class="row text-center py-5 row-personal">
      <?php
        $result = $database->getData();
        while($row = mysqli_fetch_assoc($result)){
          component($row['product_name'],$row['product_price'],$row['product_image']);
        }
      ?>
    </div>
  </div>


<script src="./js/jquery.js">

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script src="bootstrap-5.2.1-dist/js/bootstrap.min.js">

</body>


</html>

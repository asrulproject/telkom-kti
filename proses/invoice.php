<?php   
require('../inc/koneksi2.php');


    $id = $_GET['idorderprodukta'];

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../favicon.png">

    <title>Telkom KTI</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../dist/css/product.css" rel="stylesheet">
     <link href="../dist/css/form-validation.css" rel="stylesheet">
  </head>
  <body>
    <?php include("navoo.php"); ?>

    <?php
      // query SQL menampilkan data dari table tbl_biodata
      $sql = "SELECT * FROM orderprodukta WHERE idorderprodukta='$id'";
      // tampung data (dalam array) kedalam variable $biodata
      $produk = mysqli_query($conn, $sql); 
      if (mysqli_num_rows($produk) > 0) {

        $data = mysqli_fetch_assoc($produk);
      }
        ?>

    <?php include("isiinvoice.php"); ?>
    <?php include("../footer.php"); ?>
     </body>
</html>            
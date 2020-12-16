<?php   

include('../inc/koneksi2.php');
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
  <body class="bg-light">
    <?php include("navadmin.php"); ?>
   <?php 

  if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
  }
  ?>

  <?php
  $idprodukta = $_POST["idprodukta"];
  $namaprodukta = $_POST["namaprodukta"];

$uraianprodukta = $_POST["uraianprodukta"];
$unggulprodukta = $_POST["unggulprodukta"];
$fiturprodukta = $_POST["fiturprodukta"];
$hargaprodukta = $_POST["hargaprodukta"];
$promo = $_POST["promo"];

$sqlku = "UPDATE produkta SET namaprodukta='$namaprodukta', uraianprodukta='$uraianprodukta', unggulprodukta='$unggulprodukta', fiturprodukta='$fiturprodukta',hargaprodukta='$hargaprodukta', promo='$promo' WHERE idprodukta='$idprodukta'";
$queryku = mysqli_query($conn, $sqlku);

if($queryku){

  
      
     echo "Data sukses... ";


 }

//Jika data gagal disimpan, tampilkan pesan gagal penyimpanan
else
{
echo "Data GAGAL disimpan... ";

}

?>
    
    <?php include("../footer.php"); ?>
     </body>
</html> 
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
  $namaprodukta = $_POST['namaprodukta'];
  $uraianprodukta = $_POST['uraianprodukta'];
  $unggulprodukta = $_POST['unggulprodukta'];
  $fiturprodukta = $_POST['fiturprodukta'];
  $hargaprodukta = $_POST['hargaprodukta'];
  $promo = $_POST['promo'];
  $logo = $_POST['logo'];

$namafolder = "../img/produkta/";
if (!empty($_FILES["gbunggulanta"]["tmp_name"]))
{
$jenis_gambar = $_FILES['gbunggulanta']['type'];
if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
{
  $gambarta = basename($_FILES['gbunggulanta']['name']);

  if (move_uploaded_file($_FILES['gbunggulanta']['tmp_name'], $gambarta)) {

    $queryku_update = "UPDATE produkta SET gambarunggulanta='$gambarta' WHERE namaprodukta = '$namaprodukta' AND hargaprodukta = '$hargaprodukta'";

    $update = mysqli_query($conn,$queryku_update)or die(mysqli_error());
      
      echo"
      <br/><center><h3><span class='label'>berhasil disimpan... </span></h3><br/><br/>
      
             <a class='btn btn-outline-primary' href='tambahproduk.php'>Tambah Produk</a>
             <a class='btn btn-outline-primary' href='index.php'>Beranda</a>
      <div class='container'>         
      <div class='py-5 text-center'>
        
       <h2>Form Input Produk Add-On Baru</h2>
        <p class='lead'>Input Produk Add-On Baru.</p>
      </div>
         <div class='row'>
        <div class='col-md-4 order-md-2 mb-4'>
          <h4 class='d-flex justify-content-between align-items-center mb-3'>
             
             <ul class='list-group mb-3'>
          
            <li class='list-group-item d-flex justify-content-between lh-condensed'>
<span class='text-muted'>Lihat Produk
             <a class='btn btn-outline-primary' href='dataprodukta.php'>Produk</a></li></ul>
           
            
          </h4>
       </div>
      

      <div class='col-md-8 order-md-1'>
         
            <div class='row'>
              <div class='col-md-12 mb-3'>
                <label for='namaprodukta'>Nama Produk</label>
                <div class='input-group'>$namaprodukta
               </div></div>

               <div class='mb-3'>
              <label for='uraianprodukta'>Uraian Produk</label>
              <div class='input-group'> 
              $uraianprodukta
              </div><div>

               <div class='mb-3'>
              <label for='unggulprodukta'>Keunggulan Produk</label>
              <div class='input-group'> $unggulprodukta
              </div>
            </div>


 <div class='mb-3'>
              <label for='fiturprodukta'>Fitur Produk</label>
              <div class='input-group'>
              $fiturprodukta
     </div>
            </div>

            <div class='mb-3'>
              <label for='hargaprodukta'>Harga Dasar Produk</label>
              <div class='input-group'>
              $hargaprodukta
              </div>
            </div>

            <div class='mb-3'>
              <label for='promo'>Promo</label>
              $promo
              </div>

              <div class='mb-3'>
              Logo Produk 
              <img src='$logo' width='80'>
              </div>

              <div class='mb-3'>
              Gambar Unggulan Produk 
              <img src='$gambarta' width='80'>
              </div>
</div></div></div>
               ";

  } else {
echo "Gambar gagal dikirim";
}
} else {
echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
}
} else {
echo "Anda belum memilih gambar";
}


?>
    
    <?php include("../footer.php"); ?>
     </body>
</html> 
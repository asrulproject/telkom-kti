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

$namafolder="./img/produkta/";
if (!empty($_FILES["logoprodukta"]["tmp_name"]))
{

$jenis_gambar = $_FILES['logoprodukta']['type'];
if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
{
  $logo = $namafolder . basename($_FILES['logoprodukta']['name']);

  if (move_uploaded_file($_FILES['logoprodukta']['tmp_name'], $logo)) {

    $queryku_update = "UPDATE produkta SET logoprodukta='$logo' namaprodukta='$namaprodukta', uraianprodukta='$uraianprodukta', unggulprodukta='$unggulprodukta', fiturprodukta='$fiturprodukta',hargaprodukta='$hargaprodukta', promo='$promo' WHERE idprodukta='$idprodukta'";

    $update = mysqli_query($conn,$queryku_update);
      
      echo   "<div class='container'>         
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
             <div class='btn btn-outline-primary' href='dataprodukta.php'>Produk</a></div></li></ul>
           
            
          </h4>
       </div>
      

      <div class='col-md-8 order-md-1'>
         
            <div class='row'>
              <div class='col-md-12 mb-3'>
                <label for='namaprodukta'>Nama Produk</label>
                <div class='input-group'> $namaprodukta
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

               

      <form action='tambahproduks4.php' method='post' enctype='multipart/form-data' name='FormUpload' id='FormUpload'>

                <input type='hidden' class='form-control' name='idprodukta'   value='$idprodukta' >
                <input type='hidden' class='form-control' name='namaprodukta'   value='$namaprodukta' >
               
                         
            
               
                <input type='hidden' class='form-control' name='uraianprodukta'  value='$uraianprodukta' >
        

            
               
                <input type='hidden' class='form-control' name='unggulprodukta'  value='$unggulprodukta'>
              

           
                
                <input type='hidden' class='form-control' name='fiturprodukta'  value='$fiturprodukta'>
               
         

            
                
                <input type='hidden' class='form-control' name='hargaprodukta' value='$hargaprodukta'>
               
              
            
              <input type='hidden' class='form-control' name='promo'  value='$promo' >

              <input type='hidden' class='form-control' name='logo'  value='$logo'>

              <div class='mb-3'>
              <label for='gbunggulanta'>Pilih Gambar Unggulan Produk</label>
              <div class='input-group'>

            <input type='file' name='gbunggulanta' id='gbunggulanta'></p>

            </div></div>

            <div class='row'>
              <div class='col-md-6 mb-3'>
            <button class='btn btn-primary btn-lg btn-block' type='submit' name='button' value='Upload'>Simpan Gambar Unggulan</button>
          
        </div>
      </div> </form>";

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
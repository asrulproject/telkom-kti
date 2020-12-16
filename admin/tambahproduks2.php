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
  $namaprodukta = $_POST["namaprodukta"];

$uraianprodukta = $_POST["uraianprodukta"];
$unggulprodukta = $_POST["unggulprodukta"];
$fiturprodukta = $_POST["fiturprodukta"];
$hargaprodukta = $_POST["hargaprodukta"];
$promo = $_POST["promo"];

$sqlku = "INSERT INTO produkta (namaprodukta, uraianprodukta, unggulprodukta, fiturprodukta,hargaprodukta, promo) VALUES ('$namaprodukta', '$uraianprodukta', '$unggulprodukta', '$fiturprodukta', '$hargaprodukta', '$promo')";
$queryku = mysqli_query($conn, $sqlku) or die(mysqli_error());

if($queryku){

  
      
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
             <a class='btn btn-outline-primary' href='dataprodukta.php'>Produk</a></li></ul>
           
            
          </h4>
       </div>";
      echo "
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


               ";
      echo  "

      <form action='tambahproduks3.php' method='post' enctype='multipart/form-data' name='FormUpload' id='FormUpload'>

      
                <input type='hidden' class='form-control' name='namaprodukta'   value='$namaprodukta' >
               
                         
            
               
                <input type='hidden' class='form-control' name='uraianprodukta'  value='$uraianprodukta' >
        

            
               
                <input type='hidden' class='form-control' name='unggulprodukta'  value='$unggulprodukta'>
              

           
                
                <input type='hidden' class='form-control' name='fiturprodukta'  value='$fiturprodukta'>
               
         

            
                
                <input type='hidden' class='form-control' name='hargaprodukta' value='$hargaprodukta'>
               
              
            
              <input type='hidden' class='form-control' name='promo'  value='$promo' >
              <div class='mb-3'>
              <label for='logoprodukta'>Pilih Logo Produk</label>
              <div class='input-group'>
            <input type='file' name='logoprodukta' id='logoprodukta'></p>

            </div></div>

            <div class='row'>
              <div class='col-md-6 mb-3'>
            <button class='btn btn-primary btn-lg btn-block' type='submit' value='kirim'>Simpan Logo</button>
          
        </div>
      </div> </form>";


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
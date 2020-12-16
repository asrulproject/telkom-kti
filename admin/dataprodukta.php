<?php   
require('../inc/koneksi.php');
$db = new database();
$data_barang = $db->tampil_data();


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
    <link href="../dist/css/pricing.css" rel="stylesheet">
  </head>
  <body>

    <?php 


    include("navadmin.php"); ?>
   <?php 

  if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
  }
  ?>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">List Produk Digital</h1>
      <p class="lead"></p>
    </div>

    <div class="container">
      
      <div class="card-deck mb-3 text-center">
        <?php 
   
    foreach($data_barang as $row){
      ?>
        <div class="card mb-4 box-shadow">
          <div class="card-header">
            
            <h4 class="my-0 font-weight-normal"><?php echo $row['namaprodukta']; ?></h4>
          </div>
          <div class="card-body">
            <ul class="list-unstyled mt-3 mb-4">
              <li><?php echo "<img src='./$row[logoprodukta]' width='142' height='50'/>";?></li>
               <li><a class="btn btn-lg btn-block btn-outline-secondary" href="detailprodukta.php?idprodukta=<?php echo $row['idprodukta']; ?>">Detail</a></li>
            <li><h4 class="card-title pricing-card-title"><small class="text-muted">Mulai Rp</small> <?php echo $row['hargaprodukta']; ?> <small class="text-muted">/ Bulan</small></h4></li>
            
              
             
              
            </ul>
            <a class="btn btn-lg btn-block btn-outline-primary" href="editprodukta.php?idprodukta=<?php echo $row['idprodukta']; ?>">Edit</a>
            <a class="btn btn-lg btn-block btn-outline-primary" href="hapusprodukta.php?idprodukta=<?php echo $row['idprodukta']; ?>">Hapus</a>
           
          </div>
        </div>
<?php 
    }
    ?>
      </div> </div>
    <?php include("../footer.php"); ?>
     </body>
</html>
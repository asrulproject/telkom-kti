<?php   
require('inc/koneksi2.php');

 if (isset($_GET['idprodukta'])) {
    // jika ada ambil nilai id
    $id = $_GET['idprodukta'];
  } else {
    // jika tidak ada redirect ke index.php
    //header('Location:index.php');
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.png">

    <title>Telkom KTI</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dist/css/product.css" rel="stylesheet">
    
  </head>
  <body>
    <?php include("nav.php"); ?>
    <?php include("slide-addon.php"); ?>
    <?php
      // query SQL menampilkan data dari table tbl_biodata
      $sql = "SELECT * FROM produkta WHERE idprodukta='$id'";
      // tampung data (dalam array) kedalam variable $biodata
      $produk = mysqli_query($conn, $sql); 
      if (mysqli_num_rows($produk) > 0) {

        $data = mysqli_fetch_assoc($produk);
        ?>
    <main role="main">
      <div class="container marketing">
    <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading"><?php echo $data['namaprodukta'];?></h2>
            <p class="lead"><?php echo $data['uraianprodukta'];?></p>
          </div>
          <div class="col-md-5">
            <?php echo "<img class='featurette-image img-fluid mx-auto' src='./img/produkta/$data[logoprodukta]' style='padding-top: 50%; padding-left: 50px;' width='260' height='100'/>";?>
            
          </div>
        </div>
        <hr class="featurette-divider">
        
        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="./img/ico/unggul.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Keunggulan</h2>
            <p><?php echo $data['unggulprodukta']; ?></p>
            
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="rounded-circle" src="./img/ico/fitur.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Fitur</h2>
            <p><?php echo $data['fiturprodukta']; ?></p>
           
          </div><!-- /.col-lg-4 -->
           <div class="col-lg-4">
            <img class="rounded-circle" src="./img/ico/promo.png" alt="Generic placeholder image" width="140" height="140">
            <h2>Promo</h2>
            <p><?php echo $data['promo']; ?></p>
          </div><!-- /.col-lg-4 -->
            
        </div><!-- /.row -->
        <hr class="featurette-divider">
        <?php
        $namaprodukta = $data['namaprodukta'];
        if($namaprodukta=="IndiTravel"){
        ?>
        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h3 class="featurette-heading">Bagaimana Pendapat Anda Promo kami? <span class="text-muted">Ayo Segera terbang bersama IndiTravel!</span></h3>
            <p class="lead">Ciptakan kenyamanan Perjalanan Anda dengan <?php echo $data['namaprodukta'];?> Rencanakan bajet Anda <?php echo $data['hargaprodukta'];?>.<span class="text-muted">Untuk lebih lanjut Klik Web IndiTravel. </span></span></p><a class="btn btn-lg btn-block btn-outline-primary" href="https://inditravel.co.id/">Pesan Tiket</a>
          </div>
        <?php } else {?>
          <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h3 class="featurette-heading">Bagaimana Pendapat Anda Promo kami? <span class="text-muted">Ayo Segera berlangganan!</span></h3>
            <p class="lead">Ciptakan kenyamanan Anda di rumah dengan produk <?php echo $data['namaprodukta'];?> dengan harga mulai Rp <?php echo $data['hargaprodukta'];?>/bulan.<span class="text-muted">Kunjungi plasa Telkom terdekat. Atau Klik. </span></span></p><button type="button" class="btn btn-lg btn-block btn-outline-primary"><a href="orderprodukta.php?idprodukta=<?php echo $data['idprodukta']; ?>">ORDER ONLINE</a></button>
          <?php }?>
          <div class="col-md-5 order-md-1">
            <?php echo "<img class='featurette-image img-fluid mx-auto' src='./img/produkta/$data[gambarunggulanta]' width='500'/>";?>
           
          </div>

        
        
  </main>
  <hr class="featurette-divider">
<div class="container marketing">
   <div class="row featurette">
      <p class="lead" align="center">Lihat Produk Add-On lainnya. <a class="btn btn-lg btn-block btn-outline-secondary" href="produk-addon.php">Kembali</a></p></div></div>
    <hr class="featurette-divider">
  <?php
}
?>
    <?php include("footer.php"); ?>
     </body>
</html>
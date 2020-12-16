<?php   

include('../inc/koneksi2.php');
 $idprodukta = $_GET['idprodukta'];
 $query = mysqli_query($conn,"SELECT * FROM produkta WHERE idprodukta = '$idprodukta' ");
 $datata = mysqli_fetch_array($query);



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
        <!--MULAI TABEL -->
        <div class="container">
           <div class="py-5 text-center">
        
        <h2>Form Edit Produk</h2>
        <p class="lead">Edit Produk Jika ada update data.</p>
      </div>
       
       <div class="col-md-8 order-md-1">
          <form method="post" id="pilihan_form" action="editprodukta21.php">

            <div class="row">
              <div class="col-md-12 mb-3">
               
                <label for="namaprodukta">Nama Produk</label>
                <input type="text" class="form-control" name="namaprodukta" id="namaprodukta" value="<?php echo $datata['namaprodukta']; ?>">
                <div class="invalid-feedback">
                  Nama produk harus diisi.
                </div>
              </div>
              
            </div>

            
            <div class="mb-3">
              <label for="uraianprodukta">Uraian Produk</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Mode Edit</span>
                </div>
                <textarea type="text" style="width:600px; height:450px" class="form-control" name="uraianprodukta"><?php echo $datata['uraianprodukta']; ?></textarea>
                <div class="invalid-feedback" style="width: 100%;">
                  Harus tulis uraian produk.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="unggulprodukta">Keunggulan Produk</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Mode Edit</span>
                </div>
                <textarea type="text" style="width:600px; height:450px" class="form-control" name="unggulprodukta" id="unggulprodukta"><?php echo $datata['unggulprodukta']; ?></textarea>
                <div class="invalid-feedback" style="width: 100%;">
                  Harus tulis keunggulan produk.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="fiturprodukta">Fitur Produk</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Mode Edit</span>
                </div>
                <textarea type="text" style="width:600px; height:450px" class="form-control" name="fiturprodukta" id="fiturprodukta"><?php echo $datata['fiturprodukta']; ?></textarea>
                <div class="invalid-feedback" style="width: 100%;">
                  Harus tulis fitur produk.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="hargaprodukta">Harga Dasar Produk</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rp</span>
                </div>
                <input type="text" class="form-control" name="hargaprodukta" id="hargaprodukta" value="<?php echo $datata['hargaprodukta']; ?>">
                <div class="invalid-feedback" style="width: 100%;">
                  Harga produk harus diisi.
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="promo">Promo</label>
              <textarea type="text" style="width:600px; height:450px" class="form-control" name="promo" id="promo"><?php echo $datata['promo']; ?></textarea>
              <div class="invalid-feedback">
                Promo harus diisi.
              </div>
            </div>


            <div class="row">
              <div class="col-md-6 mb-3">
                 <input type="hidden" value="<?php echo $datata['$idprodukta'];?>" name="idprodukta"/>
            <button class="btn btn-primary btn-lg btn-block" type="submit" value="kirim">Update Produk</button></div></div>
          </form>
        </div>
      </div>

 
    
    <?php include("../footer.php"); ?>
     </body>
</html>

  

              
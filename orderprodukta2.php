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
     <link href="dist/css/form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
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
<div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Form Order Add-On IndiHome</h2>
        <p class="lead">Lengkapi Data Anda untuk melanjutkan Order Online Add-On ini.</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Pesanan Anda</span>
            <span class="badge badge-secondary badge-pill">1</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0"><?php echo $data['namaprodukta'];?></h6>
               
              </div>
              <span class="text-muted">Rp <?php echo $data['hargaprodukta'];?></span>
            </li>
             <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">Jumlah Order</h6>
                
              </div>
              <span class="text-muted">1</span>
            </li>
            
               
           
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (Rp)</span>
              <strong><?php echo $data['hargaprodukta'];?></strong>
            </li>
          </ul>

          
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Data Pelanggan</h4>
          <form method="post" id="pilihan_form">>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nama Depan</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Nama depan harus diisi.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Nama Belakang</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Nama belakang harus diisi.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Nomor IndiHome</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">#</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="nomor IndiHome" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Nomor IndiHome harus diisi.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Nomor Telpon IndiHome</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">123</span>
                </div>
                <input type="text" class="form-control" id="notelpon" placeholder="nomor Telpon IndiHome" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Nomor Telpon IndiHome harus diisi.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Alamat Lengkap</label>
              <textarea type="textarea" class="form-control" id="address" placeholder="Jalan apa" required></textarea>
              <div class="invalid-feedback">
                Alamat harus diisi.
              </div>
            </div>

            <div class="mb-3">
            <div class="form-group">
    <label for="pekerjaan">Pilih Paket <?php echo $data['namaprodukta'];?></label>
    <select id="pekerjaan" class="form-control">
      <option value="0">- Pilih Paket Promo</option>
      <?php
      // query SQL menampilkan data dari table tbl_biodata
      $sql2 = "SELECT * FROM promoaddon WHERE idprodukta='$id'";
      // tampung data (dalam array) kedalam variable $biodata
      $promo = mysqli_query($conn, $sql2); 
      while($list = mysqli_fetch_array($promo)) { ?>
      <option value="<?php echo $list['hargapromo'];?>"><?php echo $list['namapromo'];?></option>
     
    <?php 
  }
    ?>
    </select>
  </div>  
            </div>
            <div class="mb-3">
            <div class="form-group">
    <label for="listpilihan">Pilih Paket <?php echo $data['namaprodukta'];?> lainnya</label>
    <select id="listpilihan" class="form-control" name="listpilihan[]" multiple class="form-control">
      <option value="">- Pilih Paket Promo</option>
      <?php
      // query SQL menampilkan data dari table tbl_biodata
      $sql2 = "SELECT * FROM promoaddon WHERE idprodukta='$id'";
      // tampung data (dalam array) kedalam variable $biodata
      $promo = mysqli_query($conn, $sql2); 
      while($list = mysqli_fetch_array($promo)) { ?>
      <option value="<?php echo $list['hargapromo'];?>"><?php echo $list['namapromo'];?></option>
     
    <?php 
  }
    ?>
    </select>
  </div>  
            </div>
            
            <hr class="mb-4">

            <h4 class="mb-3">Metode Bayar</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="tunai" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="tunai">Tunai</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="transfer" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="transfer">Transfer</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="linkaja" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="linkaja">LinkAja</label>
              </div>
            </div>
            <div class="row">
             
              <div class="col-md-6 mb-3">
                <label for="gsm-number">Nomor HP</label>
                <input type="number" class="form-control" id="gsm-number" placeholder="" required>
                <div class="invalid-feedback">
                  Masukkan nomor HP Anda
                </div>
              </div>
            </div>
          
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Order</button>
          </form>
        </div>
      </div>

 <?php
}
?>
    
    <?php include("footer.php"); ?>
     </body>
</html>
<script>
  $(document).ready(function(){
    $('#listpilihan').multiselect({
      nonSelectedText: 'Pilih Promo',
      enableFiltering: true,
      enableCaseInsensitiveFiltering: true,
  buttonWidth:'400px'
 });
 
 $('#pilihan_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"prosesorder.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#listpilihan option:selected').each(function(){
     $(this).prop('selected', false);
    });
    $('#listpilihan').multiselect('refresh');
    alert(data);
   }
  });
 });
 
 
});
</script> 
    })
  })
</script>
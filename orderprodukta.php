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
        <img class="d-block mx-auto mb-4" src="" alt="" width="72" height="72">
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
              <h6 class="my-0"><?php echo $data['namaprodukta'];?></h6></li>
              
                 <li class="list-group-item d-flex justify-content-between lh-condensed" name="produk1">
                <div id="produk1"></div>
               
              
              <span class="text-muted">Rp <div id="produk1rp"></div></span>
            </li>
             <li class="list-group-item d-flex justify-content-between lh-condensed" >
                <div id="produk2"></div>
               
              
              <span class="text-muted">Rp <div id="produk2rp"></span>
            </li>
             
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (Rp) </span> <strong> <div id="totalduit"></div></strong> 
              
            </li>
          </ul>

          
        </div>
        <!--MULAI TABEL -->
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Data Pelanggan</h4>
          <form method="post" id="pilihan_form" action="proses/eksekusiorder.php">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName">Nama Lengkap</label>
                <input type="text" class="form-control" name="namata" id="namata" placeholder="nama Anda" value="" required>
                <div class="invalid-feedback">
                  Nama depan harus diisi.
                </div>
              </div>
              
            </div>

            <div class="mb-3">
              <label for="noindi">Nomor IndiHome</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">#</span>
                </div>
                <input type="text" class="form-control" name="noindi" id="noindi" placeholder="nomor IndiHome">
                <div class="invalid-feedback" style="width: 100%;">
                  Nomor IndiHome harus diisi.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="notelpon">Nomor Telpon IndiHome</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">123</span>
                </div>
                <input type="text" class="form-control" name="notelpon" id="notelpon" placeholder="nomor Telpon IndiHome" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Nomor Telpon IndiHome harus diisi.
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="emailta">Email</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" name="emailta" id="emailta" placeholder="email" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Nomor IndiHome harus diisi.
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="alamatta">Alamat Lengkap</label>
              <textarea type="textarea" class="form-control" name="alamatta" id="alamatta" placeholder="Jalan apa" required></textarea>
              <div class="invalid-feedback">
                Alamat harus diisi.
              </div>
            </div>

            <div class="mb-3">
            <div class="form-group">
    <label for="produkok1">Pilih Paket <?php echo $data['namaprodukta'];?></label>
    <select name="produkok1" id="produkok1" class="form-control" onChange="math()" required>
      <option name="0" value="0">- Pilih Paket Promo</option>
      <?php
      // query SQL menampilkan data dari table tbl_biodata
      $sql2 = "SELECT * FROM promoaddon WHERE idprodukta='$id'";
      // tampung data (dalam array) kedalam variable $biodata
      $promo = mysqli_query($conn, $sql2); 
      while($list = mysqli_fetch_array($promo)) { ?>
      <option value="<?php echo $list['namapromo'];?>|<?php echo $list['hargapromo'];?>|<?php echo $list['namaproduk'];?>"><?php echo $list['namapromo'];?></option>
     
    <?php 
  }
    ?>
    </select>
  </div>  
            </div>
            
            <div class="mb-3">
            <div class="form-group">
    <label for="produkok2">Pilih Paket Add-On lainnya (optional)</label>
    <select name="produkok2" id="produkok2" class="form-control" onChange="math()">
      <option name="0" value="0">- Pilih Paket Promo lain</option>
      <?php
      // query SQL menampilkan data dari table tbl_biodata
      $sql2 = "SELECT * FROM promoaddon";
      // tampung data (dalam array) kedalam variable $biodata
      $promo = mysqli_query($conn, $sql2); 
      while($list = mysqli_fetch_array($promo)) { ?>
      <option value="<?php echo $list['namapromo'];?>|<?php echo $list['hargapromo'];?>|<?php echo $list['namaproduk'];?>"><?php echo $list['namapromo'];?></option>
     
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
                <input id="tunai" name="paymentMethod" type="radio" class="custom-control-input"  value="tunai">
                <label class="custom-control-label" for="tunai">Tunai</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="transfer" name="paymentMethod" type="radio" class="custom-control-input" value="transfer">
                <label class="custom-control-label" for="transfer" >Transfer</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="linkaja" name="paymentMethod" type="radio" class="custom-control-input" value="linkaja">
                <label class="custom-control-label" for="linkaja">Link Aja</label>
              </div>
            </div>
            <div class="row">
             
              <div class="col-md-6 mb-3">
                <label for="gsmnumber">Nomor HP</label>
                <input type="text" class="form-control" name="gsmnumber" id="gsmnumber" placeholder="no hape" required>
                <div class="invalid-feedback">
                  Masukkan nomor HP Anda
                </div>
              </div>
            </div>
        <!--  <div type="hidden"  name="produk10" id="produk10"  > 
             <div type="hidden" name="produk20" id="produk20" > -->
            <hr class="mb-4">
            <div class="row">
              <div class="col-md-6 mb-3">
            <button class="btn btn-secondary btn-lg btn-block" type="reset" onclick="resetki();" value="cancel">Reset Order</button></div><div class="col-md-6 mb-3">
            <button class="btn btn-primary btn-lg btn-block" type="submit" value="kirim">Order</button>
          </div></div>
          </form>
        </div>
      </div>

 <?php
}
?>
    
    <?php include("footer.php"); ?>
     </body>
</html>

   <script type="text/javascript">
   /*               var text11;
                  var text22
                    function pilihanku(element){
                      var text = element.options[element.selectedIndex].text;
                      document.getElementById("produk1").innerHTML = text; 
                      text11  = element.options[element.selectedIndex].value;
                      document.getElementById("produk1rp").innerHTML = text11; 
                  }
                  function pilihankuplus(element2){
                      var text2 = element2.options[element2.selectedIndex].text;
                      document.getElementById("produk2").innerHTML = text2; 
                      text22 = element2.options[element2.selectedIndex].value;
                      document.getElementById("produk2rp").innerHTML = text22; 
                    }

                  function totalharga(){
                     //var harga1 = element2.options[element2.selectedIndex].value;
                     //var harga2 = element.options[element.selectedIndex].value;
                     var totalrp = parseInt(text22) + parseInt(text11);
                     document.getElementById("totalduit").value = totalrp;
                  }*/
                  </script> 
<script type="text/javascript">
  function resetki(){
    pilihan_form.reset();
  }
  function math(){

    var a = document.getElementById("produkok1");
    var nilaia = a.options[a.selectedIndex].text;
    var b = document.getElementById("produkok2");
    var nilaib = b.options[b.selectedIndex].text;
    var c = document.getElementById("produkok1").value;
    var strArrC = c.split("|");
    for(var i=0;i<strArrC.length;i++){
      document.getElementById("produk1rp").innerHTML = strArrC[1];
    
    }
    var d = document.getElementById("produkok2").value;
    var strArrD = d.split("|");
    for(var i=0;i<strArrD.length;i++){
      document.getElementById("produk2rp").innerHTML = strArrD[1];
    
    }
    document.getElementById("produk1").innerHTML = nilaia;
    document.getElementById("produk2").innerHTML = nilaib;
    
    //var totalrp2 = a + b;
    var totalrp2 = parseInt(strArrC[1]);
    var totalrp = parseInt(strArrC[1]) + parseInt(strArrD[1]);
    if(!totalrp){
      document.getElementById("totalduit").innerHTML = totalrp2;
    }else{
      document.getElementById("totalduit").innerHTML = totalrp;
    }
    

  }
  
</script>
              
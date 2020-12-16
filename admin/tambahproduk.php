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
    <meta name="keywords" content="internet cepat, internet keluarga, internet murah, internet stabil, internet unlimited, paket internet, speedtest indihome, tv kabel, tv kabel hd" />
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
        
        <h2>Form Input Produk Add-On Baru</h2>
        <p class="lead">Input Produk Add-On Baru.</p>
      </div>
         <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
             
             <ul class="list-group mb-3">
          
            <li class="list-group-item d-flex justify-content-between lh-condensed">
<span class="text-muted">Lihat Produk
             <a class="btn btn-outline-primary" href="dataprodukta.php">Produk</a></li></ul>
           
            
          </h4>
       </div>
       <!-- mulai input -->
       <div class="col-md-8 order-md-1">
          <form method="post" id="pilihan_form" action="tambahproduks2.php">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="namaprodukta">Nama Produk</label>
                <input type="text" class="form-control" name="namaprodukta" id="namaprodukta" placeholder="nama Produk Add-On" value="" required>
                <div class="invalid-feedback">
                  Nama produk harus diisi.
                </div>
              </div>
              
            </div>

            
            <div class="mb-3">
              <label for="uraianprodukta">Uraian Produk</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">abc</span>
                </div>
                <textarea type="text" class="form-control" name="uraianprodukta" id="uraianprodukta" placeholder="tulis uraian produk" required></textarea>
                <div class="invalid-feedback" style="width: 100%;">
                  Harus tulis uraian produk.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="unggulprodukta">Keunggulan Produk</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">*</span>
                </div>
                <textarea type="text" class="form-control" name="unggulprodukta" id="unggulprodukta" placeholder="tulis keunggulan produk" required></textarea>
                <div class="invalid-feedback" style="width: 100%;">
                  Harus tulis keunggulan produk.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="fiturprodukta">Fitur Produk</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">**</span>
                </div>
                <textarea type="text" class="form-control" name="fiturprodukta" id="fiturprodukta" placeholder="tulis fitur produk" required></textarea>
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
                <input type="text" class="form-control" name="hargaprodukta" id="hargaprodukta" placeholder="harga produk" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Harga produk harus diisi.
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="promo">Promo</label>
              <textarea type="text" class="form-control" name="promo" id="promo" placeholder="Tulis promo secara umum" required></textarea>
              <div class="invalid-feedback">
                Promo harus diisi.
              </div>
            </div>


            <div class="row">
              <div class="col-md-6 mb-3">
            <button class="btn btn-primary btn-lg btn-block" type="submit" value="kirim">Simpan Produk</button></div></div>
          </form>
        </div>
      </div>

 
    
    <?php include("../footer.php"); ?>
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
  function math(){
    var a = document.getElementById("produkok1");
    var nilaia = a.options[a.selectedIndex].text;
    var b = document.getElementById("produkok2");
    var nilaib = b.options[b.selectedIndex].text;
    var c = document.getElementById("produkok1").value;
    var d = document.getElementById("produkok2").value;
    document.getElementById("produk1").innerHTML = nilaia;
    document.getElementById("produk2").innerHTML = nilaib;
    document.getElementById("produk1rp").innerHTML = c;
    document.getElementById("produk2rp").innerHTML = d;
    //var totalrp2 = a + b;
    var totalrp = parseInt(c) + parseInt(d);
    document.getElementById("totalduit").innerHTML = totalrp;

  }
</script>
              
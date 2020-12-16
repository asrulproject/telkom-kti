<?php   
require('inc/koneksi2.php');

 if (isset($_GET['idorderprodukta'])) {
    // jika ada ambil nilai id
    $id = $_GET['idorderprodukta'];
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
      $sql = "SELECT * FROM orderprodukta WHERE idorderprodukta='$id'";
      // tampung data (dalam array) kedalam variable $biodata
      $produk = mysqli_query($conn, $sql); 
      if (mysqli_num_rows($produk) > 0) {

        $data = mysqli_fetch_assoc($produk);
        ?>

    <?php include("isiinvoice.php"); ?>
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
              
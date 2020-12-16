<?php

require('../inc/koneksi2.php');
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
  </head>
  <body>

    <?php 


    include("navadmin.php"); ?>
   <?php 

  if($_SESSION['status']!="login"){
    header("location:../index.php?pesan=belum_login");
  }
  ?>
<div class="container">
  <div class="my-3 py-3 text-center text-gray overflow-hidden">
          <h2 class="display-5">Data Pelanggan Order Add-On</h2>
        </div>
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">No. Order</th>
      <th scope="col">Tgl. Order</th>
      <th scope="col">Nama Pelanggan</th>
      <th scope="col">Nomor Telpon</th>
      <th scope="col">Nomor Indihome</th>
      <th scope="col">Nama Add-On 1</th>
      <th scope="col">Promo Order 1</th>
      <th scope="col">Nama Add-On 1</th>
      <th scope="col">Promo Order 1</th>

      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
 <?php 

$dataorder = mysqli_query($conn,"SELECT * FROM orderprodukta");
while ($row = mysqli_fetch_array($dataorder)) {
  # code...
echo "<tr>
            <th>".$row['idorderprodukta']."</th>
            <th>".$row['tglorder']."</th>
            <th>".$row['namapelangganta']."</th>
            <th>".$row['nomortelponet']."</th>
            <th>".$row['nomorindihometa']."</th>
            <th>".$row['promopilihanta']."</th>
            <th>".$row['harga1']."</th>
            <th>".$row['nomortelponet']."</th>
            <th>".$row['harga2']."</th>
            <th>".$row['statusorder']."</th>
        </tr>";
}
 ?>
 
    </tbody>

    <script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>

</table>
    <?php include("../footer.php"); ?> </div>
     </body>
</html>
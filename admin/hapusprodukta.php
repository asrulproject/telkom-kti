<?php 
  require('../inc/koneksi2.php');
  $idprodukta = $_GET['idprodukta'];
  $query = mysqli_query($conn,"DELETE FROM produkta WHERE idprodukta = '$idprodukta' ");

  if($query){
    echo '
      <script>
      alert("Data Produk Telah dihapus!");
      window.location = "././dataprodukta.php";
      </script>
    ';
  }

 ?>
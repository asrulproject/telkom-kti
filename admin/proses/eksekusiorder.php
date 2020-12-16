<?php   
include('../inc/koneksi2.php');

$namaprodukta = $_POST["namaprodukta"];
$logoprodukta = $_FILES["logoprodukta"]["name"];
$uraianprodukta = $_POST["uraianprodukta"];
$unggulprodukta = $_POST["unggulprodukta"];
$fiturprodukta = $_POST["fiturprodukta"];
//$proseri1 = $_POST["produk1"];
//$proseri2 = $_POST["produk2"];
$hargaprodukta = $_POST["hargaprodukta"];
$promo = $_POST["promo"];
$gambarunggulanta = $_FILES["gambarunggulanta"]["name2"];

//

if($logoprodukta && $gambarunggulanta  != "") {
  $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $logoprodukta);
  $y = explode('.', $gambarunggulanta) //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $ekstensi2 = strtolower(end($y));
  $file_tmp = $_FILES['logoprodukta']['tmp_name'];  
  $file_tmp2 = $_FILES['gambarunggulanta']['tmp_name2']; 
  $angka_acak     = rand(1,999);
  $nama_gambar_baru = $angka_acak.'-'.$logoprodukta;
  $nama_gambar_baru2 = $angka_acak.'-'.$gambarunggulanta; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, 'img/produkta/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                  // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                  $query = "INSERT INTO produk (nama_produk, deskripsi, harga_beli, harga_jual, gambar_produk) VALUES ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', '$nama_gambar_baru')";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }

            } else {     
             //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
            }
} else {
   $query = "INSERT INTO produk (nama_produk, deskripsi, harga_beli, harga_jual, gambar_produk) VALUES ('$nama_produk', '$deskripsi', '$harga_beli', '$harga_jual', null)";
                  $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    //tampil alert dan akan redirect ke halaman index.php
                    //silahkan ganti index.php sesuai halaman yang akan dituju
                    echo "<script>alert('Data berhasil ditambah.');window.location='index.php';</script>";
                  }
}



//

$sqlku = "INSERT INTO orderprodukta (namapelangganta, nomortelponet, nomorindihometa, emailta, harga1, harga2, carabayar, nomorhp) VALUES ('$namata', '$notelpon', '$noindi', '$emailta', '$produkok1', '$produkok2', '$paymentMethod','$gsmnumber')";
$queryku = mysqli_query($conn, $sqlku) or die(mysqli_error());

if($queryku){
	echo "order berhasil";
} else {
	echo "Error :".$sqlku."<br>".mysqli_error($conn);
}

mysqli_close($conn);

?>
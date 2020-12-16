<?php 
// mengaktifkan session php
session_start();
include('../inc/koneksi2.php');

$emailki = $_POST["emailki"];
$passki = $_POST["passki"];

$data = mysqli_query($conn,"SELECT * FROM userta WHERE useridta='$emailki' AND passidta='$passki'");
$cek = mysqli_num_rows($data);

if($cek > 0){
	$_SESSION['username'] = $emailki;
	$_SESSION['status'] = "login";
	header("location:../admin/index.php");
} else {
	header("location:../loginki.php?pesan=gagal");
}
?>
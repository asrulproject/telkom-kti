<?php   
include('../inc/koneksi2.php');

$namata = $_POST["namata"];
$noindi = $_POST["noindi"];
$notelpon = $_POST["notelpon"];
$emailta = $_POST["emailta"];
$alamatta = $_POST["alamatta"];
$result = $_POST["produkok1"];
$result2 = $_POST["produkok2"];
$carabayar = $_POST["paymentMethod"];
$alamatta = $_POST["alamatta"];

$result_explode = explode('|', $result);
$result_explode2 = explode('|', $result2);

$gsmnumber = $_POST["gsmnumber"];
$totalbayar = $result_explode2[1] + $result_explode[1];


$sqlku = "INSERT INTO orderprodukta (namapelangganta, nomortelponet, nomorindihometa, emailta, alamatta, harga1, harga2, carabayar, nomorhp, promopilihanta,promopilihanta2,nomoridprodukorderta,nomoridprodukorderta2, totalorder) VALUES ('$namata', '$notelpon', '$noindi', '$emailta', '$alamatta', '$result_explode[1]', '$result_explode2[1]','$carabayar','$gsmnumber', '$result_explode[0]', '$result_explode2[0]','$result_explode[2]', '$result_explode2[2]', '$totalbayar')";
$queryku = mysqli_query($conn, $sqlku) or die(mysqli_error());

if($queryku){
	//echo "order berhasil";
	//$url = "./";
	$last_id = mysqli_insert_id($conn);
	$url = "invoice.php?idorderprodukta=".$last_id;
	header('location: '.$url);
	exit;
	//echo "<script>window.location.href='./invoice.php?idorderprodukta=".$last_id"</script>";
} else {
	echo "Error :".$sqlku."<br>".mysqli_error($conn);
}

mysqli_close($conn);

?>
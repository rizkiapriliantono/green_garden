<?php
$koneksi1 = mysqli_connect("localhost","root","","toko_tanaman2");
// Check connection
if (mysqli_connect_errno()){
	echo "koneksi1 database gagal : " . mysqli_connect_error();
}
?>
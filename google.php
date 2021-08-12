<?php
// Include file gpconfig
include_once 'gpconfig.php';

if(isset($_GET['code'])){
	$gclient->authenticate($_GET['code']);
	$_SESSION['token'] = $gclient->getAccessToken();
	header('Location: ' . filter_var($redirect_url, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
	$gclient->setAccessToken($_SESSION['token']);
}

if ($gclient->getAccessToken()) {
	include 'koneksi1.php';

	// Get user profile data from google
	$gpuserprofile = $google_oauthv2->userinfo->get();

	$nama = $gpuserprofile['given_name']." ".$gpuserprofile['family_name']; // Ambil nama dari Akun Google
	$email = $gpuserprofile['email']; // Ambil email Akun Google nya

	// Buat query untuk mengecek apakah data user dengan email tersebut sudah ada atau belum
	// Jika ada, ambil id, username, dan nama dari user tersebut
	$sql = mysqli_query($koneksi1, "SELECT id_pelanggan, nama_pelanggan FROM pelanggan WHERE email_pelanggan='".$email."'");
	$user = mysqli_fetch_array($sql); // Ambil datanya dari hasil query tadi

	if(empty($user)){ // Jika User dengan email tersebut belum ada

		// Lakukan insert data user baru tanpa password
		mysqli_query($koneksi1, "INSERT INTO pelanggan(nama_pelanggan, email_pelanggan) VALUES('".$nama."', '".$email."')");

		$id = mysqli_insert_id($koneksi1); // Ambil id user yang baru saja di insert
	}else{
		$id = $user['id_pelanggan']; // Ambil id pada tabel user
		$nama = $user['nama_pelanggan']; // Ambil username pada tabel user
	}

	$_SESSION['id_pelanggan'] = $id;
	$_SESSION['nama_pelanggan'] = $nama;
    $_SESSION['email_pelanggan'] = $email;

    header("location: index.php");
} else {
	$authUrl = $gclient->createAuthUrl();
	header("location: ".$authUrl);
}
?>

<?php


$pdo = new PDO('sqlite:../veritabani.db'); 


ob_start();
session_start();

if (isset($_POST['giris'])) {

	$kullanici_adi = $_POST['kullanici_adi'];
	$kullanici_parola = $_POST['kullanici_parola'];



	$sorgu = "SELECT count(*) FROM kullanici WHERE adi = ? and parola = ?"; 
	$sonuc = $pdo->prepare($sorgu); 
	$sonuc->execute([$kullanici_adi,$kullanici_parola]); 
	$sayi = $sonuc->fetchColumn(); 

	if ($sayi > 0) {
		$_SESSION['oturum'] = 'acik';
		header('location:index.php');
	}
	else {
		header('location:giris.php');
	}


}

?>
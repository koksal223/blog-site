<?php
$pdo = new PDO('sqlite:../veritabani.db'); 

ob_start();
session_start();


if (empty($_SESSION['oturum'])) {
	header("Location: giris.php");
}



if(isset($_POST['blog_ekle'])){



	$deger1 = $_POST['blog_baslik'];
	$deger2 = $_POST['blog_icerik'];
	$deger4 = $_POST['blog_tarih'];
	

	$url = '../assets/img';
	@$tmp_name = $_FILES['gorsel']["tmp_name"];
	$name = $_FILES['gorsel']["name"];
	$blog_gorsel=substr($url, 3)."/".$name;
	@move_uploaded_file($tmp_name, "$url/$name");

	$insert = "INSERT INTO blog (baslik, icerik,gorsel, tarih) VALUES (:baslik, :icerik,:gorsel, :tarih)";
	$stmt = $pdo->prepare($insert);

	$stmt->bindParam(':baslik', $deger1, PDO::PARAM_STR);
	$stmt->bindParam(':icerik', $deger2, PDO::PARAM_STR);
	$stmt->bindParam(':gorsel', $blog_gorsel, PDO::PARAM_STR);
	$stmt->bindParam(':tarih', $deger4, PDO::PARAM_STR);

	$stmt->execute();

	header('location:index.php');

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>YÖNETİCİ PANELİ | EKLEME SAYFASI</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-primary">
	<div class="container">

		<div class="row ">
			<div class="col-lg-12 mx-auto">

				<div class = "container">
					<form method="POST" class="mt-5" enctype="multipart/form-data">
						<div class="row">
							<div class="col-lg-12">

								<h1 class="text-white">Blog  Ekle</h1>
							</div>
							<div class="col-md-12 mt-1">
								<label class="text-white">Görsel</label>
								<input type="file" name="gorsel" class="form-control" required>
							</div>
							<div class="col-md-12 mt-1">
								<label class="text-white">Başlık</label>
								<input type="text" name="blog_baslik" class="form-control" required>
							</div>
							<div class="col-md-12 mt-1">
								<label class="text-white">İçerik</label>
								<textarea name="blog_icerik" class="form-control" required></textarea>
							</div>
							<div class="col-md-12 mt-1">
								<label class="text-white">Tarih</label>
								<input type="date" name="blog_tarih" class="form-control" required value="<?php echo date('Y-m-d'); ?>" >
							</div>
							<div class="col-md-12 mt-1">
								<button name="blog_ekle" class="btn btn-success btn-block">	<i class="fa fa-plus"></i> Ekle</button>
							</div>
						</div>
					</form>

				</div>


				<a href="index.php" class="btn btn-success mt-5"><i class="fa fa-list"></i> Blog Yazıları</a>
				<?php 
				if (isset($_SESSION['oturum'])) { ?>
					<a href="cikis.php" class="btn btn-danger mt-5"><i class="fa fa-lock"></i> Oturumu Kapat</a>
				<?php } ?>


			</div>
		</div>
	</div>

</body>
</html>
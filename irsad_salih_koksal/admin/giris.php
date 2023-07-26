<?php
$pdo = new PDO('sqlite:../veritabani.db'); 

ob_start();
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>YÖNETİCİ PANELİ | OTURUM AÇMA</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-success">
	<div class="container text-white p-2">
		
		<div class="row ">
			<div class="col-lg-12 mx-auto">
				<div class = "container">
					<form method="POST" action="oturum_kontrol.php" class="mt-5" enctype="multipart/form-data">
						<h1 class="mt-4 text-white text-center">Giriş Yap</h1>
						<div class="row">
							<div class="col-md-12 mt-3">
								<label>Kullanıcı Adınız</label>
								<input type="text" name="kullanici_adi" class="form-control" required>
							</div>
							<div class="col-md-12 mt-3">
								<label>Şifreniz</label>
								<input type="password" name="kullanici_parola" class="form-control" required>
							</div>
							<div class="col-md-12 mt-3">
								<button name="giris" class="btn btn-primary btn-block">Giriş Yap</button>
							</div>
						</div>
					</form>
				</div>
				

				
				
			</div>
		</div>
	</div>

</body>
</html>
<?php

$pdo = new PDO('sqlite:../veritabani.db'); 

ob_start();
session_start();


if (empty($_SESSION['oturum'])) {
	header("Location: giris.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>YÖNETİCİ PANELİ</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-warning">
	<div class="container">
		
		<div class="row ">
			<div class="col-lg-12 mx-auto">

				<a href="blog-ekle.php" class="btn btn-primary mt-1 mb-2"><i class="fa fa-plus"></i> Blog Ekle</a>
				<a href="mesajlar.php" class="btn btn-success mt-1 mb-2"><i class="fa fa-envelope"></i> İletişim Mesajları</a>
				<?php 
				if (isset($_SESSION['oturum'])) { ?>
					<a href="cikis.php" class="btn btn-danger mt-1 mb-2"><i class="fa fa-lock"></i> Oturumu Kapat</a>
				<?php } ?>
				<div class = "container">
					<h1 class="text-white text-center mt-2">BLOG LİSTESİ</h1>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Görsel</th>
								<th scope="col">Başlık</th>
								<th scope="col">İçerik Detay</th>
								<th scope="col">Eklenme Tarih</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$select = "SELECT * FROM blog ORDER BY id DESC";
							$stmt = $pdo->prepare($select);

							// Execute statement.
							$stmt->execute();

							// Get the results.
							$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
							foreach($results as $row) { ?>
								<tr>
									<th scope="row"><?php echo $row['id']; ?></th>
									<td><img src="<?php echo '../'.$row['gorsel']; ?>" style="width: 100%;max-height: 50px;"></td>
									<td><?php echo $row['baslik']; ?></td>
									<td style="font-size:12px"><?php echo $row['icerik']; ?></td>
									<td><?php echo date('d-m-Y',strtotime($row['tarih'])); ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>



			</div>
		</div>
	</div>

</body>
</html>
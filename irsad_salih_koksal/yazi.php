<?php 
$pdo = new PDO('sqlite:veritabani.db'); 

if ($_GET['id']) {
  $id=$_GET['id'];
  $yazi = $pdo->query('SELECT * FROM blog where id='.$id )->fetch(PDO::FETCH_ASSOC);
}else {
  header("location:index.php");
}



?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yazı | <?=$yazi['baslik']; ?></title>

    <link rel="shortcut icon" href="assets/img/icon/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
</head>

<body>

    <header>
        <div class="container">
            <div class="header-wrapper mt-5">
                <div class="row header-content">
                    <div class="header-title col-md-8">
                        <a href="./">Blog Sitem</a>
                    </div>
                    <div class="header-menu col-md-4">
                        <ul>
                            <li>
                                <a href="./">Ana Sayfa</a>
                            </li>
                            <li>
                                <a href="blog.php" style="opacity: 100%;">Blog Yazılarım</a>
                            </li>
                            <li>
                                <a href="hakkimda.php">Hakkımda</a>
                            </li>
                            <li>
                                <a href="iletisim.php">İletişim</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="blog-wrapper">
        <div class="container mt-4">
            <div class="blog-container">
                <div class="blog-top-title">
                    Blog Yazılarım
                </div>
                <div class="blog-container-text">
                    <div class="blog-text-meta-info">
                        <ul>
                            <li>
                                <div class="blog-text-date">
                                    <?=date('d.m.Y',strtotime($yazi['tarih'])); ?>
                                </div>
                                <div class="blog-text-meta-dot">
                                    ·
                                </div>
                                <div class="blog-text-author">
                                    İrşad Salih Köksal
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="blog-text-title">
                        <?=$yazi['baslik']; ?>
                    </div>
                    <div class="blog-text">
                       <?=$yazi['icerik']; ?>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <footer>
    <div class="container-fluid mt-5"></div>
    <hr>
</div>
<div class="container text-center mt-5 mb-5" >
    <div class="copyright">
        © 2023 All rights reserved.
    </div>   
</div>

</footer>

</body>

</html>
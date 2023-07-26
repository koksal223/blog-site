<?php $pdo = new PDO('sqlite:veritabani.db');  


if(isset($_POST['mesaj_ekle'])){



    $deger1 = $_POST['isim'];
    $deger2 = $_POST['mail'];
    $deger3 = $_POST['konu'];
    $deger4 = $_POST['mesaj'];
    $tarih = date('d-m-Y H:i');
    

    $insert = "INSERT INTO mesajlar (isim, mail,konu, mesaj, tarih) VALUES (:isim, :mail,:konu, :mesaj, :tarih)";
    $stmt = $pdo->prepare($insert);

    $stmt->bindParam(':isim', $deger1, PDO::PARAM_STR);
    $stmt->bindParam(':mail', $deger2, PDO::PARAM_STR);
    $stmt->bindParam(':konu', $deger3, PDO::PARAM_STR);
    $stmt->bindParam(':mesaj', $deger4, PDO::PARAM_STR);
    $stmt->bindParam(':tarih', $tarih, PDO::PARAM_STR);

    $stmt->execute();

    header('location:index.php');

}

?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İletişim</title>
    
    <link rel="shortcut icon" href="assets/img/icon/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/fonts/flaticon/flaticon.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/mobile.css">
    <style type="text/css">
        input, textarea {
            color:black !important;
        }
    </style>
</head>

<body>

    <header>
        <div class="container">
            <div class="header-wrapper mt-5">
                <div class="row header-content">
                    <div class="header-title col-md-8">
                        <a href="index.html">Blog Sitem</a>
                    </div>
                    <div class="header-menu col-md-4">
                        <ul>
                           <li>
                            <a href="./">Ana Sayfa</a>
                        </li>
                        <li>
                            <a href="blog.php">Blog Yazılarım</a>
                        </li>
                        <li>
                            <a href="hakkimda.php">Hakkımda</a>
                        </li>
                        <li>
                            <a href="iletisim.php"  style="opacity: 100%;">İletişim</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="contact-wrapper">
    <div class="container mt-4">
        <div class="contact-container">
            <div class="contact-top-title">
             Benimle İletişime Geç
         </div>
         <div class="contact-form">
            <form action="#" method="post">
                <div class="fullname-input">
                    <input type="text" name="isim" id="" placeholder="İsim-Soyisim" >
                </div>
                <div class="email-input">
                    <input type="email" name="mail" id="" placeholder="Email Adresiniz">
                </div>
                <div class="subject-input">
                    <input type="text" name="konu" id="" placeholder="Konu">
                </div> 
                <div class="message-input">
                    <textarea name="mesaj" id="" cols="60" rows="5" placeholder="Mesajınız"></textarea>
                </div>
                <div class="button-input">
                    <button type="submit" name="mesaj_ekle">Gönder</button>
                </div>           
            </form>
        </div>
    </div>
</div>
</div>

<footer>
    <div class="container-fluid mt-5"></div>
    <hr>
</div>
<div class="container text-center mt-5 mb-5">
    <div class="copyright">
        © 2023 All rights reserved.
    </div>
</div>

</footer>

</body>

</html>
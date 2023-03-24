
<html>
    <head>
       <meta charset="UTF-8"> 
    </head>
</html>

<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cuzdan_adresi = $_POST['cuzdan_adresi'];
    
    // Veritaban©Ånda c«äzdan adresini kaydetmek i«®in gerekli i«ßlemler yap©Ål©År
    
    header("refresh:3;url=index.php");
    echo "Cuzdan adresi basariyla kaydedildi. 3 saniye icinde yonlendiriliyorsunuz...";
    exit;
} else {
    header('Location: index.php');
    exit;
}

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = $_POST['a'] ?? '';
    $b = $_POST['b'] ?? '';

    if (!$a || !$b) {
        exit('Eksik bilgi gönderildi.');
    }

    $xmlFile = 'kullanicilar.xml';

    if (!file_exists($xmlFile)) {
        exit('Kullanıcı bulunamadı.');
    }

    $xml = simplexml_load_file($xmlFile);
    $found = false;

    foreach ($xml->user as $user) {
        if (($user->a == $a || $user->c == $a) && $user->d == $b) {
            $found = true;
            break;
        }
    }

    if ($found) {
        echo 'Giriş başarılı.';
    } else {
        echo 'Kullanıcı adı veya şifre yanlış.';
    }
} else {
    echo 'Geçersiz istek.';
}
?>

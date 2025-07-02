<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = $_POST['a'] ?? '';
    $b = $_POST['b'] ?? '';
    $c = $_POST['c'] ?? '';
    $d = $_POST['d'] ?? '';

    if (!$a || !$b || !$c || !$d) {
        exit('Eksik bilgi gönderildi.');
    }

    $xmlFile = 'kullanicilar.xml';

    if (file_exists($xmlFile)) {
        $xml = simplexml_load_file($xmlFile);
    } else {
        $xml = new SimpleXMLElement('<users></users>');
    }

    $user = $xml->addChild('user');
    $user->addChild('a', htmlspecialchars($a));
    $user->addChild('b', htmlspecialchars($b));
    $user->addChild('c', htmlspecialchars($c));
    $user->addChild('d', $d);

    $xml->asXML($xmlFile);

    echo 'Kayıt başarılı.';
} else {
    echo 'Geçersiz istek.';
}
?>

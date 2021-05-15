<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Przykład 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
        $jezyki = [
            'Zielony' => '#0F0', 
            'Niebieski' => '#00F', 
            'Czerwony' => '#F00',
        ];
    ?>
    <ul>
    <?php foreach($jezyki as $klucz => $wartosc): ?>
        <li style="color:<?=$wartosc ?>"><?=$klucz ?></li>
    <?php endforeach; ?>
    </ul>
</body>
</html>
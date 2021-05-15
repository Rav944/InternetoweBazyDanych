<?php
$liczbaWierszy = $_POST['liczba_wierszy'] ?? 2;
$liczbaKolumn = $_POST['liczba_kolumn'] ?? 2;
$kolorTla = $_POST['kolor_tla'] ?? 'white';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WIT</title>
    <style>
        td {
            border: 1px solid black;
        } 
    </style>
</head>

<body style="background-color: <?= $kolorTla ?>">
    <table>
        <?php for ($i = 0; $i < $liczbaWierszy; $i++) : ?>
            <?php $style = (($_POST['parzyste'] && $i % 2 != 0)?"#FF0" : "")?>
            <tr style="background-color:<?=$style ?>">
                <?php for ($j = 0; $j < $liczbaKolumn; $j++) : ?>
                    <td><?= $i ?>.<?= $j ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>
</body>

</html>
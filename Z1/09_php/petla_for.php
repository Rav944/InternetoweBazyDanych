<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Przykład 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Nr</th>
        </tr>
        <?php
            for($i = 0; $i < 10; $i++) {
            $style = "";
            if($i % 2 != 0){
                $style = "background-color:#FF0;";
            }
            echo "<tr style=$style>
                    <td>Paragraf</td>
                    <td>#<?=$i ?></td>
                 </tr>";
            }
        ?>
    </table>
</body>
</html>
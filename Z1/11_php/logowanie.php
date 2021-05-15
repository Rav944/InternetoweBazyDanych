<?php

session_start();
if(isset($_SESSION['nieudane_logowanie']))
    {
    if($_SESSION['nieudane_logowanie'] == 3)
        {
            if(time() - $_SESSION['ostatnie_logowanie'] < 3*60*60 ) 
            {
                echo "jestes zablokowany na 3 min";
                return; 
            }
            else
            {
                $_SESSION['nieudane_logowanie'] = 0;
            }
        }      
    }

if (isset($_POST['zaloguj'])) {
	$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');

	$stmt = $pdo->prepare("SELECT * FROM uzytkownicy WHERE login = :login");

	$stmt->execute(['login' => $_POST['login']]);
	$wynik = $stmt->fetch();
	
	if ($wynik && password_verify($_POST['haslo'], $wynik['haslo'])) {
        $_SESSION['nieudane_logowanie'] = 0;
		$_SESSION['zalogowany'] = 'tak';
		$_SESSION['id'] = $wynik['id'];
		header("Location: index.php");
		exit();
	} else {
		$komunikat = "Wprowadzono zły login lub hasło.";
        if (isset($_SESSION['nieudane_logowanie'])) {
            $_SESSION['nieudane_logowanie'] ++;
        }
        else {
            $_SESSION['nieudane_logowanie'] = 0;
        }
        
        $_SESSION['ostatnie_logowanie'] = time();
        
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Logowanie</title>
        <meta charset="utf-8">
    </head>
    <body>
		<?php if(!empty($komunikat)): ?>
			<p style="font-weight: bold; color: red;"><?=$komunikat ?></p>
		<?php endif; ?>
		
        <form method="post" action="">
            <table>
                <tr>
                    <td>Login</td>
                    <td><input type="text" name="login" /></td>
                </tr>
                <tr>
                    <td>Hasło</td>
                    <td><input type="password" name="haslo" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="zaloguj" value="Zaloguj" /></td>
                </tr>
            </table>
        </form>
    </body>
</html>

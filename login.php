<?php
$pdo = new PDO('mysql:host=localhost;dbname=2guys4meme','root','');
$stmt = $pdo->query('SELECT * FROM uzytkownik');
$pom_login = $_POST['login'];
$pom_haslo = $_POST['password'];
$pom = 0;

while($row = $stmt->fetch()){
          if($row['login']==$pom_login && $row['haslo'] == $pom_haslo){
            session_start();
            $_SESSION["nazwa"] = $row['nazwa_uzytkownika'];
            $_SESSION["awatar"] = $row['awatar'];
            $_SESSION["id_uzytkownika"] = $row['id_uzytkownika'];
            if ($row['czy_admin'] == 1) {
              header('Location: admin_logged_page.php');
            }
            else {
              header('Location: logged_page.php');
            }
            $pom = 1;
          }
      }
      if ($pom == 0) {
        header('Location: guest_page.php');
        $_SESSION['error'] = "nieprawidlowy login lub hasło";
      }
 ?>

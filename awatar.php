<?php
$pdo = new PDO('mysql:host=localhost;dbname=2guys4meme','root','');
$stmt = $pdo->query('SELECT * FROM uzytkownik');
session_start();
$file = $_POST['file'];
$nazwa = $_SESSION['nazwa'];
if (!empty($_POST['file'])) {
  while ($row = $stmt->fetch()) {
    if ($row['nazwa_uzytkownika'] == $nazwa) {
        mysqli_query("UPDATE uzytkownik SET awatar=$file WHERE nazwa_uzytkownika LIKE '$nazwa'");
        $_SESSION['awatar'] = $file;
        header('Location: profil_page.php');
    }
  }
}
else {
  header('Location: profil_page.php');
}
 ?>

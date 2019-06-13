<?php
$pdo = new PDO('mysql:host=localhost;dbname=2guys4meme','root','');
$stmt = $pdo->query('SELECT * FROM uzytkownik');
session_start();
$file = $_POST['plik'];
$nazwa_mema = $_POST['nazwa_mema'];
$nazwa = $_SESSION['nazwa'];
$id_uzytkownika = $_SESSION['id_uzytkownika'];
$q= $pdo->query("SELECT czy_admin FROM uzytkownik WHERE id_uzytkownika LIKE $id_uzytkownika");
$admin = $q->fetchColumn();
if (!empty($_POST['plik']) && $nazwa != "") {
      $sql = "INSERT INTO mem (nazwa,obrazek,id_uzytkownika) VALUES ('$nazwa_mema','$file','$id_uzytkownika')";
      $pdo->query($sql);
      if ($admin == 1) {
        header('Location: admin_logged_page.php');
      }
      else {
        header('Location: logged_page.php');
      }
}
else {
  if ($admin == 1) {
    header('Location: admin_logged_page.php');
  }
  else {
    header('Location: logged_page.php');
  }
}
 ?>

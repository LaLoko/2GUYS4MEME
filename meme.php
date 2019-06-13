<?php
$pdo = new PDO('mysql:host=localhost;dbname=2guys4meme','root','');
session_start();
$stmt = $pdo->query('SELECT * FROM uzytkownik');
while ($row = $stmt->fetch()) {
  if ($row['nazwa_uzytkownika'] == $_SESSION['nazwa']) {
    $id = $row['id'];
  }
}
$stmt = $pdo->query('SELECT * FROM mem');
$file = $_POST['file'];
$meme = $_POST['nazwa_mema'];
$opis = $_POST['opis'];
$nazwa = $_SESSION['nazwa'];
if (isset($_POST['file']) && isset($_POST['nazwa_mema'])) {
  while ($row = $stmt->fetch()) {
    if ($row['id'] == $id) {
        $sql = "INSERT INTO mem (nazwa,opis,obrazek,id_uzytkownika) VALUES ($meme,$opis,$file,$id)";
        $pdo->exec($sql);
        header('Location: logged_page');
    }
  }
}
 ?>

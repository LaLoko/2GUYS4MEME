<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=2guys4meme','root','');
$tresc = $_POST['tresc'];
$id_mema = $_SESSION['id_mema'];
$nazwa_uzytkownika = $_SESSION['nazwa'];
$q= $pdo->query("SELECT id_uzytkownika FROM uzytkownik WHERE nazwa_uzytkownika LIKE '$nazwa_uzytkownika'");
$id_autora = $q->fetchColumn();
$q= $pdo->query("SELECT czy_admin FROM uzytkownik WHERE id_uzytkownika LIKE $id_autora");
$admin = $q->fetchColumn();
$pdo->query("INSERT INTO komentarz (id_mema,id_autora,tresc) VALUES ('$id_mema','$id_autora','$tresc')");
if ($admin == 1) {
  header('Location: admin_meme_page.php');
}
else {
  header('Location: logged_meme_page.php');
}
?>

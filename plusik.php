<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=2guys4meme','root','');
$id_mema = $_SESSION['id_mema'];
$ocena = $_SESSION['ocena'];
$pdo->query("UPDATE mem SET ocena=$ocena+1 WHERE id_mema LIKE '$id_mema'");
header('Location: guest_page.php');
 ?>                                                

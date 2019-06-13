<?php
$pdo = new PDO('mysql:host=localhost;dbname=2guys4meme','root','');
$stmt = $pdo->query('SELECT * FROM uzytkownik');
$login = $_POST['login'];
$uname = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$pass1 = $_POST['pass1'];
$pom = 0;
session_start();
if (isset($_POST['login']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['pass1'])) {
  if ($pass == $pass1) {
    if (filter_var($email,FILTER_VALIDATE_EMAIL) == true) {
      while($row = $stmt->fetch()){
        if($row['login']==$login && $row['nazwa_uzytkownika'] == $uname){
          $_SESSION["err"] = "konto o podanej nazwie użytkownika już istnieje";
          $pom = 1;
          header('Location: registration_page.php');
        }
      }
      if ($pom == 0) {
        header('Location: logged_page.php');
        $sql = "INSERT INTO uzytkownik (nazwa_uzytkownika,email,login,haslo) VALUES ('$uname','$email','$login','$pass')";
        $pdo->query($sql);
        $_SESSION["nazwa"] = $uname;
        $_SESSION["mess"] = "WITAMY PO LEPSZEJ STRONIE INTERNETU";
      }
    }
    else {
      $_SESSION["err"] = "nieprawidlowy adres email";
    }
  }
  else {
    $_SESSION["err"] = "podane hasła są różne";
    header('Location: registration_page.php');
  }
}
else {
  $_SESSION["err"] = "przed zatwierdzeniem rejsetracji wprowadź dane imbecylu";
  header('Location: registration_page.php');
}
?>

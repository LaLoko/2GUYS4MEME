<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=2guys4meme','root','');
$stmt = $pdo->query('SELECT * FROM mem WHERE zatwierdzony IS NOT NULL');
$maxik = $pdo->query('SELECT MAX(ocena) FROM mem WHERE zatwierdzony IS NOT NULL');
?>
<!DOCTYPE html>
<html lang="pl">
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="styles.css">
      <script src="madre_funkcje.js"></script>
      <title>TOPKA</title>
   </head>
   <body class="style" style="background-color:#333333">
      <div class="row" style="background-color:black;max-width:100%">
         <div class="col">
            <img class="float:left img-fluid" src="logo.png" alt="logo" style="padding-right:80px">
            <button onclick="go_to_guest_main()" type="button" class="btn btn-outline-warning btn-lg">GŁÓWNA</button>
            <button onclick="go_to_guest_top()" type="button" class="btn btn-outline-warning btn-lg">TOPKA</button>
         </div>
         <div>
           <form action="login.php" method="post">
             <input type="text" name="login" class="form-control" placeholder="Login" style="background-color:black;color:gold;border-color:gold">
             <input type="password" name="password" class="form-control"  placeholder="Hasło" style="background-color:black;color:gold;border-color:gold">
             <button type="submit" class="btn btn-outline-warning">ZALOGUJ</button>
             <?php if (isset($_SESSION['error'])) {
               echo $_SESSION['error'];
             } ?>
            <button onclick="register()" type="button" class="btn btn-outline-warning">REJESTRACJA</button>
         </div>
      </div>
      <div style="padding-top:20px">
        <?php
        while($row = $stmt->fetch()){
          if ($row['ocena'] > 0) {
            $id_mema = $row['id_mema'];
            $id_uzytkownika = $row['id_uzytkownika'];
            $q= $pdo->query("SELECT nazwa_uzytkownika FROM uzytkownik WHERE id_uzytkownika LIKE $id_uzytkownika");
            $nazwa_autora = $q->fetchColumn();
            $nazwa_mema = $row['nazwa'];
            $mem = $row['obrazek'];
            $ocena =$row['ocena'];
          echo "<div style='padding-bottom:20px'>";
          echo "<div class='card mx-auto' style='width:600px;background-color:black;color:gold'>";
          echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $mem ) .'" alt="meme" style="max-width:100%;max-height:100%">';
          echo "<div class='card-body'>";
          echo "<h4 class='card-title'>$nazwa_mema</h4>";
          echo "<h6 class='card-text'>$nazwa_autora</h6>";
          echo "<row>";
          echo "<form action='guest_meme_page.php' method='post'><input type='submit' value='KOMENTARZE' class='btn btn-outline-warning'></form>";
          echo "<form action='plusik.php' method='post'><input type='submit' value='+' class='btn btn-warning'></form>";
          echo "<a>$ocena</a>";
          echo "</row>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          }

      }
      ?>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
</html>

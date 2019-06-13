<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=2guys4meme','root','');
$stmt = $pdo->query('SELECT * FROM mem WHERE zatwierdzony IS NULL');

?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <script src="madre_funkcje.js"></script>
  <title>POCZEKALNIA</title>
</head>
<body class="style" style="background-color:#333333">
  <div class="row" style="background-color:black;max-width:100%">
    <div class="col">
      <img class="float:left img-fluid" src="logo.png" alt="logo" style="padding-right:80px">
      <button onclick="go_to_admin_main()" type="button" class="btn btn-outline-warning btn-lg">GŁÓWNA</button>
      <button onclick="go_to_admin_top()" type="button" class="btn btn-outline-warning btn-lg">TOPKA</button>
      <button onclick="go_to_poczekalnia()" type="button" class="btn btn-outline-warning btn-lg">POCZEKALNIA</button>
    </div>
    <div style="float:right">
      <div class="col">
        <img class="img-fluid" style="" src="" alt="">
      </div>
      <div class="col">
        <h4 style="color:gold">♠ <?php echo $_SESSION["nazwa"] ?> ♠</h4>
        <form action="logout.php" method="post"><input type="submit" class="btn btn-outline-warning btn-lg" value="WYLOGUJ SIE"></form>
      </div>
    </div>
  </div>
  <div style="padding-top:20px">
    <?php
    while($row = $stmt->fetch()){
      $id_mema = $row['id_mema'];
      $id_uzytkownika = $row['id_uzytkownika'];
      $q= $pdo->query("SELECT nazwa_uzytkownika FROM uzytkownik WHERE id_uzytkownika LIKE $id_uzytkownika");
      $nazwa_autora = $q->fetchColumn();
      $nazwa_mema = $row['nazwa'];
      $mem = $row['obrazek'];
      $ocena =$row['ocena'];
      $sql_zatwierdz = "UPDATE mem SET zatwierdzony=1 WHERE id_mema=$id_mema";
      $sql_usun = "DELETE FROM mem WHERE id_mema=$id_mema";
    echo "<div style='padding-bottom:20px'>";
    echo "<div class='card mx-auto' style='width:600px;background-color:black;color:gold'>";
    echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $mem ) .'" alt="meme" style="max-width:100%;max-height:100%">';
    echo "<div class='card-body'>";
    echo "<h4 class='card-title'>$nazwa_mema</h4>";
    echo "<h6 class='card-text'>$nazwa_autora</h6>";
    echo "<form method='post'>";
    echo "<input type='submit' name='add' id='add' value='DODAJ' class='btn btn-outline-warning'/>";
    echo "<input type='submit' name='del' id='del' value='USUN' class='btn btn-outline-warning'/><br/>";
    echo "</form>";
    if(array_key_exists('add',$_POST)){
    $pdo->query($sql_zatwierdz);          }
    if(array_key_exists('del',$_POST)){
      $pdo->query($sql_usun);          }
    echo "</div>";
    echo "</div>";
    echo "</div>";
  }
  ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
      </html>

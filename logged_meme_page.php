<?php session_start();
$pdo = new PDO('mysql:host=localhost;dbname=2guys4meme','root','');
$id_mema = $_SESSION['id_mema'];
$q= $pdo->query("SELECT id_uzytkownika FROM mem WHERE id_mema LIKE $id_mema");
$id_autora = $q->fetchColumn();
$q= $pdo->query("SELECT nazwa_uzytkownika FROM uzytkownik WHERE id_uzytkownika LIKE $id_autora");
$nazwa_autora = $q->fetchColumn();
$q= $pdo->query("SELECT nazwa FROM mem WHERE id_mema LIKE $id_mema");
$nazwa_mema = $q->fetchColumn();
$q= $pdo->query("SELECT obrazek FROM mem WHERE id_mema LIKE $id_mema");
$mem = $q->fetchColumn(); ?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <script src="madre_funkcje.js"></script>
  <title>strona glówna</title>
</head>
<body class="style" style="background-color:#333333">
  <div class="row" style="background-color:black;max-width:100%">
    <div class="col">
      <img class="float:left img-fluid" src="logo.png" alt="logo" style="padding-right:10px">
      <button onclick="go_to_logged_main()" type="button" class="btn btn-outline-warning btn-lg">GŁÓWNA</button>
      <button onclick="go_to_logged_top()" type="button" class="btn btn-outline-warning btn-lg">TOPKA</button>
    </div>
    <div class="col">
      <input type="file" class="form-control-file border" style="background-color:black;color:gold;border-color:gold">
      <input type="text" class="form-control" placeholder="NAZWA MEMA" style="background-color:black;color:gold;border-color:gold">
      <button onclick="" type="button" class="btn btn-outline-warning btn-lg">DODAJ MEMA</button>
    </div>
    <div class="row float-right">
      <img onclick="profil()" class="img-fluid" style="width:120px;height:120px" src="awatar.png" alt="awatar">
      <div class="col">
        <h4 style="color:gold"><?php echo $_SESSION["nazwa"] ?></h4>
        <form action="logout.php" method="post"><input type="submit" class="btn btn-outline-warning btn-lg" value="WYLOGUJ SIE"></form>
      </div>
    </div>
  </div>
  <div style="padding-top:20px">
    <div class="card mx-auto" style="width:600px;background-color:black;color:gold">
      <div class="col">
        <div class="row">
          <?php echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $mem ) .'" alt="meme" style="max-width:100%;max-height:100%">'; ?>
          <div class="card-body">
            <h4 class="card-title"><?php echo $nazwa_mema; ?></h4>
            <h6 class="card-text"><?php echo $nazwa_autora ?></h6>
            <form action="koment.php" method="post">
              <div class="input-group mb-3">
                <input type="text" class="form-control" aria-label="tresc-komentarza" aria-describedby="kom" name="tresc">
                <input type="hidden" name="id_mema" value="<?php $id_mema ?>">
                <div class="input-group-append">
                  <input class="btn btn-outline-secondary" type="submit" value="DODAJ KOMENTARZ" style="color:gold">
                </div>
              </div>
            </form>
          </div>
        </div>
        <?php
        $stmt = $pdo->query("SELECT * FROM komentarz WHERE id_mema=$id_mema");
        while($row = $stmt->fetch()){
          echo "<div class='row' style='padding-left:20px'>";
          $id_komentarza = $row['id_komentarza'];
          $q= $pdo->query("SELECT id_autora FROM komentarz WHERE id_komentarza LIKE $id_komentarza");
          $id_uzytkownika = $q->fetchColumn();
          $q= $pdo->query("SELECT nazwa_uzytkownika FROM uzytkownik WHERE id_uzytkownika LIKE $id_uzytkownika");
          $nazwa_uzytkownika = $q->fetchColumn();
          $q= $pdo->query("SELECT tresc FROM komentarz WHERE id_komentarza LIKE $id_komentarza");
          $tresc = $q->fetchColumn();
          echo "<h4>$nazwa_uzytkownika</h4>";
          echo "<p style='color:gold'>$tresc</p>";
          echo "</div>";
        }
        ?>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

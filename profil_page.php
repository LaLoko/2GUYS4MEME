<<?php session_start();
$pdo = new PDO('mysql:host=localhost;dbname=2guys4meme','root','');
$stmt = $pdo->query('SELECT * FROM mem');

$id_autora = $_SESSION['id_uzytkownika'];
$q= $pdo->query("SELECT id_mema FROM mem WHERE zatwierdzony IS NOT NULL AND id_uzytkownika LIKE $id_autora");
$id_mema = $q->fetchColumn();
$q= $pdo->query("SELECT nazwa_uzytkownika FROM uzytkownik WHERE id_uzytkownika LIKE $id_autora");
$nazwa_autora = $q->fetchColumn();
$q= $pdo->query("SELECT nazwa FROM mem WHERE id_mema LIKE $id_mema AND zatwierdzony IS NOT NULL");
$nazwa_mema = $q->fetchColumn();
$q= $pdo->query("SELECT obrazek FROM mem WHERE id_mema LIKE $id_mema AND zatwierdzony IS NOT NULL");
$mem = $q->fetchColumn();
?>
<!DOCTYPE html>
<html lang="pl">
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="styles.css">
      <script src="madre_funkcje.js"></script>
      <title>twój profil</title>
   </head>
   <body class="style" style="background-color:#333333">
      <div class="row" style="background-color:black;max-width:100%">
         <div class="col">
            <img class="float:left img-fluid" src="logo.png" alt="logo" style="padding-right:80px">
            <button onclick="go_to_logged_main()" type="button" class="btn btn-outline-warning btn-lg">GŁÓWNA</button>
            <button onclick="go_to_logged_top()" type="button" class="btn btn-outline-warning btn-lg">TOPKA</button>
         </div>
         <div class="row float-right" style="padding-right:5px">
           <?php echo '<img onclick="profil()" class="img-fluid" style="width:120px;height:120px" src="data:image/jpeg;base64,'.base64_encode( $_SESSION["awatar"] ) .'" alt="awatar">'?>
            <div class="col">
               <h4 style="color:gold"><?php echo $_SESSION["nazwa"]; ?></h4>
               <form action="logout.php" method="post"><input type="submit" class="btn btn-outline-warning btn-lg" value="WYLOGUJ SIE"></form>
            </div>
         </div>
      </div>
      <div style="padding-top:20px">
         <div class="card mx-auto" style="width:600px;background-color:black;color:gold">
            <div class="card-body">
               <h4 class="card-title"><?php echo $_SESSION["nazwa"]; ?></h4>
               <form action="awatar.php" method="post">
                 <input type="file" name="file" class="form-control-file border" style="background-color:black;color:gold;border-color:gold">
                 <button type="submit" class="btn btn-outline-warning btn-lg">ZMIEŃ AWATAR</button>
               </form>
            </div>
         </div>
      </div>
      <div style="padding-top:20px">
         <div class="card mx-auto" style="width:600px;background-color:black;color:gold">
            <div class="card-body">
               <h1 class="card-title text-center">TWOJE MEMY</h1>
            </div>
         </div>
      </div>
      <div style="padding-top:20px">
        <div style="padding-bottom:20px">
           <div class="card mx-auto" style="width:600px;background-color:black;color:gold">
             <?php echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $mem ) .'" alt="meme" style="max-width:100%;max-height:100%">'; ?>
              <div class="card-body">
                <h4 class="card-title"><?php  echo $nazwa_mema ?></h4>
                <h6 class="card-text"><?php  echo $nazwa_autora ?></h6>
                 <a onclick="go_to_meme_logged()" class="btn btn-outline-warning">KOMENTARZE</a>
              </div>
           </div>
        </div>
        <div style="padding-bottom:20px">
          <?php
          $id_autora = $_SESSION['id_uzytkownika'];
          $q= $pdo->query("SELECT nazwa_uzytkownika FROM uzytkownik WHERE id_uzytkownika LIKE $id_autora");
          $nazwa_autora = $q->fetchColumn();
          $q= $pdo->query("SELECT nazwa FROM mem WHERE id_mema > $id_mema AND zatwierdzony IS NOT NULL");
          $nazwa_mema = $q->fetchColumn();
          $q= $pdo->query("SELECT obrazek FROM mem WHERE id_mema > $id_mema AND zatwierdzony IS NOT NULL");
          $mem = $q->fetchColumn();
          $q= $pdo->query("SELECT opis FROM mem WHERE id_mema > $id_mema AND zatwierdzony IS NOT NULL");
          $opis = $q->fetchColumn();
          $q= $pdo->query("SELECT id_mema FROM mem WHERE id_mema > $id_mema AND zatwierdzony IS NOT NULL");
          $id_mema = $q->fetchColumn();
          ?>
           <div class="card mx-auto" style="width:600px;background-color:black;color:gold">
             <?php echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode( $mem ) .'" alt="meme" style="max-width:100%;max-height:100%">'; ?>
              <div class="card-body">
                <h4 class="card-title"><?php  echo $nazwa_mema ?></h4>
                <h6 class="card-text"><?php  echo $nazwa_autora ?></h6>
                 <a onclick="go_to_meme_logged()" class="btn btn-outline-warning">KOMENTARZE</a>
              </div>
           </div>
        </div>
         <div style="padding-bottom:20px">
            <div class="card mx-auto" style="width:600px;background-color:black;color:gold">
               <img class="card-img-top" src="" alt="" style="max-width:100%;max-height:100%">
               <div class="card-body">
                  <h4 class="card-title">nazwa mema</h4>
                  <h6 class="card-text">nazwa-autora</h6>
                  <p class="card-text">opis</p>
                  <a onclick="go_to_meme_logged()" href="#" class="btn btn-outline-warning">KOMENTARZE</a>
               </div>
            </div>
         </div>
         <div style="padding-bottom:20px">
            <div class="card mx-auto" style="width:600px;background-color:black;color:gold">
               <img class="card-img-top" src="" alt="" style="max-width:100%;max-height:100%">
               <div class="card-body">
                  <h4 class="card-title">nazwa mema</h4>
                  <h6 class="card-text">nazwa-autora</h6>
                  <p class="card-text">opis</p>
                  <a onclick="go_to_meme_logged()" href="#" class="btn btn-outline-warning">KOMENTARZE</a>
               </div>
            </div>
         </div>
         <div style="padding-bottom:20px">
            <div class="card mx-auto" style="width:600px;background-color:black;color:gold">
               <img class="card-img-top" src="" alt="" style="max-width:100%;max-height:100%">
               <div class="card-body">
                  <h4 class="card-title">nazwa mema</h4>
                  <h6 class="card-text">nazwa-autora</h6>
                  <p class="card-text">opis</p>
                  <a onclick="go_to_meme_logged()" href="#" class="btn btn-outline-warning">KOMENTARZE</a>
               </div>
            </div>
         </div>
         <div style="padding-bottom:20px">
            <div class="card mx-auto" style="width:600px;background-color:black;color:gold">
               <img class="card-img-top" src="" alt="" style="max-width:100%;max-height:100%">
               <div class="card-body">
                  <h4 class="card-title">nazwa mema</h4>
                  <h6 class="card-text">nazwa-autora</h6>
                  <p class="card-text">opis</p>
                  <a onclick="go_to_meme_logged()" href="#" class="btn btn-outline-warning">KOMENTARZE</a>
               </div>
            </div>
         </div>
      </div>
      <div style="padding-bottom:20px">
         <div class="card mx-auto" style="width:600px;background-color:black;color:gold">
            <img class="card-img-top" src="" alt="" style="max-width:100%;max-height:100%">
            <div class="card-body">
               <h4 class="card-title">nazwa mema</h4>
               <h6 class="card-text">nazwa-autora</h6>
               <p class="card-text">opis</p>
               <a onclick="go_to_meme_logged()" href="#" class="btn btn-outline-warning">KOMENTARZE</a>
            </div>
         </div>
      </div>
      <div style="padding-bottom:20px">
         <div class="card mx-auto" style="width:600px;background-color:black;color:gold">
            <img class="card-img-top" src="" alt="" style="max-width:100%;max-height:100%">
            <div class="card-body">
               <h4 class="card-title">nazwa mema</h4>
               <h6 class="card-text">nazwa-autora</h6>
               <p class="card-text">opis</p>
               <a onclick="go_to_meme_logged()" href="#" class="btn btn-outline-warning">KOMENTARZE</a>
            </div>
         </div>
      </div>
      </div>
      <footer style="padding-top:20px">
         <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
               <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous" style="color:gold;background-color:black;border-color:gold">
                  <span aria-hidden="true">&laquo;</span>
                  </a>
               </li>
               <li class="page-item"><a class="page-link" href="#" style="color:gold;background-color:black;border-color:gold">1</a></li>
               <li class="page-item"><a class="page-link" href="#" style="color:gold;background-color:black;border-color:gold">2</a></li>
               <li class="page-item"><a class="page-link" href="#" style="color:gold;background-color:black;border-color:gold">3</a></li>
               <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next" style="color:gold;background-color:black;border-color:gold">
                  <span aria-hidden="true">&raquo;</span>
                  </a>
               </li>
            </ul>
         </nav>
      </footer>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
</html>

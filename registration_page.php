<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="stylesheet" href="styles.css">
      <script src="madre_funkcje.js"></script>
      <title>REJESTRACJA</title>
   </head>
   <body class="style" style="background-color:#333333">
      <div class="row" style="background-color:black;max-width:100%">
         <div class="col">
            <img class="float:left img-fluid" src="logo.png" alt="logo" style="padding-right:80px">
            <button onclick="go_to_guest_main()" type="button" class="btn btn-outline-warning btn-lg">GŁÓWNA</button>
            <button onclick="go_to_guest_top()" type="button" class="btn btn-outline-warning btn-lg">TOPKA</button>
         </div>
      </div>
      <div style="padding-top:60px">
         <div class="card mx-auto" style="width:600px;background-color:black;color:gold">
            <div class="card-body">
              <form action="register.php" method="post">
               <input type="text" name="login" class="form-control" placeholder="Login" style="background-color:black;color:gold;border-color:gold;border-color:gold">
               <input type="text" name="username" class="form-control"  placeholder="Nazwa użytkownika" style="background-color:black;color:gold;border-color:gold">
               <input type="email" name="email" class="form-control"  placeholder="Email" style="background-color:black;color:gold;border-color:gold">
               <input type="password" name="pass" class="form-control"  placeholder="Hasło" style="background-color:black;color:gold;border-color:gold">
               <input type="password" name="pass1" class="form-control"  placeholder="Powtórz Hasło" style="background-color:black;color:gold;border-color:gold">
               <input type="sumbmit" class="btn btn-outline-warning" value="ZALÓŻ KONTO">
               <?php if (isset($_SESSION["err"])) {
                 echo $_SESSION["err"];
               } ?>
             </form>
            </div>
         </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   </body>
</html>

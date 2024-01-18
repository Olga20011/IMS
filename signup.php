<?php
require_once("lib/Database.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/signup.css">

  </head>
  <body>
  <script src="https://kit.fontawesome.com/d94c698a0b.js" crossorigin="anonymous"></script>
  
  <div id="form">
   <h1 id="heading">SignUp Form</h1>
   <br>
    <form name="form" action="./auth/Signup.php" method="POST">
        <i class="fa-solid fa-user"></i>
        <input type="text" id="user" name="user" placeholder="Enter Username " required> <br><br>
        <i class="fa-solid fa-envelope"></i>
        <input type="email" id="email" name="email" placeholder="Enter Email " required> <br><br>
        <i class="fa-solid fa-lock"></i>
        <input type="password" id="pass" name="pass" placeholder="Create Password " required> <br><br>
        <i class="fa-solid fa-lock"></i>
        <input type="password" id="cpass" name="cpass" placeholder="Retype Password " required> <br><br>
        <input type="submit" name="submit" id="btn" value="REGISTER">
        <br><br>
        <b><P>I already have an account <a href="login.php">LOGIN</a></P></b>

    </form>

   </div>
  </body>
</html>
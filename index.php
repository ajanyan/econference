<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Econference | Login</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/flex-grid.css">
    <style>
      a {
        color: white;
      }
    </style>
  </head>
  <body>

<?php 
    session_start();
    if(isset($_SESSION["user"]))
    {
        header("location:php/autologin.php");
    }
?>
    




    
    <div class="container">
      <nav class="navbar">
        <div class="navbar-brand hide-down-md">
          NSS College of Engineering Econference System <!-- Seen in Desktop -->
        </div>
        <div class="navbar-brand hide-up-md">
          NSS College of Engineering <br/> Econference System <!-- Seen in Mobile Devices -->
        </div>
        <ul class="nav-links">
          <li><a href="index.php">Login</a></li>
          <li><a href="design-team.html">Design Team</a></li>
        </ul>
      </nav>
      <form action="php/login.php" id="loginForm" method="post">
        <h4 class="title"><i class="material-icons">&#xE879;</i>Login</h4>
        <div class="form-body">
          <div class="input-grp">
            <label for="email">Email</label>
            <input type="email" class="input-txt" name="email" placeholder="johndoe@example.com">
          </div>
          <div class="input-grp">
            <label for="password">Password</label>
            <input type="password" class="input-txt" name="password" placeholder='&#9900;&#9900;&#9900;&#9900;&#9900;&#9900;'>
          </div>
          <button class="btn-login">Login</button>
        </div>
      </form>

      <footer>
        <div class="footer-content">
          <span class="strong">Developed as part of Design Project</span>
          <a href="http://www.NSS College of Engineering.ac.in/dep_cs/" class="light">(Department of CSE, NSS College of Engineering)</a>
        </div>
        <div class="copyright">
          Copyright &copy; 2018-19 <a href="http://www.NSS College of Engineering.ac.in/dep_cs/">NSS College of Engineering, Palakkad</a>
        </div>
      </footer>
    </div>
  </body>
</html>

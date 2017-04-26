<?php
require("database/session.php");
?>
<html>
<head>
  <meta http-equiv="Content-type; content=charset=iso-8859-2" />
  <meta name="Author" content="GeekTeam" />
  <link rel="Shortcut icon" href="image/ind.jpg" />
  <title>Wysył(p)aczek.pl</title>
  <link rel="Stylesheet" type="text/css" href="css/main.css" />

</head>
<body link="#52FF01" vlink="#37AD00" alink="#6AFDBB">
<div id='body'>
  
  <div id='header'>
    <center>
      <a href='index.php'>
        <img src='image/logo.jpg'>
      </a>
    </center>
  </div>
  
  <div id='srodek'>
    
    <div id='menu'>
      <?php
        include ("include/menu.php");
      ?>
      
      <div id='log'>
        <?php
          include ("include/log.php");
        ?>
      </div>
      
    </div>
    
    <div id='main'>
      <?php
        include ("include/main.php");
      ?>
    </div>
    
  </div>
  
</div>
  
<div id='footer'>
  <center>
    Strona zrealizowana dla <i>przesył(p)aczek.pl</i> przez <a href='lul.php'>The Facebrakers</a>.
  </center>
</div>

</body>
</html>
<?php
if (!isset($_SESSION["zalogowany"])){

  echo ("
    <form method='post' action='index.php?opcje=log'>
    Login:<br />
    <input type='text' name='login'><br />
    Hasło:<br />
    <input type='password' name='pass'><br />
    <center>
    <input type='submit' value=' Loguj '>
    </center>
    </form>
    <a href='index.php?opcje=register'>Nie masz konta?</a>
  ");

}else if(isset($_SESSION["zalogowany"])){

  if($_SESSION["zalogowany"] != "admin"){
    $rzam=3;
    $ozam=2;
    $zzam=1;
    
    echo ("Witaj ".$_SESSION["zalogowany"]."<br />");
    echo ("Realizowane zamówienia: ".$rzam."<br />");
    echo ("Oczekujące zamówienia: ".$ozam."<br />");
    echo ("Zrealizowane zamówienia: ".$zzam."<br />");
    echo ("<br /><a href='index.php?opcje=user'>Panel Użytkownika</a><br />");
    echo ("<a href='index.php?opcje=wylog'>Wyloguj</a> mnie.");
  
  }else if ($_SESSION["zalogowany"]=="admin"){
  
    echo ("Witaj ".$_SESSION["zalogowany"].".<br />");
    echo("<a href='index.php?opcje=admin&admin=index'>Panel Admina.<br />");
    echo ("<br /><br /> ");
    echo ("<br /><a href='index.php?opcje=wylog'>Wyloguj</a> mnie.");
  
  }
}

?>
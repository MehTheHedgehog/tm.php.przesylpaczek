<?php
include_once ("database/users.php");

$users = new User;

if(!isset($_GET["reg"])){
  $_GET["reg"] = "index";
}else{
  if ($_GET["reg"]!="index" && $_GET["reg"]!="ok")
  {
    $_GET["reg"]="index";
  }
}


//formularz rejestracyjny

if ($_GET["reg"]=="index")
  {
    echo ("
      <form method='post' action='index.php?opcje=register&reg=ok'>
      Witaj na stronie rejestracji.<br />
      
      Podaj swój:<br /><br />
      
      - Login<br />
      <input type='text' name='log'><br />
      
      - Hasło<br />
      <input type='password' name='pass'><br />
      
      <input type='submit' value='REJESTRUJ MNIE!'>
    ");
  }

  //rejestracja użytkownika

if ($_GET["reg"]=="ok")
{
    if(!$users->search($_POST['log'])){
      if($users->add($_POST['log'], $_POST['pass'])){
        echo ("Udało ci się pomyślnie zarejestrować");
      }else{
        echo ("Nie udało się zarejestrować!");
      }
    }else{
        echo ("Już istnieje użytkownik o podanym loginie.<br />");
        echo ("Wybierz inny.<br />");
        echo ("<a href='javascript:history.back()'>Wróć do Formularza.</a>");
    }
}


?>
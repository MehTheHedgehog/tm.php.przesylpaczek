<?php
  require("database/users.php");

//sprawdzenie czy wszystkie dane zostały wprowadzone do formularza.

if (isset($_POST['login']) && isset($_POST['pass']))
{

  //mechanizm logowania
  $users = new User;

  if($users->login($_POST['login'], $_POST['pass'])){
    echo ("Logowanie przebiegło pomyślnie.");
    $_SESSION["zalogowany"] = $_POST['login'];
    header('Refresh: 5; URL=./index.php');
  }else{
    echo ("Login lub Hasło są nieprawidłowe.");
  }
  
}else{
  echo ('Wpisz login i hasło');
}

?>
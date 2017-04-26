<?php
require("./database/paczki.php");
require("./database/users.php");




if(isset($_SESSION["zalogowany"])){
  if ($_SESSION["zalogowany"]=="admin")
  {


    switch ($_GET['admin'])
      {
        
        case 'paczki':
          $packs = new Paczki;
          
          echo ("Paczki nadane przez użytkowników:<br />");
          $packsarray = $packs->all();
          foreach($packsarray as $rows)
            {
              echo (
                  "Numer Identyfikacyjny: ".$rows[0]."<br />"
                 ."Kto nadał: ".$rows[1]."<br />"
                 ."Gdzie:<br />"
                 ."Adres: ".$rows[2]."<br />"
                 ."Miasto: ".$rows[3]."<br />"
                 ."Kraj: ".$rows[4]."<br />"
                 ."<br /><br /><br />"
                  );
            }

          
          break;

        case 'users':
          $users = new User;
          
          echo ("Paczki nadane przez użytkowników:<br />");
          $usersarray = $users->all();
          foreach($usersarray as $rows)
            {
              echo (
                  "Użytkownik: ".$rows[0]."<br />"
                 ."<br />"
                  );
            }

            break;
        
        default:
          echo ("<center>");
          echo ("Witaj ".$_SESSION["zalogowany"]."<br /><br />");
          echo ("Co zamierzas zrobić?<br />");
          echo ("<a href='index.php?opcje=admin&admin=paczki'>Zobacz paczki.</a><br />");
          echo ("<a href='index.php?opcje=admin&admin=users'>Zobacz użytkowników portalu.</a><br />");
          echo ("</center>");

          break;
      }
  }
  
else if ($_SESSION["zalogowany"]!="admin")
  {
    echo ("<center>
      Czego tu szukasz nie będąc Adminem tej strony???
      </center>");
  }
}


?>
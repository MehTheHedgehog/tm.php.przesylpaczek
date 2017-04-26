<?php
require("./database/paczki.php");

$packs = new Paczki;

if (isset($_SESSION['zalogowany']))
{
  if(!isset($_GET['paczka']))
    $_GET['paczka'] = 'paczki';  

    switch ($_GET['paczka']){
      case 'wyslij':

        if(!isset($_GET['wyslij']))
          $_GET['wyslij'] = '';
        
        switch ($_GET['wyslij'])
        {
          case 'ok':
            
            if (isset($_POST['do_ulica']) && isset($_POST['do_miasto']) && isset($_POST['do_kraj']))
            {
                $pack = $packs->add($_SESSION['zalogowany'], $_POST['do_ulica'], $_POST['do_miasto'],$_POST['do_kraj']);
                if(NULL != $pack){
                  echo(
                      "Oto unikatowy kod dla twojej paczki, dzięki niemu będziesz mógł wiedzieć co się z nią dzieje:<br />"
                      .$pack[0]
                      ."<br /><br />"
                      ."Dane na które paczka ma zostać wysłana:<br />"
                      ."Adres: ".$pack[3]."<br />"
                      ."Miasto: ".$pack[4]."<br />"
                      ."Kraj: ".$pack[5]."<br />"
                      );
                }else{
                  echo ("Błąd przy wprowadzaniu paczki!<br />");
                }
            }
            else{
                echo ("Nie wszystkie dane zostały wprowadzone<br />");
            }
            
            break;
          
          default:
            echo (
                  "<form action='index.php?opcje=paczka&paczka=wyslij&wyslij=ok' method='post'>"
                  ."Do kogo wysyłasz paczkę?<br /><br />"
                  ."Adres: <input type='text' name='do_ulica'><br />"
                  ."Miasto: <input type='text' name='do_miasto'><br />"
                  ."Kraj: <input type='text' name='do_kraj'><br />"
                  ."<input type='submit' value=' Wyślij '>"
                  ."</form>"
                );
            
            break;
        }
        
        break;
      
      case 'paczki':
      default:

        echo ("Twoje paczki:<br />");
        
        $packarray = $packs->search_by_name($_SESSION['zalogowany']);
        if(NULL != $packarray){
          foreach($packarray as $pack){
            echo ("Numer Identyfikacyjny: ".$pack[0]."<br />");
          }
        }
        
        
        break;
      
    }
  }
  
else
  {
    echo("Najpierw się zaloguj.");
  }

?>
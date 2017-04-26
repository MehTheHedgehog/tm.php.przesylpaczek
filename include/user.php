<?php

if (isset($_SESSION["zalogowany"]))
  {
    if(!isset($_GET['user']))
      $_GET['user'] = 'panel';

    switch ($_GET['user'])
      {
        case 'panel':
        echo(
          '<li><a href="index.php?opcje=paczka">Paczki</a></li>
          <li><a href="index.php?opcje=user&user=mail">Powiadom Administratora</a></li>
          <li><a href="index.php?opcje=paczka&paczka=wyslij">Wyślij Paczkę</a></li>'
          );

          break;       
        case 'mail':
          
          if(!isset($_GET['ok']))
            $_GET['ok'] = '';

          switch ($_GET['ok'])
            {
              case 'ok':
               	$adresat = 'styropian666@2gmail.com';
                @$content = $_POST['content'];
                $topic = $_POST['topic'];
                $header = "From: no-replay@przesylpaczek.pl"
                         ."Content-Type:"
                         ." text/plain;charset='utf-8'"
                         ."\nContent-Transfer-Encoding: 8bit";
                  
                  if (mail ($adresat, $topic, $content, $header))
                    {
                      echo (
                          "Mail został wysłany."
                         ."Wróć na <a href='index.php'>Stronę Główną</a>"
                          );
                    }
                  else
                    {
                      echo ("Mail nie został wysłany.");
                    }
                
                break;
                
              default:
                echo (
                  "<form action='index.php?opcje=user&user=mail&ok=ok' method='post'>"
                 ."Temat:<br />"
                 ."<select>"
                 ."<option>Zagineła Paczka</option>"
                 ."<option>Płatności</option>"
                 ."<option>Kurier</option>"
                 ."<option>Pytania o Firmie</option>"
                 ."<option>Inne</option>"
                 ."</select>"
                 ."<br />"
                 ."Treść Mail'a:<br />"
                 ."<textarea name='content' cols='30' rows='6'></textarea><br />"
                 ."<input type='submit' value=' Wyślij ' />"
                 ."</form>"
                  );
                
                
                break;
                
            }

          break;

      }
  }
  
else 
  {
    echo (
     "Nie jesteś zalogowany.<br />"
    ."Zaloguj się aby mieć dostęp do tej części serwisu."
        );
  }
?>
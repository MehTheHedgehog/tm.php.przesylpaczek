<?php
session_start();

if (isset ($_SESSION['zalogowany']))
  {
    $now = time();
    $regtime=300; 
    $regReq=35;
    $endtime=1200;

    if (!isset($_SESSION['started']))
      {
        session_regenerate_id(true);
        $_SESSION['started'] = true;
        $_SESSION['time'] = $now;
        $_SESSION['req'] = 1;
      }

    else
      {
        $_SESSION['req']++;

        // regeneracja sesji po określonym czasie

        if (isset($_SESSION['time']) && ((int)$_SESSION['time'] + $regtime < $now))
          {
            session_regenerate_id(true);
            $_SESSION['time'] = $now;
          }

        // regeneracja sesji po określonej liczbie żądań

        if (isset($_SESSION['req']) && ((int)$_SESSION['req'] > $regReq))
          {
            session_regenerate_id(true);
            $_SESSION['req'] = 1;
          }
    }
  
    if (!isset ($_SESSION['sestime'])) 
      {
        $_SESSION['sestime']=$now; 
      }
    else if (($_SESSION['sestime'] + $endtime) > $now)
      {
        $_SESSION['sestime']=$now;
      }
    else if (($_SESSION['sestime'] + $endtime) < $now)
      {
        session_destroy();
      }
      
    if(isset($_GET["opcje"]))
      if ($_GET["opcje"]=="wylog")
      {
        session_destroy();
      }
  }
?>
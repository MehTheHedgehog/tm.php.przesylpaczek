<?php

if(isset($_GET["opcje"])){
  
  switch ($_GET["opcje"])
  {
    case 'auto':
      include("evaluation/moto.php");
      
      break;
      
    case 'register':
      include("register.php");
      
      break;
      
    case 'log':
      include("login.php");
      
      break;
      
    case 'wylog':
      include ("evaluation/logout.php");
      
      break;
      
    case 'admin':
      include ("admin.php");
      
      break;
      
    case 'user':
      include ("user.php");
      
      break;
    
    case 'uslugi':
      include ("uslugi.php");
      
      break;
      
    case 'paczka':
      include ("paczka.php");
      
      break;
    
    default:
      include("evaluation/index.php");
      
      break;
  
  }

}else{
  include("evaluation/index.php");
}

?>
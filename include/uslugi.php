<?php

if(isset($_GET['uslugi'])){
  switch ($_GET['uslugi'])
  {
    case 'cennik':
      include ('evaluation/cennik.php');
      
      break;
      
    case 'zasieg':
      include ('evaluation/zasieg.php');
      
      break;
    
    case 'kontakt':
      include ('evaluation/kontakt.php');
      
      break;
    
    default:
      include ('evaluation/uslugi.php');
      
      break;
  }

}else{
  include ('evaluation/uslugi.php');
}
?>
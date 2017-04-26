<?php

$query=mysql_query('SELECT * FROM auto');

while($rows=mysql_fetch_array($query))
  {
    echo(
           "<table border='2'>"
          ."<tr>"
          ."<th>MARKA</th> <td>".$rows['marka']."</td>"
          ."</tr>"
          ."<tr>"
          ."<th>MODEL</th> <td>".$rows['model']."</td>"
          ."</tr>"
          ."<tr>"
          ."<th>ROCZNIK</th> <td>".$rows['rocznik']."</td>"
          ."</tr>"
          ."<tr>"
          ."<th>NUMER EWIDENCYJNY</th> <td>".$rows['num_ewid']."</td>"
          ."</tr>"
          ."<tr>"
          ."<th>TRASA</th> <td>".$rows['trasa']."</td>"
          ."</tr>"
          ."</table>"
          ."<br /><br />"
        );
  }
?>
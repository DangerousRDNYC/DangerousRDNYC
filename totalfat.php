<?php
session_start();
$q=$_POST["q"];
$accidentType2=$_POST["accidentType2"];


switch ($accidentType2) {

case "BICYCLING":
$con = mysql_connect('dangerousroadsnyccom.ipowermysql.com','dangerousrd','dangerousrd123');

   if (!$con)
   {
     die('Could not connect: ' . mysql_error());
   }

   mysql_select_db('accidentdata', $con);
 
 $sql = "SELECT sum(Binjured), sum(Bkilled) \n"
        . "FROM `table 1`\n"
        . "Where " . $q . "\n";
   
       $result = mysql_query($sql);

      while($row = mysql_fetch_array($result))
      {
       $injuries = $row['sum(Binjured)'];
       $killed = $row['sum(Bkilled)'];
      }
      mysql_close($con);
      echo $killed;

break; 

case "DRIVING":
$con = mysql_connect('dangerousroadsnyccom.ipowermysql.com','dangerousrd','dangerousrd123');

   if (!$con)
   {
     die('Could not connect: ' . mysql_error());
   }

   mysql_select_db('accidentdata', $con);
 
 $sql = "SELECT sum(Cinjured), sum(Ckilled) \n"
        . "FROM `table 1`\n"
        . "Where " . $q . "\n";
   
       $result = mysql_query($sql);

      while($row = mysql_fetch_array($result))
      {
       $injuries = $row['sum(Cinjured)'];
       $killed = $row['sum(Ckilled)'];
      }
      mysql_close($con);
      echo $killed;

break; 

case "WALKING":
$con = mysql_connect('dangerousroadsnyccom.ipowermysql.com','dangerousrd','dangerousrd123');

   if (!$con)
   {
     die('Could not connect: ' . mysql_error());
   }

   mysql_select_db('accidentdata', $con);
 
 $sql = "SELECT sum(PedInj), sum(PedKilled) \n"
        . "FROM `table 1`\n"
        . "Where " . $q . "\n";
   
       $result = mysql_query($sql);

      while($row = mysql_fetch_array($result))
      {
       $injuries = $row['sum(PedInj)'];
       $killed = $row['sum(PedKilled)'];
      }
      mysql_close($con);
      echo $killed;
break; 

}
 
$_SESSION['killed'] = $killed; 
?>

 
  
 
  

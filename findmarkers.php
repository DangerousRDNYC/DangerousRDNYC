<?php
session_start();
$q=$_POST["q"];
$rank=$_POST["rank"];
$accidentType2=$_POST["accidentType2"];

switch ($accidentType2) {

case "BICYCLING":
$con = mysql_connect('dangerousroadsnyccom.ipowermysql.com','dangerousrd','dangerousrd123');

   if (!$con)
   {
     die('Could not connect: ' . mysql_error());
   }

   mysql_select_db('accidentdata', $con);
 
  $sql = "SELECT `Lattitude` , `Longitude` , `Binjured`, `Bkilled` ,`TotalB` \n"
         . "FROM `table 1`\n"
         . "Where " . $q . "\n"
         . "ORDER BY `table 1`.`TotalB` DESC\n"
         . "Limit " . $rank;
      

$result = mysql_query($sql);

$i = "0";
while($row = mysql_fetch_array($result))
       {
        $latlng = "new GLatLng(" . $row['Lattitude'] . "," . $row['Longitude'] . ")"; 
         echo "createMarker2(" . $i . "," . $row['Binjured'] . "," . $row['Lattitude'] . "," . $row['Longitude'] . "," . $row['Bkilled'] . ")\n"; 
        
       $i++; 
         }	
  	


mysql_close($con);
break; 

case "DRIVING":
$con = mysql_connect('dangerousroadsnyccom.ipowermysql.com','dangerousrd','dangerousrd123');

   if (!$con)
   {
     die('Could not connect: ' . mysql_error());
   }

   mysql_select_db('accidentdata', $con);
 
  $sql = "SELECT `Lattitude` , `Longitude` , `Cinjured`, `Ckilled` ,`Ctotal` \n"
         . "FROM `table 1`\n"
         . "Where " . $q . "\n"
         . "ORDER BY `table 1`.`Ctotal` DESC\n"
         . "Limit " . $rank;
      

$result = mysql_query($sql);

$i = "0";
while($row = mysql_fetch_array($result))
       {
        $latlng = "new GLatLng(" . $row['Lattitude'] . "," . $row['Longitude'] . ")"; 
         echo "createMarker2(" . $i . "," . $row['Cinjured'] . "," . $row['Lattitude'] . "," . $row['Longitude'] . "," . $row['Ckilled'] . ")\n"; 
        
       $i++; 
         }	
  	


mysql_close($con);
break; 

case "WALKING":
$con = mysql_connect('dangerousroadsnyccom.ipowermysql.com','dangerousrd','dangerousrd123');

   if (!$con)
   {
     die('Could not connect: ' . mysql_error());
   }

   mysql_select_db('accidentdata', $con);
 
  $sql = "SELECT `Lattitude` , `Longitude` , `PedInj`, `PedKilled` ,`PedTotal` \n"
         . "FROM `table 1`\n"
         . "Where " . $q . "\n"
         . "ORDER BY `table 1`.`PedTotal` DESC\n"
         . "Limit " . $rank;
      

$result = mysql_query($sql);

$i = "0";
while($row = mysql_fetch_array($result))
       {
        $latlng = "new GLatLng(" . $row['Lattitude'] . "," . $row['Longitude'] . ")"; 
         echo "createMarker2(" . $i . "," . $row['PedInj'] . "," . $row['Lattitude'] . "," . $row['Longitude'] . "," . $row['PedKilled'] . ")\n"; 
        
       $i++; 
         }	
  	


mysql_close($con);
break; 
}
$_SESSION['q'] = $q;
?>

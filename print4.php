<html>
<head>
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>


<script>

var textAdress;
var map;



<?php  session_start();?>

function initialize()
{


var cityCircle;

  var mapOptions = {
    zoom:14,
    center: new google.maps.LatLng(<?php echo $_SESSION['lat3']; ?>,<?php echo $_SESSION['long3']; ?>),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
   };
 
 var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

 

  

<?php
$neigh = "No Report Available This Month in this neighborhood"; 
$counter = "0";   
$rank="5";
$accidentType=$_SESSION['aType3'];

switch ($accidentType) {

case "Bicycle":
$con = mysql_connect('dangerousroadsnyccom.ipowermysql.com','dangerousrd','dangerousrd123');

   if (!$con)
   {
     die('Could not connect: ' . mysql_error());
   }

   mysql_select_db('accidentdata', $con);
 
$sql = "SELECT `Neighborhood_ID` , `month` , `Neighborhood`,  `lat` ,  `lon` ,  `cyclists_injured` ,  `cyclists_killed` ,  `bike_total` \n"
         . "FROM `collisions`\n"
         . "Where `Neighborhood_ID` = " . $_SESSION['NeighborhoodID'] . " AND `bike_total` >0\n"
         . "ORDER BY `collisions`.`bike_total` DESC\n"
         . "Limit " . $_SESSION['rank3'];
        $result = mysql_query	($sql);
      

$result = mysql_query($sql);

$i = "0";
while($row = mysql_fetch_array($result))
       {
  echo "createMarker2(" . "map" . "," . $i . "," . $row['cyclists_injured'] . "," . $row['lat'] . "," . $row['lon'] . "," . $row['cyclists_killed'] . ")\n"; 
        
 
       ${'laty'.$i}=$row['lat']; 
       ${'longy'.$i}=$row['lon']; 
       $i++;
$counter = $i;   
$neigh = $row['Neighborhood'];
     }	
  	


mysql_close($con);
break; 

case "Car":
$con = mysql_connect('dangerousroadsnyccom.ipowermysql.com','dangerousrd','dangerousrd123');

   if (!$con)
   {
     die('Could not connect: ' . mysql_error());
   }

   mysql_select_db('accidentdata', $con);
 
  $sql = "SELECT `Neighborhood_ID` , `month` , `Neighborhood`, `lat` ,  `lon` ,  `c_injured` ,  `c_killed` ,  `c_total` \n"
         . "FROM `collisions`\n"
         . "Where `Neighborhood_ID` = " . $_SESSION['NeighborhoodID'] . " AND `c_total` >0\n"
         . "ORDER BY `collisions`.`c_total` DESC\n"
         . "Limit " . $_SESSION['rank3'];
        $result = mysql_query	($sql);
      

$result = mysql_query($sql);

$i = "0";
while($row = mysql_fetch_array($result))
       {
       echo "createMarker2(" . "map" . "," . $i . "," . $row['c_injured'] . "," . $row['lat'] . "," . $row['lon'] . "," . $row['c_killed'] . ")\n"; 
       ${'laty'.$i}=$row['lat']; 
       ${'longy'.$i}=$row['lon']; 
       $i++; 
$counter = $i;      
$neigh = $row['Neighborhood']; 
     }	
  	


mysql_close($con);
break; 

case "Pedestrian":
$con = mysql_connect('dangerousroadsnyccom.ipowermysql.com','dangerousrd','dangerousrd123');

   if (!$con)
   {
     die('Could not connect: ' . mysql_error());
   }

   mysql_select_db('accidentdata', $con);
 
  $sql = "SELECT `Neighborhood_ID` , `month` , `Neighborhood`,  `lat` ,  `lon` ,  `pedestr_injured` ,  `pedestr_killed` ,  `ped_total` \n"
         . "FROM `collisions`\n"
         . "Where `Neighborhood_ID` = " . $_SESSION['NeighborhoodID'] . " AND `ped_total` >0\n"
         . "ORDER BY `collisions`.`ped_total` DESC\n"
         . "Limit " . $_SESSION['rank3'];
        $result = mysql_query	($sql);
      

$result = mysql_query($sql);

$i = "0";
while($row = mysql_fetch_array($result))
       {
      echo "createMarker2(" . "map" . "," . $i . "," . $row['pedestr_injured'] . "," . $row['lat'] . "," . $row['lon'] . "," . $row['pedestr_killed'] . ")\n"; 
       ${'laty'.$i}=$row['lat']; 
       ${'longy'.$i}=$row['lon'];
       $i++; 
       $counter = $i;
      $neigh = $row['Neighborhood'];
      }	
  	


mysql_close($con);
break; 
}



?>


}



 
google.maps.event.addDomListener(window, 'load', initialize);



function createMarker2(map, index, injuries, lat, long, fatalities) {
var geocoder;
geocoder = new google.maps.Geocoder();

var latlng = new google.maps.LatLng(lat, long);
  geocoder.geocode({'latLng': latlng}, function(results, status) {
 
textAddress = results[0].formatted_address;

switch(index)
{
case 0:
document.getElementById('Ad1').innerHTML=textAddress;

break;

case 1:
document.getElementById('Ad2').innerHTML=textAddress;
break;

case 2:
document.getElementById('Ad3').innerHTML=textAddress;
break;

case 3:
document.getElementById('Ad4').innerHTML=textAddress;
break;

case 4:
document.getElementById('Ad5').innerHTML=textAddress;
break;

}




});
if (fatalities < 1)
{
switch(index)
{
case 0:
var image = "accident0.png";

break;

case 1:
var image = "accident1.png";
break;

case 2:
var image = "accident2.png";
break;

case 3:
var image = "accident3.png";
break;

case 4:
var image = "accident4.png";
break;

}
}
else
{
switch(index)
{
case 0:
var image = "death0.png";

break;

case 1:
var image = "death1.png";
break;

case 2:
var image = "death2.png";
break;

case 3:
var image = "death3.png";
break;

case 4:
var image = "death4.png";
break;

}
}
  var myLatLng = new google.maps.LatLng(lat, long);




  var beachMarker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: image
  });
     
   beachMarker.setMap(map);


}








</script>
</head>
<body>

<table>
<tr>

<td>
<div id="infoBox" style="width:350px;height:330px;padding:8px"> 
<h2><u>Neighborhood </u><br><?php echo $neigh   ?> </h2>
<h2><u>Month </u><br>April, 2014</h2>
<h2><u>Injuries</u><br><?php echo $_SESSION['inj']; ?></h2>
<h2><u>Fatalities</u><br><?php echo $_SESSION['kil']; ?></h2>


</div>
</td>
<td>
<div id="map-canvas" style="width:600px;height:330px;"> </div>
<img src="deathLeg.png">Nearest intersection where fatality took place
<img src="AccidentLeg.png">Nearest intersection where injury took place
</td>

</tr>
</table>


</div>
<table>
<table border="1" bordercolor="#000000" style="background-color:#FFFFFF" width="400" cellpadding="3" cellspacing="5" align="top">
<tr>
<br><h2>Top 5 Most Dangerous Intersections for 

<?php 
switch ($accidentType) {

case "Bicycle":
echo "Bikers";
break;

case "Pedestrian":
echo "Pedestrians";
break;

case "Car":
echo "Drivers";
break;


}
?> 

</h2>

<?php

$i = 0;
while($i < $counter){

echo "<td><center><b><u>" . ($i+1) . "</u></b><div id=\"Ad" . ($i+1)	 . "\"></div></center>
<p><img src=\"//maps.googleapis.com/maps/api/streetview?size=400x400&location=" . ${'laty'.$i} . "," . ${'longy'.$i} . "&fov=90&heading=0&pitch=10&sensor=false\" width=\"200\" height=\"200px\"/></p>
</td>";

$i++;
}

?>


</tr>
</table>

</body>
<php? session_destroy(); ?>
</html>

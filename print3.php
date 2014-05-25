
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
    zoom:12,
    center: new google.maps.LatLng(<?php echo $_SESSION['latitudecor']; ?>,<?php echo $_SESSION['longitudecor']; ?>),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
   };
 
 var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var populationOptions = {
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: map,
      center: new google.maps.LatLng(<?php echo $_SESSION['latitudecor']; ?>,<?php echo $_SESSION['longitudecor']; ?>),
      radius: <?php echo $_SESSION['radius'] * 100 . "\n"; ?>
    };






   cityCircle = new google.maps.Circle(populationOptions);

  

<?php

$q=$_SESSION['q'];
$rank="5";
$accidentType=$_SESSION['aType'];

switch ($accidentType) {

case "Bicycle":
$con = mysql_connect('dangerousroadsnyccom.ipowermysql.com','dangerousrd','dangerousrd123');

   if (!$con)
   {
     die('Could not connect: ' . mysql_error());
   }

   mysql_select_db('accidentdata', $con);
 
 $sql = "SELECT `Lattitude` , `Longitude` , `Binjured`, `Bkilled` ,`TotalB`, (3959 * acos( cos( radians(" . $_SESSION['latitudecor'] . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . $_SESSION['longitudecor'] . ") ) + sin( radians( " . $_SESSION['latitudecor'] . ") ) * sin( radians( `Lattitude` ) ) ) ) AS distance\n"
         . "FROM `table 1`\n"
         . "Where (3959 * acos( cos( radians(" . $_SESSION['latitudecor'] . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . $_SESSION['longitudecor'] . ") ) + sin( radians( " . $_SESSION['latitudecor'] . ") ) * sin( radians( `Lattitude` ) ) ) ) <"  . $_SESSION['radius']/20 . "\n"
         . "ORDER BY `table 1`.`TotalB` DESC\n"
         . "Limit " . $rank;
      

$result = mysql_query($sql);

$i = "0";
while($row = mysql_fetch_array($result))
       {
        $latlng = "new GLatLng(" . $row['Lattitude'] . "," . $row['Longitude'] . ")"; 
         echo "createMarker2(" . "map" . "," . $i . "," . $row['Binjured'] . "," . $row['Lattitude'] . "," . $row['Longitude'] . "," . $row['Bkilled'] . ")\n"; 
       ${'laty'.$i}=$row['Lattitude']; 
       ${'longy'.$i}=$row['Longitude']; 
       $i++; 
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
 
  $sql = "SELECT `Lattitude` , `Longitude` , `Cinjured`, `Ckilled` ,`Ctotal`, (3959 * acos( cos( radians(" . $_SESSION['latitudecor'] . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . $_SESSION['longitudecor'] . ") ) + sin( radians( " . $_SESSION['latitudecor'] . ") ) * sin( radians( `Lattitude` ) ) ) ) AS distance\n"
         . "FROM `table 1`\n"
         . "Where (3959 * acos( cos( radians(" . $_SESSION['latitudecor'] . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . $_SESSION['longitudecor'] . ") ) + sin( radians( " . $_SESSION['latitudecor'] . ") ) * sin( radians( `Lattitude` ) ) ) ) <"  . $_SESSION['radius']/20 . "\n"
         . "ORDER BY `table 1`.`TotalB` DESC\n"
         . "Limit " . $rank;
      

$result = mysql_query($sql);

$i = "0";
while($row = mysql_fetch_array($result))
       {
        $latlng = "new GLatLng(" . $row['Lattitude'] . "," . $row['Longitude'] . ")"; 
         echo "createMarker2(" . "map" . "," . $i .  "," . $row['Cinjured'] . "," . $row['Lattitude'] . "," . $row['Longitude'] . "," . $row['Ckilled'] . ")\n"; 
       ${'laty'.$i}=$row['Lattitude']; 
       ${'longy'.$i}=$row['Longitude']; 
       $i++; 
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
 
  $sql = "SELECT `Lattitude` , `Longitude` , `PedInj`, `PedKilled` ,`PedTotal`, (3959 * acos( cos( radians(" . $_SESSION['latitudecor'] . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . $_SESSION['longitudecor'] . ") ) + sin( radians( " . $_SESSION['latitudecor'] . ") ) * sin( radians( `Lattitude` ) ) ) ) AS distance\n"
         . "FROM `table 1`\n"
         . "Where (3959 * acos( cos( radians(" . $_SESSION['latitudecor'] . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . $_SESSION['longitudecor'] . ") ) + sin( radians( " . $_SESSION['latitudecor'] . ") ) * sin( radians( `Lattitude` ) ) ) ) <"  . $_SESSION['radius']/20 . "\n"
         . "ORDER BY `table 1`.`TotalB` DESC\n"
         . "Limit " . $rank;
      

$result = mysql_query($sql);

$i = "0";
while($row = mysql_fetch_array($result))
       {
        $latlng = "new GLatLng(" . $row['Lattitude'] . "," . $row['Longitude'] . ")"; 
         echo "createMarker2(" . "map" . "," . $i .  "," . $row['PedInj'] . "," . $row['Lattitude'] . "," . $row['Longitude'] . "," . $row['PedKilled'] . ")\n"; 
       ${'laty'.$i}=$row['Lattitude']; 
       ${'longy'.$i}=$row['Longitude'];
       $i++; 
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
<h2><u>Address </u><br><?php echo $_SESSION['loc3'];   ?> </h2>
<h2><u>Injuries</u><br><?php echo $_SESSION['inj']; ?></h2>
<h2><u>Fatalities</u><br><?php echo $_SESSION['kil']; ?></h2>


</div>
</td>
<td>
<div id="map-canvas" style="width:600px;height:330px;"> </div>
</td>

</tr>
</table>


</div>
<table>
<table border="1" bordercolor="#000000" style="background-color:#FFFFFF" width="400" cellpadding="3" cellspacing="10" align="top">
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

Within Selected Area</h2>

<td>
<center><b><u>#1</u></b><div id="Ad1"></div></center>
<p><img src="//maps.googleapis.com/maps/api/streetview?size=400x400&location=<?php echo $laty0 . "," . $longy0; ?>&fov=90&heading=0&pitch=10&sensor=false" width="200" height="200px" /></p>
</td>

<td>
<center><b><u>#2</u></b><div id="Ad2"></div></center>
<p><img src="//maps.googleapis.com/maps/api/streetview?size=400x400&location=<?php echo $laty1 . "," . $longy1; ?>&sensor=false" width="200" height="200px" /></p>
</td>






<td>
<center><b><u>#3</u></b><div id="Ad3"></div></center>
<p><img src="//maps.googleapis.com/maps/api/streetview?size=400x400&location=<?php echo $laty2 . "," . $longy2; ?>&sensor=false" width="200" height="200px" /></p>
</td>



<td>
<center><b><u>#4</u></b><div id="Ad4"></div></center>
<p><img src="//maps.googleapis.com/maps/api/streetview?size=400x400&location=<?php echo $laty3 . "," . $longy3; ?>&sensor=false" width="200" height="200px" /></p>
</td>

<td>
<center><b><u>#5</u></b><div id="Ad5"></div></center>
<p><img src="//maps.googleapis.com/maps/api/streetview?size=400x400&location=<?php echo $laty4 . "," . $longy4; ?>&sensor=false" width="200" height="200px" /></p>
</td>

</tr>
</table>

</body>
<?php session_destroy(); ?>
</html>

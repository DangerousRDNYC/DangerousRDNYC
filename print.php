<?php  session_start(); ?>
<html>
<head>
 <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>


<script>

var textAdress;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;





function initialize()
{


directionsDisplay = new google.maps.DirectionsRenderer();
var chicago = new google.maps.LatLng(40.7577, -73.9857);
  var mapOptions = {
    zoom:12,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  directionsDisplay.setMap(map);


 
  var start = " <?php   echo $_SESSION['Start'] . ", " . $_SESSION['BStart']; ?> ";
  var end = "<?php echo $_SESSION['End'] . ", " . $_SESSION['BEnd']; ?> ";
  var request = {
      origin:start,
      destination:end,
      travelMode: google.maps.DirectionsTravelMode.<?php echo $_SESSION['aType2']; ?>
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });







<?php

$q=$_SESSION['q'];
$rank="5";
$accidentType2=$_SESSION['aType2'];

switch ($accidentType2) {

case "BICYCLING":
$con = mysql_connect('dangerousroadsnyccom.ipowermysql.com','dangerousrd','dangerousrd123');

   if (!$con)
   {
   echo "test";  
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
        $latlng = "new google.maps.LatLng(" . $row['Lattitude'] . "," . $row['Longitude'] . ")"; 
         echo "createMark

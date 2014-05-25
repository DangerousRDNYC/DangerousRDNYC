<?php
session_start();


if (empty($_POST["loc3"]) ) {  
   $abc = "Times Square, Manhattan";
   $dfltValue = "Times Square";
   $borough = "Manhattan";
 } else {
   
   
   $abc = $_POST["loc3"] . ", " . $_POST["borough"]; 
   $dfltValue = $_POST["loc3"];
   $borough = $_POST["borough"]; 
}  




if (empty($_POST["accidentType"])) {  
   $accidentType = "Bicycle";
   } else {
   
   $accidentType = $_POST["accidentType"]; 
   
}   

if (empty($_POST["rank"])) {  
   $rank = "5";
   } else {
   
   $rank = $_POST["rank"]; 
   
}  

 if (empty($_POST["radius"])) {  
   $radius = "10";
   } else {

   $radius = $_POST["radius"]; 
   
} 


if (empty($_POST["loca1"])) {  
   $bbb = "Times Square, Manhattan";
   $loca1 = "Times Square";
   } else {
   $bbb = $_POST["loca1"] . ", " . $_POST["borough2"]; 
   $loca1 = $_POST["loca1"]; 
   
}  

if (empty($_POST["loca2"])) {  
   $loca2 = "Wall Street";
   $ccc = "Wall Street, Manhattan";
   } else {
   $ccc = $_POST["loca2"] . ", " . $_POST["borough3"]; 
   $loca2 = $_POST["loca2"]; 
   
}  


if (empty($_POST["borough2"])) {  
   $borough2 = "Manhattan";
   } else {
   
   $borough2 = $_POST["borough2"]; 
   
}  


if (empty($_POST["borough3"])) {  
   $borough3 = "Manhattan";
   } else {
   
   $borough3 = $_POST["borough3"]; 
   
}  
if (empty($_POST["accidentType2"])) {  
   $accidentType2 = "BICYCLING";
   } else {
   
   $accidentType2 = $_POST["accidentType2"]; 
   
}   

if (empty($_POST["rank2"])) {  
   $rank2 = "5";
   } else {
   
   $rank2 = $_POST["rank2"]; 
   
}  

if (empty($_POST["Mode"])) {  
   $Mode = "A";
   } else {
   
   $Mode = $_POST["Mode"]; 
   
}  

if (empty($_POST["TotalD"])) {  
   $totalbase = "null";
   } else {
   
   $totalbase = $_POST["TotalD"]; 
   
}  


if (empty($_POST["NeighborhoodID"])) {  
   $NeighborhoodID = "1";
   } else {
   
   $NeighborhoodID = $_POST["NeighborhoodID"]; 
   
} 

if (empty($_POST["Month"])) {  
   $Month = "4";
   } else {
   
   $Month = $_POST["Month"]; 
   
} 
     

if (empty($_POST["accidentType3"])) {  
   $accidentType3 = "Bicycle";
   } else {
   
   $accidentType3 = $_POST["accidentType3"]; 
   
}   

if (empty($_POST["rank3"])) {  
   $rank3 = "5";
   } else {
   
   $rank3 = $_POST["rank3"]; 
   
}  
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" style="margin-top: 34px !important; height: 731px; " toolbar_fixed="1" debug="true"><div id="FirebugChannel" style="display: none; "></div><script>
<head>     

  




    </script><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<title>Dangerous Roads NYC</title>

  <link rel="stylesheet" href="global.css" type="text/css">

<?php
if ($Mode == "A")
{
 echo "   
<script src=\"https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&amp;\" type=\"text/javascript\"></script>
<script type=\"text/javascript\" 
           src=\"http://maps.google.com/maps/api/js?sensor=false\"></script>
 
<script type=\"text/javascript\" src=\"http://google-maps-utility-library-v3.googlecode.com/svn/trunk/routeboxer/src/RouteBoxer.js\"></script>

";
}


if ($Mode == "C")
{
 echo "   
<script src=\"https://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&amp;\" type=\"text/javascript\"></script>
<script type=\"text/javascript\" 
           src=\"http://maps.google.com/maps/api/js?sensor=false\"></script>
 
<script type=\"text/javascript\" src=\"http://google-maps-utility-library-v3.googlecode.com/svn/trunk/routeboxer/src/RouteBoxer.js\"></script>

";
}



?>



      <script type="text/javascript" src="jquery.min.js"></script>
      
<script type="text/javascript" src="uiTools.js"></script>
 

 <script src="">  </script>
    <script type="text/javascript"> 

                                 


function setCookie(isName,isValue){

document.cookie = isName+"="+isValue;
}	

function getCookie(isName){

cookieStr = document.cookie;
startSlice = cookieStr.indexOf(isName+"=");
if (startSlice == -1){return false}
endSlice = cookieStr.indexOf(";",startSlice+1)
if (endSlice == -1){endSlice = cookieStr.length}
isData = cookieStr.substring(startSlice,endSlice)
isValue = isData.substring(isData.indexOf("=")+1,isData.length);
return isValue;
}

function saveState(){

for (i=0; i<2; i++)
{if (document.forms.Form1.Radio1[i].checked){boxIndex = i}}
setCookie('radioState',boxIndex)
}

function restoreState(){

isRadio = getCookie('radioState');



}

window.onload=restoreState;
window.onbeforeunload=saveState;









<?php 
 
  //Three parts to the querystring: q is address, output is the format, key is the GAPI key
$key = "ABQIAAAAluf-_RWtf0Xme8--UpPhXBQsdR1lQB0M7NXNlEV6j-i3pnbTrBS_rJtMgtNduZv9jCfg0cUHG58r1A";


if ($Mode == "B"){

$address = urlencode($abc);

} else {

$address = urlencode($bbb);
$address2 = urlencode($ccc);

}

//If you want an extended data set, change the output to "xml" instead of csv

$url = "http://maps.googleapis.com/maps/api/geocode/json?address=\"" . $address . "\"&sensor=false";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch); 
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode == 200) {
      $geocode = json_decode($result);
      $latitudecor = $geocode->results[0]->geometry->location->lat;
      $longitudecor = $geocode->results[0]->geometry->location->lng; 
      $formatted_address = $geocode->results[0]->formatted_address;
      $geo_status = $geocode->status;
      $location_type = $geocode->results[0]->geometry->location_type;

if ($Mode == "B"){

$longitudecor = -$longitudecor;

}

       
} else {

$geo_status = "HTTP_FAIL_$httpCode";
 }

?>




    function initialize() {
 
   
        

        // var map = new google.maps.Map(document.getElementById('map_canvas'));
   
     
       // var map = new GMap2(document.getElementById("map_canvas"));
       
     
           
      
    
     <?php 
if ($Mode == "B")
{
echo "
 var mapOptions = {
    zoom:12,
";

echo "center: new google.maps.LatLng(" . $latitudecor . "," . -$longitudecor . "),\n";


echo  "  mapTypeId: google.maps.MapTypeId.ROADMAP,
   };

";

echo "var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);\n";

echo "
 var populationOptions = {
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#FF0000',
      fillOpacity: 0.35,
      map: map,
";

echo "center: new google.maps.LatLng(" . $latitudecor . "," . -$longitudecor . "),\n";
echo "radius:" . $radius * 100 . "\n};";
echo "cityCircle = new google.maps.Circle(populationOptions);";

}
if ($Mode == "A")
{

}

?>
   
 function drawCircle(map, center, radius, numPoints)
        {
            var poly = [] ; 
            var line;
            var lat = center.lat() ;
            var lng = center.lng() ;
            var d2r = Math.PI/180 ;                // degrees to radians
            var r2d = 180/Math.PI ;                // radians to degrees
            var Clat = (radius/3963) * r2d ;      //  using 3963 as earth's radius
            var Clng = Clat/Math.cos(lat*d2r);
            
            //Add each point in the circle
            for (var i = 0 ; i < numPoints ; i++)
            {
                var theta = Math.PI * (i / (numPoints / 2)) ;
                Cx = lng + (Clng * Math.cos(theta)) ;
                Cy = lat + (Clat * Math.sin(theta)) ;
                poly.push(new GLatLng(Cy,Cx)) ;
            }

            //Remove the old line if it exists
            if(line)
            {
                map.removeOverlay(line) ;
            }
            
            //Add the first point to complete the circle
            poly.push(poly[0]) ;

            //Create a line with teh points from poly, red, 3 pixels wide, 80% opaque
            line = new GPolyline(poly,'#FF0000', 3, 0.8) ;
            
            map.addOverlay(line) ;
        }   
function createMarker(map, index, injuries, lat, long, fatalities) {

if (fatalities > 0) {   
var image = "death.png";
} else {
var image = "accident.png";

}
  var myLatLng = new google.maps.LatLng(lat, long);
var content = "Injuries: " + injuries + "</br> Fatalities: " + fatalities;
var infowindow = new google.maps.InfoWindow({
    content: content
});


  var beachMarker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: image
  });
     
   beachMarker.setMap(map);

  google.maps.event.addListener(beachMarker, 'click', function() {
    infowindow.open(map,beachMarker);
    showLocation(lat,long);
});

}






function SetHome(map, lat2, long2) {
 
var image = "home.png";
  var myLatLng = new google.maps.LatLng(lat2, long2);



  var beachMarker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: image
  });
     
   beachMarker.setMap(map);

  google.maps.event.addListener(beachMarker, 'click', function() {
    infowindow.open(map,beachMarker);
    showLocation(lat,long);
});
  
}




       <?php 
$lat3 = "40.7588954";
$long3 = "-73.9851308";
if ($Mode == "C"){

switch ($accidentType3) {
case "Bicycle":
$con = mysql_connect('dangerousroadsnyccom.ipowermysql.com','dangerousrd','dangerousrd123');

if (!$con)
   {
     die('Could not connect: ' . mysql_error());
   }

   mysql_select_db('accidentdata', $con);
mysql_select_db('accidentdata', $con);	

$sql = "SELECT `Neighborhood_ID` , `lat` ,  `lon` ,  `cyclists_injured` ,  `cyclists_killed` ,  `bike_total` \n"
         . "FROM `collisions`\n"
         . "Where `Neighborhood_ID` = " . $NeighborhoodID . " AND `bike_total` >0\n"
         . "ORDER BY `collisions`.`bike_total` DESC\n"
         . "Limit " . $rank3;
        $result = mysql_query	($sql);


  $result = mysql_query	($sql);
 $i = "0";
       while($row = mysql_fetch_array($result))
       {
        echo "createMarker(" . "map" . "," . $i . "," . $row['cyclists_injured'] . "," . $row['lat'] . "," . $row['lon'] . "," . $row['cyclists_killed'] . ")\n"; 

   if ($i = "1")
        {
          $lat3 = $row['lat']; 
          $long3 = $row['lon']; 
      } 

       $i++; 

    }



$sql = "SELECT sum(cyclists_injured), sum(cyclists_killed)\n"
         . "FROM `collisions`\n"
         . "Where `Neighborhood_ID` = " . $NeighborhoodID . " AND `bike_total` >0\n";


  $result = mysql_query($sql);
       
      while($row = mysql_fetch_array($result))
      {
       $injuries = $row['sum(cyclists_injured)'];
       $killed = $row['sum(cyclists_killed)'];
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
mysql_select_db('accidentdata', $con);	

$sql = "SELECT `Neighborhood_ID` ,  `lat` ,  `lon` ,  `c_injured` ,  `c_killed` ,  `c_total` \n"
         . "FROM `collisions`\n"
         . "Where `Neighborhood_ID` = " . $NeighborhoodID . " AND `c_total` >0\n"
         . "ORDER BY `collisions`.`c_total` DESC\n"
         . "Limit " . $rank3;
        $result = mysql_query	($sql);


  $result = mysql_query	($sql);
 $i = "0";
       while($row = mysql_fetch_array($result))
       {
        echo "createMarker(" . "map" . "," . $i . "," . $row['c_injured'] . "," . $row['lat'] . "," . $row['lon'] . "," . $row['c_killed'] . ")\n"; 
        if ($i = "1")
        {
          $lat3 = $row['lat']; 
          $long3 = $row['lon']; 
      }
        $i++; 
         }
          
          
$sql = "SELECT sum(c_injured), sum(c_killed)\n"
         . "FROM `collisions`\n"
         . "Where `Neighborhood_ID` = " . $NeighborhoodID . " AND `c_total` >0\n";


  $result = mysql_query($sql);
       
      while($row = mysql_fetch_array($result))
      {
       $injuries = $row['sum(c_injured)'];
       $killed = $row['sum(c_killed)'];
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
mysql_select_db('accidentdata', $con);	

$sql = "SELECT `Neighborhood_ID` ,  `lat` ,  `lon` ,  `pedestr_injured` ,  `pedestr_killed` ,  `ped_total` \n"
         . "FROM `collisions`\n"
         . "Where `Neighborhood_ID` = " . $NeighborhoodID . " AND `ped_total` >0\n"
         . "ORDER BY `collisions`.`ped_total` DESC\n"
         . "Limit " . $rank3;
        $result = mysql_query	($sql);


  $result = mysql_query	($sql);
 $i = "0";
       while($row = mysql_fetch_array($result))
       {
        echo "createMarker(" . "map" . "," . $i . "," . $row['pedestr_injured'] . "," . $row['lat'] . "," . $row['lon'] . "," . $row['pedestr_killed'] . ")\n"; 
    
   if ($i = "1")
        {
          $lat3 = $row['lat']; 
          $long3 = $row['lon']; 
      }
    $i++; 
         }



$sql = "SELECT sum(pedestr_injured), sum(pedestr_killed)\n"
         . "FROM `collisions`\n"
         . "Where `Neighborhood_ID` = " . $NeighborhoodID . " AND `ped_total` >0\n";


  $result = mysql_query($sql);
       
      while($row = mysql_fetch_array($result))
      {
       $injuries = $row['sum(pedestr_injured)'];
       $killed = $row['sum(pedestr_killed)'];
      }
      mysql_close($con);
break;
}
}

if ($Mode == "B"){

switch ($accidentType) {
case "Bicycle":

   $con = mysql_connect('dangerousroadsnyccom.ipowermysql.com','dangerousrd','dangerousrd123');

   if (!$con)
   {
     die('Could not connect: ' . mysql_error());
   }

   mysql_select_db('accidentdata', $con);

     $sql = "SELECT `Lattitude` , `Longitude` , `Binjured`, `Bkilled` ,`TotalB`, (3959 * acos( cos( radians(" . $latitudecor . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . -$longitudecor . ") ) + sin( radians( " . $latitudecor . ") ) * sin( radians( `Lattitude` ) ) ) ) AS distance\n"
         . "FROM `table 1`\n"
         . "Where (3959 * acos( cos( radians(" . $latitudecor . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . -$longitudecor . ") ) + sin( radians( " . $latitudecor . ") ) * sin( radians( `Lattitude` ) ) ) ) <"  . $radius/20 . "\n"
         . "ORDER BY `table 1`.`TotalB` DESC\n"
         . "Limit " . $rank;
        $result = mysql_query	($sql);
       
        $i = "0";
       while($row = mysql_fetch_array($result))
       {
        $latlng = "new GLatLng(" . $row['Lattitude'] . "," . $row['Longitude'] . ")"; 
        echo "createMarker(" . "map" . "," . $i . "," . $row['Binjured'] . "," . $row['Lattitude'] . "," . $row['Longitude'] . "," . $row['Bkilled'] . ")\n"; 
        $i++; 
         }
        $latlng2 = "new GLatLng(" . $latitudecor . "," . -$longitudecor . ")"; 
        echo "SetHome(" . "map" . "," . $latitudecor . "," . -$longitudecor . ")\n"; 
        echo "showLocation(" . $latitudecor . "," . -$longitudecor . ")";	

       $sql = "SELECT sum(Binjured), sum(Bkilled), (3959 * acos( cos( radians(" . $latitudecor . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . -$longitudecor . ") ) + sin( radians( " . $latitudecor . ") ) * sin( radians( `Lattitude` ) ) ) ) AS distance\n"
        . "FROM `table 1`\n"
        . "Where (3959 * acos( cos( radians(" . $latitudecor . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . -$longitudecor . ") ) + sin( radians( " . $latitudecor . ") ) * sin( radians( `Lattitude` ) ) ) ) <"  . $radius/20 . "\n";
   
       $result = mysql_query($sql);
       
      while($row = mysql_fetch_array($result))
      {
       $injuries = $row['sum(Binjured)'];
       $killed = $row['sum(Bkilled)'];
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

     $sql = "SELECT `Lattitude` , `Longitude` , `Cinjured`, `Ckilled` ,`Ctotal`, (3959 * acos( cos( radians(" . $latitudecor . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . -$longitudecor . ") ) + sin( radians( " . $latitudecor . ") ) * sin( radians( `Lattitude` ) ) ) ) AS distance\n"
         . "FROM `table 1`\n"
         . "Where (3959 * acos( cos( radians(" . $latitudecor . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . -$longitudecor . ") ) + sin( radians( " . $latitudecor . ") ) * sin( radians( `Lattitude` ) ) ) ) <"  . $radius/20 . "\n"
         . "ORDER BY `table 1`.`Ctotal` DESC\n"
         . "Limit " . $rank;
        $result = mysql_query($sql);

        $i = "0";
       while($row = mysql_fetch_array($result))
       {
        $latlng = "new GLatLng(" . $row['Lattitude'] . "," . $row['Longitude'] . ")"; 
        echo "createMarker(" . "map" . "," . $i . "," . $row['Cinjured'] . "," . $row['Lattitude'] . "," . $row['Longitude'] . "," . $row['Ckilled'] . ")\n"; 
        $i++; 
         }
        $latlng2 = "new GLatLng(" . $latitudecor . "," . -$longitudecor . ")"; 
        echo "map.addOverlay(SetHome(" . $latlng2 . "," . $latitudecor . "," . -$longitudecor . "))\n"; 
        echo "showLocation(" . $latitudecor . "," . -$longitudecor . ")";	

       $sql = "SELECT sum(Cinjured), sum(Ckilled), (3959 * acos( cos( radians(" . $latitudecor . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . -$longitudecor . ") ) + sin( radians( " . $latitudecor . ") ) * sin( radians( `Lattitude` ) ) ) ) AS distance\n"
        . "FROM `table 1`\n"
        . "Where (3959 * acos( cos( radians(" . $latitudecor . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . -$longitudecor . ") ) + sin( radians( " . $latitudecor . ") ) * sin( radians( `Lattitude` ) ) ) ) <"  . $radius/20 . "\n";
   
       $result = mysql_query($sql);

      while($row = mysql_fetch_array($result))
      {
       $injuries = $row['sum(Cinjured)'];
       $killed = $row['sum(Ckilled)'];
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

     $sql = "SELECT `Lattitude` , `Longitude` , `PedInj`, `PedKilled` ,`PedTotal`, (3959 * acos( cos( radians(" . $latitudecor . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . -$longitudecor . ") ) + sin( radians( " . $latitudecor . ") ) * sin( radians( `Lattitude` ) ) ) ) AS distance\n"
         . "FROM `table 1`\n"
         . "Where (3959 * acos( cos( radians(" . $latitudecor . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . -$longitudecor . ") ) + sin( radians( " . $latitudecor . ") ) * sin( radians( `Lattitude` ) ) ) ) <"  . $radius/20 . "\n"
         . "ORDER BY `table 1`.`PedTotal` DESC\n"
         . "Limit " . $rank;
        $result = mysql_query($sql);

        $i = "0";
       while($row = mysql_fetch_array($result))
       {
        $latlng = "new GLatLng(" . $row['Lattitude'] . "," . $row['Longitude'] . ")"; 
        echo "createMarker(" . "map" . "," . $i . "," . $row['PedInj'] . "," . $row['Lattitude'] . "," . $row['Longitude'] . "," . $row['PedKilled'] . ")\n"; 
        $i++; 
         }
        $latlng2 = "new GLatLng(" . $latitudecor . "," . -$longitudecor . ")"; 
        echo "map.addOverlay(SetHome(" . $latlng2 . "," . $latitudecor . "," . -$longitudecor . "))\n"; 
        echo "showLocation(" . $latitudecor . "," . -$longitudecor . ")";	

       $sql = "SELECT sum(PedInj), sum(PedKilled), (3959 * acos( cos( radians(" . $latitudecor . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . -$longitudecor . ") ) + sin( radians( " . $latitudecor . ") ) * sin( radians( `Lattitude` ) ) ) ) AS distance\n"
        . "FROM `table 1`\n"
        . "Where (3959 * acos( cos( radians(" . $latitudecor . ") ) * cos( radians( `Lattitude` ) ) * cos( radians( `Longitude` ) - radians(" . -$longitudecor . ") ) + sin( radians( " . $latitudecor . ") ) * sin( radians( `Lattitude` ) ) ) ) <"  . $radius/20 . "\n";
   
       $result = mysql_query($sql);

      while($row = mysql_fetch_array($result))
      {
       $injuries = $row['sum(PedInj)'];
       $killed = $row['sum(PedKilled)'];
      }
      mysql_close($con);
break;

}

} 


if ($Mode == "A"){
   $injuries = "10";
       $killed = "12";
echo "showLocation2(" . $latitudecor . "," . -$longitudecor . ")\n";




}


?>
 
}



function showLocation(lat, long) {
      
         var myPano = new  google.maps.StreetViewPanorama(document.getElementById('pano'));    
       coord = new google.maps.LatLng(lat,long);
       myPOV = {yaw:370.64659986187695,pitch:0};
       myPano.setPosition(coord);
       myPano.setPov({
    heading: 265,
    pitch:0}
     );
       GEvent.addListener(myPano, "error", handleNoFlash);
       geocoder = new GClientGeocoder();
  
        
              if (geocoder) {
       geocoder.getLatLng(
          address,
         function(point) {
          if (!point) {
           alert(address + " not found");
           } else {
      
        
     
           
              
             
           
  
            }

          }
        );
      }   


   
      }

function showLocation2(lat, long) {
      
       


   
      }

function createMarker2(index, injuries, lat, long, fatalities) {

if (fatalities > 0) {   
var image = "death.png";
} else {
var image = "accident.png";

}
  var myLatLng = new google.maps.LatLng(lat, long);
var content = "Injuries: " + injuries + "</br> Fatalities: " + fatalities;
var infowindow = new google.maps.InfoWindow({
    content: content
});


  var beachMarker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: image
  });
     
   beachMarker.setMap(map);

  google.maps.event.addListener(beachMarker, 'click', function() {
    infowindow.open(map,beachMarker);
    showLocation(lat,long);

});

}







    </script>
</head>
<body onload="initialize()" onunload="GUnload()">
<table border="1" bordercolor="#000000" style="background-color:#FFFFFF" width="1300" cellpadding="3" cellspacing="10" align="top">

       <tr>
		<td colspan="3">
            <div class="clear">
			<div class="floatL span-one-third-plus" style="width: 1300px; ">
				<div class="content-box">
					<h2>Welcome to Dangerous Roads NYC a resource for finding bike, car, and pedestrian injuries or fatalities in NYC</h2>
					<div class="home-directions">
						<div class="directions">
		                        
						</div><!-- /directions -->
					</div><!-- /home-directions -->
				</div><!-- /content-box -->
			</div><!-- /span-one-third-plus -->
	</div>
</div>

            </td>
	
	</tr>

	<tr>
		<td>
            <div id="rm-home-new" class="clear">
	<div class="floatL span-two-thirds">



		<div class="clear">
			<div class="floatL span-one-third-plus">
				<div class="content-box"style="width: 400px; height: 375px">
					<h2>Find injuries or fatalities that took place</h2>
					<div class="home-directions">
						<div class="directions">
                                      		

                                                        <ul>
								
                                                                <form name="Form1">
                                                                <li style="display:inline;"><input type="radio" name="Radio1"  onclick="switchDivs(&#39;directionFields&#39;, &#39;frmGetDirections&#39;);"><label for="Radio1"> Along Route</label></li>
								<li style="display:inline;"><input type="radio" name="Radio1"  onclick="switchDivs(&#39;mapsFields&#39;,&#39;frmGetMaps&#39;);"><label for="Radio2"> Near Address</label></li>
		                                                <li style="display:inline;"><input type="radio" name="Radio1"  onclick="switchDivs(&#39;PFields&#39;,&#39;frmGetMapsP&#39;);"><label for="Radio3"> By Neighborhood</label></li>
 </form>
<script type="text/javascript">

<?php

if ($Mode == "A")
{
    echo "document.Form1.Radio1[0].checked = true;";
    echo "document.Form1.Radio1[1].checked = false;";
    echo "document.Form1.Radio1[2].checked = false;";

}
if ($Mode == "B")
{
    echo "document.Form1.Radio1[0].checked = false;";
    echo "document.Form1.Radio1[1].checked = true;";
    echo "document.Form1.Radio1[2].checked = false;";

}

if ($Mode == "C")
{
    echo "document.Form1.Radio1[0].checked = false;";
    echo "document.Form1.Radio1[1].checked = false;";
    echo "document.Form1.Radio1[2].checked = true;";

}
?>

</script>

                                                        </ul>
	                                            


                                                        <fieldset id="directionFields" class="dirForm" style="display: none; ">
								
<form name="frmGetDirections" id="frmGetDirections" class="directions" action="index.php" method="post">
									<p>Starting Point</p>
									<label>1</label>
									<input type="text" name="loca1" id="loca1"  autocomplete="off">
								  
                                                                        <div class="styled-select1">
                                                         <select name="borough2" id="borough2">
                                                         <option value="Manhattan">Manhattan</option>
                                                         <option value="Queens">Queens</option>
                                                         <option value="Brooklyn">Brooklyn</option>
                                                         <option value="Bronx">Bronx</option>
                                                          <option value="Staten Island">Staten Island</option> 
                                                         </select>
                                                         </DIV> 


                                                      <p>Ending Point</p>
									<label>2</label>
									<input type="text" name="loca2" id="loca2" autocomplete="off">  
								 <div class="styled-select2">
                                                         <select name="borough3" id="borough3">
                                                         <option value="Manhattan">Manhattan</option>
                                                         <option value="Queens">Queens</option>
                                                         <option value="Brooklyn">Brooklyn</option>
                                                         <option value="Bronx">Bronx</option>
                                                          <option value="Staten Island">Staten Island</option> 
                                                         </select>
                                                         </DIV> 

                                                         <p>Hilight injuries or fatalities involving a</p> 
                                                        <div class="styled-select2">
                                                         <label>3</label>
                                                         <select name="accidentType2" id="accidentType2">
                                                         <option value="BICYCLING">Bike</option>
                                                         <option value="DRIVING">Car</option>
                                                         <option value="WALKING">Pedestrian</option>
                                                         </select>
                                                         </DIV> 
                                                         <p>Number of Accidents to Show</p> 
                                                        <div class="styled-select1">
                                                         <label>4</label>
                                                         <select name="rank2" id="rank2">
                                                         <option value="5">Top 5</option>
                                                         <option value="10">Top 10</option>
                                                         </select>
                                                         </DIV> 
                                                      <input type="hidden" name="Mode" value="A">
                                                      <input type="hidden" name="TotalD" id="TotalD">
                                                   
                                                     <input type="submit"; value="Find Dangerous Roads"; id="linkButton2" href="" onclick="getDirections();">
					       
                                         		</form>
							</fieldset>
							<fieldset class="hide dirForm" id="mapsFields" style="display: block; ">
								<form name="frmGetMaps" id="frmGetMaps" class="directions" action="index.php" method="post">
									<p>Enter Location</p>
									<label>1</label>
									<input type="text" name="loc3" id="loc3" value= "<?php echo $dfltValue; ?>"  autocomplete="off"><div id="container2" class="yui-ac-container"><div class="yui-ac-content" style="display: none; "><div class="yui-ac-hd" style="display: none; "></div><div class="yui-ac-bd" style=""><ul><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li></ul></div><div class="yui-ac-ft" style="display: none; "></div></div></div>
									<input type="hidden" name="loc4" id="loc4" value="Address" autocomplete="off"><div id="container3" class="yui-ac-container"><div class="yui-ac-content" style="display: none; "><div class="yui-ac-hd" style="display: none; "></div><div class="yui-ac-bd" style=""><ul><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li><li style="display: none; "></li></ul></div><div class="yui-ac-ft" style="display: none; "></div></div></div>
								   <div class="styled-select2">
                                                         <select name="borough" id="borough">
                                                         <option value="Manhattan">Manhattan</option>
                                                         <option value="Queens">Queens</option>
                                                         <option value="Brooklyn">Brooklyn</option>
                                                         <option value="Bronx">Bronx</option>
                                                          <option value="Staten Island">Staten Island</option> 
                                                         </select>
                                                        </DIV> 
                                                     <p>Hilight injuries or fatalities involving a</p>
                                                    <label>2</label>
                                           
                                                   <div class="styled-select2">
                                                         <select name="accidentType" id="accidentType">
                                                         <option value="Bicycle">Bike</option>
                                                         <option value="Car">Car</option>
                                                         <option value="Pedestrian">Pedestrian</option>
                                                         </select>
                                                         </DIV> 

							         <p>Number of Accidents to Show</p>
                                                    <label>3</label>
                                           
                                                   <div class="styled-select2">
                                                         <select name="rank" id="rank">
                                                         <option value="5">Top 5</option>
                                                         <option value="10">Top 10</option>
                                                         </select>
                                                         </DIV> 
                                           <p>Radius	</p>
                                                    <label>4</label>
                                           
                                                   <div class="styled-select2">
                                                         <select name="radius" id="radius">
                                                         <option value="5">10 blocks</option>
                                                         <option value="10">20 blocks</option>
                                                         <option value="50">50 blocks</option>
                                                         </select>
                                                         </DIV> 
                                        <input type="hidden" name="Mode" value="B">                  
                                       	<input type="submit"; value="Find Dangerous Roads"; id="linkButton2" href="" onclick="getMap();">
                                                 
                                          </form>
							    


                                          </fieldset>
							

                                                        <fieldset id="PFields" class="dirForm" style="display: none; ">
								
<form name="frmGetDirections" id="frmGetMapsP" class="directions" action="index.php" method="post">	                     	
 
  <p>Select Neighborhood</p>
  <label>1</label>


<div class="extra-select">
<select name="NeighborhoodID"  id="NeighborhoodID">

<Option Value="1"> Astoria</option>
<Option Value="2"> Bay Ridge</option>
<Option Value="3"> Bayside / Little Neck</option>
<Option Value="4"> Bedford Stuyvesant</option>
<Option Value="5"> Bellerose / Rosedale</option>
<Option Value="6"> Bensonhurst</option>
<Option Value="7"> Borough Park</option>
<Option Value="8"> Brooklyn Heights / Fort Greene</option>
<Option Value="9"> Brownsville / Ocean Hill</option>
<Option Value="10"> Bushwick</option>
<Option Value="11"> Central Harlem</option>
<Option Value="12"> Chelsea / Clinton / Midtown</option>
<Option Value="13"> Coney Island</option>
<Option Value="14"> East Flatbush</option>
<Option Value="15"> East Harlem</option>
<Option Value="16"> East New York / Starrett City</option>
<Option Value="17"> Elmhurst / Corona</option>
<Option Value="18"> Flatbush</option>
<Option Value="19"> Flatlands / Canarsie</option>
<Option Value="20"> Flushing / Whitestone</option>
<Option Value="21"> Forest Hills / Rego Park</option>
<Option Value="22"> Greenwich Village / Financial District</option>
<Option Value="23"> Highbridge / S. Concourse</option>
<Option Value="24"> Hillcrest / Fresh Meadows</option>
<Option Value="25"> Howard Beach / S. Ozone Park</option>
<Option Value="26"> Jackson Heights</option>
<Option Value="27"> Jamaica</option>
<Option Value="28"> Kew Gardens / Woodhaven</option>
<Option Value="29"> Kingsbridge Heights / Mosholu</option>
<Option Value="30"> Lower East Side / Chinatown</option>
<Option Value="31"> Middle Village / Ridgewood</option>
<Option Value="32"> Mid-Island</option>
<Option Value="33"> Morningside Heights / Hamilton Heights</option>
<Option Value="34"> Morrisania / East Tremont</option>
<Option Value="35"> Mott Haven / Hunts Point</option>
<Option Value="36"> North Crown Heights / Prospect Heights</option>
<Option Value="37"> North Shore</option>
<Option Value="38"> Park Slope / Carroll Gardens</option>
<Option Value="39"> Pelham Parkway</option>
<Option Value="40"> Riverdale / Kingsbridge</option>
<Option Value="41"> Rockaways</option>
<Option Value="42"> Sheepshead Bay / Gravesend</option>
<Option Value="43"> Soundview / Parkchester</option>
<Option Value="44"> South Crown Heights</option>
<Option Value="45"> South Shore</option>
<Option Value="46"> Stuyvesant Town / Turtle Bay</option>
<Option Value="47"> Sunnyside / Woodside</option>
<Option Value="48"> Sunset Park</option>
<Option Value="49"> Throgs Neck / Co-op City</option>
<Option Value="50"> University Heights / Fordham</option>
<Option Value="51"> Upper East Side</option>
<Option Value="52"> Upper West Side</option>
<Option Value="53"> Washington Heights / Inwood</option>
<Option Value="54"> Williamsbridge / Baychester</option>
<Option Value="55"> Williamsburg / Greenpoint</option>



</select>
</div>






<div class="styled-select2">
 
 <p>Month</p>
  <label>2</label>


                                                        <select name="Month" id="Month">
                                                        
                                                         
                                                         

                                                      
 <option value="4">Apr 14</option>

</select>
                                                         </DIV> 


          <div class="styled-select2">
 
 <p>Hilight injuries or fatalities involving a</p>
  <label>3</label>


                                                        <select name="accidentType3" id="accidentType3">
                                                              <option value="Bicycle">Bike</option>
                                                         <option value="Car">Car</option>
                                                         <option value="Pedestrian">Pedestrian</option>                                              


                                                        </DIV> 
                                                        </select>
  <p>Number of Accidents to Show</p>
  <label>4</label>
                                           
                                                   <div class="styled-select2">
                                                         <select name="rank3" id="rank3">
                                                         <option value="5">Top 5</option>
                                                         <option value="10">Top 10</option>
                                                         </select>
                                                         </DIV> 

 <input type="hidden" name="Mode" value="C">                  

<input type="submit"; value="Find Dangerous Roads"; id="linkButton3;" href=""; >

                                       	



  </form>
							    


                                          </fieldset>	

	                    
						</div><!-- /directions -->
					</div><!-- /home-directions -->
				</div><!-- /content-box -->
			</div><!-- /span-one-third-plus -->
	</div>
</div>

            </td>
		
            <td>
           <div id="rm-home-new" class="clear">
	<div class="floatL span-two-thirds">



		<div class="clear">
			<div class="floatL span-one-third-plus">
				<div class="content-box">
					<h2>View dangerous intersections on a map</h2>
					<div id="map_canvas" div class="home-directions" style="width: 400px; height: 335px">
						<div class="directions">



						</div><!-- /directions -->
					</div><!-- /home-directions -->
				</div><!-- /content-box -->
			</div><!-- /span-one-third-plus -->
	</div>
</div>

<?php


if ($Mode == "C"){

echo "

<script type=\"text/javascript\">

 var mapOptions = {
    zoom:12,
    center: new google.maps.LatLng(" . $lat3 . "," . $long3 . "),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
   };
var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

google.maps.event.addDomListener(window, 'load', initialize);
</script>
";

}





    if ($Mode == "A"){
    echo " 
     
     <script type=\"text/javascript\">
     
     var directionsService = new google.maps.DirectionsService();
     var directionsDisplay = new google.maps.DirectionsRenderer();
     
     var distance = 1/20;
    
     var map = new google.maps.Map(document.getElementById('map_canvas'), {
       zoom:6,
       mapTypeId: google.maps.MapTypeId.ROADMAP
     
});
      
      directionsDisplay.setMap(map);
      var request = {	
      origin: '" . $bbb . "',
      destination: '" . $ccc . "',
      travelMode: google.maps.TravelMode." . $accidentType2 . "
  };

directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response); 
 var routeBoxer = new RouteBoxer();
     var latdatabase = \"\";
     var longdatabase = \"\";
     var totalbase = \"\";
     var path = response.routes[0].overview_path;
     var boxes = routeBoxer.box(path, distance);
     var cc = \"\";
   

  for (var i = 0; i < boxes.length; i++) {
      var bounds = boxes[i];
   
      var lateast = boxes[i].getNorthEast().lat();    
      var latwest = boxes[i].getSouthWest().lat();
      var longnorth = boxes[i].getNorthEast().lng();
      var longsouth = boxes[i].getSouthWest().lng();
     
  
    
     latdatabase = \"(`Lattitude` Between \" + latwest + \" AND \" + lateast + \")\";
     longdatabase = \"(`Longitude` Between \" + longsouth + \" AND \" + longnorth + \")\";
     totalbase =  latdatabase + \" And \" + longdatabase + \" OR\" +  totalbase;
    	



 // Perform search over this bounds 
    }
    
    totalbase = totalbase + \" Null\";
    showUser(totalbase);
    showInjuries(totalbase);
    showKilled(totalbase);
 }
  });



";



}	

?>




<?php
if ($Mode == "A")
{

echo "
function showUser(str)
{
if (str==\"\")
  {
  document.getElementById(\"txtHint\").innerHTML=\"\";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject(\"Microsoft.XMLHTTP\");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    	
     var g = document.createElement('script');
     var s = document.getElementsByTagName('script')[0];
     g.text = xmlhttp.responseText;
     s.parentNode.insertBefore(g, s);
    }
  }

xmlhttp.open(\"POST\",\"findmarkers.php\",true);
xmlhttp.setRequestHeader(\"Content-type\",\"application/x-www-form-urlencoded\");

";
echo "xmlhttp.send(\"q=\"+str+\"&rank=" . $rank2 . "&accidentType2=" . $accidentType2 . "\")";
echo "}";


echo "
function showInjuries(str2)
{
if (str2==\"\")
  {
  document.getElementById(\"txtHint\").innerHTML=\"\";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp2=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp2=new ActiveXObject(\"Microsoft.XMLHTTP\");
  }
xmlhttp2.onreadystatechange=function()
  {

    	
      document.getElementById(\"myDiv\").innerHTML=xmlhttp2.responseText;
    
  }

xmlhttp2.open(\"POST\",\"totalinjfat.php\",true);
xmlhttp2.setRequestHeader(\"Content-type\",\"application/x-www-form-urlencoded\");

";
echo "xmlhttp2.send(\"q=\"+str2+\"&accidentType2=" . $accidentType2 .  "\")";

echo "}";



echo "
function showKilled(str3)
{
if (str3==\"\")
  {
  document.getElementById(\"txtHint\").innerHTML=\"\";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp3=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp3=new ActiveXObject(\"Microsoft.XMLHTTP\");
  }
xmlhttp3.onreadystatechange=function()
  {

    	
      document.getElementById(\"myDivK\").innerHTML=xmlhttp3.responseText;
    
  }

xmlhttp3.open(\"POST\",\"totalfat.php\",true);
xmlhttp3.setRequestHeader(\"Content-type\",\"application/x-www-form-urlencoded\");

";

echo "xmlhttp3.send(\"q=\"+str3+\"&accidentType2=" . $accidentType2 .  "\")";
echo "}";





}

$_SESSION['loc3'] = $abc;
$_SESSION['inj'] = $injuries;
$_SESSION['kil'] = $killed;
$_SESSION['borough'] = $borough;
$_SESSION['Start'] = $loca1;
$_SESSION['End'] = $loca2;
$_SESSION['BStart'] = $borough2;
$_SESSION['BEnd'] = $borough3;
$_SESSION['aType'] = $accidentType;
$_SESSION['aType2'] = $accidentType2;
$_SESSION['latitudecor'] = $latitudecor;
$_SESSION['longitudecor'] = -$longitudecor;
$_SESSION['radius'] = $radius;
$_SESSION['aType3'] = $accidentType3;
$_SESSION['month'] = $Month;
$_SESSION['NeighborhoodID'] = $NeighborhoodID;
$_SESSION['rank3'] = $rank3;
$_SESSION['lat3'] = $lat3;
$_SESSION['long3'] = $long3;
?>

<?php
if ($Mode == "B"){
echo "<script src=\"https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false\" type=\"text/javascript\">";


    



}


?>
 </script>   

     <div id="txtHint"></div>
  



            </td>
		
            <td>
           <div id="rm-home-new" class="clear">
	<div class="floatL span-two-thirds">



		<div class="clear">
			<div class="floatL span-one-third-plus">
				<div class="content-box">
					<h2>View dangerous intersections in 3D</h2>
					<div name="pano" div id="pano" style="width: 400px; height: 335px">
						<div class="directions">
		                      
						</div><!-- /directions -->
					</div><!-- /home-directions -->
				</div><!-- /content-box -->
			</div><!-- /span-one-third-plus -->
	</div>
</div>


           </td>
	</tr>
	<tr>
		<td>
            
            </td>
		
            <td>
        <h2><table border="1" bordercolor="#FFFFFF" style="background-color:#FFFFFF" width="400" cellpadding="3" cellspacing="3">
	<tr>

<?php
		 if ($Mode == "B"){

  switch ($accidentType) {
   case "Bicycle":
   echo "<td><u>Total bike injuries & fatalities in area</u></td>";
   break;

case "Car":
   echo "<td><u>Total car injuries & fatalities in area</u></td>";
   break;

case "Pedestrian":
   echo "<td><u>Total pedestrian injuries & fatalities in area</u></td>";
   break;
}
}

	 if ($Mode == "A"){

  switch ($accidentType2) {
   case "BICYCLING":
   echo "<td><u>Total bike injuries & fatalities along route</u></td>";
   break;

case "DRIVING":
   echo "<td><u>Total car injuries & fatalities along route</u></td>";
   break;

case "WALKING":
   echo "<td><u>Total pedestrian injuries & fatalities along route</u></td>";
   break;
}
}


?>

		
	</tr>
	<tr>
		<td>Injuries</td>
		<td><?php if ($Mode == "B"){ echo $injuries;} if ($Mode == "C"){ echo $injuries;} if ($Mode == "A"){echo "<div id=\"myDiv\"></div>"; } ?></td>
	</tr>
	<tr>
		<td>Fatalities</td>
		<td><?php if ($Mode == "B"){ echo $killed;} if ($Mode == "C"){ echo $killed;} if ($Mode == "A"){echo "<div id=\"myDivK\"></div>"; } ?></td>
	</tr>

</table></h2>
Collision Data  from the <a href="https://data.cityofnewyork.us/NYC-BigApps/NYPD-Motor-Vehicle-Collisions/h9gi-nx95?"</a> NYPD Motor Collisions Database  Jul 12 to May 13      
            </td>
		
            <td>
<img src="print.jpg" width="42" height="42" onclick="myFunction()">   <b>Click icon for a more printer friendly view </b>  
   <script>
function myFunction()
{
<?php
 if ($Mode == "A")
 {
   
   echo "window.open(\"print.php\");";
 }

 if ($Mode == "B")
 {
   
   echo "window.open(\"print3.php\");";
 }

 if ($Mode == "C")
 {
   
   echo "window.open(\"print4.php\");";
 }


?>

}
</script>  
    
          </td>

	</tr>


</table>




		
<script type="text/javascript">

function showPrecincts()
{




 var mapOptions = {
    zoom:12,
    center: new google.maps.LatLng(40.7588954,-73.9851308),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
   };

var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

if (document.getElementById("showPrecinct").checked)
{ 



}

else
{

}

  }



<?php  

 echo "document.getElementById('NeighborhoodID').value=\"" . $NeighborhoodID . "\";\n";
 echo "document.getElementById('accidentType3').value=\"" . $accidentType3 . "\";\n";	
  echo "document.getElementById('rank3').value=\"" . $rank3 . "\";\n";           
 echo "document.getElementById('loca1').value=\"" . $loca1 . "\";\n";
 echo "document.getElementById('loca2').value=\"" . $loca2 . "\";\n";
 echo "document.getElementById('borough2').value=\"" . $borough2 . "\";\n";
 echo "document.getElementById('borough3').value=\"" . $borough3 . "\";\n";
 echo "document.getElementById('accidentType2').value=\"" . $accidentType2 . "\";\n";
 echo "document.getElementById('rank2').value=\"" . $rank2 . "\";\n";
 echo "document.getElementById('accidentType').value=\"" . $accidentType . "\";\n";
 echo "document.getElementById('borough').value=\"" . $borough . "\";\n";
 echo "document.getElementById('loc3').value=\"" . $dfltValue . "\";\n"; 
 echo "document.getElementById('rank').value=\"" . $rank . "\";\n";
 echo "document.getElementById('radius').value=\"" . $radius . "\";\n";
 echo "document.getElementById('Month').value=\"" . $Month . "\";\n";
   
                  
?> 


//<![CDATA[
$(document).ready(function() { 
	
	 jQuery.data(document.body, 'MDWidgetSelectedForm', 'frmGetDirections');
 
<?php    

if ($Mode == "A"){

echo "switchDivs('directionFields', 'frmGetDirections');";

}
if ($Mode == "B")
{
  
echo "switchDivs('mileageFields', 'frmGetMileage');";

}

if ($Mode == "C")
{
  
echo "switchDivs('PFields', 'frmGetMapsP');";

}

?>
		

         
                      
 
	        

	 $('.destinationField').val(mapAndDirDefaultCaptionWhere);
});

function getDirections() {
  
 

}

function getMap() {
   
  
}



function switchDivs(div, form){

          
         
         
	 var currentform = jQuery.data(document.body, 'MDWidgetSelectedForm');
	 
	 switch (currentform) {
		 case 'frmGetDirections' :
		
                  break;
		 case 'frmGetMileage' :
	
	           
            
           
                   
                    break;
		default :
			var loca1 = document.getElementById('loca1').value;
		    	var loca2 = document.getElementById('loca2').value;
                      
                        borough = document.getElementById('borough').value;
 		       
                  	
	     }
  
switch(div){
   case 'directionFields' :
                
		  if(loca1 != mapAndDirDefaultCaptionWhere){
			$('#loca1').removeClass('watermark'); 
		  }else{
			$('#loca1').addClass('watermark'); 
		  }
		  
		  if(loca2 != mapAndDirDefaultCaptionWhere){
			$('#loca2').removeClass('watermark'); 
		  }else{
			$('#loca2').addClass('watermark'); 
		  }
		 break;
	 case 'mileageFields' :
		 document.forms["frmGetMileage"].elements['from'].value = loca1;
		 document.forms["frmGetMileage"].elements['to'].value= loca2; 
		 document.getElementById('loc3').value="<?php echo $dfltValue; ?>";
		 if(loca1 != mapAndDirDefaultCaptionWhere){
			$('#from').removeClass('watermark'); 
		  }else{
			$('#from').addClass('watermark'); 
		  }
		  
		  if(loca2 != mapAndDirDefaultCaptionWhere){
			$('#to').removeClass('watermark') ;
		  }else{
			$('#to').addClass('watermark'); 
		  }
		  
		 break;
case 'PFields' :
                
		  if(loca1 != mapAndDirDefaultCaptionWhere){
			$('#loca1').removeClass('watermark'); 
		  }else{
			$('#loca1').addClass('watermark'); 
		  }
		  
		  if(loca2 != mapAndDirDefaultCaptionWhere){
			$('#loca2').removeClass('watermark'); 
		  }else{
			$('#loca2').addClass('watermark'); 
		  }
		 break;




	default :
		
          
		if(loca1 != mapAndDirDefaultCaptionWhere){
			$('#loc3').removeClass('watermark'); 
		  }else{
			$('#loc3').addClass('watermark'); 
		  }
   }
	  $('.home-directions .dirForm').hide();
	  document.getElementById(div).style.display = 'block';
	  jQuery.data(document.body, 'MDWidgetSelectedForm', form);

	}


</script>
</body></html>

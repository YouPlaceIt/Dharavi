<?php
include('header.php');
 //$connection = mysql_connect("localhost", "root", "");

// Selecting Database 
 //$db = mysql_select_db("dharavi", $connection);
 
$query = "select * from locations_rectangular;";
$result = mysql_query($query);
$data = array();
while($row = mysql_fetch_row($result)){
	$temp['lat1'] = $row[0];
	$temp['long1'] = $row[1];
	$temp['lat2'] = $row[2];
	$temp['long2'] = $row[3];
	$temp['lat3'] = $row[4];
	$temp['long3'] = $row[5];
	$temp['lat4'] = $row[6];
	$temp['long4'] = $row[7];
	$temp['name'] = $row[8];
	$temp['cost'] = $row[9];
	$temp['margin'] = $row[10];
	$temp['type'] = $row[11];
	$temp['ID'] = $row[13];
	$temp['OwnerID'] = $row[12];
	$dat=mysql_query("SELECT * FROM userdata WHERE ID='$row[12]' limit 1");
	$own = mysql_fetch_array($dat);
	$temp['owner']=$own['Name'];
	$data[] = $temp;

}
echo json_encode($data);
mysql_close ($connection);
?>

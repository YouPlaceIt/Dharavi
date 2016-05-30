<?php
//include('header.php');
include('header.php');
 //$connection = mysql_connect("localhost", "root", "");

// Selecting Database 
 //$db = mysql_select_db("dharavi", $connection);

//Fetching Values from URL  
$query = "select * from locations_circular;";
$result = mysql_query($query);
$data = array();
while($row = mysql_fetch_row($result)){
	$temp['latitude'] = $row[0];
	$temp['longitude'] = $row[1];
	$temp['name'] = $row[2];
	$temp['type'] = $row[3];
	$temp['radial'] = $row[4];
	$temp['cost'] = $row[5];
	$temp['margin'] = $row[6];
	$temp['ownerID']=$row[7];
	$temp['ID']=$row[8];
	$dat=mysql_query("SELECT * FROM userdata WHERE ID='$row[7]' limit 1");
	$own = mysql_fetch_array($dat);
	$temp['owner']=$own['Name'];
	$data[] = $temp;
}

echo json_encode($data);
mysql_close ($connection);

?>

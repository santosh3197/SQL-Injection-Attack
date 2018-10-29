<?php
include('nta_db.php');
$con = mysqli_connect($dbsrvname, $dbusername, $dbpassword, $dbname);
if (!$con){
  echo('Connection ERROR');
  die(print_r(mysqli_error($con)));
}
//$pid = mysqli_real_escape_string($con,$_POST['pid']);
$pid = preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['pid']);
$pass = preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['password']);
//$pass = mysqli_real_escape_string($con,$_POST['password']);
$query = "SELECT * FROM student WHERE pid='".$pid ."' AND password='".$pass."';";
$getdata = mysqli_query($con, $query);
if ($getdata === false){
  echo('ERROR during query execution: ');
  die(print_r(mysqli_error($con))); 
}
if (mysqli_num_rows($getdata)!=0){
  	
  	echo "<table border='1'>
	<tr>
	<th>PID</th>
	<th>Name</th>
	<th>Roll</th>
	<th>Branch</th>
	</tr>";

	while($row = mysqli_fetch_array($getdata))
	{
		echo "<tr>";
		echo "<td>" . $row['PID'] . "</td>";
		echo "<td>" . $row['Name'] . "</td>";
		echo "<td>" . $row['Roll'] . "</td>";
		echo "<td>" . $row['Branch'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";

	die('Successfully Logged IN');
}
else{
  die('Wrong username or password');
}
mysqli_close();
?>
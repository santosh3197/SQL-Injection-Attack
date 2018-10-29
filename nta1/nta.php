<?php
include('nta_db.php');
$con = mysqli_connect($dbsrvname, $dbusername, $dbpassword, $dbname);
if (!$con){
  echo('Connection ERROR');
  die(print_r(mysqli_error($con)));
}
$query = "SELECT * FROM student WHERE pid='" .$_POST['pid'] . "' AND password='" .$_POST['password'] . "';";
mysqli_multi_query($con, $query);
$result = mysqli_store_result($con);
if (mysqli_num_rows($result) > 0){
	echo "<table border='1'>
	<tr>
	<th>PID</th>
	<th>Name</th>
	<th>Roll</th>
	<th>Branch</th>
	</tr>";

	while($row = mysqli_fetch_array($result))
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
	mysqli_free_result($result);
}
else{
  die('Wrong username or password');
}
mysqli_close();
?>
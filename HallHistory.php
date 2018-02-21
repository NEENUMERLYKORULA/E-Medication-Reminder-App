<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$conn=mysql_connect($dbhost,$dbuser,$dbpass);
if(!$conn)
{
die('couldnot connect'.mysql_error());
}


$check=mysql_select_db('seminar');
if(!$check)
{
die('could not select '.mysql_error());
}


$retval="select * from booking";

$sql=mysql_query($retval,$conn);

if(!$sql)
{
die('could not select '.mysql_error());
}

echo "<center><h2>Booking History</h2></center>";
echo "<table border=\"1\" align=\"center\" bgcolor=\"pink\">
			<tr><td>Bno</td><td>Date</td><td>HAll Name</td><td>Fm</td><td>AM/PM</td><td>To</td><td>AM/PM</td></tr>";
	
	while($row=mysql_fetch_assoc($sql))
	{		
	echo "<tr> <td>{$row['Bno']}</td>
		          <td>{$row['Date']}</td>
			  <td>{$row['Hall']}</td>
			  <td>{$row['From']}</td>
			   <td>{$row['Fm']}</td>
			  <td>{$row['To']}</td>
			  <td>{$row['Tm']}</td>
			   </tr>";
	}
echo "</table>";
mysql_close($conn);
?>

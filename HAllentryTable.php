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


$retval="select * from hallentry";

$sql=mysql_query($retval,$conn);

if(!$sql)
{
die('could not select '.mysql_error());
}

echo "<center><h2>User Information</h2></center>";
echo "<table border=\"1\" align=\"center\" bgcolor=\"pink\">
			<tr><td>Hall ID
			</td><td>Hall NAME</td><td>Block NUmberE</td><td>Seat</td><td>Ac/non AC</td><td>Number of mic</td><td>Projector</td></tr>";
	
	while($row=mysql_fetch_assoc($sql))
	{

		echo "<tr><td>{$row['hid']}</td>
		          <td>{$row['Hname']}</td>
			  <td>{$row['Blockno']}</td>
			  <td>{$row['seat']}</td>
			  <td>{$row['Ac']}</td>
			  <td>{$row['Mic']}</td>
			<td>{$row['Projector']}</td>
		     </tr>";
	}
echo "</table>";
mysql_close($conn);
?>

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


$retval="select * from user";

$sql=mysql_query($retval,$conn);

if(!$sql)
{
die('could not select '.mysql_error());
}

echo "<center><h2>User Information</h2></center>";
echo "<table border=\"1\" align=\"center\">
			<tr><td>COLLEGE ID
			</td><td>NAME</td><td>USER TYPE</td><td>EMAIL</td></tr>";
	
	while($row=mysql_fetch_assoc($sql))
	{

		echo "<tr><td>{$row['Cid']}</td>
		          <td>{$row['Name']}</td>
			  <td>{$row['Usertype']}</td>
			  <td>{$row['Email']}</td>
		     </tr>";
	}
echo "</table>";
mysql_close($conn);
?>

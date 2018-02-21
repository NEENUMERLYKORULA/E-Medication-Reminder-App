<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$conn=mysql_connect($dbhost,$dbuser,$dbpass);
if(!$conn)
{
die('couldnot connect'.mysql_error());
}


$check=mysql_select_db('mrs');
if(!$check)
{
die('could not select '.mysql_error());
}
if (isset($_SESSION['login_user'])){
$s = $_SESSION['login_user'];
echo "Hai " . $s . ";


$retval="select * from usertype where first_name='.$s.'";

$sql=mysql_query($retval,$conn);

if(!$sql)
{
die('could not select '.mysql_error());
}

echo "<center><h2>VIEW PROFILE</h2></center>";
echo "<table border=\"1\" align=\"center\" bgcolor=\"pink\">
			<tr><td>ID</td><td>Name</td><td>Email</td>";
	
	while($row=mysql_fetch_assoc($sql))
	{		
	echo "<tr> <td>{$row['id']}</td>
			 <td>{$row['first_name']}</td>
		          <td>{$row['last_name']}</td>
			  <td>{$row['user_email']}</td>
			    </tr>";
	}
echo "</table>";
}
mysql_close($conn);
?>
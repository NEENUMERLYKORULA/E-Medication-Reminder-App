<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$conn=mysql_connect($dbhost,$dbuser,$dbpass);
if(!$conn)
{
die('couldnot connect'.mysql_error());
}
echo'<br>connected successfully';

$check=mysql_select_db('mrs');
if(!$check)
{
die('could not select '.mysql_error());
}
echo'<br> database selected successfully';
session_start();
$a=$_POST['txtPass'];
$b=$_POST['txtName'];
 


/*$retval="select * from usertype where first_name='$b' AND user_password='$a'";

$sql=mysql_query($retval,$conn);


	while($row=mysql_fetch_array($sql,mysql_NUM))
	{

		echo "{$row[1]}";
	}

*/



/*session_start();
$f=$_SESSION['cid'];
echo $f;
*/

$querys = mysql_query("select * from usertype where first_name='$b' AND user_password='$a'", $conn);
$rows = mysql_num_rows($querys); 
	
	if ($rows==1)
	{
		$_SESSION['username'] = $b;
		/*$_SESSION['login_user']=$b; */
		echo "ok";// Initializing Session
		$c=$_POST['ut'];
		
		
			if($c=="HealthcarePersonnel")
			{
				
				header("location:userhome.html");
			}
			elseif($c=="Admin")
			{
				header("location:admin.html");
			}
	}
		else
		{
	 	echo "User name or password invalid";
		}
	
mysql_close($conn);
?>
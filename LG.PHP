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

$check=mysql_select_db('seminar');
if(!$check)
{
die('could not select '.mysql_error());
}
echo'<br> database selected successfully';
$a=$_POST['txtPass'];
$b=$_POST['txtName'];
echo $a;
$query = mysql_query("select * from user where Name='$b' AND pass='$b'", $conn);
SESSION_start();
$rows = mysql_num_rows($query);
if ($rows == 1)
{
$_SESSION['login_user']=$b; 
echo "ok";// Initializing Session
$c=$_POST['ut'];
if($c=="student" OR $c=="faculty")
{
header("location:userhome.html");
}
elseif($c=="others")
{
header("location:admin.html");
}
else
{
echo "User name or password invalid";
}
}
mysql_close($conn);
?>
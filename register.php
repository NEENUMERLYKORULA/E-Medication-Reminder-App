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

$name=$_POST['fname'];
$coid=$_POST['colid'];
$ut=$_POST['ct'];
$mail=$_POST['email'];
$pas=$_POST['pass'];

$check=mysql_select_db('seminar');
if(!$check)
{
die('could not select '.mysql_error());
}
echo'<br> database selected successfully';

session_start();
$_SESSION['cidd']=$coid;
echo $_SESSION['cidd'];

$sql2="insert into user values('$coid','$name','$pas','$ut','$mail')";
$insert=mysql_query($sql2,$conn);
if(!$insert)
{
die('could not insert into table'.mysql_error());
}
echo'<br>value inserted successfully';
mysql_close($conn);
?>
<?php
$dbhost='localhost';
$dbuser='root';
$dbpass='';
$conn=mysql_connect($dbhost,$dbuser,$dbpass);
if(!$conn)
{
die('couldnot connect'.mysql_error());
}
//echo'<br>connected successfully';

$a=$_POST['t1'];
$b=$_POST['t2'];
$c=$_POST['t3'];
$d=$_POST['t4'];
$e=$_POST['a1'];
$f=$_POST['t5'];
$g=$_POST['b1'];
$check=mysql_select_db('seminar');
if(!$check)
{
die('could not select '.mysql_error());
}
//echo'<br> database selected successfully';



$sql2="insert into hallentry values('$a','$b','$c',$d,'$e',$f,'$g')";
$insert=mysql_query($sql2,$conn);
if(!$insert)
{
die('could not insert into table'.mysql_error());
}
//echo'<br>value inserted successfully';
mysql_close($conn);
?>
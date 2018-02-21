<?php
if(isset($_POST['submit1']))
{

$con2 = mysql_connect("localhost","root",""); 
mysql_select_db("mrs", $con2); 

		$txt3=$_POST['txt3'];
		$txt1=$_POST['txt1'];
		$txt2=$_POST['txt2'];
		$query4 = "INSERT INTO med (Ep_no, medname, dosage)VALUES ('$txt3', '$txt1', '$txt2')";
	
echo $query4;

 $retval4 = mysql_query( $query4, $con2);
   
 mysql_close($con2);
}
?>

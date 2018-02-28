<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="typeahead.js"></script>
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
   
   <script>
  $(document).ready(function() {
    $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd'});
	$("#datepicker2").datepicker({ dateFormat: 'yy-mm-dd'});
  });
  </script>
</head>
<?php
//$opt=$_POST['user_email'];
//echo $opt;
//session_start();

//$_SESSION['userid']=$opt;
//echo "Welcome $_SESSION[userid]";

//$sname= $_POST['textfield'];
//echo $sname;
$con = mysql_connect("localhost","root",""); 
if (!$con) 
  { 
  die('Could not connect: ' . mysql_error()); 
  } 
  

mysql_select_db("mrs", $con); 

?>
<form method="post">
<center>
<table>
<th>NEW PATIENT !!!</th>
<tr><td>PATIENT ID:</td><td><input type="text" name="t1" /></input></td></tr>
<tr><td>NAME:</td><td><input type="text" name="t2" /></input></td></tr>
<tr><td>DOB:</td><td><input type="text" name="t7" id="datepicker" /></input></td></tr>
<tr><td>AGE:</td><td><input type="text" name="t3" /></input></td></tr>
<tr><td>GENDER:</td><td><input type="radio" name="radio" value="FEMALE">FEMALE
<input type="radio" name="radio" value="MALE">MALE</td></tr>
<tr><td>COMMUNICATION:</td></tr>
<tr><td>ADDRESS:</td><td><input type="textarea" name="t4" /></input></td></tr>
<tr><td>E-MAIL ID:</td><td><input type="text" name="t5" /></input></td></tr>
<tr><td>PHONE NUMBER:</td><td><input type="text" name="t6" /></input></td></tr>
<tr><td>REG DATE:</td><td><input type="text" name="t8" id="datepicker2"/></input></td></tr>
<tr><td><input type="submit" name="s1" value="ADD" /></input></td><td>
<input type="reset" name="s2" value="CANCEL"/></input></td></tr>
</table>
</center>

<?php

if(isset($_POST['s1']))
{

$con2 = mysql_connect("localhost","root",""); 
mysql_select_db("mrs", $con2); 
		$txt3=$_POST['t3'];
		$txt1=$_POST['t1'];
		$txt2=$_POST['t2'];
			$txt4=$_POST['t4'];
		$txt5=$_POST['t5'];
		$txt6=$_POST['t6'];
		$txt7=$_POST['t7'];
			$txt8=$_POST['t8'];
			$txt9=$_POST['radio'];
		$query4 = "INSERT INTO userlogintable (patient_id, first_name,dob, age,addrs,gender,user_email,ph,regdt)VALUES ('$txt1','$txt2', '$txt7', '$txt3','$txt4','$txt9','$txt5','$txt6','$txt8')";
	
echo $query4;
//$query5="INSERTED new  row";

 $retval4 = mysql_query( $query4, $con2);
    //print '<script type="text/javascript">alert("' . $query5. '");</script>';
 mysql_close($con2);
 
}
?>
</form>
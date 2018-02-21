<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
   <script>
  $(document).ready(function() {
    $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd'});
	$("#datepicker2").datepicker({ dateFormat: 'yy-mm-dd'});
  });
  </script>
	

<script langauge="javascript">
function post_value(){
$var=opener.document.f1.p_name.value;
<?php echo $var; ?>
}
</script>
<title>NEW MEDICATION DETAILS</title>
</head>

<body onload="myFunction()">

<form name="frm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<center>

	<table><tr><td>
	  
	  E-PRESCRIPTION NO:</td><td><input type="text" name="txt3" readonly="readonly" value="<?php 
    function gen_random_string($length=6)
    {
        $chars ="ABCDEF1234567890";
        $final_rand ='';
        for($i=0;$i<$length; $i++)
        {
            $final_rand .= $chars[ rand(0,strlen($chars)-1)];
        }
        return $final_rand;
    }
    echo gen_random_string()."\n"; //generates a string 
    ?>" /></input></td>
	
<td>Date: </td><td><input type="text" name ="txt5" id="demo"/></td></tr>

<script>
function myFunction() {

	//post_value();
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1;
	var yyyy = today.getFullYear();
	if(dd<10){
		dd ='0'+dd;
	}
	if(mm<10){
		mm='0'+mm;
	}
	var today = yyyy+'/'+mm+'/'+dd;
document.getElementById('demo').value= today;
}
</script><br>

	  <tr><td>MEDICATION START:</td><td><input type="text" id="datepicker" name="startdt"/></td>
	  <td>MEDICATION END:</td><td><input type="text" id="datepicker2" name="enddt"/></td></tr>
	  <tr><td>MEDICINE NAME:</td><td><input type="text" name="txt1"/></input></td></tr>
	  <tr><td>DOSAGE:</td><td><input type="text" name="txt2"/></input></td></tr>
	  
	  <tr></tr><tr><td></td><td><input type="submit" name="submit1" value="OK" onclick="post_value();"/></td>
	   <td><input type="button" onclick="self.close();" value="BACK" name="DONE"></input></td></tr>
	   </table>
<?php
if(isset($_POST['submit1']))
{
	//$op ="E11";
$con2 = mysql_connect("localhost","root",""); 
mysql_select_db("mrs", $con2); 

		$txt3=$_POST['txt3'];
		$txt1=$_POST['txt1'];
		$txt2=$_POST['txt2'];
		$txt5=$_POST['txt5'];
		$txt6=$_POST['startdt'];
		$txt7=$_POST['enddt'];
		$qry="INSERT INTO refer (eprescno,p_id,ep_date)VALUES ('$txt3','$var', '$txt5')";
		//echo $qry;
		$rett=mysql_query($qry,$con2);
		$query4 = "INSERT INTO med (Ep_no,pt_id, medname, dosage, start_dt, end_dt)VALUES ('$txt3','$op', '$txt1', '$txt2','$txt6','$txt7')";
	
//echo $query4;
$query5="ADDED NEW MEDICINE";

 $retval4 = mysql_query( $query4, $con2);
    print '<script type="text/javascript">alert("' . $query5. '");</script>';

   
 mysql_close($con2);
}
?>
	  </center>
 	  </form>    
</html>


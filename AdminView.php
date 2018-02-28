<html>
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
<form method="POST">
SELECT DATE<input type="text" id="datepicker2" name="enddt" autocomplete="off"/><input type="submit" name="s1" value="FIND" /></input>
<?php
if(isset($_POST['s1']))
{
		$txt = $_POST['enddt'];
		//echo $txt;
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
$query1 = "select s.patient_id,s.first_name,b.eprescno,b.ep_date from userlogintable s,refer b where  b.ep_date=  '$txt'  and b.p_id=s.patient_id"; 
$retval = mysql_query( $query1, $con);
  //echo $query1; 
  if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   echo "<center><h2>Consultation History</h2></center>";
echo "<table border=\"1\" align=\"center\" bgcolor=\"skyblue\">
			<tr><td>PATIENT_ID</td><td>NAME</td><td>DATE</td><td>E-PRECRIPTION No</td></tr>";
	while($row1=mysql_fetch_assoc($retval))
	{		
	echo "<tr> <td>{$row1['patient_id']}</td>
				<td>{$row1['first_name']}</td>
			 <td>{$row1['ep_date']}</td>
			  <td>{$row1['eprescno']}</td>
			  				    </tr>";
	}

  echo "</table" ;
}
?>

</form>
</html>
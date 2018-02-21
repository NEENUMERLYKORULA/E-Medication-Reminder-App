<?php
$opt=$_POST['user_email'];
//echo $opt;

$sname= $_POST['textfield'];
//echo $sname;
$con = mysql_connect("localhost","root",""); 
if (!$con) 
  { 
  die('Could not connect: ' . mysql_error()); 
  } 
  

mysql_select_db("mrs", $con); 
$query1 = "SELECT * FROM userlogintable where patient_id='$opt'"; 
//echo $query1;
//$result1 = mysql_query($query1) or die(mysql_error()); 
 $retval = mysql_query( $query1, $con);
   
  /* if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   */
   while($row=mysql_fetch_assoc($retval))
    {
		echo'<center>';
		echo'<table>';
        echo '<tr><td>PATIENT NAME:</td><td><input type="text" readonly="readonly" value='.$row['first_name'].'></td></tr>';
		echo '<tr><td>E-MAIL:</td><td><input type="text" readonly="readonly" value='.$row['user_email'].'><br/></td></tr>';
		echo '<tr><td>PATIENT ID:</td><td><input type="text" readonly="readonly" name="txtid" value='.$row['patient_id'].'><br/></td></tr>';
		echo'</table>';
		echo '</center>';
    }
				//$query2 = "SELECT * FROM med where pt_id='$opt'"; 
				
$query2 = "select b.eprescno,b.ep_date,c.medname,c.dosage,c.start_dt,c.end_dt from userlogintable s,refer b,med c where s.patient_id='$opt' and b.p_id=s.patient_id and b.eprescno=c.Ep_no";
			   //echo $query2;
//$result1 = mysql_query($query2) or die(mysql_error()); 
 $retval2 = mysql_query( $query2, $con);
   
   if(! $retval2 ) {
      die('Could not get data: ' . mysql_error());
   }
   echo "<center><h2>PAST MEDICATION DETAILS</h2></center>";
echo "<table border=\"1\" align=\"center\" bgcolor=\"BLUE\">
			<tr><td>E-PRESCRIPTION NO</td><td>Date</td><td>MEDICINE NAME</td><td>Dosage</td><td>MEDICATION START DATE</td><td>MEDICATION END DATE</td></tr>";
	while($row1=mysql_fetch_assoc($retval2))
	{		
	echo "<tr> <td>{$row1['eprescno']}</td>
				<td>{$row1['ep_date']}</td>
			 <td>{$row1['medname']}</td>
			  <td>{$row1['dosage']}</td>
			   <td>{$row1['start_dt']}</td>
			    <td>{$row1['end_dt']}</td>
				    </tr>";
	}
	/*while($row1=mysqli_fetch_assoc($retval2))
	{		
	echo "<tr> <td>{$row1['Ep_no']}</td>
				<td>{$row1['start_dt']}</td>
			 <td>{$row1['medname']}</td>
			  <td>{$row1['dosage']}</td>
			  <td>{$row1['end_dt']}</td>
			    </tr>";
	}*/
echo "</table>";
   
  echo $retval2;
  // echo "Fetched data successfully\n";
mysql_close($con);
?>
<form method=post action='child3.php' name=f1>
<input type="hidden" name="txt_new" id="cname" value="<?php echo $opt; ?>"/>
<a href="javascript:void(0);"NAME="My Window Name" onClick=window.open("child3.php","Ratting","width=550,height=170,left=150,top=200,toolbar=1,status=1,");>Click here to ADD NEW MEDICATION</input> <BR>
<align="left"><a href="javascript:void(0);"NAME="My Window Name" onClick=window.open("child4.php","Ratting","width=550,height=170,left=150,top=200,toolbar=1,status=1,");>ADD To Pharmacy Cart</input> </align><br>
<a href="javascript:void(0);"NAME="My Window Name" onClick=window.open("child4.php","Ratting","width=550,height=170,left=150,top=200,toolbar=1,status=1,");>ADD LAB tests HERE</input> 
</form>
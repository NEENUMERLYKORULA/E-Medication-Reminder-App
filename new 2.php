<script type="text/javascript"> 
function showname(what) 
{ 
var f = document.forms[0];
  f.textfield.value=what.options[what.selectedIndex].title;
  

   } 

window.onload=function() { 
  showname(document.form1.number) 
  
} 
</script> 
<head> 
<link rel="stylesheet" href="style2.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title> Untitled Document</title> 


</head> 

<body>
<div class="slider-holder">
        <span id="slider-image-1"></span>
        <span id="slider-image-2"></span>
        <span id="slider-image-3"></span>
        <div class="image-holder">
            <img src="images/1.jpg" class="slider-image" />
            <img src="images/2.jpg" class="slider-image" />
            <img src="images/3.jpg" class="slider-image" />
        </div>
        <div class="button-holder">
            <a href="#slider-image-1" class="slider-change"></a>
            <a href="#slider-image-2" class="slider-change"></a>
            <a href="#slider-image-3" class="slider-change"></a>
        </div>
    </div>

<CENTER>

<H2>E-MEDICATION REMINDER SYSTEM</H2>
    <form action="get_details.php" method="post">
	<CENTER> <table><tr><td>USER_ID</td>
<?php 

$con = mysql_connect("localhost","root",""); 
if (!$con) 
  { 
  die('Could not connect: ' . mysql_error()); 
  } 

   

mysql_select_db("mrs", $con); 

//Query 
$query1 = "SELECT * FROM userlogintable"; 
$result1 = mysql_query($query1) or die(mysql_error()); 

//$result = mysql_query ($query); 
echo "<td><select name=\"user_email\" onchange=\"showname(this)\">"; 

// printing the list box select command 
echo "$result1";
while($row1=mysql_fetch_array($result1)){ 

    echo "<option value=\"$row1[patient_id]\"  title=\"$row1[first_name]\">$row1[patient_id]</option>";
	  } 

echo "</select></td></tr>";// Closing of list box 


       ?>



     <BR> 
     <tr><td>NAME: </td><td><input type="text" name="textfield" value=""/></td></tr>

	<tr><td></td><td><button name="get_details">GET DETAILS</button></td></tr>
    
 
     
       </table>
	  </CENTER>
</form> 
</body> 
</html>

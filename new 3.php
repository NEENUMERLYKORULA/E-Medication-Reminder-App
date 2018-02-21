<?php
$con = mysql_connect("localhost","root","");
if (!$con) { die('Could not connect: ' . mysql_error()); }
$db = mysql_select_db("mrs") or die('Could not select DB: ' . mysql_error()); 
?>
<html>
<head>
<script type="text/javascript">
	var compInfoArray = new Array();
	
	<?php
		$query1 = "SELECT * FROM userlogintable ORDER BY user_email";
		$result1 = mysql_query($query1) or die(mysql_error());
		
		// build javascript array
		while($row1=mysql_fetch_array($result1)){ 
			echo 'compInfoArray['.$row1['user_email'].'] = new Array();';
			echo 'compInfoArray['.$row1['user_email'].']["first_name"] = "'.$row1['first_name'].'";';
			echo 'compInfoArray['.$row1['user_email'].']["last_name"] = "'.$row1['last_name'].'";';
		}
	?>
	
	function showname() {
		var compid = document.form1.compid.value;
		document.form1.first_name.value = compInfoArray[user_email]["first_name"];
		document.form1.last_name.value = compInfoArray[user_email]["last_name"];
	}
	
	window.onload=function() {
		showname();
	} 
	
</script>
</head>
<body>
	<form name="form1">  
		<select name="compid" onchange="showname()">
		<?php
			$query1 = "SELECT * FROM userlogintable ORDER BY user_email";
			$result1 = mysql_query($query1) or die(mysql_error());
			
			// build javascript array
			while($row1=mysql_fetch_array($result1)){ 
				echo '<option value="'.$row1['user_email'].'">'.$row1['first_name'].'</option>';
			}
		?>
		</select>
		<label>
			<input type="text" name="first_name" value="" />
			<input type="text" name="last_name" value="" />
      	</label>
		<input name="submit" type="submit" id="submit" value="Aceptar" /> 
	</form>
</body>
</html>
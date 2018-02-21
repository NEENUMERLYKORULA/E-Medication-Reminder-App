<html>
	<head><b><u><h1 align="center" >Edit Profile</h1></u></b>
		<title>Student Registation</title>
	</head>
	<body bgcolor="pink">
		
			<center>
			<form action="register.php" method="POST">
				<table>
				
					<tr>
						<td>First Name:</td>
						<td><input type="text" name="fname" required></td>
					</tr>
					
					<tr>
						<td>CollegeID:</td>
						<td><input type="text" name="colid" required ></td>
					</tr>
					<tr>
						<td>Category:</td>
						<td><input type="radio" name="ct" value="Student">Student<br>
						<input type="radio" name="ct" value="faculty">Faculty<br>
						<input type="radio" name="ct" value="others">Others</td>
					</tr>
					<tr>
						<td>EmailID</td>
						<td><input type="text" name="email" required></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="pass" required></td>
					</tr>
					<tr>
						<td><input type="submit" value="submit" name="submit"></td>
						<td><input type="reset" value="reset"></td>
					</tr>
				
				</table>
			</form>
			</center>
		
	</body>
</html>

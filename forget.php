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

$check=mysql_select_db('mrs');
if(!$check)
{
die('could not select '.mysql_error());
}
if(isset($_POST) & !empty($_POST)){
	$username = mysql($con, $_POST['username']);
	$sql = "SELECT * FROM userlogintable WHERE first_name = '$username'";
	$res = mysql_query($con, $sql);
	$count = mysql_num_rows($res);
	if($count == 1){
		echo "Send email to user with password";
	}else{
		echo "User name does not exist in database";
	}
}
$r = mysql_fetch_assoc($res);
$password = $r['password'];
$to = $r['email'];
$subject = "Your Recovered Password";
 
$message = "Please use this password to login " . $password;
$headers = "From : neenumko27@gmail.com";
if(mail($to, $subject, $message, $headers)){
	echo "Your Password has been sent to your email id";
}else{
	echo "Failed to Recover your password, try again";
}
?>
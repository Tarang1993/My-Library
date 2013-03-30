<?php session_start(); ?>

<html>
<head>
<title>Library Management System</title>
<link href="login.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="User-icon.png" />
</head>


<body>


	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="header">
	<td id="dipin"><h1>My Library</h1>
	</td>
	</td>
		
	</tr>
	</table>

	<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container">
	<tr>
	<td id="page">
		
		
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
		<tr valign="top">
		<td id="sidebar">		
		<td>&nbsp;</td>
		<td >
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			
			<tr>
			<td>&nbsp;</td>
			</tr>
			
			<tr>
			<td>&nbsp;</td>
			</tr>
			
			<tr>
			<td>&nbsp;</td>
			</tr>

			<tr>
			<td style="color: #78AA00"><h1> Library management system </h1></td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td width="100%"><p>Please log in to continue</p></td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td class="divider">&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td class="bg4">&nbsp;</td>
			<td>&nbsp;</td>
				</tr>
			
			<td>&nbsp;</td>
			<td class="bg4">&nbsp;</td>
			<td>&nbsp;</td>
				</tr>
			<tr valign="top">
			<td class="bg4">&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr><tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			</tr>
			</table>
						
		</td>
		</tr>
		</table></td>
	</tr>
	</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="footer">
	<tr>
		<td><p>Copyright &copy; 2013 </a></p></td>
	</tr>
</table>





	<?php

//////////////////////////////////  DISPLAYS PHP ERRORS !!
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
//////////////////////////////////

$user=$_POST['user'];
$passw=$_POST['password'];
$host="localhost"; //hostname
$username="root"; //username
$password="tarang1tan2"; //password
$db_name="db_b090437cs";
if($user&&$passw)
{
$dbconn = mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name") or die("cannot select DB");
$query='select pass from login where usr=' ."'". $user . "'";

$result=mysql_query($query) or die('could not connect');

$password=mysql_fetch_array($result);

if($password['pass']==$passw)
{

if($user=="admin")
{
$_SESSION['user']='admin';
?>
<script type="text/javascript">
	window.location = "admin/admin.php"	
	</script>

<?php
}
else
{
$_SESSION['user']='guest';
?>
<script type="text/javascript">
	window.location = "guest/guest.php"	
	</script>
<?php
}
}

else
{
?>
<script type="text/javascript">
	alert("Login failed ");	
	window.location = "login.php"
	</script>

<?php

}

mysql_free_result($result);
mysql_close($dbconn);



}

else
{
?>
<script type="text/javascript">
	alert("Login failed ");	
	window.location = "login.php"
	</script>

<?php
}

?>
</body>
</html>

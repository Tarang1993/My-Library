<html>
<head>
<title>Library Management System</title>
<link href="login.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="User-icon.png" />
</head>


<?php
//session_start(); 
unset($_SESSION['user']);

//////////////////////////////////  DISPLAYS PHP ERRORS !!
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);
//////////////////////////////////

?>

<script type="text/javascript">

function validate()
{

var id=document.login.user.value;
var pass=document.login.password.value;

if(!id)
{
document.login.user.focus();
return false;
}

if(!pass)
{i
document.login.password.focus();
return false;
}
return true;

}

</script>

<body>

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
			<td style="color: #78AA00"><h1>My Library </h1></td>
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
			<itd>&nbsp;</td>
			</tr>
			</table>
						
			<table width="506" border="0" cellpadding="0" cellspacing="0">
			<form name="login" action="process.php" method="post" onSubmit="return validate()">
			<tr>
			<td>
			User name:
			</td>
			<td>
			<input type="text" name="user" />
			</td>
			<tr>
			<td>
			Password:
			</td>
			<td>
			<input type="password" name="password" />
			</td>
			</tr>
			<tr>
			<tr>
			<td>&nbsp;</td>
			<td class="bg4">&nbsp;</td>
			<td>&nbsp;</td>
				</tr>
			<td>
			<input type="submit" value="submit">
			</td>
			</tr>
			</form>
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
			</table>
		</td>
		</tr>
		</table></td>
	</tr>
	</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="footer">
	<tr>
		<td><p>Copyright &copy; 2013  </a></p></td>
	</tr>
</table>
</body>
</html>

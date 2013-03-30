<html>
<head>

<title>My Library</title>
<link href="../default.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../img/User-icon.png" />
</head>

<body>

<script>

function editad_val()
{
var passwd=document.editad.passwd.value;
var passwd1=document.editad.passwd1.value;

if (!passwd.length)
{
alert('Incomplete form');
document.editad.passwd.focus();
return false;
}

if (!passwd1.length)
{
alert('Incomplete form');
document.editad.passwd.focus();
return false;
}

if (passwd.length!=passwd1.length)
{
alert('Passwords do not match');
document.editad.passwd.focus();
return false;
}


if (passwd!=passwd1)
{
alert('Passwords do not match');
document.editad.passwd.focus();
return false;
}

if(passwd.length<4)
{
alert('Password has to be greater than 4 characters');
document.editad.passwd.focus();
return false;
}


return true;
}






function editgu_val()
{
var passwd=document.editgu.passwd.value;
var passwd1=document.editgu.passwd1.value;

if (!passwd.length)
{
alert('Incomplete form');
document.editgu.passwd.focus();
return false;
}

if (!passwd1.length)
{
alert('Incomplete form');
document.editgu.passwd.focus();
return false;
}

if (passwd.length!=passwd1.length)
{
alert('Passwords do not match');
document.editgu.passwd.focus();
return false;
}


if (passwd!=passwd1)
{
alert('Passwords do not match');
document.editgu.passwd.focus();
return false;
}

if(passwd.length<4)
{
alert('Password has to be greater than 4 characters');
document.editgu.passwd.focus();
return false;
}


return true;
}






function changeme(id, action) {
       if (action=="hide") {
            document.getElementById(id).style.display = "none";
       } else {
            document.getElementById(id).style.display = "block";
       }
}


function modadmin()
{
changeme('msg', 'hide');
changeme('editadmin', 'show');
changeme('editguest', 'hide');

}

function modguest()
{
changeme('msg', 'hide');
changeme('editadmin', 'hide');
changeme('editguest', 'show');
}


</script>



<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

session_start();
if ($_SESSION['user']!='admin')
{
?>
	<script type="text/javascript">
	alert("You do not have necessary privileges to see this page\nPlease relogin");
	window.location = "../login.php"
	</script>
	<?php

}
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="header">
	<tr><td>&nbsp</td>
	<td style="color: #FFFFFF" align="center"><h1>Central Library</h1>
	</td>
	
	</tr>
	</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="header">
	<tr>
		<tr>
		<td id="logo"><p>Welcome Admin&nbsp|&nbsp<a href="../login.php">Logout</a></p></td>
		<td><table width="100%" border="0" cellpadding="0" cellspacing="0" id="menu">
				<tr>
					<td><a href="members.php">Members</a></td>
					<td><a href="books.php">Books</a></td>
					<td><a href="issue.php">Issue</a></td>
			</tr>
			</tr>
			</table></td>
	</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container">
	<tr>
		<td id="page">
			<table  border="0" cellpadding="0" cellspacing="0">
				<tr valign="top">
					<td id="sidebar">
					<table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><h2>Working Menu</h2></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="100%"><p><strong><span onclick="modadmin();" style="cursor: pointer;">Modify Admin Account</span></strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td><p><strong><span onclick="modguest();" style="cursor: pointer;">Modify Guest Account</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
						</table></td>
					<td>&nbsp;</td>
					
					<td id="content"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td><h2>LIBRARY MANAGEMENT</h2></td>
							</tr>
							<tr>
								<td>Administrative Portal</td>
							</tr>
							
							<tr>
								<td class="divider">&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							
							
						</table>
						<table id="msg" style="display:block;" width="506" border="0" cellpadding="0" cellspacing="0">
						<tr>
						<td>Manage The Library System
						</td>
						</tr>
						</table>
							
							
						<table id="editadmin" style="display:none;" width="506" border="0" cellpadding="0" cellspacing="0">
						<form NAME=editad action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return editad_val()">
							<tr>
							<td>
							Admin Password :
							</td>
							<td>
							<input type="password" name="passwd" />
							</td>
							</tr>
							<tr><td>&nbsp</td></tr>
							
							<tr><td>&nbsp</td></tr>
							<tr>
							<td>
							Verify Admin Password :
							</td>
							<td>
							<input type="password" name="passwd1" />
							</td>
							</tr>
							<tr><td>&nbsp</td></tr>
							
							<tr>
							<td>
							<input type="hidden" name="flag12" value=1 />
							</td>
							</tr>
							
							
							<tr>
							<td>
							
							<INPUT TYPE=submit NAME=submit VALUE=Submit />
							</td>
							</tr>


							</FORM>
							</table>
								
							<table id="editguest" style="display:none;" width="506" border="0" cellpadding="0" cellspacing="0">
						<form NAME=editgu action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return editgu_val()">
							<tr>
							<td>
							Guest Password :
							</td>
							<td>
							<input type="password" name="passwd" />
							</td>
							</tr>
							<tr><td>&nbsp</td></tr>
							
							<tr><td>&nbsp</td></tr>
							<tr>
							<td>
							Verify Guest Password :
							</td>
							<td>
							<input type="password" name="passwd1" />
							</td>
							</tr>
							<tr><td>&nbsp</td></tr>
							
							<tr>
							<td>
							<input type="hidden" name="flag13" value=1 />
							</td>
							</tr>
							
							
							<tr>
							<td>
							
							<INPUT TYPE=submit NAME=submit VALUE=Submit />
							</td>
							</tr>


							</FORM>
							</table>
						
						
						
						
						</td>
						</tr>
						</table>
					</td>
					</tr>
					</table>
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="footer">
	<tr>
		<td><p>Copyright &copy; 2013 ! </a></p></td>
	</tr>
</table>

<?


if(isset($_POST['flag12']))
{
unset($_POST['flag12']);

$dbconn=mysql_connect('localhost','root','tarang1tan2');
mysql_select_db('db_b090437cs') or die("couldnt select");

$q1="update login set pass='".$_POST['passwd']."' where usr='admin'";

$r1=mysql_query($q1);

	if($r1)
	{  
	?>  
    <script type="text/javascript">
    alert('Password successfully changed');
    window.location("admin.php");
    
    </script>
    
    
    <?php
    
    }
    
    
    else
    {
    ?>  
    <script type="text/javascript">
    alert('Unable to change password');
    window.location("admin.php");
    
    </script>
    
    
    <?php
    }
    
    
mysql_free_result($r1);
mysql_close($dbconn);

}



if(isset($_POST['flag13']))
{
unset($_POST['flag13']);

$dbconn=mysql_connect('localhost','root','tarang1tan2');
mysql_select_db('db_b090437cs') or die("couldnt select");

$q1="update login set pass='".$_POST['passwd']."' where usr='guest'";

$r1=mysql_query($q1);

	if($r1)
	{  
	?>  
    <script type="text/javascript">
    alert('Password successfully changed');
    window.location("admin.php");
    
    </script>
    
    
    <?php
    
    }
    
    
    else
    {
    ?>  
    <script type="text/javascript">
    alert('Unable to change password');
    window.location("admin.php");
    
    </script>
    
    
    <?php
    }
    
    
mysql_free_result($r1);
mysql_close($dbconn);

}




?>

</body>
</html>

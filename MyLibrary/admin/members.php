<html>
<head>


<script type="text/javascript">

function changeme(id, action) {
       if (action=="hide") {
            document.getElementById(id).style.display = "none";
       } else {
            document.getElementById(id).style.display = "block";
       }
}


function adduser()
{
changeme('dropuser','hide');
changeme('add', 'show');
changeme('text', 'hide');
changeme('t', 'hide');
changeme('view', 'hide');
changeme('resultset', 'hide');
}

function viewuser()
{
changeme('dropuser','hide');
changeme('view', 'show');
changeme('t', 'show');
changeme('add', 'hide');
changeme('text', 'hide');
changeme('resultset', 'hide');
}

function edituser()
{
changeme('dropuser','hide');
changeme('add', 'hide');
changeme('text', 'hide');
changeme('view', 'hide');
changeme('t', 'hide');
changeme('resultset', 'hide');
}

function dropuser()
{
changeme('dropuser','show');
changeme('add', 'hide');
changeme('text', 'hide');
changeme('view', 'hide');
changeme('t', 'hide');
changeme('resultset', 'hide');
}

function dispuser()
{
changeme('dropuser','hide');
changeme('resultset','show');
changeme('add', 'hide');
changeme('text', 'hide');
changeme('view', 'hide');
changeme('t', 'hide');


}

</script>

<title>My Library</title>
<link href="../default.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../img/User-icon.png" />
</head>
<body>

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


<script type="text/javascript">


function view_val()
{

if (document.view_mem.v_n.checked)
{

var nm=document.view_mem.v_name.value;
if(!nm.length)
{
alert("Incomplete Form");
document.view_mem.v_name.focus();
return false;

}

else
{

var regex = /\d/g;
if(regex.test(nm))
{
alert('Invalid name');
document.view_mem.v_name.focus();
return false;
}

}

}

if (document.view_mem.v_i.checked)
{
var id=document.view_mem.v_id.value;
var age=document.regn.age.value;

if(!id.length)
{
alert("Incomplete Form");
document.view_mem.v_id.focus();
return false;

}

}



return true;


}


function add_val()
{

var nm=document.regn.nm.value;

if(!nm.length||!mail.length)
{
alert("Incomplete Form");
if(!nm.length)
document.regn.nm.focus();
if(!mail.length)
document.regn.age.focus();

return false;
}


var regex = /\d/g;
if(regex.test(nm))
{
alert('Invalid name');
document.regn.nm.focus();
return false;

}


return true;
}
</script>


<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="header">	
	<td style="color: #FFFFFF" align = "center" ><h1>My Library</h1>
	</td>
	
	</tr>
	</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="header">
	<tr>
		<td id="logo">
			<p>Welcome Admin&nbsp|&nbsp<a href="admin.php">Home&nbsp|&nbsp</a>  <a href="../login.php">Logout</a></p></td>
		<td><table width="100%" border="0" cellpadding="0" cellspacing="0" id="menu">
				<tr>
					<td><a href="members.php">Members</a></td>
					<td><a href="books.php">Books</a></td>
					<td><a href="issue.php">Issue</a></td>
				</tr>
			</table></td>
	</tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container">
	<tr>
		<td id="page">
			<table border="0" cellpadding="0" cellspacing="0">
				<tr valign="top">
					<td id="sidebar"><table border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><h2>Working Menu</h2></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="100%"><p><strong><span onclick="adduser();" style="cursor: pointer;">Add user</span></strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td><p><strong><span onclick="viewuser();" style="cursor: pointer;">View User Details</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<!--tr>
								<td><p><strong><span onclick="edituser();" style="cursor: pointer;">Edit Details</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr-->
							<tr>
								<td><p><strong><span onclick="dropuser();" style="cursor: pointer;">Drop User</strong><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
						</table></td>
					<td>&nbsp;</td>
					
					<td id="content"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td><h2> LIBRARY MANAGEMENT </h2></td>
							</tr>
							<tr>
								<td>Members Management</td>
							</tr>
							
							<tr>
								<td class="divider">&nbsp;</td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							
							
						</table>
						
						
						<table id="text" style="display:block;" width="506" border="0" cellpadding="0" cellspacing="0">
						<tr>
						<td>Manage members for the library management system
						
						<?php

						$dbconn=mysql_connect('localhost','root','tarang1tan2');
						mysql_select_db('db_b090437cs') or die("couldnt select");


						$mem="select count(*) from members";
						$r_mem=mysql_query($mem)  or die('Could not execute query');
						$m= mysql_fetch_array($r_mem);
						echo "<br /><br />Total number of members : " . $m[0] . "<br />";						
						mysql_free_result($r_mem);	

						mysql_close($dbconn);
						
						?>
							
						</td>
						</tr>
						</table>

						
						<table id="dropuser" style="display:none;" width="506" border="0" cellpadding="0" cellspacing="0">
						<form NAME=issue action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
							<tr>
							<td>
							User ID :
							</td>
							<td>
							
							<input type="text" name="id" />							
							
							</td>
							</tr>
							<tr><td>&nbsp</td></tr>
							
							<tr>
							<td>
							<input type="hidden" name="flag8" value=1 />
							</td>
							</tr>
							
							
							<tr>
							<td>
							
							<INPUT TYPE=submit NAME=submit VALUE=Submit />
							</td>
							</tr>

							</FORM>
							</table>



						<table id="add" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
						<form NAME=regn action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return add_val()">
							<tr>
							<td>
							Name :
							</td>
							<td>
							<input type="text" name="nm" />
							</td>
							</tr>
							<tr><td>&nbsp;</td></tr>
							<tr>
							<td>
							ID : 
							</td>
							<td>
							<input type="text" name="id" />
							</td>
							<tr>
							<tr><td>&nbsp;</td></tr>
							<tr>
							<td>
							<input type="hidden" name="flag1" value=1 />
							</td>
							</tr>
							<tr>
							<td>
							<INPUT TYPE=submit NAME=submit VALUE=Submit />
							</td>
							</tr>
							</FORM>
							</table>
							
							<table id="t" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
							<tr><td>Tick the search attributes</td></tr>
							</table>
							<table id="view" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
							<form NAME=viewmem action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return view_val()">
							<tr><td>&nbsp;</td></tr>
							<tr>
<td>
Name
</td><td></td>
<td>
<input type="text" name="v_name"><input type="checkbox" name="v_n" value="name" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>
ID
</td><td></td>
<td>
<input type="text" name="v_id"><input type="checkbox" name="v_i" value="ID" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>
<input type="hidden" name="flag2" value=1 />
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>
<input type="submit" name="submit" value="Submit" />
</td>
</tr>
							</form>
							</table>


<?

if(isset($_POST['flag8']))
{
unset($_POST['flag8']);

$dbconn=mysql_connect('localhost','root','tarang1tan2');
mysql_select_db('db_b090437cs') or die("couldnt select");

$q1="select * from members where id='".$_POST['id']."'";

$r1=mysql_query($q1);

$mem=mysql_fetch_row($r1,0);

if(!$mem[0])
{

?>

<script type="text/javascript">
var id="<?php echo $_POST['id'] ?>";
alert('Member id ' + id + ' does not exist');
  window.location("members.php");
</script>
<?
mysql_free_result($r1);
}
else
{

$q2="select * from issue where id='".$_POST['id']."'";
$r2=mysql_query($q2);

$no=mysql_fetch_array($r2);


if($no[0]!=NULL)
{
?>

<script type="text/javascript">
var id="<?php echo $_POST['id'] ?>";
alert('Cannot delete..Member ' + id + ' has pending book returns');
  window.location("members.php");
</script>
<?

mysql_free_result($r2);

}

else
{

$q3="delete from members where id='".$_POST['id']."'";
$r3=mysql_query($q3);

if($r3)
{

?>

<script type="text/javascript">
var id="<?php echo $_POST['id'] ?>";
alert('Member ' + id + ' successfully deleted !');
  window.location("members.php");
</script>
<?

mysql_free_result($r3);
}
else
{
?>

<script type="text/javascript">
alert('Error..Cannot delete member');
  window.location("members.php");
</script>

<?

}

}

}

mysql_close($dbconn);

}

?>


<?php


if(isset($_POST['flag2']))
{
unset($_POST['flag2']);
?>
<script type="text/javascript">
</script>
<?
unset($_POST['flag2']);

$dbconn=mysql_connect('localhost','root','tarang1tan2');
mysql_select_db('db_b090437cs') or die("couldnt select");

$query="select * from members where";

echo "<br />";



if($_POST['v_name']&&isset($_POST['v_n']))
$query=$query." name='".$_POST['v_name']."'";


if($_POST['v_id']&&isset($_POST['v_i']))
{
$query=$query." id='".$_POST['v_id']."'";

}


$result=mysql_query($query) or die('Could not execute last query ');

  echo '<table id="resultset" style="display:block;" border="0" cellpadding="5" cellspacing="0">';
	echo "<tr><th>"."NAME"."</th>"."<th>"."ID"."</th>";
while($line = mysql_fetch_array($result)){
   
   echo "<tr>";
	
        echo "<td>".$line[0]."</td><td>".$line[1]."</td>" ;
   	
   	   echo "</tr>";
   
}
echo "</table>\n";

mysql_free_result($result);
mysql_close($dbconn);

?>

<script type="text/javascript">
changeme('t', 'hide');
</script>
<?

}
?>

							
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


if(isset($_POST['flag1']))
{

if(isset($_POST['nm'])&&isset($_POST['id']))
{
$dbconn=mysql_connect('localhost','root','tarang1tan2');
mysql_select_db('db_b090437cs') or die("couldnt select");


$res=mysql_query($dbconn,"select count(*) from members");

$line=mysql_fetch_row($res);
$line[0]=$line[0]+100;


$query="insert into members values('".$_POST['nm']."','".$_POST['id']."')";

$result=mysql_query($query) or die('Could not execute last query ');
if($result)
{
?>

<script type="text/javascript">
var nam="<?php echo $_POST['nm'] ?>";
var id="<?php echo $_POST['id'] ?>";


window.location = "members.php"
</script>
<?
}

else
{
?>
<script type="text/javascript">

alert('Unable to process request');
</script>
<?

}

}
else
{
?>
<script type="text/javascript">

alert('some incorrect field set');
</script>


<?php
}
unset($flag1);
}
?>


</body>
</html>

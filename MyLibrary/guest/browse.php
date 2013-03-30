<html>
<head>

<title>My Library</title>
<link href="../default1.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../img/User-icon.png" />
</head>

<body>

<script type="text/javascript">

function changeme(id, action) 
{
       if (action=="hide") {
            document.getElementById(id).style.display = "none";
       } else {
            document.getElementById(id).style.display = "block";
       }
}

function view_cat()
{
changeme('catview','show');
changeme('msg','hide');
changeme('showbooks','hide');


}
function view_val(){
changeme('catview','hide');
changeme('msg','show');
changeme('showbooks','hide');
}

</script>


<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

session_start();
if ($_SESSION['user']!='guest')
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
	<td style="color: #FFFFFF" align="center"><h1>My Library</h1>
	</td>
	
	</tr>
	</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="header">
	<tr>
		<tr>
		<td id="logo"><p>Welcome Guest&nbsp|&nbsp<a href="guest.php">Home&nbsp|&nbsp</a>  <a href="../login.php">Logout</a></p></td>
		<td><table width="100%" border="0" cellpadding="0" cellspacing="0" id="menu">
				<tr>
					<td><a href="browse.php">Browse</a></td>
					<td><a href="books.php">My account</a></td>
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
								<td><h2>Browse By</h2></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td width="100%"><p><span onclick="view_cat();" style="cursor: pointer;"><strong>CATEGORY</strong></span><br /></p></td>
							</tr>
							<tr>
								<td>&nbsp;</td>
							</tr>
							
						
							
						</table>
						</td>
					<td>&nbsp;</td>
					
					<td id="content"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td><h2>BROWSE BOOKS </h2></td>
							</tr>
							<tr>
								<td>Guest Portal</td>
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
						<td>Choose a browse category
						</td>
						</tr>
						</table>
						
						<table id="catview" style="display: none;" width="700" border="0" cellpadding="0" cellspacing="0">
							<form NAME=bookview action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return view_val();">
							<tr><td>&nbsp;</td></tr>
							<tr>
<td>
Title
</td><td></td>
<td>
<input type="text" name="titlet"><input type="checkbox" name="titlec" value="Title" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td>
Author
</td><td></td>
<td>
<input type="text" name="fnamet"><input type="checkbox" name="fnamec" value="fname" />
</td>
</tr>
<tr><td>&nbsp;</td></tr>

<tr>
<td>
Category
</td><td></td>
<td>


<select name="category">
<?php
$dbname="db_b090437cs";

mysql_connect('localhost','root','tarang1tan2');
mysql_select_db('db_b090437cs') or die("couldnt select");
$query="select distinct category from books"; 


$result=mysql_query($query) or die('Could not execute query ');

$num=mysql_num_rows($result); 
    
    for ($i=0;$i<$num;$i++)
    {
        $row = mysql_fetch_row($result,$i);
        
        print("<option value=\"$row[0]\">$row[0]</option>");
    }

mysql_free_result($result);
mysql_close($dbconn);

?>

</select>


</td>
</tr>
<tr><td>&nbsp;</td></tr>


							<tr>
							<td>
							<input type="hidden" name="flag20" value=1 />
							</td>
							</tr>


<tr>
<td>
<input type="submit" name="submit" value="Submit" />
</td>
</tr>
							</form>
							</table>	
		
<?php

if(isset($_POST['flag20']))
{

unset($_POST['flag20']);
mysql_connect('localhost','root','tarang1tan2') or die("couldnt connext");
mysql_select_db('db_b090437cs') or die("couldnt select");

$query="select * from books  where category='".$_POST['category']."'";

if(isset($_POST['titlec']))
$query=$query." and title = '".$_POST['titlet']."'";

if(isset($_POST['fnamec']))
$query=$query." and author = '".$_POST['fnamet']."'";



$result=mysql_query($query) or die('Could not execute last query ');


$num=mysql_num_rows($result); 

echo '<table id="showbooks" style="display:block;" border="0" cellpadding="8" cellspacing="0">';
	echo "<tr><th>Title</th><th>Author</th><th>ISBN</th><<th>Category</th></tr>";
	
    for ($i=0;$i<$num;$i++)
    {	
    	echo "<tr>";
        $row = mysql_fetch_row($result,$i);
	echo "<td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[0]."</td>";;
	echo "</tr>";   
    }
	
   
echo "</table>\n";

mysql_free_result($result);


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
		<td><p>Copyright &copy; 2013 </a></p></td>
	</tr>
</table>



</body>
</html>

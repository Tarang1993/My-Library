<html>
<head>



<script>
function clearDefaultandCSS(el) {
	if (el.defaultValue==el.value) el.value = ""
		// If Dynamic Style is supported, clear the style
		if (el.style) el.style.cssText = ""
}

function changeme(id, action) 
{
	if (action=="hide") {
		document.getElementById(id).style.display = "none";
	} else {
		document.getElementById(id).style.display = "block";
	}
}


function addbook()
{
	changeme('dropbook', 'hide');
	changeme('text', 'hide');
	changeme('add', 'show');
	changeme('dispbook', 'hide');
	changeme('resbook', 'hide');


}

function viewbook()
{
	changeme('text', 'hide');
	changeme('add', 'hide');
	changeme('dispbook', 'show');
	changeme('resbook', 'hide');
	changeme('dropbook', 'hide');
}

function editbook()
{
	changeme('text', 'hide');
	changeme('add', 'hide');
	changeme('dispbook', 'hide');
	changeme('resbook', 'hide');
	changeme('dropbook', 'hide');
}

function dropbook()
{
	changeme('dropbook', 'show');
	changeme('text', 'hide');
	changeme('add', 'hide');
	changeme('dispbook', 'hide');
	changeme('resbook', 'hide');

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

	if(document.bookview.titlec.checked)
	{
		var title=document.bookview.titlet.value;
		if(!title.length)
		{
			alert("Incomplete Form");
			document.bookview.titlet.focus();
			return false;
		}
	}

	if(document.bookview.fnamec.checked)
	{
		var title=document.bookview.fnamet.value;
		if(!title.length)
		{
			alert("Incomplete Form");
			document.bookview.fnamet.focus();
			return false;
		}
	}

	return true;

}



function add_val()
{

	var tit=document.add_book.title.value;
	var cat=document.add_book.cat.value;
	var avail=document.add_book.avail.value;
	var fname=document.add_book.fname.value;
	var isbn=document.add_book.isbn.value;

	if(!tit.length || !cat.length || !avail.length || !fname.length || !isbn.length)
	{
		alert('Incomplete form');


		if(!isbn.length)
			document.add_book.isbn.focus();
		if(!fname.length)
			document.add_book.fname.focus();
		if(!avail.length)
			document.add_book.avail.focus();
		if(!cat.length)
			document.add_book.cat.focus();

		if(!tit.length )
			document.add_book.title.focus();


		return false;
	}

	return true;
}

</script>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="header">

<td style="color: #FFFFFF" align ="center"> <h1>My Library</h1>
</td>

</tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container" id="header">
<tr>
<td id="logo">
<p>Welcome Admin&nbsp|&nbsp<a href="admin.php">Home&nbsp|&nbsp</a>  <a href="../login.php">Logout</a></p>
</td>
<td>
<table width="100%" border="0" cellpadding="0" cellspacing="0" id="menu">
<tr>
<td><a href="members.php">Members</a></td>
<td><a href="books.php" >Books</a></td>
<td><a href="issue.php">Issue</a></td>
</tr>
</table>
</td>
</tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0" class="container">
<tr>
<td id="page">
<table border="0" cellpadding="0" cellspacing="0">
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
<td width="100%"><p><strong><span onclick="addbook();" style="cursor: pointer;">Add Book</span></strong><br /></p></td>
</tr>

<tr>
<td>&nbsp;</td>
</tr>
<tr>
<td><p><strong><span onclick="viewbook();" style="cursor: pointer;">View Book Details</strong><br /></p></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
<!--td><p><strong><span onclick="editbook();" style="cursor: pointer;">Edit Details</strong><br /></p></td-->
</tr>
<!--tr>
<td>&nbsp;</td>
<tr-->
<td><p><strong><span onclick="dropbook();" style="cursor: pointer;">Delete Books</strong><br /></p></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
</table>
</td>

<td>&nbsp;</td>

<td id="content">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><h2>LIBRARY MANAGEMENT</h2></td>
</tr>
<tr>
<td>Book Management</td>
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
<td>Manage Books for the library management system


<?php

$dbconn=mysql_connect('localhost','root','tarang1tan2');
mysql_select_db('db_b090437cs') or die("couldnt select");

$mem="select count(*) from books";
$fac="select count(*) from issue";
$std="select count(distinct category) from books";


$r_mem=mysql_query($mem)  or die('Could not execute query');
$r_fac=mysql_query($fac)  or die('Could not execute query');
$r_std=mysql_query($std)  or die('Could not execute query');

$m= mysql_fetch_array($r_mem);
$f= mysql_fetch_array($r_fac);
$s= mysql_fetch_array($r_std);

echo "<br /><br />Total number of Books : " . $m[0]. "<br />";
echo "Total number of books issued : " . $f[0]. "<br />";

echo "Total number of distinct book categories : " . $s[0] . "<br />";

mysql_free_result($r_mem);
mysql_free_result($r_fac);
mysql_free_result($r_std);

mysql_close($dbconn);

?>


</td>
</tr>
</table>



<table id="add" style="display: none;" width="506" border="0" cellpadding="0" cellspacing="0">
<form name="add_book" action="<?= $_SERVER['PHP_SELF']; ?>" method=POST onSubmit="return add_val()">
<tr>

<td>Title&nbsp&nbsp</td>
<td>
<input type="text" name="title" ONFOCUS="clear(this)">
</td>
</tr>
<tr>
<tr><td>&nbsp;</td></tr>
<tr>

<td>Author&nbsp&nbsp</td>
<td>
<INPUT name="fname" STYLE="color: grey" TYPE=text VALUE="Name" STYLE="color: red" ONFOCUS="clearDefaultandCSS(this)">
</td><td>&nbsp</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>
ISBN 
</td>
<td>
<input type="text" name="isbn">
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td>
Category 
</td>
<td>
<input type="text" name="cat">
</td>
</tr>

<tr><td>&nbsp;</td></tr>
<tr>
<td>
Availability
</td>
<td>
<select name="avail">
<option value="y">Yes
<option value="n">No
</select>
</td>
</tr>
<tr><td>&nbsp;</td></tr>


<tr>
<td>
<input type="hidden" name="flag3" value=1 />
</td>
</tr>




<tr><td>&nbsp;</td></tr>
<tr>
<td>
<input type="submit" value="Submit">
</td>
</tr>


</form>

</table>


<table id="dropbook" style="display:none;" width="506" border="0" cellpadding="0" cellspacing="0">
<form NAME=dropb action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
<tr>
<td>
ISBN :
</td>
<td>

<input type="text" name="pid" />							

</td>
</tr>
<tr><td>&nbsp</td></tr>

<tr>
<td>
<input type="hidden" name="flag17" value=1 />
</td>
</tr>				

<tr>
<td>

<INPUT TYPE=submit NAME=submit VALUE=Submit />
</td>
</tr>

</FORM>
</table>




<table id="dispbook" style="display: none;" width="700" border="0" cellpadding="0" cellspacing="0">
<form NAME=bookview action="<?= $_SERVER['PHP_SELF']; ?>" method="post" onSubmit="return view_val()">
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
$dbconn=mysql_connect('localhost','root','tarang1tan2');
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
<input type="hidden" name="flag11" value=1 />
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

if(isset($_POST['flag11']))
{

	unset($_POST['flag11']);
	$dbconn=mysql_connect('localhost','root','tarang1tan2');

	mysql_select_db('db_b090437cs') or die("couldnt select");

	$query="select * from books where category='".$_POST['category']."'";

	if(isset($_POST['titlec']))
		$query=$query." and title = '".$_POST['titlet']."'";

	if(isset($_POST['fnamec']))
		$query=$query." and title = '".$_POST['fnamet']."'";

	$result=mysql_query($query) or die('Could not execute last query ');

	$num=mysql_num_rows($result); 

	echo '<table id="resbook" style="display:block;" border="0" cellpadding="8" cellspacing="0">';
	echo "<tr><th>Title</th><th>Author</th><th>ISBN</th><th>Category</th><th>Availability</th><th></tr>";

	for ($i=0;$i<$num;$i++)
	{	
		echo "<tr>";
		$row = mysql_fetch_row($result);
		echo "<td>".$row[1].  "</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[0]."</td><td>".$row[4]."</td>";
		echo "</tr>";   
	}
	echo "</table>\n";

	mysql_free_result($result);
	mysql_close($dbconn);

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

if(isset($_POST['flag17']))
{

	unset($_POST['flag17']);

	$dbconn=mysql_connect('localhost','root','tarang1tan2');
	mysql_select_db('db_b090437cs') or die("couldnt select");

	$q1="select * from books where isbn='".$_POST['pid']."'";

	$r1=mysql_query($q1);

	$mem=mysql_fetch_row($r1);

	if(!$mem[0])
	{

		?>

			<script type="text/javascript">
			var id="<?php echo $_POST['pid'] ?>";
		alert('Book ' + id + ' does not exist');
		window.location("del_book.php");
		</script>
			<?
			mysql_free_result($r1);
	}
	else
	{

		$q3="select count(*) from issue where isbn='".$_POST['pid']."'";
		$r3=mysql_query($q3);

		$mem=mysql_fetch_array($r3);
		echo $mem[0];
		if($mem[0])
		{

			?>

				<script type="text/javascript">
				var id="<?php echo $_POST['pid'] ?>";
			alert('Book ' + id + ' Cannot be deleted as pending return');
			window.location("del_book.php");
			</script>
				<?
				mysql_free_result($r3);
		}


		else
		{

			$q2="delete from books where isbn='".$_POST['pid']."'";
			$r2=mysql_query($q2);
			if($r2)
			{
				?>

					<script type="text/javascript">
					var id="<?php echo $_POST['pid'] ?>";
				alert('Book ' + id + ' successfully dropped');
				window.location("dropbook.php");
				</script>
					<?

			}

			else
			{

				?>

					<script type="text/javascript">
					var id="<?php echo $_POST['pid'] ?>";
				alert('Error..Book ' + id + ' Cannot be dropped);
				window.location("books.php");
				</script>
					<?
			}



			//mysql_free_result($r2);
		}


		mysql_close($dbconn);

	}
}

?>

<?php


if(isset($_POST['flag3']))
{

	unset($_POST['flag3']);

	$dbconn=mysql_connect('localhost','root','tarang1tan2');
	mysql_select_db('db_b090437cs') or die("couldnt select");


	$query="insert into books values('".$_POST['cat']."','".$_POST['title']."','".$_POST['fname']."','".$_POST['isbn']."','y')";

	$result=mysql_query($query);


	if($result)
	{

		?>

			<script type="text/javascript">
			alert("Book successfully added !");
		window.location = "books.php"
			</script>


			<?

	}
	else
	{
		?>
			<script type="text/javascript">

			alert('some incorrect field set');
		</script>
			<?
	}


	mysql_free_result($result);
	mysql_close($dbconn);


}
?>


</body>
</html>

<html>
<?
	include ("./banner.h");
	include ("./table.css");
?>
<body>
<?
	$board = $_GET['board'];
	$content_id = $_GET['id'];
	
	$con = mysql_connect("localhost", "comma", "comma");
	mysql_select_db("commadb", $con);
		
	$query = "SELECT * FROM $board WHERE rid = $content_id";
	$result = mysql_query($query, $con);
		
	$bookname = mysql_result($result, 0, "bookname");
	$writer = mysql_result($result, 0, "writer");
	$rtitle = mysql_result($result, 0, "rtitle");
	$rcontent = mysql_result($result, 0, "rcontent");

	
	echo ("
	<form method = 'POST' action = '/library/rprocess.php?board=$board&id=$content_id'>
	<br><br>
	<table width='800' align=center border=1>
		<tr>
			<td align=left id=td1>
				<input type = 'text' name = 'bookname' value='$bookname' readonly id=td1 size = '60' style = 'height:25;'></td> 
			<td align=right id=td1>
				<input type = 'text' name = 'writer' value='$writer' readonly id=td1 size = '60' style = 'height:25;'></td>
		</tr>
		<tr><td colspan=2><input type = 'text' name = 'rtitle' value='$rtitle' id=td1 size = '120' style = 'height:25;'></td></tr> 
		<tr><td colspan=2 id=td1><textarea name = 'rcontent' cols='100' rows='20'>$rcontent</textarea></td></tr>
		<tr><td align=left id=td1><input  type = 'reset' value='지우기' style = 'width:80; height:25;'></td>
			<td align =right id=td1><input  type = 'submit' value='저장' style = 'width:80; height:25;'></td></tr>
	</table>
	</form>
	");
	
	mysql_close($con);
?>
</body>
</html>
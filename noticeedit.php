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
		
	$query = "SELECT * FROM $board WHERE nid = $content_id";
	$result = mysql_query($query, $con);
		

	$ntitle = mysql_result($result, 0, "ntitle");
	$ncontent = mysql_result($result, 0, "ncontent");
	$ndate = mysql_result($result, 0, "ndate");

	
	echo ("
	<form method = 'POST' action = '/library/nprocess.php?board=$board&id=$content_id'>
	<br><br>
	<table width='800' align=center border=1>
		<tr>
			<td align=left id=td1>
				<input type = 'text' name = 'ntitle' value='$ntitle' id=td1 size = '120' style = 'height:25;'></td> 
			<td align=right id=td1>
				<input type = 'text' name = 'writer' value='관리자' readonly id=td1 size = '60' style = 'height:25;'></td>
		</tr>
		<tr><td colspan=2 id=td1><textarea name = 'ncontent' cols='100' rows='20'>$ncontent</textarea></td></tr>
		<tr><td align=left id=td1><input  type = 'reset' value='지우기' style = 'width:80; height:25;'></td>
			<td align =right id=td1><input  type = 'submit' value='저장' style = 'width:80; height:25;'></td></tr>
	</table>
	</form>
	");
	
	mysql_close($con);
?>
</body>
</html>
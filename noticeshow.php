<html>
<?
	include ("./banner.h");
	include ("./table.css");
	include ("./link.css");
?>
<body>
<script>	
	function go_back() {
		history.go(-1);
	}

</script>
<?
	$board = $_GET['board'];
	$content_id = $_GET['id'];
	
	$con = mysql_connect("localhost", "comma", "comma");
	mysql_select_db("commadb", $con);
	
	$query = "SELECT * FROM $board WHERE nid = $content_id";
	$result = mysql_query($query, $con);
	
	$id = mysql_result($result, 0, "nid");
	$ntitle = mysql_result($result, 0, "ntitle");
	$ncontent = mysql_result($result, 0, "ncontent");
	$nhit = mysql_result($result, 0, "nhit");
	$nvote = mysql_result($result, 0, "nvote");
	$nhit = $nhit + 1;
	
	echo("
	<br><br>
	<table width='800' align=center border=1>
		<tr><td align=left id=td1>$title</td><td align=right id=td1>관리자</td></tr>
		<tr><td align=right colspan=2 id=td1>작성일: $date</td></tr>
		<tr height='300'><td colspan=2><pre>$content</pre></tr>
		<tr><td align=left id=td1><input  type = 'submit' onclick='go_back()' value='뒤로가기' style = 'width:80; height:25;'></td>
			<a href = /library/vote.php?board=$board&id=$id&mode=1> [추천] </a></td></tr>		
	</table>
	<br>
	<table width='200' align = center>
		<tr><td align=center id=td1><a href = /library/pass.php?board=$board&id=$id&mode=1> [수정] </a></td>
			<td align =center id=td1><input  type = 'submit' value='삭제' style = 'width:80; height:25;'></td></tr>
	</table>
	")
	
	mysql_close($con);
	
?>
</body>
</html>
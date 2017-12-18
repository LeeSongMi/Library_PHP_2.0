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
	
	$query = "SELECT * FROM $board WHERE rid = $content_id";
	$result = mysql_query($query, $con);
	
	$id = mysql_result($result, 0, "rid");
	$writer = mysql_result($result, 0, "writer");
	$rtitle = mysql_result($result, 0, "rtitle");
	$rcontent = mysql_result($result, 0, "rcontent");
	$bookname = mysql_result($result, 0, "bookname");
	$rhit = mysql_result($result, 0, "rhit");
	$rvote = mysql_result($result, 0, "rvote");
	$hit = $hit + 1;
	
	$update_hit_query = "UPDATE $board SET rhit = $hit WHERE rid = $content_id";
	mysql_query($update_hit_query, $con);
		
	

	echo("
		<br><br>
		<table width='800' align=center border=1>
			<tr><td align=left id=td1>$bookname</td><td align=right id=td1>$writer</td></tr>
			<tr><td align=right width =75% id=td1>추천수 : $rvote</td><td align=right id=td1>조회수 : $hit</td></tr>
			<tr><td> $title </td><td align=left id=td1>작성일: $rdate</td></tr>
			<tr height='300'><td colspan=2><pre>$content</pre></tr>
			<tr><td align=left id=td1>
					<input  type = 'submit' onclick='go_back()' value='뒤로가기' style = 'width:80; height:25;'></td>
				<td align =right id=td1>
					<a href = /library/vote.php?board=$board&id=$id&mode=0> [추천] </a>
				</td></tr>		
		</table>
		<br>
		<table width='200' align = center>
			<tr><td align=center id=td1><a href = /library/pass.php?board=$board&id=$id&mode=0> [수정] </a></td>
				<td align =center id=td1><input  type = 'submit' value='삭제' style = 'width:80; height:25;'></td></tr>
		</table>
	");
	
			
	mysql_close($con);
?>
</body>
</html>
<html>
<?
	include ("./banner.h");
	include ("./table.css");
?>
	<body>
	<?
		$board = $_GET['board'];
		$content_id = $_GET['id'];
		$mode = $_GET['mode'];
		
		echo ("
			<form method = 'post' action = '/library/pass2.php?&mode=$mode'>
			<input type = 'hidden' name = 'board' value = '$board'>
			<input type = 'hidden' name = 'id' value = '$content_id'>
			<input type = 'hidden' name = 'mode' value = '$mode'>
			<br><br><br>
			<table border = '1' width = '300' align = 'center'>
				<tr>
					<td align = 'left' id = 'td1' colspan = 2> 암호를 입력하세요. </td>
				</tr>
				<tr>
					<td align = left' id= 'td4'> 암호 : <input type = 'password' id = 'td1' size = '25' name = 'pass'></td>
					<td align = 'right' id = 'td1'> <input type = 'submit' value = '입력'></td>
				</tr>
			</table>
			</form>
		");
	?>
	</body>
</html>
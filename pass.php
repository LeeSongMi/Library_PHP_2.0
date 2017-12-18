<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
	<?
		$board = $_GET['board'];
		$content_id = $_GET['id'];
		$mode = $_GET['mode'];
	
		
		$con = mysql_connect("localhost", "comma", "comma");
		mysql_select_db("commadb", $con);
		
		$getname = "SELECT name FROM user WHERE id = $content_id";	//수정 필요 로그인 한 뒤, 아이디를 어떻게 받는 과정을 한 뒤 바꿔야한다.
		$nameresult = mysql_query($getname, $con);
		$username = mysql_result($nameresult, 0, "name");
		
		$getwriter = "SELECT writer FROM $board WHERE id = $content_id";
		$writerresult = mysql_query($getwriter, $con);
		$writer = mysql_result($nameresult, 0, "writer");
		
		if ($username != $writer) {
			
			echo (" <script>
						window.alert('작성자가 아닙니다.');
						history.go(-1);
					</script>
			");
			exit;
		} else {
			switch ($mode) {
				case 0:
					echo("<meta http-equiv = 'Refresh' content = '0;
						url = /library/reviewedit.php?board=$board&id=$content_id'>");	//리뷰수정
				break;
				case 1:
					echo("<meta http-equiv = 'Refresh' content = '0;
						url = /library/noticeedit.php?board=$board&id=$content_id'>");	//공지수정
				break;
			}
		}

		/* 게시판 만들 때의 pass내용 패스워드를 받아서 확인하는 내용 로그인으 안만들시 이 내용을 pass로 위의 내용을 pass2로 보냄
		echo ("
		
			<form method = 'post' action = '/library/pass2.php?board=$board&id=$content_id&mode=$mode'>
			<input type = 'hidden' name = 'board' value = '$board'>
			<input type = 'hidden' name = 'id' value = '$content_id'>
			<input type = 'hidden' name = 'mode' value = '$mode'>
			<table border = '0' width = '400' align = 'center'>
				<tr>
					<td align = 'center'> 암호를 입력하세요. </td>
				</tr>
				<tr>
					<td align = 'center'> 암호 : <input type = 'password' size = '15' name = 'pass'>
					<input type = 'submit' value = '입력'></td>
				</tr>
			</table>
			</form>
		");
		*/
		
		mysql_close($con);
	?>
	</body>
</html>
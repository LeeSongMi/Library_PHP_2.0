<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
	<?
		$board = $_POST['board'];
		$content_id = $_POST['id'];
		$mode = $_POST['mode'];
		$pass = $_POST['pass'];
		
		switch($mode){
			case 0:
			case 1:
				$con = mysql_connect("localhost", "comma", "comma");
				mysql_select_db("commadb", $con);
		
				$query = "SELECT passwd FROM $board WHERE id=$content_id";
				$result = mysql_query($query, $con);
		
				$passwd = mysql_result($result, 0, "passwd");
				
				mysql_close($con);
			break;
			
			//관리자창 접근
			case 3:
				$passwd = "0000";	//관리자 비밀번호 설정
			break;
		}
		
		
		
		if ($pass != $passwd) {
			
			echo (" <script>
						window.alert('암호가 일치하지 않습니다.');
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
				case 3:
					echo("<meta http-equiv = 'Refresh' content = '0;
						url = /library/admin.php'>");	//관리자 창 입장
				break;
			}
		}
		
	?>
	</body>
</html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
	<?
		$bookname = $_POST['bookname'];
		$writer = $_POST['writer'];
		$rtitle = $_POST['rtitle'];
		$rpass = $_POST['rpass'];
		$rcontent = $_POST['rcontent'];
		$board = $_GET['board'];
		
		function check($message) {
			echo ("
				<script>
					window.alert(\"$message\");
					history.go(-1);
				</script>
			");
			exit;
		}

		if(empty($rcontent)) {
			check("내용이 없습니다. 다시 입력해주세요.");
		}
		if(empty($rtitle)) {
			check("제목이 없습니다. 다시 입력해주세요.");
		}
		if(empty($rpass)) {
			check("비밀번호가 없습니다. 다시 입력해주세요.");
		}



		$con = mysql_connect("localhost", "comma", "comma");
		mysql_select_db("commadb", $con);
		
		$query = "SELECT rid FROM $board";
		$result = mysql_query($query, $con);
		
		$total = mysql_num_rows($result);
		
		if(!$total) {
			$id = 1;
		} else {
			$id = $total + 1;
		}
		
		$rdate = date("Y-m-d");
		
		$insert_query = "INSERT INTO $board
						( bookname, writer, rtitle, rcontent, vote, hit, rid, rdate, rpass)
						VALUES('$bookname', '$writer', '$rtitle', '$rcontent', 0, 0, $id, '$rdate', '$rpass')";
					
		$insert_result = mysql_query($insert_query, $con);
					
			if ($insert_result == 1) {
				echo("
					<script>
						window.alert('게시물이 정상적으로 입력되었습니다.')
					</script>
				");
			} else {
				echo("
					<script>
						window.alert('게시물이 입력되지 않았습니다.')
					</script>
				");
			}
					
			mysql_close($con);
					
			echo("<meta http-equiv = 'Refresh' content = '0; url = /library/reviewlist.php?board=$board'>");
	?>
	</body>
</html>
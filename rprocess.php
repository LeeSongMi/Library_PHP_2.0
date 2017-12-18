<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
	<?
		$board = $_GET['board'];
		$content_id = $_GET['id'];
		$bookname = $_POST['bookname'];
		$writer = $_POST['writer'];
		$rtitle= $_POST['rtitle'];
		$rcontent = $_POST['rcontent'];
		
		function check($message) {
			echo ("
				<script>
					window.alert(\"$message\");
					history.go(-1);
				</script>
			");
			exit;
		}
		if(empty($topic)) {
			check("제목이 없습니다. 다시 입력해주세요.");
		}
		if(empty($content)) {
			check("내용이 없습니다. 다시 입력해주세요.");
		}

		$con = mysql_connect("localhost", "comma", "comma");
		mysql_select_db("commadb", $con);
		
		$query = "SELECT * FROM $board WHERE rid=$content_id";
		$result = mysql_query($query, $con);
		
		$rhit = mysql_result($result, 0, "rhit");
		$rvote = mysql_result($result, 0, "rvote");
		$rdate = date("Y-m-d");
		
		$update_query = "UPDATE $board
						 SET writer = '$writer',
							 bookname = '$bookname',
							 rtitle = '$rtitle',
							 rcontent = '$rcontent',
							 rhit = $rhit,
							 rdate = '$rdate',
							 rvote = $rvote
						 WHERE rid = $content_id";
						
		mysql_query($update_query, $con);
		
		echo("<meta http-equiv = 'Refresh' content = '0; 
			url = /library/reviewlist.php?board=$board'>");
			
		mysql_close($con);
	?>
	</body>
</html>
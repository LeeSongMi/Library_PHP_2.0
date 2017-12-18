<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
	<?
		$board = $_GET['board'];
		$content_id = $_GET['id'];
		$ntitle= $_POST['ntitle'];
		$ncontent = $_POST['ncontent'];
		
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
		
		$query = "SELECT * FROM $board WHERE nid=$content_id";
		$result = mysql_query($query, $con);
		
		$nhit = mysql_result($result, 0, "nhit");
		$nvote = mysql_result($result, 0, "nvote");
		$ndate = date("Y-m-d");
		
		$update_query = "UPDATE $board
						 SET ntitle = '$ntitle',
							 ncontent = '$ncontent',
							 nhit = $nhit,
							 ndate = '$ndate',
							 nvote = $nvote
						 WHERE nid = $content_id";
						
		mysql_query($update_query, $con);
		
		echo("<meta http-equiv = 'Refresh' content = '0; 
			url = /library/noticelist.php?board=$board'>");
			
		mysql_close($con);
	?>
	</body>
</html>
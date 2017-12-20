<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>
	<?
		$board = "Book";
		$title = $_POST['title'];
		$publisher = $_POST['publisher'];
		$auther = $_POST['auther'];
		$byear = $_POST['byear'];
		$num = $_POST['num'];
		$price = $_POST['price'];
		$content = $_POST['content'];
		$imgpath = $_POST['imgpath'];
		
		function check($message) {
			echo ("
				<script>
					window.alert(\"$message\");
					history.go(-1);
				</script>
			");
			exit;
		}
		if(empty($title)) {
			check("제목이 없습니다. 다시 입력해주세요.");
		}
		if(empty($content)) {
			check("내용이 없습니다. 다시 입력해주세요.");
		}
		if(empty($imgpath)) {
			$imgpath = "\image\No_img.png";
		}

		
		$con = mysql_connect("localhost", "comma", "comma");
		mysql_select_db("commadb", $con);		
		
		$insert_query = "INSERT INTO $board
						( title, publisher, auther, byear, num, price, content, imgpath)
						VALUES( '$title', '$publisher', '$auther', '$byear', $num, $price, '$content', '$imgpath')";
					
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
					
			echo("<meta http-equiv = 'Refresh' content = '0; url = /library/booksearch.php'>");
	?>
	</body>
</html>
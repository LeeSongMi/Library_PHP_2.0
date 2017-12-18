<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?
	$board = $_GET['board'];
	$content_id = $_GET['id'];
	$mode = $_POST['mode'];
	
	$con = mysql_connect("localhost", "comma", "comma");
	mysql_select_db("commadb", $con);
	
	
	switch($mode){
		//리뷰 추천
		case 0:
			$vote="rvote";		
			$id = "rid";
		break;
		
		//공지 추천
		case 1:
			$vote="nvote";
			$id = "nid";
		break;
	}
	
	$query = "SELECT * FROM $board WHERE $id = $content_id";
	$result = mysql_query($query, $con);
	$vote_result = mysql_result($result, 0, $vote);
	
	$vote_result = $vote_result + 1;
	
	$update_vote_query = "UPDATE $board SET $vote = $vote_result WHERE $id = $content_id";
	mysql_query($update_vote_query, $con);
	
	mysql_close($con);
	
	switch($mode){
		case 0:
			echo("<meta http-equiv = 'Refresh' content = '0; url = /library/reviewshow.php?board=$board&id=$content_id'>");
		break;
		case 1:
			echo("<meta http-equiv = 'Refresh' content = '0; url = /library/noticeshow.php?board=$board&id=$content_id'>");
		break;
	}
	
?>
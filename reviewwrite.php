<html>
<?
	include ("./banner.h");
	include ("./table.css");
	include ("./link.css");

?>
<body>
<?
	$board = "review";
	
	//테스트한다고 임시로 바꿔둠 밑의 주석 POST를 "@@@"부분으로
	$bookname = "BookTitle";
	//$_POST['title']; //앞의 책정보 페이지에서 책 제목을 보내줘야함
	$writer = "Writer";
	//$_POST['uname'];	//로그인한 유저의 이름을 받는 부분 아직 로그인을 구현하지 않아서 어려움이 있다.
	
	echo ("
	<form method = 'POST' action = '/library/process.php?board=$board'>
	<br><br>
	<table width='800' align=center border=0>
		<tr>
			<td align=left id=td1>
				<input type = 'text' name = 'bookname' value='$bookname' readonly id=td1 size = '60' style = 'height:25;'></td> 
			<td id=td1>
				<input type = 'text' name = 'writer' value='$writer' readonly id=td1 size = '60' style = 'text-align:right; height:25;'></td></tr>
	</table>
	");
	?>
	
	<table width='800' align=center id=td3>
		<tr>
			<td align = 'left' id= td5> 제목 : </td>
			<td align = 'left' id= td0><input type = 'text' name = 'rtitle' id=td1 size = '80'></td></tr> 
		<tr>
			<td align = 'left' valign = 'top'  id= td5 > 리뷰 : </td>
			<td id=td1><textarea name = 'rcontent' cols='83' rows='20'></textarea></td></tr>
		
		<tr>
			<td align = 'left' id= td5> 비밀번호 : </td>
			<td align = 'left' id= td0><input type = 'password' id= 'td1' name = 'rpass'id=td1 size = '80' style = 'height:25;'></td></tr> 
	</table>
	<br>
	<br>
	
	<table width='800' align=center border=0>
		<tr>
			<td align=left id=td1><input  type = 'reset' value='지우기' style = 'width:80; height:25;'></td>
			<td align =right id=td1><input  type = 'submit' value='저장' style = 'width:80; height:25;'></td></tr>
	</table>
	</form>
</body>
</html>
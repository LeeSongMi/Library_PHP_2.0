<!DOCTYPE html>
<html>
<?
	include ("./banner.h");
	include ("./table.css");
?>
  <body>
    <br><br>
	<table width = '800' align = 'center'><tr><td align='left'><h3> 도서 추가 </h3></td></tr></table>
	<form method = 'POST' action = '/library/BWprocess.php'>
    <table width = '800' align = 'center' id=td0>
    <tr id=t0>
        <td align = 'left' id= 'td3'> 책 제목 : <input id= 'td1' type = 'text' name = 'title'  size = '120'></td></tr>
	<tr>
        <td align = 'left' id= 'td3'> 출판사 : <input id= 'td1' type = 'text' name = 'publisher' size = '120'></td></tr>
	<tr>
        <td align = 'left' id= 'td3'> 저자 : <input id= 'td1' type = 'text' name = 'author' size = '120'></td></tr>
	<tr>
        <td align = 'left' id= 'td3'> 출판년도 : <input id= 'td1' type = 'text' name = 'byear' size = '110'></td></tr>
	<tr>
        <td align = 'left' id= 'td3'> 소장정보 : <input id= 'td1' type = 'text' name = 'num'size = '110'></td></tr>
	<tr>
        <td align = 'left' id= 'td3'> 가격 : <input id= 'td1' type = 'text' name = 'price'  size = '120'></td></tr>
	<tr>
        <td align = 'left' id= 'td3'> 책 설명 : </td></tr>
	<tr><td><textarea name = 'content' rows="15" cols="100"></textarea></td></tr>
    <tr>
		<td align = 'left' id= 'td3'> 이미지 경로: <input id= 'td1' type = 'text' name = 'imgpath'  size = '110'></td>
    <tr>
		<td align = 'right'><input type = 'submit' value = '도서 추가'></td>
	</tr>
	</table>
    </form> 
	
	<br><br>
	
	<table width = '800' align = 'center'><tr><td align='left'><h3> 공지 추가 </h3></td></tr></table>
	<form method = 'POST' action = '/library/NWprocess.php'>
    <table width = '800' align = 'center' id=td0>
    <tr id=t0>
        <td align = 'left' id= 'td3'> 공지 제목 : <input id= 'td1' type = 'text' name = 'ntitle'  size = '110'></td></tr>
	<tr>
        <td align = 'left' id= 'td3'> 중요도 : <input id= 'td1' type = 'text' name = 'importance' size = '120'></td></tr>
	<tr>
        <td align = 'left' id= 'td3'> 공지 내용 : </td></tr>
	<tr><td><textarea name = 'ncontent' rows="15" cols="100"></textarea></td></tr>
	<tr>
		<td align = 'right'><input type = 'submit' value = '공지 등록'></td></tr>
	</table>
    </form>
	
  </body>
</html>

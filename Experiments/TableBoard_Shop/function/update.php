<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */




$connect = mysql_connect("localhost","jsw","1234");
mysql_select_db("jsw_db", $connect);

$sql = "update tableboard_shop set Date='$_POST[date]',OrderId= '$_POST[order_id]' ,Name='$_POST[name]',Price='$_POST[price]',Quantity='$_POST[quantity]' where num = $_GET[num]";
$result = mysql_query($sql);



# TODO: MySQL DB에서, num에 해당하는 레코드를 POST로 받아온 내용으로 수정하기!




# 참고 : 에러 메시지 출력 방법
if(!result)
echo "<script> alert('update - error message') </script>"

?>

<script>
    location.replace('../index.php');
</script>


<?php
/**
 * Created by PhpStorm.
 * User: kim2
 * Date: 2019-04-04
 * Time: 오전 9:39
 */

$connect = mysql_connect("localhost","jsw","1234");
mysql_select_db("jsw_db", $connect);

$sql = "delete from tableboard_shop where num=$_GET[num]";
$result = mysql_query($sql);

$set1="set @cnt=0";
$updat1="update tableboard_shop set tableboard_shop.num =@cnt:=@cnt+1";
$alter1="alter table tableboard_shop auto_increment=1";

$setresult=mysql_query($set1);
$updatresult=mysql_query($updat1);
$alterre=mysql_query($alter1);



# TODO: MySQL DB에서, num에 해당하는 레코드 삭제하기!

# 참고 : 에러 메시지 출력 방법

if(!(result || !$setresult || !$updatresult || $alterre))
    echo    "<script> alert('delete - error message') </script>"

?>

<script>
    location.replace('../index.php');
</script>

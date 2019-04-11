##TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

##기존 파일
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
## MySQL 테이블 생성!

[여기에 테이블 생성 시, 사용한 Query 를 작성하세요.] 


table 이름은 tableboard_shop 으로 생성

기본키는 num 으로, 그 외의 속성은 board_form.php 의 input 태그 name 에 표시된 속성 이름으로 생성

각 속성의 type 은 자유롭게 설정 (단, 입력되는 값의 타입과 일치해야 함)

create table tableboard_shop( num int(11), Date char(20), Orderid int(10), Name char(50), Price int (20), Quantity int(10), primary key(num) )

   create table tableboard_shop(
    num int(11),
    Date char(20),
    Orderid int(10), 
    Name char(50),
    Price int (20),
    Quantity int(10),
    primary key(num) 
   )

## board_form.php 수정
   [여기에 board_form.php 를 어떻게 수정했는지, 설명을 작성하세요.]
   
   우선 디비 연동을 위해
   $connect = mysql_connect("localhost","jsw","1234"); mysql_select_db("jsw_db", $connect); 구문을 작성하고
   
   $sql = "select * from tableboard_shop where num= $_GET[num]"; $result = mysql_query($sql); $row = mysql_fetch_row($result); tableboard_shop 테이블에서 num 값에맞는 데이터를 index에서 가져와 쿼리를 생성하고 쿼리문을 실행함 후에 $
   
   이 구문에서 각열에 맞는 echo $row 를 집어넣음
## index.php 수정
   [여기에 index.php 를 어떻게 수정했는지, 설명을 작성하세요.]
   
   위와 마찬가지로 디비 연동을 위해 $connect = mysql_connect("localhost","jsw","1234"); mysql_select_db("jsw_db", $connect); 구문을 작성하고 밑줄에 쿼리를 작성하고 실행한다. 이 때 mysql_num_rows 함수를 사용하여 쿼리의 행의개수를 판단하고 이를 $numsort 변수에 저장한다
   
   그후 안에 for문으로 numsort의 수만큼 반복하여 커리를 출력하는 구문을 코딩하였다 또한 마지막 column6는 값이 중복되므로 column4와 column5의 곱으로 표현 하였고 모든 column이 끝날때마다 $row = mysql_fetch_array($result); 구문을 사용하여 다음 행으로 넘어갔다.
## function
   마찬가지로 각 function 에도 디비 연동을 위해
   $connect = mysql_connect("localhost","jsw","1234");
   mysql_select_db("jsw_db", $connect); 구문을 공통적으로 사용하였다
   
### insert.php 수정
   [여기에 insert.php 를 어떻게 수정했는지, 설명을 작성하세요.]
      기본적으로 table을 작성할때 num 값이 자동으로 올라가는 설정이 있기에 이를 사용하였다 
      #AUTO_INCREMENT 커리에 새로운 값을 넣기 위해 insert를 사용하였고 각 값들을 $_POST를 사용하여 데이터를 처리하였다 
      또한 에러 표시구문을 result값이 없을 때만 나오도록 변경하였다. 
   [추가한부분] 
      $sql = "insert into tableboard_shop(Date,Orderid,Name,Price,Quantity) values('$_POST[date]','$_POST[order_id]','$_POST[name]','$_POST[price]','$_POST[quantity]')"; $result = mysql_query($sql);
    

 
 
### update.php 수정
  [여기에 update.php 를 어떻게 수정했는지, 설명을 작성하세요.] 
  데이터 베이스에 값들을 수정하기위해 update를 사용하였고 끝에 where num = $_GET[num] 을 사용하여 받아온 알맞은 
  위치에 값이 변할수 있도록하였다.
    
   [추가한부분]
   $sql = "update tableboard_shop set Date='$_POST[date]',OrderId= '$_POST[order_id]' ,Name='$_POST[name]',Price='$_POST[price]',Quantity='$_POST[quantity]' where num = $_GET[num]"; $result = mysql_query($sql);




<<<<<<< Updated upstream

### delete.php 수정
[여기에 delete.php 를 어떻게 수정했는지, 설명을 작성하세요.]
delete 구문자체는 앞에서와 같이 $_GET으로 값을 받아와서 비교하여 삭제하는 방식으로
똑같았지만 delete 후 다시 insert를 했을시에 num값이 사라진 행을 계속 취급하여 값이올라가 ex)(추가)1->(추가)2->(추가)3->(2삭제)->(추가)4
이를 해결하기 위해서 add라는 변수를 0으로 초기화 후 데이터 베이스안에 num열을 add에 +1한값으로 초기화하고 
다시 AUTO_INCREMENT를 사용하였다 또한 해당 단계들이 하나라도 실행이 되지않으면 에러가 뜨도록
!(result || !$setresult || !$updatresult || $alterre) 구문을 사용하였다

[추가한 부분]


$sql = "delete from tableboard_shop where num=$_GET[num]";
$result = mysql_query($sql);

$set1="set @add=0";
$updat1="update tableboard_shop set num =@add:=@add+1";
$alter1="alter table tableboard_shop auto_increment=1";

$setresult=mysql_query($set1);
$updatresult=mysql_query($updat1);
$alterre=mysql_query($alter1);

# boardz
게시판 검색 기능 완성하기

## 기존 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.html
```



## board.php (수정)
[내용 추가!!]
우선 db 연동을 위해 
$connect = mysql_connect("localhost","jsw","1234");
mysql_select_db("jsw_db", $connect);

위 구문을 사용하였고
db에서 가져온 title 부분중 search 에 있는 text 내용과 같은 것만 가져와 커리에 저장하였다.

$sql = "select * from boardz where title like '%$_POST[search]%'";

그 후 커리를 실행하고 num에 mysql_num_rows 를 사용해서 몇개의 단어가 일치하는 지 비교하기위한 변수를 만들었다.

그후 php 구문으로 num의 개수에 따라 0인경우 1인경우 2개인경우 3개 이상인 경우 전체의 경우를 나눠서
전체인경우(아무것도 치지않고 search한 경우)에는 모든 자료를 나타나게 하였고
그렇지 0인경우에는 아무것도 나타나지 않도록하였다.
그리고 1개이상인 경우부터 3으로 나눠서 나머지를 구해 그 부분에 맞는 장소에  나타나도록 구현하였다.
다음은 그 기능을 구현하기위한 코드이다
/**
if($i%3==1) {
                    echo '<li>';
                        echo '<h1>'; $need = mysql_result($result, $i, title); echo $need; echo '</h1>';
                        echo '<img src="';$need = mysql_result($result, $i, image_url); echo $need; echo '" alt="demo image"/>
                      </li>
                      </ul>';
                      
             }
             **/
보는 바와 같이 4개이상일경우 첫번째 라인에 2개의 사진이 나타나도록 구현했기에 데이터 양이 늘어난다하더라도 계속해서
옆으로 생기지 않고 내려가는걸 확인 할 수 있었다.
                                                                                        

# TableBoard_Shop
�Խ���-Shop �� TODO �ϼ��ϱ�!

## ���� ����
```
 .
������ css - board_form.php�� index.php ���� ����ϴ� stylesheet
��   ������ ...
������ fonts - ��Ʈ
��   ������ ...
������ images - ������ �̹���
��   ������ ...
������ vender - �ܺ� ���̺귯��
��   ������ ...
������ js - board_form.php�� index.php ���� ����ϴ� javascript
��   ������ ...
������ function
��   ������ insert.php - �Խñ� �ۼ� ��� ����
��   ������ update.php - �Խñ� ���� ��� ����
��   ������ delete.php - �Խñ� ���� ��� ����
������ board_form.php - �Խñ� �ۼ�/���� �� ����ϴ� form�� ���Ե� php ����
������ index.php - �Խñ� ��ȸ ��� ����
```

## MySQL ���̺� ����!

[���⿡ ���̺� ���� ��, ����� Query �� �ۼ��ϼ���.]
Note: 
- table �̸��� tableboard_shop ���� ����
- �⺻Ű�� num ����, �� ���� �Ӽ��� board_form.php �� input �±� name �� ǥ�õ� �Ӽ� �̸����� ����
- �� �Ӽ��� type �� �����Ӱ� ���� (��, �ԷµǴ� ���� Ÿ�԰� ��ġ�ؾ� ��)
  
  

   create table tableboard_shop(
    num int(11),
    Date char(20),
    Orderid int(10), 
    Name char(50),
    Price int (20),
    Quantity int(10),
    primary key(num) 
   )

## board_form.php ����
  [���⿡ board_form.php �� ��� �����ߴ���, ������ �ۼ��ϼ���.]
   
   �켱 ��� ������ ����  
   $connect = mysql_connect("localhost","jsw","1234");
                 mysql_select_db("jsw_db", $connect);
    ������ �ۼ��ϰ� 
    
   $sql = "select * from tableboard_shop where num= $_GET[num]";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
    tableboard_shop ���̺��� num �����´� �����͸� index���� ������ ������ 
    �����ϰ� �������� ������ �Ŀ�
        <td class="column1"> <input name="date" type="text" value="<? echo $row[1]; ?>" /> </td>
                                    <td class="column2"> <input name="order_id" type="number" value="<? echo $row[2]; ?>" /> </td>
                                    <td class="column3"> <input name="name" type="text" value="<?  echo $row[3]; ?>" /> </td>
                                    <td class="column4"> <input name="price" type="number" placeholder="$" style="text-align: right;" value="<? echo $row[4]; ?>" /> </td>
                                    <td class="column5"> <input name="quantity" type="number" value="<? echo $row[5]; ?>" style="text-align: right;" /> </td>
                                    <td class="column6"> $<span id="total"> <? echo $row[4]*$row[5]; ?> </span> </td>

   �� �������� ������ �´� echo $row �� �������

## index.php ����
[���⿡ index.php �� ��� �����ߴ���, ������ �ۼ��ϼ���.]
 
  ���� ����������  ��� ������ ���� 
   $connect = mysql_connect("localhost","jsw","1234");
                   mysql_select_db("jsw_db", $connect);
      ������ �ۼ��ϰ� ���ٿ� ������ �ۼ��ϰ� �����Ѵ�.
    �� �� mysql_num_rows �Լ��� ����Ͽ�  ������ ���ǰ����� �Ǵ��ϰ� 
    �̸� $numsort ������ �����Ѵ�
    
   ���� <tbody> �ȿ� for������ numsort�� ����ŭ �ݺ��Ͽ� Ŀ���� ����ϴ� 
   ������ �ڵ��Ͽ��� ���� ������ column6�� ���� �ߺ��ǹǷ� column4�� column5�� 
   ������ ǥ�� �Ͽ��� ��� column�� ���������� $row = mysql_fetch_array($result);
   ������ ����Ͽ� ���� ������ �Ѿ��.
      
## function
 ���������� �� function ����    ��� ������ ����  
      $connect = mysql_connect("localhost","jsw","1234");      
       mysql_select_db("jsw_db", $connect);
       ������ ���������� ����Ͽ���                            

### insert.php ����
[���⿡ insert.php �� ��� �����ߴ���, ������ �ۼ��ϼ���.]
�⺻������  table�� �ۼ��Ҷ� num ���� �ڵ����� �ö󰡴� ������ �ֱ⿡  �̸� ����Ͽ��� #AUTO_INCREMENT
Ŀ���� ���ο� ���� �ֱ� ���� insert�� ����Ͽ��� �� ������ $_POST�� ����Ͽ� �����͸� ó���Ͽ���
���� ���� ǥ�ñ����� result���� ���� ���� �������� �����Ͽ���.
[�߰��Ѻκ�]
 $sql = "insert into tableboard_shop(Date,Orderid,Name,Price,Quantity)
 values('$_POST[date]','$_POST[order_id]','$_POST[name]','$_POST[price]','$_POST[quantity]')";
 $result = mysql_query($sql);
 
 
### update.php ����
[���⿡ update.php �� ��� �����ߴ���, ������ �ۼ��ϼ���.]
������ ���̽��� ������ �����ϱ����� update�� ����Ͽ��� ���� where num = $_GET[num] �� ����Ͽ� 
�޾ƿ� �˸��� ��ġ�� ���� ���Ҽ� �ֵ����Ͽ���.

[�߰��Ѻκ�]
$sql = "update tableboard_shop set Date='$_POST[date]',OrderId= '$_POST[order_id]' ,Name='$_POST[name]',Price='$_POST[price]',Quantity='$_POST[quantity]' where num = $_GET[num]";
$result = mysql_query($sql);



##delete.php ����
[���⿡ delete.php �� ��� �����ߴ���, ������ �ۼ��ϼ���.]
delete ������ü�� �տ����� ���� $_GET���� ���� �޾ƿͼ� ���Ͽ� �����ϴ� �������
�Ȱ������� delete �� �ٽ� insert�� �����ÿ� num���� ����� ���� ��� ����Ͽ� ���̿ö� ex)(�߰�)1->(�߰�)2->(�߰�)3->(2����)->(�߰�)4
�̸� �ذ��ϱ� ���ؼ� add��� ������ 0���� �ʱ�ȭ �� ������ ���̽��ȿ� num���� add�� +1�Ѱ����� �ʱ�ȭ�ϰ� 
�ٽ� AUTO_INCREMENT�� ����Ͽ��� ���� �ش� �ܰ���� �ϳ��� ������ ���������� ������ �ߵ���
!(result || !$setresult || !$updatresult || $alterre) ������ ����Ͽ���

[�߰��Ѻκ�]


$sql = "delete from tableboard_shop where num=$_GET[num]";
$result = mysql_query($sql);

$set1="set @add=0";
$updat1="update tableboard_shop set num =@add:=@add+1";
$alter1="alter table tableboard_shop auto_increment=1";

$setresult=mysql_query($set1);
$updatresult=mysql_query($updat1);
$alterre=mysql_query($alter1);

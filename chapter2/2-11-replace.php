﻿<?PHP
/* 대입 연산자
 * 특정 변수에 특정 내용을 대입(할당)
 */

$a = 5;	          	  // $a 에 5 값을 대입
echo $a."<br>";

$a += 3;                  // $a = $a + 3 와 동일
echo $a."<br>";

$a -= 4;                  // $a = $a - 4 와 동일
echo $a."<br>";

$a *= 2;                  // $a = $a * 2 와 동일
echo $a."<br>";

$a /= 4;                  // $a = $a / 4 와 동일
echo $a."<br>";

$a %= 2;                  // $a = $a % 2 와 동일
echo $a."<br>";

$a = "오렌지";
$a .= " 주스";            // $a = $a." 주스" 와 동일
echo $a."<br>";
?>
<?php

# 可变变量
$hello = 'world';
$world = '$$可变变量';
echo $$hello . "<br />";

# 变量函数（保存一个函数的名字，通过变量的方式去调用函数）
function demo()
{
	echo "变量函数<br />";
}
$bianhan = 'demo';
$bianhan();

# 回调函数（变量函数的具体应用）
function plus($a, $b)
{
	echo $a + $b . "回调函数<br />";
}
function sub($a, $b)
{
	echo $a - $b . "回调函数<br />";
}
function callback($a, $b, $ys)
{
	$ys($a, $b);
}
callback(1, 2, 'plus');

# 匿名函数（结尾要加分号，use绑定的是外部变量，不是传参，一般只用一次）
$noName = function ($a) {echo "$a<br />";};
$noName('匿名函数');

$a = 100;
$noName_01 = function ($b) use($a) { echo "$a $b<br />";};
$noName_01('匿名函数 use');

# 引用传参（可以改变函数内外部变量的值，引用传参必须传变量）
$b = 200;
function demo_01(&$a)
{
	$a = 100;
}
demo_01($b);
echo $b . "引用传参 & <br />";

# 递归函数（自己调用自己）
function demo_02($num){
	echo $num . "<br />";
	if ($num) {
		demo_02($num-1);
	} else {
		echo "-------- 递归函数 --------<br />";
	}
	echo $num . "<br />";
}
demo_02(3);
echo "<br />";

function demo_03($num)
{
	echo $num . '<br />';
	if ($num > 0) {
		demo_03($num-1);
	} else {
		echo '---------  递归函数   ---------- <br />';
	}
	echo $num . '<br />';
}
demo_03(3);

# 递归函数应用
# 求和  1+2+3+...+100;
function demo_04($n)
{
	if ($n > 0) {
		return $res = $n + demo_04($n-1);
		
	} else {
		return 0;
	}
}
echo demo_04(100) . "<br />";

# 方法二：
function demo_05($n)
{
	if ($n < 1) {
		return 0;
	} else {
		return $n + demo_05($n-1);
	}
}
echo demo_05(100) . "<br />";

# 方法三：递归函数最多只能递归255次
function demo_06($n)
{
	if ($n == 1) {
		return 1;
	}
	return $res = $n + demo_06($n-1);
}
echo demo_06(255) . "<br />";

# 阶乘 4*3*2*1
function demo_07($n)
{
	if ($n == 1) {
		return 1;
	} else {
		return $n*demo_07($n-1);
	}
}
echo demo_07(5) . "<br />";

# 可变参数
# func_get_args();	获取所有参数
# func_get_arg();	获取某一个参数
# func_num_args();	获取参数的数量
function demo_08() 
{
	$get_args = func_get_args();
	var_dump($get_args); echo "<br />";
	$get_arg = func_get_arg(2);
	var_dump($get_arg); echo "<br />";
	$num_args = func_num_args();
	var_dump($num_args); echo "<br />";
} 
demo_08(1,3,6,8,'小枫');

# ...（三点） 
# ...在形参中
function demo_09(...$n)
{
	var_dump($n);	//可输出全部的实参
	echo "<br />";
}
demo_09(2,5,6,2,7,8);

# ...在实参中
function demo_10($a, $b, $c)
{
	// 可将实参中数组的值依次对应到形参中
	// 并且数组的个数 与 形参的个数相等
	echo $a . "<br />";
	echo $b . "<br />";
	echo $c . "<br />";
}
demo_10(...[1,2,3]);  //相当于 demo($a[0], $a[1], $c[2]);

# include   包含文件失败时报警告错误，后面的程序会继续执行
# include_once	包含文件时判断是否已经包含过这个文件，如果包含过，将不会再包含，保证我们的文件只被包含一次
include __DIR__ . '/test_11_02.php';





















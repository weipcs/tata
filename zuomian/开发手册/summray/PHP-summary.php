<?php

===========  day08 php 数据类型 变量 打印 单双引号  ===================
PHP Hypertext Preprocessor 超文本预处理器(开源脚本语言)
	运行在服务器端的脚本语言
	可以直接嵌套在html代码当中
	PHP是模块化的需要什么就开启什么
	适用于Web开发领域

wampserver  wamp lamp lnmp
	w windows系统
	a Apache服务器
	m MySQL数据库
	n Nginx服务器
	p PHP引擎
	l Linux系统

安装：
	目录 
		www 项目目录 所有的代码都在里边
		bin 程序安装目录 apache mysql php
	访问
		1.localhost  主机名
		2.127.0.0.1  本地ip
	配置
		1.修改www/index.php
			修改：
				$projectContents .= '<li><a href="';
				if($suppress_localhost)
					// 这里修改一下，可以直接访问目录
					$projectContents .= 'http://localhost/'.$file.$UrlPort.'/"';
				else
					$projectContents .= 'http://localhost'.$UrlPort.'/'.$file.'/"';
				$projectContents .= '>'.$file.'</a></li>';
		2.apache_modules
			点击小绿->选择Apache->选择Apache_modules->找到autoindex_module 这个要带上√

	局域网访问：
	*	1、防火墙一定要关掉，他太危险了
	*	2、修改配置文件httpd-vhosts.conf
	*	3、在Require local下面加上 require all granted
		4、修改完配置文件之后必须要重启服务
	查看自己的ip：
	*	打开开始输入cmd 然后输入ipconfig 里边的ipv4就是你的ip地址
***	工具：
		1、phpinfo()	PHP的信息包括扩展模块
		2、phpmyadmin	数据库工具

php文件的格式：
	1.标准的 <?php ? >
		【注意】纯PHP文件不要结尾只要开头
***	2.短标记 <? ? >
		【要想让他生效需要改php.ini short_open_tag = On】
	3.<?=$a ? >
	4.每条语句必须以分好为结尾，【英文半角的】

***定义变量
	1.以$开头，字母数字下划线组成
	2.不能以数字开头，不能使用特殊字符，不能使用中文
	3.变量赋值 等号(=) 两边要加空格
	4.首选英文，次选全拼，见名知意
	6.驼峰命名
		大驼峰 $UserName
		小驼峰 $userName 
	7.下划线 $user_name

	说明：
		= 	赋值运算符
		=左边的叫变量
		=右边的叫常量

注释：
	1.单行 // 或 #
	2.多行注释 /*  */

***八种数据类型
	标量：
		integer 	整型 前缀0b(二进制) 0(八进制) 0x(十六进制)
		float 		浮点型(小数)
		string 		字符串
			声明方式：
				1.双引号
				2.单引号
***				3.定界符
					heredoc
					$str = <<<ABC 
						heredoc相当于双引号
ABC;
					nowdoc
					$str = <<<'ABC'
						nowdoc想当于单引号
ABC;
		【注意】结尾处的字符必须要顶格写，heredoc和双引号是一样的，nowdoc和单引号是一样的
		boolean 	其实就是true 或 false
	混合类型
		array 		数组
		object 		对象
	特殊类型
		resource 	资源(图片、文件等)
		null 		空

unset($a); 	销毁变量
isset($a); 	检测一个变量是否被定义
empty($a); 	检测一个变量是否为空
var_dump($a);		打印详细信息
echo $str1, $str2;  打印变量
print $str; 		不能打印多个变量和数组
$c= 1.234e3;  		e是指数  1234
$str = '\\\'';     \'

***单双引号的区别（面试题）
	1.双引号可以解析变量，单引号不行
	2.双引号解析转义字符，单引号不解析转义字符。但是单引号能解析 \' 和 \\
	3.单双引号不能自己套自己，要嵌套使用
	4.单双引号效率高，能用单引号就用单引号
	5.双引号用插入单引号，单引号当中插入变量，这个变量会被解析
	【注意】拼接字符串使用 点(.)

print print_r 的区别（面试题）？？？？？？？'
	echo和print都可以做输出，不同的是，echo不是函数，没有返回值
	而print是一个函数有返回值，所以相对而言如果只是输出 echo 会更快
	而print_r通常用于打印变量的相关信息，通常在调试中使用。
	print   是打印字符串
	print_r 则是打印复合类型  如数组 对象

echo 和 print 的区别
	共同点：首先echo 和 print 都不是严格意义上的函数，他们都是 语言结构;
			他们都只能输出 字符串，整型跟int型浮点型数据。不能打印复合型和资源型数据；
	而区别是：echo 可以连续输出多个变量，而print只能一次输出一个变量。print打印的值能直接复制给一个变量，如 $a = print “123”;
			 而echo 不可以，它没有像函数的行为，所以不能用于函数的上下文。在使用时，echo() 函数比 print()速度稍快。

var_dump()和print_r()的区别
	共同点：两者都可以打印数组，对象之类的复合型变量。
	区别：print_r() 只能打印一些易于理解的信息，且print_r()在打印数组时，会将把数组的指针移到最后边，使用 reset() 可让指针回到开始处。 
		而var_dump()不但能打印复合类型的数据，还能打印资源类型的变量。且var_dump()输出的信息则比较详细，一般调试时用得多。

================== day09 数据类型 函数 超全局变量 系统常量 强制类型转换 常量 可变变量 变量引用 表达式和运算符 =======================
数据类型
	四种标量：整型int 	浮点型float 字符串string 布尔型bool
	两种混合：数组array 对象object
	两种特殊类型：资源resource 空null

函数
	define('NAME', 2);	定义常量
		打印常量 	echo/var_dump NAME
	defined('NAME');	检测一个常量是否被定义
***	gettype($a); 		获取变量的类型
	is_array($a); 		判断是否是数组
	is_bool($a); 		判断是否是布尔
	is_float($a);		判断是否是浮点
	is_int($a); 		判断是否是整型
***	is_string($a); 		判断是否是字符串
	is_null($a); 		判断是否是空
***	is_numeric($a); 	判断是否是数据？？？？？
	is_object($a); 		判断是否是对象
***	is_resource($a); 	判断是否是资源(图片、文件等)
***	is_scalar($a); 		判断是否是标量(整型、浮点型、字符串、布尔型)

超全局变量
	$_SERVER 		服务器和执行环境信息
	$_SERVER['REMOTE_ADDR'];  获取正在访问的页面用户的ip地址
	$_SERVER['HTTP_REFERER']; 获取来源页的地址

***	$GLOBALS['A'] 	引用全局作用域中可用的全局变量
	$_GET['name'] 	获取get方法传过来的参数
	$_POST['name'] 	获取post方法传过来的参数
***	$_REQUEST		获取传过来的参数（get和post）
***	$_EVN 			是一个包含服务器端[环境变量]的数组？？？？？？
			1、var_dump($_ENV);
		    2、print_r($_ENV);
		    3、foreach($_ENV as $key=>$val){echo $key.'--------'.$val;}
***	$_FILES			获取上传文件信息
	$_COOKIE 		是一种在远程浏览器端储存数据并以此来跟踪和识别用户的机制
	$_SESSION 		会话控制（存储特定用户会话所需的属性及配置信息）

系统常量
	__LINE__ 	当前行号 echo/var_dump __LINE__
***	__FILE__ 	获取文件名字[包含路径/目录] echo/var_dump __FILE__;
				[C:\wamp64\www\PHP\experiments.php]
***	__DIR__ 	获取当前文件所在的目录[C:\wamp64\www\PHP]
	PHP_OS 		获取运行系统 echo PHP_OS;  [WINNT]
	PHP_VERSION 获取PHP的版本 echo PHP_VERSION; [5.6.16]
	__FUNCTION__ 	获取函数名 ？？？？？？
***	__CLASS__ 	 	获取当前类名
***	__METHOD__ 		获取当前方法名
***	__NAMESPACE__ 	获取命名空间

强制转换类型
	1.类型转换函数 strval intval floatval boolval
		例如：
			$float = floatval($a);
			【注意】前面没有$符号，且 $a 不加引号
		【注意】类型转换函数并不会改变变量本身的类型，转换的是值

	2.【前面加上()】里面写上类型，将它转换后赋值给其他变量
		例如：
			$bool = (bool)$a;
		【注意】变量前面加上()里面写上类型并不会改变变量本身的类型，转换的是值

***	3.settype(变量, 类型)
		例如：
			settype($a, 'int');
			【注】settype的第二个参数必须要加上引号
		【注意】直接改变变量的本身
		settype($a, null);  会直接把变量$a赋值为null

	$str = '2a2bc';
	$float = 1.23;
	echo $str + $float;  // 3.23
	
***自动类型转换【易错重点】
	注意事项：
		1.整型的0为假，其他整型值全为真
		2.浮点的0.0，布尔值为假，小数点后只要有一个非零的数即为真
		3.【空字符串为假，只要里面有一个空格都算真】
		4.字符串的0，也将其看作是假。其他的都为真
		5.空数组也将其视为假，只要里面有一个值，就为真
		6.空也为假
		7.【未声明成功的资源也为假】

常量：在程序运行过程中值不能被改变的叫做常量
	定义常量：define('常量名', 常量值);
	【注意】
***			常量值只能为标量
			常量名可以小写，但是通常大写
			常量名需要加上引号
***			在字符串中调用常量的时候，必须在引号外面
			常量名建议只用字母和下滑线
			常量全局都有效

***	检测一个常量是否被定义
		defined('常量名'); 
		返回值：定义了则返回true，没定义返回false

***可变变量
	$hello = 'world';
	$world = '蛋炒饭';
	echo $$hello;  // 蛋炒饭

***变量引用
	$a = 100;
	$b = &$a;
	$b = 200;
	echo $a.$b; // 200200
	【注意】不管改变$a和$b那两个的值都会一起变

isset empty is_null bool 区别???????
	手册 -> 目录 -> 附录 -> php类型比较表(一定要去看)

***is_null的几种情况
	1.变量未定义
	2.变量被销毁
	3.赋值变量为null

表达式和运算符
	表达式：带运算的式子
		【注意】所有的表达式都是有值的

***	算术运算符 + - * / % 【.】 【易错重点】？？？？？？ 
		【注意】-$a 取反  . 字符串运算符

	赋值运算符 = += -= /= %= 【.=】
		【注意】.= 链接字符 $a .= b; -> $a = $a.b;

	自加自减运算 $a++ $a-- ++$a --$a
		$a++  后置递增  先赋值，再计算
		++$a  前置递增  先计算，在赋值

	关系运算符 	> < >= <= != !== == ===

	逻辑运算 	&& and || or ! xor
***		【注意】xor异或 相同为假 相异为真

	按位运算 	& | ^ ~ << >>
		1T=1024G=M/kb/b/bit;
		&按位与 0&0=0 0&1=0 1&0=0 1&1=1  
		|按位或 0|0=0 0|1=1 1|0=1 1|1=1

***		^位异或 0^0=0 0^1=1 1^0=1 1^1=0
		~位取反 ~0 -> 1   ~1 -> 0
***		<<左移  $a<<2  结果：乘以2的多少次方
		>>右移  $>>2

============  day09 三元运算符 流程控制 循环结构    ======================
三元运算符
	表达式?真区间:假区间;
	执行流程：当表达式为真的时候执行真区间，为假的时候执行假区间

流程控制
	顺序结构 分支结构 循环结构

分支结构
	if else 结构
		1.单项分支
			if (表达式) {
				语句块;
			}
		2.双向分支
			if (表达式) {
				语句块1;
			} else {
				语句块2;
			}
		3.多项分支
			if (表达式1) {
				语句块1;
			} else if (表达式2) {
				语句块2;
			} ... {
				语句块n;
			} else {
				其他语句块;
			}
		4.嵌套分支
			if (表达式1) {
				语句块1;
				if (表达式2) {
					语句块2;
				}
			}

	switch calse 结构
		switch (表达式) {
			case 'value':
				语句块;
				break;
			default:
				默认语句块;
				break;
		}
	执行流程：判断表达式和哪个case值匹配，如果遇到匹配的了就执行当前匹配的语句块，如果都不匹配就执行default语句块
		1.【case 使用来匹配值得 case可以同给多个 也可以给表达式	case后面的值要使用标量类型 基本上每一个case都会跟着一个break】
		2.break也可以省略，break使用用来结束整个结构 如果没有碰到break会一直往下执行直到结束
		3.default可以加上也可以不加
			
if else 和 switch case 有啥区别（面试题）
	if else 	经常用于做区间判断 或者 固定值
	switch case 经常用于 固定值

循环结构
	1.while
		while (表达式) {
			循环体;
		}
		执行流程：判断表达式是否为真，为真的话就执行循环体，直到表达式不为真的就停止循环

***	2.do while
		do {
			循环体;
		}while(表达式);
		执行流程：先执行循环体，然后判断表达式，如果为真继续执行，如果为假退出循环
		【注意】写dowhile和while注意不要写成死循环

***while和dowhile的区别（面试）
	while   是先判断表达式在执行循环体
	dowhile 先执行一次循环体再去判断表达式

	3.for
		for (表达式1; 表达式2; 表达式3) {
			循环体
		}

***	for的变形
		$i = 1;
		for(;;) {
			if ($i > 10) {
				break;
			}
			$i++;
		}

break和continue的使用（面试）
	break：用来结束循环结构或者switch case
	continue：结束此次循环进入下一次循环

goto 
	goto autoMingZi;
	echo "string1";
	echo "string2";
	autoMingZi:
	echo "string3";
	结果：string3

***header("Content-type:text/html;charset='gbk'");  解决中文乱码问题【易错重点】

@可以忽略错误,有仰制错误的功能为错误控制操作符

==================  day10 函数 变量的作用域 静态变量 内部函数   ==================
函数是什么
	在我们写项目过程当中有很多的代码是重复的书写和使用，这个时候我们就可以把这些代码封装起来，这个封装的代码块就叫做函数

***为什么要封装函数
	1.提高代码的利用率
	2.提高开发效率
	3.提高代码的可读性，便于调试

函数定义和说明
	格式：
		function 函数名(参数)
		{
			函数体;
		}

	定义：
		1.函数名跟变量一样？？？？？？？
***		2.函数大小写不区分，但是我们区分
		3.以 function 关键字开头
	说明：
		1.函数名后面紧跟小括号然后回车大括号，大括号里面是函数体
		2.函数需要调用才会执行，调用函数的方式 --> 函数名();
		3.定义函数时小括号里写的形参(形式参数)
		4.调用函数时小括号里的参数叫做实参(实际参数)
		5.参数可以有多个，也可以没有，但是一般都有，一般定义函数参数不会超过5个
		6.参数可以给默认值，给默认值的一般放在参数的最后
***		7.函数调用的时候不分先后顺序，可以定义函数之前调用
***		8.函数不能重复定义
		9.函数可以没有返回值，返回值用 return
	【注意】一旦遇到 return，后面的代码将不再执行

***变量的作用域
	外部变量：函数外部定义的就叫做外部变量
		【注】函数内部不能使用外部变量，即使能用也尽量不要用
				可以通过以下放法实现在函数内部使用外部变量
		1.global $a; 声明之后再函数内部改变$a 的值会导致函数外部的$a 也跟这改变（不推荐使用）
***		2.$a = $GLOBALS['a']; 每定义一个变量都会存在$GLOBALS里【易错重点】
		3.通过 $_POST $_GET $_REQUEST
			例如：
				$_POST['can'] = 123;
				$b = $_POST['can'];

	内部变量：函数内部定义的就叫做内部变量
		【注】函数外部也不能直接使用内部变量、

***静态变量 static $a = 1;【易错重点】
	1.使用static 关键字 声明
	2.static 声明的变量只会执行一次
	3.static可以记录变量的状态

	【特性】
		1.程序加载的时候就分配了存储空间，函数调用之后也不会释放
		2.延长了内部变量的生命周期

***内部函数：【易错重点】
	在函数内再定义一个函数
	说明：
		1.拥有内部函数的函数，只能调用一次，否则会出现重复定义
		2.若要解决1 需要用以下办法
			1.用static 记录状态，保证内部函数只声明一次
			2.使用函数function_exists(判断函数是否存在)
			3.用过is_callable验证变量的内容是否能够进行函数调用[函数没有被定义就不能用，被定义了才能够用]
		3.【调用内部函数的时候必须在内部函数定义之后】

==================  day11 变量函数 回调函数 匿名函数 引用传参 递归函数 可变参数 include和require ==================
***变量函数
	变量可以保存另外一个变量的名字也可以保存一个函数的名字
	通过变量的方式去调用函数
	例如：
		function demo()
		{
			echo "变量函数";
		}
		$bianHan = 'demo';
		$bianHan();

***回调函数 就是变量函数一个具体的应用
	例如：
		function plus($a, $b)
		{
			echo $a + $b;
		}
		function sub($a, $b)
		{
			echo $a - $b;
		}
		function callback($a, $b, $ys)
		{
			$ys($a, $b);
		}
		callback(1, 2, 'plus');
		callback(1, 2, 'sub');

***匿名函数 没有名字的函数【易错重点】
	例如：
		$a = 100;
		$test = function () use ($a)
		{
			echo $a;
		};  【注意】分号结尾
		$test;

	【注意】1.匿名函数赋值给变量的时候【结尾要加分号】
			2.匿名函数use是绑定外部变量，不是传参
			3.当我们在写项目的过程中有些地方只用一次函数的时候，就可以使用匿名函数

***引用传参
	例如：
		$a = 200;
		function demo(&$a)
		{
			$a = 100
		}
		demo($a);
		echo $a;  // 100

	【注意】1.通过引用传参的方式，可以在函数内部改变外部变量的值
***			2.使用引用传参的时候【必须传变量】

***递归函数 就是自己调用自己 在函数内部再次的调用自己
	核心：调用自己
	优点：简洁优雅，高大上
	缺点：可读性差，效率低，占用内存
	例如：
		function demo($num)
		{
			echo $sum;
			if ($num > 0) {
				demo($num - 1);
			} else {
				echo "递归函数";
			}
			echo $sum;
		}
		demo(3); // 3 2 1 0 递归函数 0 1 2 3
	【注意】递归函数最多只能递归255次

***可变参数：【易错重点】
	func_get_args() 	获取所有参数
	func_get_arg() 		获取某一个参数
	func_num_args() 	获取参数的数量
	例如：
		function demo()
		{
			$get_args = func_get_args();  // 所有参数，数组形式
			$get_arg  = func_get_arg(2);  // 下标为2的参数：5
			$num_args = func_num_args();  // 参数的数量：4
		}
		demo(1, 3, 5, '枫');

神奇的三点 ...
	...在形参中
	例如：
		function demo(...$n)
		{
			var_dump($n);  // 以【数组的形式】显示全部的实参
		}
		demo(1, 3, 5, 7);

	...在实参中
	例如：
		function demo($a, $b, $c)
		{
			// 可将实参中数组的值依次对应到形参中
			// 并且将数组的个数 与 形参的个数相等
			echo $a . $b . $c;
		}
		demo(...[1, 2, 3]);  // 相当于 demo($a[0], $a[1], $a[2]);

include 和 require
	当我们包含文件失败不会影响下面的代码时用include
	当我们包含文件失败会影响下面的代码时用require

***面试题：
	include 和 include_once 的区别
	答：include_once 包含文件时会判断是否已经包含过这个文件
	    如果包含过将不会再包含，保证我们的文件只被包含一次
	
	require 和 require_once 的区别
	答：同上

	include 和 require 的区别
	答：include 包含文件失败时报警告错误，程序会继续执行
		require 包含文件失败时报致命错误，程序会终止执行
		include 有返回值，用到时加载
		require 没有返回值，一开始就加载，通常放在PHP程序的最前面

	include_once 和 require_once 的区别
	答：同上。

===============  day12 数组 遍历数组(foreach/list each while)  ====================
什么是数组  所谓数组，是无序的元素序列
	就是一组数据 通常是有关系有顺序的数据【同类数据元素的集合】

***数组的声明方式
	1.使用 [] (如果数组名的前面的一样，就会覆盖)
		$arr = [1, 2, 3];
		$arr = [4, 5, 6]; // 覆盖掉前面的
	2.通过array() (如果数组名和前面的一样，就会覆盖)
		$arr = array(1, 3, 5);
	3.直接赋值法、还可以添加值和修改值[键名一样]
	 	$arr[] = 1;
	 	$arr['a'] = 3; // 添加值
	 	$arr['a'] = 5; // 修改值

	【注意】数组的下标不可以重复，如果下标重复，后面的值会把前面的值覆盖
	【注意】如果某个元素不指定下标，默认下标为大于他之前出现的最大下标的非负整数

***几个名词
	元素	数组的基本组成单位
	键 		就是为了找到我们的值 也就是值的索引，也称为下标 key
	值 		就是我们存放的有效数据 value
	键值对 	键和值的组合
	=> 		数组元素值键连接符

数组分类
	按类型
		索引数组 下标都是纯数字
			$arr = [1, 3, 5];
		关联数组 下标都是字符串
			$arr = ['name'=>'枫', 'age'=>16];
		关联索引数组 数组里既有数字下标又有关联下标
			$arr = [2, 4, 'name'=>'枫'];

	按维度
		一维数组
			$arr = [3, 'name'=>'枫'];
		二维数组
			$arr = [[3, 5], 'name'=>['枫', '猪']];
		多维数组
			$arr = [[[1, 3], [5, 6]], [[7, 8], [2, 4]]];

遍历数组
	1.for循环遍历数组 【只能遍历下标连续的索引数组】

	2.foreach 专门用来遍历数组或者对象
		foreach ($arr as $key => $value) {
			echo $key . '=>' . $value;
		}

***	3.list each while 【易错重点】
		list 把数组中的值赋给一些变量
			例如：
				$arr = [1, 3, 4];
				list($a, $b, $c) = $arr; // 1, 3, 4
***			【注意】list只能用于索引数组
			【注意】不需要提取的值，可以省略，但是逗号不能省略
		
		each 【每运行一次each($arr)，就会指向下一个键和值】
			例如：
				var_dump(each($arr)); // 只要出现一次each($arr),它就会执行一次
				结果：array (size=4)
				  1 => int 1
				  'value' => int 1
				  0 => string 'a' (length=1)
				  'key' => string 'a' (length=1)
				【只取当前元素的键和值】
			返回数组当中的当前键值对，并且将指针向后移动一位

		例如：
			while (list($key, $val) = each($arr)) {
				echo $key . $val;
			}

***$n = count($arr);  // 数组$arr中元素的个数

加号+ 前面的 $arr1 里面元素的不变，如果$arr2 中的键和$arr1中键不同，就往后添加
	例如：
		$arr1 = [1, 3, 5];
		$arr2 = [3, 7];
		$arr = $arr1 + $arr2; // [1, 3, 5, 7]

例题：
	$a = '12345';
	$a[$a[1]] = 2;	// $a[ $a[1] = 2 ] ->  $a[2] = 2 -> $a = '12245'
	// $a[$a[1]] = '2'; 加不加引号，都是一样的

============= day13 时间和错误处理  ===================
时间处理
	time(); 获取Unix时间戳
		它是当前时间区1970年1月1日到现在的秒数
	
	date(); 格式化时间戳
		date('Y-m-d H:i:s', time());

	秒数换算 一天是 86400秒

***	设置当前默认时区为中国
		date_default_tiezone_set('PRC');
	还可以通过修改配置文件
		php.ini中的date.timezone = 'UTC';

	获取当前时区
		date_default_timezone_get();

	mktime()	获取一个日期的Unix时间戳
	checkdate() 检查一个日期是否合法
	getdate()	根据时间戳获取日期时间数组
	strtotime() 根据字符串得到时间戳
	date_parse()根据日期时间字符串得到数组
***	microtime() 获取当前Unix时间戳和微秒数【易错重点】

	例如：
		mktime(hour, minute, second, month, day, year); 
			$a = mktime(21, 24, 10, 10, 4, 2017); 
			返回值：返回整数的Unix时间戳
		checkdate(month, day, year); 检查一些日期是否是有效的格利高里日期
			$a = checkdate(10, 4, 2017); // true
			返回值：日期是有效返回 TRUE，无效FALSE
		getdate([timestamp]); 参数可选：默认为time();
			返回值：当前本地的日期/时间的日期/时间信息
***		strtotime(time); 将英文文本日期时间解析为 Unix 时间戳
			strtotime('[now] [+5 hours/week/days] [next/last Sunday] [15 October 1980]');
***		date_parse(); 返回一个包含指定日期的详细信息的关联数组
			date_parse("2013-05-01 12:30:45.5");
***		microtime([get_as_float]);
			参数：可选，TRUE返回浮点数，否则返回字符串。默认FALSE

***	# microtime() 获取当前Unix时间戳和微秒数
	// 获取当前Unix时间戳和微妙数，字符串形式
	echo microtime();  // 0.79843100 1507125134

***	# explode 将字符串转化为数组
	$weimiao = explode(' ', microtime());
	var_dump($weimiao);  // [0.79843100, 1507125134]
	var_dump(array_sum($weimiao)); // 1507125134.7984

错误处理
	错误级别
		notice  注意 不会影响下面代码的执行
		warning 警告 对下面代码有一定影响
		error  	错误 会终止代码执行

***	trigger_error('错误信息', 级别); 手动产生一个错误
		要注意必须传 E_USER 系列的常量
		E_USER_NOTICE E_USER_WARNING E_USER_ERROR

	display_errors 调控是否显示错误
		修改配置文件 php.ini

***	error_reporting()
		配置文件 php.ini
			error_reporting = E_ALL & ~ E_NOTICE;
			error_reporting = E_ALL & ^ E_NOTICE;
			显示除了notice之外的所有错误
			error_reporting = E_NOTICE;
			只显示notice的错误

		函数
***			error_reporting(0);  关闭所有错误
			error_reporting(-1); 报告所有错误
			error_reporting(E_NOTICE); 只报告notice错误

***		set_error_handler('回调函数名'); 指定错误处理函数
			设置一个用户定义的错误处理函数，参数：回调函数
			【注】要传入参数，默认的参数：$errno错误号 $errstr错误信息 $errfile错误文件 $errline错误行
			function 回调函数名($errno, $errstr, $errfile, $errline)
			{
				echo "string";
			}

		log_errors是否使用错误日志
			在php.ini中搜索log_errors
		error_log指定错误日志位置
			在php.ini中搜索error_log
		如果开启了error_log = syslog则放到系统日志里
			计算机 管理 事件查看器 windows日志 应用程序

		ini_set(); 为配置选项设置值
			ini_set('error_reporting', E_NOTICE);
			 	只显示notice错误
			ini_set('display_errors', 0);
				调控是否显示错误
		ini_get(); 获取一个配置选项的值
			ini_get('error_reporting');
			ini_get('display_errors');

=========== day14 正则   =============
使用场景
	1.手机号、邮箱的验证
	2.url判断、配置文件、字符串的操作

使用原则
	1.能不用就不用、效率低
	2.能用字符串函数就用字符串函数

***正则的组成
	定界符、原子、元字符、模式修正符
	【注意】
			1.正则表达式是从左到右完整匹配
			2.正则表达式默认是贪婪匹配

	1.定界符 是正则表达式的边界
		【注意】1.定界符不能使用0-9、a-z、A-Z、\、空格
				2.通常使用 /  作为正则的定界符

	2.原子 是正则表达式的最小单位
		\d 0-9
		\D 非0-9
		\w 字母、数字、下划线0-9 a-z A-Z _
		\W 非\w
		\s 空白字符 空格 \n \t \r 如果空格在原子后(前),则k\s(\sk)??????????
		\S 非空白字符
		\b 词边界 3\b 3放在左边或右边都一样
		\B 非词边界
***		[] 原子列表，会匹配中间的任意一个原子
***		[^] 取反 写在原子列表最前面试取反的意思 要取反的原子要放在^后，[^72]除了7或2
		.  除了\n以外的任意原子

	3.元字符 用来修饰原子的 不能单独存在 要写在原子前面
		* 	任意次
		+ 	至少一次 +前面的所有原子组合至少一次
		? 	可有可无 最多一次 懒惰模式
		{} 	指定次数 是连在一起的 b{3} 3个b在一起
			{10} 指定10次
			{3, 5} 指定3-5次
			{3,} 至少3次
			{0, 3} 0-3次
***		^ 	以指定原子开头
		\A 	同上
***		$ 	依指定原子结束
		\Z 	同上
***		| 	或  | 前面是一个整体
***		() 	用来限制优先级、括号里表示一个整体 子模式

***	4.模式修正符 用来给正则表达式修饰、限制
		【注意】模式修正符必须写在正则表达式之后
		i 	忽略大小写
		m 	多行匹配
		s 	能让 . 匹配到 \n
		x 	忽略正则表达式当中的空格
		A 	作用与 \A 和 ^ 一样，以指定原子开头
		U 	对正则贪婪模式取反

	5.组合拳
		.+? 	取消贪婪匹配 只匹配一个
		.*? 	取消贪婪匹配 匹配出来0个字符

	【注意】1.当要匹配的字符是正则里的特殊字符 则需要转义 \
			2.当需要匹配 \ 需要在前面加上 3-4个 \

手机号 第一位：1   第二位：34578
	$preg = '/^1[14578]\d{9}$/';

邮箱
	$preg = '/^\w+@\w+(\.(com|cn|net|org|edu))+$/';
	
URL
	$preg = '/^(http|ftp)s?:\/\/www\.(\w+\.)+(com:443)?\/?(index\.html)?(\?\w+=\w+)?(&\w+=\w+)+?/';

正则匹配函数
	preg_match($preg, $str, $match); 	执行正则表达式匹配 只执行一次
		$match 匹配到的字符串
		返回值：返回执行成功的次数
	preg_match_all($preg, $str, $match); 执行正则表达式匹配 匹配全部
		返回值：返回执行成功的次数
***	preg_replace($preg, $replace, $str); 执行正则替换
		返回值：替换后的字符串
***	preg_split($preg, $str); 正则分割
		返回值：分割后的字符串

***函数：
	array_count_values($arr); 统计数组中所有的值出现的次数
	array_replace($arr1, $arr2...); 替换下标相同的，使用传递的数组替换第一个数组的元素
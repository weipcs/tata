<?php
============ PHP ==============
# 解决内部函数重复定义的问题

# static 静态变量，声明的变量只执行一次，记录变量的状态
function demo()
{
	static $a = true;
	if ($a) {
		$a = false;
		function aa()
		{
			echo "static内部函数<br />";
		}
	}
	aa();
}
demo();
demo();

# function_exists(); 判断函数是否存在
function demo_01()
{
	if (!function_exists('bb')) {    // 调用函数内部函数，写在了函数定义的上方，表示还没有定义函数
		function bb()
		{
			echo "function_exists内部函数<br />";
		}
		bb();
	} else {
		bb();
	}
}
demo_01();   //
demo_01();   // 不是调用了两次吗，这不算重复定义吗

# is_callable(); 判断函数是否可被调用
function demo_02()
{
	if (!is_callable('cc')) {
		function cc()
		{
			echo "is_callable()内部函数<br />";
		}
	}
	cc();
}
demo_02();
demo_02();

func_get_args()			获取所有参数，数组形式
func_get_arg(2)			获取某一个参数(下标为2的参数)
func_num_args()			获取参数的数量


***	# microtime() 获取当前Unix时间戳和微秒数
	// 获取当前Unix时间戳和微妙数，字符串形式
	echo microtime();  // 0.79843100 1507125134

***	# explode 将字符串转化为数组
	$weimiao = explode(' ', microtime());
	var_dump($weimiao);  // [0.79843100, 1507125134]
	var_dump(array_sum($weimiao)); // 1507125134.7984

============= OPP  =================
上传文件时，获取input中的name的值  $key = array_keys($_FILES)[0];

将路径中的 反斜线 \ 换成 正斜线 / 
	str_replace('\\', '/', $pathName);

获取文件名称的详细信息
	pathinfo($path);  
	extension 后缀键名

js切换验证码
	<img src='./code.php' onclick="this.src = this.src + '?abc=' + Math.random();" />

将光标移到最后一个位置
	<input id='ip1' value='134' />
	<script>
		ip1.value = ip1.value;
	</script>

array_intersect($arr1, $arr2); 
	比较两个数组的【值】，并返回交集：值的交集，键为第一个数组的(参数)的键值

array_intersect_key($arr1, $arr2);
	比较两个数组的【键名】，并返回交集：键的交集，值为第一个数组(参数)中的值

__CLASS__	当前类名
get_class($this);  当前对象的类名
get_class_vars($className); 获取类中的所有属性

call_user_func()  把第一个函数作为回调函数调用
	例如：
		函数：call_user_func('函数名', '传函数参');
		对象：call_user_func([对象, '方法名'], '参',...);
			  call_user_func([$feng, 'say'], '有参数就传');
	【注意】返回回调函数的返回值，如果错误则返回FALSE。 

call_user_func_array();调用回调函数，并把一个数组参数作为回调函数的参数，这个数组是索引数组
	例如：
		函数：call_user_func_array('函数名', ['参1', ...]);
		对象：call_user_func_array([对象, '方法名'], ['参1', ...]);

instanceof  判断某个对象是否是一个类的实例
	例如：if ($feng instanceof Person) {
			  echo "是这个类的实例";
		  }

is_subclass_of() 判断一个对象是不是实例化的一个类的子类
	如果此对象是该类的子类，则返回 TRUE
	例如：
		is_subclass_of($feng, '父类名');

var_export()  输出变量的字符串表示
	例如：
		$str = var_export($arr, true);  // array ( 0 => 1, 1 => 2, 2 => 3, 3 => 4, )
		$arr：是变量【可以是数组，字符串】
		当加了true时，不输出，但可以赋值给变量

$arr = include '02-user.php';
	将文件中的return的值赋值为$arr
	var_dump($arr); 相当于打印这个文件的返回值

eval()  把字符串作为php代码执行
	$str = 'echo 12 . "<br />";';
	eval($str);
	$str = '<?php echo 12; ?>';
	eval('?>'.$str); 注意：是结尾号？>

file_exists($fileName); 	判断文件是否存在
is_dir($fileName); 			判断是否是目录
mkdir($path, 0777, true); 	true 递归创建目录
chmod($fileName, 0777); 	修改文件权限
preg_quote($str[, '/']); 	转义正则表达式字符
preg_replace($reg, $replace, $str); 执行一个正则表达式的搜索和替换
preg_replace_callback($reg, $callback, $str);
	执行一个正则表达式搜索并且使用一个回调进行替换($callback:回调函数名，返回值作为其替换字符)
filemtime($fileName); 	函数返回文件内容上次的修改时间。
	返回：成功：则时间以 Unix 时间戳的方式返回。失败false。

MVC框架目录结构
	application
		model 	数据模型，一个数据表对应一个数据模型
			UserModel.php
		view 	视图文件 所有的html视图文件
		controller 控制器，数据模型和视图文件的桥梁
			IndexController.php
			UserController.php
	boot
		Psr4AutoLoad.php 	PSR4自动加载规范(自动加载，空间映射)
		Start.php  			开启路由

	cache		缓存文件
		缓存文件存放地方
	
	config 		配置文件
		config.php(数据库信息，模板路径、缓存路径)
	
	public 		静态目录
		静态文件（js、css、editor、fonts）
	
	vendor 
		lib 	所有的函数方法
			Model.php
			Tpl.php
			Page.php

	index.php(框架的入口文件)

:: 范围解析符
$str = serialize($obj1/字符串/数组...) 序列化函数 不能传到另一个页面使用（包括属性和方法，因为那个页面没有这个类），要使用的话，要把类也要包含过去
	【注意】序列化函数不会显示类中的方法，但反序列化后可以调用方法和属性
	结果：O:6:"Person":1:{s:4:"name";s:6:"枫枫";}
		  objec:类的名称六个字符:类名：1个属性:{string类型:4个字符:属性名:string类型:6个字符:属性的值}
$obj2 = unserialize($str) 反序列化
	【注意】序列化和反序列化不会显示类中的方法，但是反序列后可以调用类中的属性和方法
	【注意】类和反序列化函数必须在用一文件，不然不可以调用类中属性和方法
	相当于一个对象，可以直接调用里面的方法,虽然$obj2没有显示
	【不能访问不可访问的属性】
	例如：$obj2->name; $obj2->say();

$_SERVER 		服务器和执行环境信息
REQUEST_URI 	除主机名之外的所有东西
SERVER_PORT 	端口 http80 https 443
SERVER_NAME 	主机名 $_SERVER['SERVER_NAME'];
REQUEST_SCHEME 	协议名

parse_url($url);  解析 URL，返回其组成部分
	例如：
		$url = 'http://www.dsapcs.com:80/index.php?username=feng&sex=nv';
		$arr = parse_url($url);
		var_dump($arr);
	结果：
		array (size=5)
    	   'scheme' => string 'http' (length=4)
    	   'host' => string 'www.dsapcs.com' (length=14)
    	   'port' => int 80
    	   'path' => string '/index.php' (length=10)
    	   'query' => string 'username=feng&sex=nv' (length=20)

parse_str($str[, $arr]); 将字符串解析成多个变量，[保存在数组中]
	例如：
		$str = 'username=lliuwei&sex=nv';
		parse_str($str, $arr);
		var_dump($arr);
	结果：
		array (size=2)
    	  	'username' => string 'lliuwei' (length=7)
    	  	'sex' => string 'nv' (length=2)

http_build_query(query_data); 生成 URL-encode 之后的请求字符串
	参数：可以是关联（或下标）数组或包含【属性】的对象
	例如：
		$arr 与上面的类型一样，会自动用&符拼接，或者是对象$obj
		var_dump(http_build_query($arr));
	结果：
		username=liuwei&sex=nv

自己注册一个自动加载函数
	function myload($className)
	{
		include str_replace('\\', '', $className) . '.php';
	}
	spl_autoload_register('myload');

mkdir($str, 0777, true);  创建目录 
	返回：成功true 失败false
	参1：创建目录的名称(可一次性创建嵌套目录，例如：1/2/3)
	参2：规定权限，默认是 0777
	参3：是否设置递归模式(创建嵌套目录时，如果没有该目录，则要递归，否则：可省略该参)
	权限：
		0777 可读可写可执行
		0755 可读不可写可执行
		0666 可读可写不可执行

$_FILES 获得文件的相关信息

get_class_vars($className);  获取类里面的所有属性

__CLASS__ 获取当前类名
	
is_uploaded_file(filename); 判断指定的文件是否是通过 HTTP POST 上传的

move_uploaded_file($tmpName, $newName);  将上传的文件移动到新的位置
	返回：成功true 失败false
	参1：上传后的临时文件名，由系统自动生成
	参2：包含有路径的新的文件名

pathinfo($path);  获取文件名称的详细信息
	extension 后缀键名

连贯操作：连贯操作都返回当前的模型实例对象（this）
	例如：$obj->field('')->where('')->order('')->select();
	解析：$obj->field('')的返回值为：$this ...
	【注意】需要进行连贯操作的函数(field/where/order)返回$this(当前对象)

数据库字段缓存操作：
	1.将要操作的数据表字段缓存起来（写到文件中）
	2.如果在查询的时候，如果你没有传递field，那么从缓存中获取
	3.当在插入数据的时候，你给我数组，随便给，我里面会自动过滤

两种操作：
	读 	查询 	query
	写	增删改 	exec

查询实现字段无顺序替换
	field table where order group having limit
	$user->where()->field()->order()->select();
	$user->order()->field()->where()->select();	

<?php
================= day01__OOP  =========================
OOP  Object Oriented Programming 面向对象编程（属性：一种计算机编程架构）
	好处：简洁优雅 易维护 很强的重用性 解决代码的依赖性
***	特点：封装 继承 多态
	目标：重用性 扩展性 灵活性

面向过程(面向记录) Procedure Oriented
	类型：编程思想

面向对象 Object Oriented,OO （软件开发方法）
	是一种对现实世界理解和抽象的方法，是计算机编程技术发展到一定阶段后的产物。
	作用：软件开发
	领域：CAD技术、人工智能

面向过程与面向对象的区别？？？？？？？？

类：类是具有相同特征（属性和行为）的事物的抽象
	定义：
		1.类名要以大驼峰格式
		2.用class关键字声明 内容用{}包裹起来
		3.通过new关键字来实例化一个类
	例如：定义一个类Person
		class Person
		{
			public $name;
			public $age = 18;
			public function say(){...}
		}

对象：对象是一个类的具体实现
	例如：创建一个对象feng
		$feng = new Person();

***成员属性：其实就是变量 前面加上修饰符
	调用成员属性 不加$符
	例如：$obj->name;
		  $obj->name = 'feng';

***成员方法：其实就是函数 前面可以不加修饰符 但一般都要加上
	调用成员方法
	例如：$obj->say();
		  $obj->say('枫');

创建对象的三种方式：
	1.$feng = new Person();
***	2.$feng = new Person();
	  $xiaoli = new $feng();
	3.$name = 'Person';
	  $feng = new $name();

***在类内部访问成员使用 $this
	$this 代表的是当前对象
	例如：$this->name; $this->say();

针对属性的魔术方法
	在特定的场景自动调用的方法
	特点：
		 1.在类中被定义
		 2.__开头（两个下划线）
		 3.自动调用
		 4.区分场景
		 5.带参数和不带参数
	__construct() 构造方法
		触发时机：创建对象的时候自动触发
		例如：$obj = new Person();
	__destruct() 析构方法
		触发时机：当对象被销毁时自动触发
		例如：unset($obj);
	__get($name)
		触发时机：访问不可访问的属性时自动触发
		参数：属性名
		例如：$obj->name;  name为不可访问的属性
	__set($name, $value)
		触发时机：在给不可访问的属性赋值时自动触发
		参1：属性名  参2：属性值
		例如：$obj->name = 'feng'; name不可访问的属性
	__isset($name)
		触发时机：当对【不可访问】的属性使用empty或isset时自动触发
		参数：属性名
		例如：isset($obj->name); empty($obj->name);
	__unset($name)
		触发时机：当销毁【不可访问】的属性时自动触发
		参数：属性名
		例如：unset($obj->name)
*	__invoke();  了解
	 	触发时机：当以一个调用函数的方式调用对象时自动触发
	 	参数：不限，你调用的时候传几个就是几个
	 	例如：$obj([1, 2]);

【可以创建两个一样的对象吗】？？？？？？？？？？？？？？？

============== day02_OPP 封装 继承 修饰符 final 常量const static foreach searialize MVC 自动加载 PSR-4规范 ==================
【封装】：封装就是把对象中的成员属性和方法加上修饰符，使尽可能的隐藏内部细节，以达到对成员的访问控制

访问控制修饰符
	pubic 		公共的 在类的内外都可访问
	protected 	受保护的 在【类内】部和【子类】可以访问，不可以在内外部访问
	private 	私有的 在类的内外部都不可以访问

				本类 	子类 	外部
	public		yes 	yes 	yes
	protected	yes 	yes 	no
	private		no 		no 		no

不可访问的属性，用户不可以修改，可以通过 __get()方法中判断，输出不可访问的属性
	public function __get($user)
	{
		if ($user == 'sex') {
			echo '保密<br />';
		}
		if ($user == 'age') {
			echo "18<br />";
		}
	}	

***public function say($user)
	{
		echo $this->$user; // 【注意】这里的变量要加 $
	}

【继承】：可以使一个类拥有并使用另外一个类的属性和方法
	使用【extends】关键字
	例如：class Child extends Father{}
	【注意】php中继承是单继承
	一个子类只能拥有一个父类
	一个父类可以有多个子类 可以一直向下继承
	【注意】在继承时权限不能缩小
		例:
			父类 	class Yeye
					{
						protected function say(){}
					}
			子类	class Father extends Yeye
					{
						【protected/public】 function say(){};
					}	

	父类 	子类
	基类 	派生类
	parents children
	
$this 在子类中调用父类的成员【属性和方法】 
	例如：$this->name; $this->say();

parent 可以在子类中调用【父类的方法】 使用parent关键字
	例如：parent::say();
	【注意】：如果在子类中定义了与父类成员一样的方法 父类的方法会被重写

***final(不可更改的) final修饰的类不能被继承
	  final修饰的方法不能被重写
	  例如：
	  		final class Person{}
	  		final pubic function say(){}

***定义常量
	在类的内部定义常量 使用【const】关键字 而且【必须给默认值】
	【注意】一个 类中 不可以有同名的常量，但子类常量名可以和父类的常量名相同
	类外可以用define或const 但类内只能用const
	例如：const SEX = '女';

***静态成员方法/属性：使用【static】关键字
	定义静态的【成员方法/属性】
	【特点】不需要实例化就可以在类的外部访问类的成员
	例如：public static $count = 123;
		  public static function say(){}
	在类外部直接调用，不需要new Person::say();
	给静态变量重新赋值
		类外：Person::$count = 54;
		类内：self::$count = 50;
	打印静态变量【方法：和常量一样】
		例如：echo Person::$count . '<br />';

访问常量/静态
	类内 	【self::常量名】 	$this::常 对象名::常  
	子类 	【parent::常量名】 	$this::常
	类外 	【类名::常量名】 	对象名::常

***遍历对象
	在类外部使用 foreach 只能遍历【public】修饰的成员属性
	例如：foreach ($obj as $key => $value) {}
	在类内部使用 foreach 所有的成员属性都可以遍历
	例如：foreach ($obj as $key => $value) {} $obj从外面传进来

	【注意】$obj->say($obj); 将对象传入类中

***对象赋值：对象赋值时引用赋值，和引用传参一样
	例如：$feng = new Person();
		  $xiaoli = $feng;  // 对象赋值
		  $xiaoli->name='feng'; // 两个对象中的任意一个属性变化，就都会改变
		  unset($xiaoli);  // 销毁对象，不影响另一个对象

魔术方法
	__call([$name, $arr]) 
		触发时机：访问不可访问的方法或访问一个【不存在】的方法时触发
		参1：方法名 参2：【传进来的参数，是一个数组】
		【注意】可以没有实参，但一定要有形参
	__callStatic
		触发时机：访问一个【不可访问或不存在的静态方法】时触发
		参1：方法名 参2：【传进来的参数，是一个数组】
		【注意：定义的时候必须是静态的】
		例如：public 【static】 function __callStatic() {}
			  $obj->say();  或  Person::say();
	__debugInfo
		触发时机：当var_dump【对象】时触发
		例如：var_dump($obj);
	__toString 
		触发时机：当echo 【对象】时触发
		例如：echo $obj;
	__sleep
		触发时机：当serialize【对象】时触发
		【注意】要返回需要被徐丽欢的变量的数组，不能返回受保护的或私有成员的名称
		例如：
			类内：public function __sleep()
				  {
				  	return ['name', 'sex'...]; // 不能返回受保护的或私有成员的名字，随自己的需求传
				  }
			类外：$str = serialize($obj1);
	__wakeup 
		触发时机：当unserialize被序列化的对象时触发
		例如：
			类内：public function __wakeup()
				  {
				  	echo '124t';
				  }
			类外：$obj2 = unserialize($str[序列化后的字串]);
		serialize($value)
	__clone 
		触发时机：当clone对象时触发
		$feng = clone($obj); 
		【注意】克隆出来的，相互不影响
				而赋值（引用）出来的，相互影响 $xiaoli = $feng;

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

自动加载 	__autoload()
	当new一个不存在的类的时候，会自动触发
	例如：
		function __autoload($calssName)
		{
			include $calssName . '.php';
		}
		// 【注意】类名与文件名一致，一个文件对应着一个类，这样方便包含文件
		$obj = new Person(); // 这个Person类不存在，newPerson的话，它会自动触发__autoload函数，参数$className就是这个不存在的类名Person
		$obj->say(); // 调用方法

PSR-4规范  自动加载规范
	类名与文件名一致  命名空间与文件夹名一致
	一个文件对应着一个类

MVC 设计模式
	M 	model 		数据模型  	业务逻辑处理 一个模型对应一个表
	V 	view 		视图 		展示数据
	C 	controller 	控制器 		调用model查询数据展示到view上

【一般用SESSION传参】

================= day03 抽象类 接口 trait 匿名类 命名空间 MVC ====================
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

抽象类 abstract  很抽象
	抽象类使用abstract声明abstract
	抽象类不能实例化 由子类来继承 抽象类里不要用private
	抽象类里可以有抽象方法 也可以与普通方法 也可以有属性
	【定义抽象方法不能包含方法体】
	【抽象类中的抽象方法子类在继承时必须实现 而且一模一样】
	【抽象类可以继承抽象类】
	例如：
		abstract class Animal
		{
			abstract public function say(); 【注意：不能有方法体{}】
		}
		abstract class Pig extends Animal
		{
			protected $host;
			public function where() {
				echo '123';
			}
			abstract public function connected($name = 123);
		}
		class Feng extends Pig
		{
			public function say(){}
			public function connected($name = 123){}
		}
		$feng = new Feng();

接口 interface  接口就是完全抽象类
	interface 用来声明
	implements 实现接口
	接口里的方法都是抽样方法
	接口不要定义成员属性和普通方法 但可以定义常量，只是一般也不定义
	接口的存在是为了让其他的类来实现
	【一个类可以实现多个接口，中间用逗号(,)隔开】
	【接口可以继承接口 类在实现的时候要把继承的接口里的方法也实现】
	【一个类可以继承父类的同时实现接口 先继承后实现】
	【接口里的方法必须是public】
	例如：
		interface Test
		{
			public function sing();
		}
		interface Junzi extends Test
		{
			const SEX = 123; 接口中不能有属性和普通方法，可以有常量
			public function rich();
		}
		interface Xiaoren
		{
			public function tou();
		}
		class Person extends Animal implements Junzi,Xiaoren
		{
			实现所有的抽象方法;
		}

多态 其实就是多种形态
	调用相同名字的方法，传的参数不同，实现的方法不同
	例如：
		$obj1->say();
		$obj2->say();

trait  可以解决单继承问题 模拟实现多继承
	使用trait声明trait
	使用use来使用trait
	trait里的成员可以使用任意修饰符
	trait可以 use 别的trait 一般可以用一个公共的 trait use 其他的
	as 给方法起别名
	解决trait里方法冲突：用 【insteadof】 关键字 确定优先级 用 as 起别名
	例如：
		trait Person
		{
			protected $name;
		}
		class Feng
		{
			use Junzi, Xiaoren, Nvzi{
				// ::范围解析操作符 使用类里面的方法或静态变量
				Xiaoren::rich insteadof Junzi, Nvzi;
				Xiaoren::rich as chou;
				Junzi::rich as poor;
				Nvzi::rich as mei;
			}
		}

	【注意】当本类 父类 和 trait 中的方法重名时
	优先级：本类 > trait > 父类

类型限定 declare
	declare(strict_types = 1); 开启严格类型检查（类中不用写）
	【注意】中间用下划线隔开
	例如：
		function add(int $a, int $b) : float {} 
		【必须参数必须是整型，返回值必须是字符串】
		publi function say(Dog $dog){} 
		【必须传一个Dog类的实例化进来(对象)】

匿名类【注意】结尾有个 分号 ;  不用定义类名
	用法：这个类很简单，只使用一次
	例如：
		$test = new class{
			public function say(){}
		};

命名空间 namespace
	在一个文件下是不可定义两个名字一样的文件的
	在一个页面里 不可以定义两个重名的类
	命名空间相当于文件夹
	【使用namespace 声明命名空间】
	【使用 use 使用命名空间】
	【使用as给命名空间起别名】
	【一个页面的第一个命名空间前面不能有任何代码】
	【\ 跟空间】
	例如：
		namespace hello;
		class Dog
		{
			public function say(){}
		}
		$dog = new \hello\Dog();
	在另一个文件
		include '...php';
		use \hello\Dog as Hdog;  // 使用hellow空间下的Dog类，别名为 Hdog;
		use \world\Dog as Wdog; // Wdog相当于路径，也相当于类名
		$dog = new Hdog(); // 这别名相当于类名，不区分大小写
		$dog->say();

============== day04 三大特性 五大原则 upload  验证码类 和 分页类  ===================
系统常量
	__METHOD__ 		返回命名空间名、类名和方法名
		例如：hello\Person::test;

	__CLASS__ 		获取当前类名（包含空间名）
		例如：hello\Person;

	__NAMESPACE__ 	获取当前命名空间名
		例如：hello

【get_class($this); 获取当前对象类名,$this代表当前对象】

三大特性：封装 继承 多态
五大原则：
	单一职责原则 一个类 的职责应该是单一的，应该只有一个能引起这个类变化的原因
	开放封闭原则 对扩展是开放的 对修改是关闭的
	里氏替换原则 子类应当可以替换父类并能够出现在父类能够出现的任何地方
***	依赖倒置原则 避免上层依赖下层
	接口隔离原则 接口的职责应该是单一的 降低耦合

验证码类
分页类

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

================ day05 创建目录 上传文件类 图像处理类  ===========================
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

================  day06 数据库操作类 连贯操作 数据库字段缓存操作 array_intersect ========================
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

array_intersect($arr1, $arr2); 
	比较两个数组的【值】，并返回交集：值的交集，键为第一个数组的(参数)的键值

array_intersect_key($arr1, $arr2);
	比较两个数组的【键名】，并返回交集：键的交集，值为第一个数组(参数)中的值

================ day07 模板引擎类  ========================
php 内嵌在html页面中服务端的脚本，用来连接数据库，并且按照需求显示应该显示的数据
		
模板引擎：柔和到一块的代码的写法，混编，混编文件的后缀是.php
	将模板语法替换为php语法


缺点
	初级课程里面的缺点：
	1、乱，面向过程的，太乱
	2、每次都会生成缓存，在面向对象的写法中我们加入了有效时间
	3、分页，每一页就是一个缓存，给缓存起名字的时候不一样

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

=================  day08 自动加载 mvc PRS-4规范 单一入口 框架目录结构 命名空间映射 MarkDown   ====================
自动加载
	__autoload
	spl_autoload_register(); 自定义加载

	例如：
		function __myautoload($name)
		{
			include str_replace('\\', '/', $name) . '.php';
		}
		spl_autoload_register('myautoload');
		$feng = new \pp\Person();
		$feng->say();

	命名规范
		类名和文件名相同（大驼峰）
		命名空间名和文件夹名相同（小写）

mvc 
	m：model
		对应的就是我们的数据库操作类
		在你的代码中，每一张表格就是一个类，这个类继承自Model类
		用来读写数据库的
	v：view
		所有的视图文件存放的地方，视图文件就是用来显示数据的
	c：controller
		所有的controller都继承自Tpl类，所以就拥有了assign和display方法
		然后再controller中就是调用模型类获取数据，然后调用自己的assign方法分配数据，然后调用自己的display方法展示模板
	model、view、controller

psr规范
	psr1：基础编程规范
	psr2：编码风格规范
	psr3：日志接口规范
	psr4：自动加载规范

单一入口（简单路由）
	spl_autoload_register
	单一入口就是，访问整个框架，入口文件都是同一个  index.php
	index.php?c=index&a=index
	现在你要去请求哪个控制器下面的哪个方法
	IndexController下面的index方法（这个方法就会获取数据，展示页面）

框架目录架构
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

命名空间映射
	给一个命名空间，将这个命名空间对应的目录结构返回给你
	controller=====》controller的文件夹
	controller=====》application/controller
	model=====>application/model

MarkDown介绍
	程序员的整理文章格式的工具
	在很多的云笔记中都有集成，有道云笔记
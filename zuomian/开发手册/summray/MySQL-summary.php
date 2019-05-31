<?php
==============   day15 数据库 命令  ================
数据库系统的组成部分：数据库服务器、数据库、数据表、数据字段、数据行

数据库分类：关系型数据库（Oracle、MySQL、DB2、SQL Server） 
			非关系型数据库（Redis、MongoDB、CouchDB）

SQL 结构化查询语言（Structured Query Language）
	DDL 	数据定义 Definition(CREATE DROP ALTER)
	DML 	数据操作 manipulation(INSERT UPDATE DELETE)
	DQL 	数据查询 query(SELECT)
	DCL 	数据控制 control(GRANT REVOKE)
	DTL 	数据事务处理 transaction(BEGN COMMIT ROLLBACK)

为什么使用MySQL？ 开源免费 PHP的黄金搭档 性能强劲 良好的生态

退出命令：exit quit \q
消除本次输入操作：\c   ctrl + c

常用命令：
	show databases;							查看当前服务器的所有数据库
	create database 库名;					创建 数据库
	use 库名;								使用 数据库
	show 表名;								显示当前数据库下的所有 数据表
	drop database 库名;						删除 数据库
	create table 表名(id int...);			创建 数据表
	desc 表名;								查看 表 的结构
		show columns from 表名;
	drop table 表名;						删除数据表

	if not exists 	用于创建数据库/表时判断是否不存在，存在也不会报错
		create database if not exists 库/表名

	if exists 		用于删除数据库/表时判断是否存在，不存在也不会报错
		drop database if exists 库/表名

	show create database 库名;				查看建库语句,编码方式
	alter database 库名 character set=utf8 	修改数据库的编码方式
	show create table 表名;					查看建表语句
***	engine = InnoDB default charset = utf8;	设置存储引擎和字符集

数据表的修改：
	alter table 表名 add 字段 类型;						添加字段
	alter table 表名 add 字段 类型 first/after name;	添加字段控制位置
	alter table 表名 modify 字段 类型;					修改字段类型
	alter table 表名 change 老字段 新字段 类型;			修改字段名
	alter table 表名 drop 字段;							删除字段
	alter table 表名 rename 表名;						修改表名

修改mysql提示符【结尾没有分号】
	prompt \u@\h \d>

显示当前服务器版本：		select version();
显示当前日期时间：			select now();
显示当前用户：				select user();
查看数据库中的所有列表：	show tables from 库名;
显示警告信息：				show warnings;

***mysql默认的端口号：	3306
***本地服务器：		127.0.0.1（本地回环地址）
***mysql中的超级用户：	root

utf8 是世界通用编码，gbk 是中国使用的，如果乱用则会导致乱码

***create database if not exists 库名 character set gbk;	创建数据库，包括它的编码方式


============== day16  MySQL 数据类型 字符集 存储引擎 索引操作 DML-数据操作 ========================
***数据类型：数值、字符串、日期时间、[null]
***	数值类型：
			整型：tinyint(用于年龄) int
			浮点型：float、double、decimal(定点 金额)
		说明：
		1、整型后面小阔里的数字不是代表的存储空间大小是用来控制显示位数的
		2、如果说你添加的位数超过了设置的 也不会被截断
		3、基本上我们在设置int的时候都是不加后面小阔号限制
		4、浮点型float(4,2) 代表我们浮点总位数是4小数点后不能超过2 小数点前不能超过4-2
		5、如果浮点型小数点后超过限定会被咔嚓掉

	字符串：
			char(定长、效率高)、varchar(变长、存储大)、blob（二进制存储）、text（文本数据）
			复合型：
					set 	集合类型【不能包含两个相同的元素】
					enum 	枚举类型 sex enum('0', '1', '2') default'1'
	时间日期：
			year、date、time、datetime、timestamp（时间戳）
			【注意:要设默认值】 字段名 timestamp default current_timestamp;

表字段类型约束：
***		unsigned		无符号
***		zerofill		前导 0 
***		auto_increment	自增（常用于 id，一个表只有一个自增）
		default 		默认值
		not null 		非空（null精确说法是“无”，而不是空字符串或0）
***		primary key 	主键（一个表只有一个主键索引）
***		unique 			唯一索引
		index 			常规/普通索引
		【fulltext】 	全文索引（对于需要全局搜索的数据）

常见字符集：
			ASCII 	美国标准信息交换码	单字节
			GBK 	GB 2312 的扩展		双字节
			UTF8 	Unicode万国码，可变长

***查看当前数据库支持的所有字符集：show character set;

工作中使用：
			gbk_chinese_ci	简体中文，不区分大小写
			utf8_general_ci	Unicode(多语言),不区分大小写
存储引擎：MYISAM 【InnoDB】

查看当前数据库支持的所有存储引擎：show engine;

索引操作：
		添加索引：
				创建时添加：
					mysql> create table teacher(
						-> id int primary key,
						-> name char(20) unique
						-> );
					mysql> create table user(
						-> id int,
						-> name char(30),
						-> primary key(id),
						-> index(name)
						->;
				建表后添加：
					alter table 表名 add 索引名(字段名);
					例子：alter table user add unique(id);
		删除索引：
			drop index 索引字段名 on 表名;

			删除主键索引，前提是没有 自增
				alter table 表名 drop primary key;
			去掉自增 auto_increment
				alter table 表名 change 老字段 新字段 类型;

DML 增、删、改
	增(插入) 			insert into 表名(字段名) values(行1...),(行2...);
	删除(必须加条件) 	delete from 表名 where 条件;
	修改(必须加条件)	update 表名 set 字段=值 where 条件;

***面试题（默写）：
	1、char和varchar的区别
		varchar比char存储空间要大
		varcahr是可变长度	char是固定长度
		char的效率要高于varchar
	2、InnoDB和MyISAM区别
		innodb支持事务，行锁
		myisam不支持事务，表锁
		myisam在查询的时候执行速度很块
		innodb在处理大数据的增删改方向很好
		
===============  day17---DQL 数据查询---DCL 数据控制---DTL 事务处理 ==========================
DQL 查询
	select * from user;					查询表中所有
	select 字段 from 表名 where 条件;	指定字段，条件查询

***distinct	去重(重复的数据只会显示一个)	
	案例：select distinct * from user;

where 条件
	关系：> < >= <= !=/<> =

	逻辑：or and  【注意：这里没有短路】

	区间：between and    2<=id<=5
		案例：select * from user where id between 2 and 5;

	集合：not/not in
		案例：select * from user where id in(1,3,5);
		查询id在 1，3，5 中的数据

***	模糊值：like  _代表任意一个字符  %代表任意所有字符
		案例：select * from user where name like '%枫%';
		查询所有名字中带 枫 的

***结果排序：order by 字段名 desc/asc   desc倒序 asc正序
	案例：select * from user where id>1 order by id desc,money asc;
	案例：select * from user order by id desc,money asc;
	id倒序 money正序
	【注意：如果有where，那么后面要有条件，才能够排序。 如果没有where，可以直接排序】

结果集限制：limit (n-1)*10, 10;   n 代表第几页
	案例：select * from user limit 0,5;

常用统计函数：sum count max min avg(平均值)
	案例：select count(id) as count from user;

***结果集分组：group by 字段名 having 条件;【怎么分啊，和结果排序差不多啊，感觉没啥效果啊】？？？？？
	案例：select * from user group by name having id > 3;
	按 name 分组，只显示出 id>3 的数据

起别名：as 
	案例：select name as shaoye from user;
	显示时，为 shaoye

多表联合查询
	内连接：
		隐式内连接：select goods.gid,user.uid from goods,user where goods.gid = user.uid;
		显式内连接：select goods.gid,user.uid from goods join user on goods.gid = user.uid;

	外链接：左连接：左边为主表，右边为副表，主表内容全部显示，副表复合条件空位用 null 填充
		左连接：select * from user left join goods on goods.gid = user.uid;
		右链接：select * from user right join goods on goods.gid = user.uid;

【子(嵌套)查询 select * from user where uid in(select gid from goods);】？？？？？？？？？？

记录联合：union 比 union all 多进行了一次去重，左右联合的字段要对应
	案例：select * from user left join goods on goods.gid = user.uid union select * from user right join goods on goods.gid = user.uid;

多表联合更新：一定要找对关系
	update user,goods set user.name = '邹玉',goods.name = '奔驰' where user.id = goods.gid  and suer.id = 4;

***清空表数据：
	truncate table 表名;				清空表的数据，并且让自增的id从1开始自增
	delete from 表名 where 条件;		清空数据，id从记录的开始自增

***DCL 
	创建用户：create user 'feng'@'localhost' identified by '123';
	删除用户：drop user 'feng'@'localhost';
	授予权限：grant all on 库名.表名(*表示所有的表) to 'feng'@'localhost';
	剥夺权限：revoke all on 库名.表名 from 'feng'@'localhost';

	导出数据库[表]：mysqldump -uroot -p 数据库名 [表名]> C:\123.sql;
	导入数据库：	mysql -uroot -p 库名 > C:\123.sql
	【注意：都要在 非登陆状态下完成，导入时，要有一个空的数据库】

	修改密码：mysql -uroot -p password
	flush privileges 刷新
	【注意：在非登录状态下】 

***DTL
	1.set autocommit = 0; 或 begin 启动事务处理
	2.执行sql
	3.判断是否同意执行
	4.同意执行：commit; 	
	  不同意：rollback;	回滚
	【注意：存储引擎必须是：InnoDB】

==============   day18---天龙八步   ========================
为什么不用mysql？
	在PHP7以前是使用mysql扩展 php7版本已经不支持mysql，用mysqli

第一步：链接数据库
		$link = mysqli_connect('localhost','root','pwd');
		参数：主机名、用户名、密码
		返回值：成功:返回链接对象 失败：false

第二步：判断链接是否成功
		if (!$link) { exit(); }
		mysqli_connect_error($link);
		mysqli_connect_errno($link);
		返回值：成功：0   失败：返回错误号和错误信息

第三步：选择数据库 判断是否成功
		$db = mysqli_select_db($link, 'test');
		if (!$db) { exit(); }
		mysqli_error($link);
		mysqli_errno($link);
		参数：数据库链接对象、数据库名
		返回值：成功：true  失败：false

第四步：设置字符集
		mysqli_set_charset($link, 'utf8');
		参数：数据库链接对象、字符集名字

第五步：准备sql语句
		$sql = "insert into speak(name) values('小子')";
		$sql = "delete from speak where name = '小子'";
		$sql = 'update speak set name = "小" where id = "2"';
		$sql = 'select * from speak';

***第六步：执行sql语句
		$res = mysqli_query($link, $sql);
		参数：数据库链接对象、sql语句
		返回值：// 返回一些详细信息
				查询：	成功：结果集对象  	失败：false
				增删改：成功：true  		失败：false

***第七步：解析结果集
		返回【插入】上一条数据的id 				mysqli_insert_id($link);
			参数：数据库链接对象
		返回数据库受影响的行数 用于【增删改查】 mysqli_affected_rows($link);
			参数：结果集对象
		
		
	每输出一次，就返回一组数据（用while循环全部取出来）
		将结果集解析成索引数组 			mysqli_fetch_row($res); (函数从结果集中取得一行，并作为枚举数组返回)
		将结果集解析成关联数组 			mysqli_fetch_assoc($res);
		将结果集对象解析成关联索引数组 	mysqli_fetch_array($res, MYSQLI_ASSOC/NUM/BOTH);
			参数：结果集对象、解析类型
			返回值：每执行一次函数，就返回一组数据，直到没有数据时就退出
			
		函数返回结果集中行的数量 用于【查】 	mysqli_num_rows($res);
	
	# 用于增、删、改	
	if ($res && mysqli_affected_rows($link)) {
		echo '成功';
	} else {
		echo '失败';
	}
	# 用于查
	if ($res && mysqli_affected_rows($link)) {
		while ($row = mysqli_fetch_array($res, MYSQLI_BOTH)) {
			var_dump($row);
		}
	}
	
***第八步：释放资源、关闭数据库
		mysqli_free_result($res);
		mysqli_close($link);
		参数：数据库链接对象

header跳转
	header('location:index.php');		跳转到index.php
	header('refresh:3, url=index.php');	三秒后跳转到index.php
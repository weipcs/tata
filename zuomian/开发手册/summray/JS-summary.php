<?php

===========  day09 js 注释 运算符 流程控制 Math对象 函数 数组 ==============
JavaScript
	组成：
		ECMA 基本语法
		DOM  document object model
		BOM  browser object model

js 使用
	1.直接使用script标签
		<script>
			alert('js使用');
		</script>
	2.引入
		<script type='text/javascript' src='1.js'></script>
		【注意】是 src		
	3.行内事件
		<button onclick='demo()'>点击事件</button>
	4.a标签中
		<a href='javascript:alert("点击a链接弹出提示")'>a链接</a>

js输出
	alert(); 			弹出
	document.write(); 	在页面展示
	console.log(); 		在控制台展示

js基本语法
	1.变量的声明
		变量的生命要以 var 开始 当然也可以不加 推荐大家var一下
        js中的语句可以不加分号结尾 凡是要以回车结束 推荐加上
        命名规范
            1、字母数字下滑线组成 不能以数字开头 可以使用$ 但是不要用
            2、变量严格区分大小写
            3、不能使用系统关键字		

		var 声明变量 区分大小写 不能使用关键字
		var a = 123;

	2.注释
		// /**/  //* //*/
	
	3.数据类型
		php中 整型 浮点型 字符串 布尔 数组 对象 资源 空
		js中  字符串 数值 布尔 对象 数组 null undefined
			sTest iTest oTest

		字符串
			js中字符串拼接是用的+

        单双引号
            1、都不解析变量
            2、都解析特殊字符
            3、使用时要嵌套使用不能自己套自己

    	自动类型转换
        	'0'     在js中是真	

***			var a = '0' '00' '0.0';  字符串为真，空格也真
			var a = ''; 			 空字符串为假
			var a = 0 00 0.0 ;		 数字为假

	三种数据类型
		对象 未定义 NaN(not a number);
		使用 js 里面的 类
			var a = new Number(100);
		    var a = new String('qwe');
		    var a = new Boolean(true);
		    var a = new Array([1,2,3]);
		    var a = new Number('100a');		
		【注意】两个NaN 永远不相等

	运算符
		算术 + = * / % +=...
		逻辑 && || !
		比较 < > >= <= == === !=
		【注意】只要涉及到字符串就拼接 + 

	将字符串转化成Number函数
		parseInt 
		  	字符串纯整型的时候 就是原字符串
		  	如果字符串开头是数字后面是字符取前面的数字 
		  	如果 开头是字符 就是NaN
		parseFloat 浮点型
		例如：
			var a = 'abc12bd';  // NaN
			var a = '123abc';  // 123
			parseFloat(a);

	流程控制 【注意】js中没有foreach
		else if 中间必须要加空格

	Math对象 提供基本数学函数和常数
		Math.random() 	取 0-1 的随机数
	   	Math.ceil()		进一法取余
	   	Math.floor()	舍去法取余
	   	Math.max()		最大值
	   	Math.min()		最小值
	   	Math.abs()	 	绝对值
	   	Math.pow(2, 3)    	返回底表达式的指定次幂
	   	Math.round() 	四舍五入
	   	Math.sqrt() 	绝对值

	【注意】 . 是js中的 对象成员访问符
			 Math 是js中的固有对象

	Number  代表数值数据类型和提供数值常数的对象。
		Number.MAX_VALUE  // 返回 JScript 能表达的最大的数
		Number.MIN_VALUE  // 返回 JScript 中能够表示的最接近零的数

函数：
	***【注意】
		1.形参中不能加 var
		2.函数名区分大小写
		3.函数可重名 把前面的覆盖掉

	全局变量
	    	全局变量  在函数外部var的变量 都是全局变量 
	    	全局变量  全局都有效 在函数内部也可以使用
	    	
	局部变量    
			在函数内部定义的就是局部变量 只能在函数内部使用

	***可变参数列表
	    	在函数内部可以通过【arguments】这个对象得到参数 使用下标的方式
	    	例如: alert(arguments[1]);

	***闭包: 实现跟静态变量一样的效果
			var add = (function () {
					  	  var a = 0;
					  	  return function () {
					  	  		retrun a+=1;
					  	  }
					  })();
			add();

	***封闭空间
			(function (m){
				alert('封闭空间');
				alert(m);
			})(100);

	匿名函数  var aa = function() {};
	回调函数  (function(){})();
	递归函数
	内部函数

数组
【注】以这两种声明方式声明 不可以声明关联数组
        1、var arr = new Array(1,2,3);
        2、var arr = [1,2,3,4,5];
        可以通过追加的方式 追加关联下标 其实这个下标就是对象的成员属性
        var arr = [1,2];
        arr['aa'] = 123;
        console.log(arr);

定义数组：
	方法一：
		var arr = new Array(1, 2, 3);
		// 这是错误的写法 var arr3 = new Aarray('a'=>1, 2, 3);  
	方法二：
		var arr = [1, 3, 4];

	如果要加关联的，则
		arr['feng'] = '枫'; // 关联数据只能在控制台显示
	获取数组中的值
		arr.feng;  // 通过访问下标,来获取他的值

	获取数组长度 字符串也可以
		arr.length;  // 获取字符长度
		str.length;

***str.substr(0, 3);  		// 返回一个从指定位置开始的指定长度的子字符串。??????????
str.substring(4,6);  	// 返回位于 String 对象中指定位置的子字符串。 ???????????
***str.indexOf(2);   		// 返回 String 对象内第一次出现子字符串的字符位置
str.lastIndexOf();  	// 返回 String 对象中子字符串最后出现的位置。????????
***str.replace('f', '枫');	// 返回根据正则表达式进行文字替换后的字符串的复制。
***str.toLowerCase();  	// 返回一个字符串，该字符串中的字母被转换为小写字母。
***str.toUpperCase();  	// 返回一个字符串，该字符串中的所有字母都被转化为大写字母。
str.toString();  		// 返回对象的字符串表示。[取出全部的字串]
str.valueOf();  		// 返回指定对象的原始值。
a+str.sup();  			// 将 HTML 的 <SUP> 标识放置到 String 对象中的文本两端。 --- 上标
a+str.sub();  			// 将 HTML 的 <SUB> 标识放置到 String 对象中的文本两端。--- 下标
a+str.strike();			// 将 HTML 的<STRIKE> 标识放置到 String 对象中的文本两端。--- 删除线

数组对象常用方法
    push pop shift unshift slice join 

字符串对象常用方法
    substr  indexOf lastIndexOf replace toLowerCase toUpperCase	

typeof(); 获取变量类型
	typeof(a);

\n 换行
单双引号不解析变量
+ 表示拼接

document.write("<table border=1 width=500 height=500 align='center'>");

============= day10 DOM操作 遍历 创建对象弹窗 三种 常见事件 选项卡 变量数组  ==============
遍历数组
	【注】. 和 []  
		. 后面不能跟变量 [] 可以   [] 可以代替.  . 不能代替[]
	1、使用for循环  【只能遍历纯索引数组】
	2、使用 for in  
		for (var i in arr) {
			console.log(arr[i]);
		}
		i  就是 数组的下标 也就是 对象的属性	

***js中三种弹窗
	alert    警告框
	confirm  确认框
		if (confirm('你今天是不是迟到了')) {
			alert('看来你真是迟到了');
		}
	prompt	 输入框 可以给默认值
		var love = prompt('你说你爱不爱我', 'love');

对象创建
	1.直接创建系统对象
		var obj = new Object();
		obj.name = '枫';
		obj.demo = function () {
			alert('方法');
		}
	2.通过json方式 json_encode json_decode url_encode url_encode??????
		var obj = {'name':'枫', 'age':18, say:function () {
				alert('方法');
		}};
***		【注意：属性名也可以不加引号 obj={name:阿花}】
	3.通过自定义函数对象方式
		function Person (name)
		{
			this.name = '枫';
			this.height = function (){
				alert('方法')
			}
		}
		var obj = new Person('xia');

***	【注意】
		json:  就是一种数据格式  经常用于数据传输
		this:  就是代表的当前对象

DOM操作
	1.js的三要素
		先获取 加事件 再操作
	2.根据id获取节点
		document.getElementById();
	3. 事件
		oclick 		点击的时候触发
		ondbclick 	双击的时候触发
		onmouseover 当鼠标移入时触发
		onmouseout 	当鼠标移出时触发
		onmouseup 	当鼠标松开时触发
		onmousedown 当鼠标按下时触发
		onfocus 	当元素获得到焦点时触发
		onblur 		当元素失去焦点时触发
		onload 		当文档加载完毕时触发
	4.传递this
		可以把this传递到时间函数中去
		<div onclick='test(this)'></div>
		<divid='div' onclick="this.style.backgroundColor='red';"></div>
	5.获取对象属性
		获取class类名 alert(oDiv.className);
		在css中有很多的属性都是类似于 background-color 的形式  在js中要变成 backgroundColor  的形式
	6. for in 既可以遍历数组 也可以遍历对象
	7、获取标签内容  既可以读 也可以写
		使用 innerHTML  或者  InnerText
			innerHTML 能够获取到标签内的所有内容
			innerText 获取的时标签内的纯文本内容
		写的方式：
			oDiv.innerHTML = '好听啥啊';
			oDiv.innerText = '还行吧';
	8、window.onload (非常非常重要)
		当当文档加载完毕的时候触发  基本上每次写js代码都会用
		window.onload = function () {
			var oDiv = document.getElementById('div');
			oDiv.onclick = function()
			{
				oDiv.style.backgroundColor = 'red';
			}
		}
	9、其他的获取元素的方法
		document.getElementById();			根据 id 获取元素
		document.getElementsByClassName();   根据 class 获取元素他有兼容性问题 不兼容 ie8-
		document.getElementsByTagName();	根据标签名字 获取元素
		document.getElementsByName();		根据 name值 获取元素
	10、选项卡 （很重要）	
	
============ 第11天 js获取节点 选项卡 获取非行内样式 定时器 计数器 秒表 倒计时 快速滑动 图片飘 弹弹弹==================
一、声明变量 带 var 与 不带var的区别
	不带 var 生命变量 始终都是全局的
	推荐 带 var
二、js获取节点
		document.getElementById();			必须是document对象调用
		document.getElementsByName();		必须是document对象调用
		document.getElementsByClassName();   document和父级对象都可以
		document.getElementsByTagName();	document和父级对象都可以
三、封闭空间实现选项卡
	滑动门
四、获取非行内样式
	getComputedStyle
	currentStyle
		//这个是高级浏览器用的 不是那些垃圾用的 比如 ie8-
		alert(getComputedStyle(oDiv, null).width);
		//如果某些 2 就喜欢用ie8-怎么办呢 用下面的办法 这个不兼容 高级浏览器
		alert(oDiv.currentStyle.width);
		//兼容性写法
		alert(getStyle(oDiv, 'width'));
		function getStyle(obj, name)
		{
			return obj.currentStyle ? obj.currentStyle[name] : getComputedStyle(obj, null)[name];
		}
五、定时器
		周期性定时器 var timer = setInterval(方法, 时间)   时间单位是ms 毫秒  1s= 1000ms
		销毁周期性定时器 clearInterval(定时器对象);
		一次性定时器 var timer = setTimeout(方法, 时间)
		销毁一次性定时器 clearTimeout(定时器对象);
		这两个方法都会返回一个定时器对象 经常我们用timer
六、一些效果
	计数器
	汤唯消失
	闪动
	秒表
		补零函数  bulingbuling
			function buling (n)
			{
				return n < 10 ? ('0' + n) : ('' + n)
			}
	倒计时
		Date对象 里边有很多方法 没事时候用一用
			【注】 month值 是从0-11  对应着 1-12 月
	快速滑动
	图片飘飘飘 弹弹弹

=========== day12 DOM操作 吸顶条 全(反)选 兼容性问题 获取节点 添加和删除节点 设置和获取自定义属性 弹出图片  标记位思想===================
一、全选 和 全部选 还有 反选
二、处理getElementsByClassName 兼容性问题
三、获取节点
	children		//根据父亲找到所有儿子
	parentNode		//根据儿子找父亲

	//主浏览器
	firstElementChild		//长子
	lastElementChild		//老幺
	previousElementSibling  //哥哥 前一个
	nextElementSibling		//弟弟 后一个

	//垃圾浏览器
	firsrChild
	lastChild
	previousSibling
	nextSibling
四、添加和删除节点
	createElement		//创建节点 只能是document
		例如：创建一个img标签,
			oImg = document.createElement('img');

	removeChild			//删除节点  可以是父级
	appendChild			//追加节点  可以是父级
	insertBefore		//插入节点  插入到某个节点之前
五、setAttribute  和 getAttribute
	setAttribute(属性, 值)	设置自定属性
	getAttribute(属性)	获取自定义属性值
六、弹出图片
七、
	onscroll          滚动事件

	offsetTop			当前元素距离窗口顶部的距离
	offsetLeft			当前元素距离窗口左边的距离
	offsetWidth			当前元素宽度
	offsetHeight		当前元素宽度
	scrollTop			【document.body.scrollTop】卷起高度

	h5声明下 就用这个
	document.documentElement.clientWidth
	document.documentElement.clientHeight
	
	document.body.clientwidth
	document.body.clientHeight

	标记位思想
	
=========== day13 事件绑定 冒泡 鼠标 事件源对象 拖拽 键盘 小游戏自定义菜单 window对象 js正则 ===================
一、事件绑定
	addEventListener(ev, func, false);	主流浏览器 ev是不带 on的
		//第一个参数是事件名 注意 不加on
		//第二个参数 执行的函数 
		//第三个 false 取消时间冒泡
	attachEvent(ev, func);				垃圾浏览器 ev是带on的

	取消绑定
		removeEventListener(ev, func);		主流浏览器 
		detachEvent(ev, func);				垃圾浏览器
二、事件冒泡
	当触发子级对象的事件时 会连带触发父级对象 相同的事件 称为事件冒泡
	1、事件对象
		主流浏览器：
			oWai.onclick = function (ev) {
				alert(ev);
			};
			当你触发这个点击事件时  这个ev就是 你当前的事件对象
		垃圾浏览器：
			oWai.onclick = function () {
				alert(window.event);
			};
			当你触发这个点击事件时  这个event就是 你当前的事件对象
	2、取消事件冒泡
		可以通过事件对象取消
			oNei.onclick = function (ev)
			{
				//alert(window.event);
				alert('上山打老虎');
				var oEvent = ev || window.event;
				oEvent.cancelBubble = true;
			};
三、鼠标
	获取鼠标的坐标
		document.onmousemove = function (ev) {
			var oEvent = ev || window.event;
			console.log(oEvent.clientX, oEvent.clientY);
		};
四、事件源对象
	可以通过事件源对象 来找到 原对象
		//谷歌 和 垃圾
		oEvent.srcElement.style.backgroundColor = 'yellow';
		//火狐 专用
		oEvent.target.style.backgroundColor = 'yellow';
五、拖拽
六、键盘事件
	事件 onkeydown  当按下键盘时触发
	oEvent.keyCode  获得键盘的对应的值
	禁用 ctrl + c  复制
		document.onkeydown = function () {
			if (event.ctrlKey && window.event.keyCode == 67) {
				return false;
			}
		};
七、小游戏
	作业：完善小游戏 按照你自己的想法
八、杂项
	禁止鼠标右键  默写  自定义鼠标右键菜单
		document.oncontextmenu = function () {
			return false;
		};

	这种写法可以禁止跳转
	1、
		<a href="http://www.baidu.com" onclick='return demo()'>去百度</a>
		function demo()
		{
			return false;
		}
	2、
		var aa = document.getElementById('aa');
			aa.onclick = function (ev) {
			var oEvent = ev || window.event;
			//火狐不支持
			//oEvent.returnValue = false;
			//主流浏览器
			oEvent.preventDefault();
		};
	打印
		<button onclick='window.print();'>打印</button>
九、window对象
	window.open
	window.history 		(back,go)
	window.close
	window.location
十、js正则
	g  全局匹配  如果你不带g,在正则过程中，字符串是从左至右匹配的，如果匹配成功就不再继续向右匹配了，如果你带g,它会重头到尾的把正确匹配的字符串挑选出来
	match
	replace
	
预告
	表单验证
	下拉框
	瀑布流
	懒加载
	运动
默写  
自定义鼠标右键菜单

======== day14 表单验证 下拉框 自动播放选项卡 懒加载 瀑布流 运动 =========
一、表单验证
    通过form name值获得form对象
        document.fm
    通过 form 直接获取form对象集合
        document.forms[0]
    from提交方法
        document.fm.submit();
    获取input name=username 的值
        document.fm.username.value
二、下拉框
    onchange 事件  当下拉框选项之 改变的时候触发
    selectedIndex   选中选项的下标
    oSel.options    oSel对象下的option对象集合

    oSel.onchange = function () {
        //alert('改了');
        //alert(oSel.selectedIndex);
        console.log(oSel.options[oSel.selectedIndex].value);
    };
自动播放选项卡

懒加载 
    when img offsetTop < screen top + scrollTop jiu zhi xing lan jia zai
瀑布流
    //获取整个文档高度
    var contentHeight = document.documentElement.scrollHeight
运动

==========  day15 ajax ==========
一、ajax 他是啥 能干啥

    AJAX即“Asynchronous Javascript And XML”（异步JavaScript和XML），是指一种创建交互式网页应用的网页开发技术。
    AJAX = 异步 JavaScript和XML（标准通用标记语言的子集）。
    AJAX 是一种用于创建快速动态网页的技术。
    //加粗
    AJAX 是一种在无需重新加载整个网页的情况下，能够更新部分网页的技术。[1] 

    通过在后台与服务器进行少量数据交换，AJAX 可以使网页实现异步更新。这意味着可以在不重新加载整个网页的情况下，对网页的某部分进行更新。
    //这个就是说的你的 博客 和你的 论坛
    传统的网页（不使用 AJAX）如果需要更新内容，必须重载整个网页页面。
二、ajax使用
       var xhr =  new XMLHttpRequest(); //主流浏览器
       get方式
       		 xhr.open('get', '02-ajax.php?username=goudan&password=123456');
       		 xhr.send();
       post方式
       		 xhr.open('post', '02-ajax.php');
			     只要是post请求 必须要有他
			     xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			     xhr.send('age=18&height=180');
       readyState   查看ajax当前状态
       xhr.readyState
       	可能的值  
       		0:	请求未初始化  (在调用open之前)
       		1:	请求已经提出未调用 (在send之前)
       		2:	请求以发送
       		3:	请求正在处理 也就是 交互呢
       		4:	请求已经返回
       	xhr.responseText
       		接受后端返回的数据
       	xhr.responseXML
       		接受后端返回的数据
       		现在基本不用了  微信
       	xhr.onreadystatechange
       		当readyState 的值改变的时候就会触发这个事件
       	xhr.status
       		http状态码
       		200		请求成功
       		301		重定向
       		401		当前请求需要验证
       		403		没有权限访问
       		404		页面未找到
       		500		服务器错误  通常都是代码错了
       		501		服务器不支持当前的某个功能
       		502		网关错误
       	将后端返回的json字符串 转化成 对象 (很重要)
    			var obj = JSON.parse(xhr.responseText);
    			var obj = eval('(' + xhr.responseText + ')');
		    将对象转化成字符串
			     var str = JSON.stringify(obj);
        同步和异步
            同步：false  当我们发送一个请求之后 需要等待我们请求处理完毕 才往下执行
            异步：true   当我们发送一个请求之后 不需要等待我们请求处理完毕 直接往下执行
        ajax封装函数
            传入一个对象
        跨域
            跨域就是跨域名
            解决办法
                1、header('Access-Control-Allow-Origin:*');
                2、明天再说

============= day17 jQuery jsonp jq动画 ajax 显示隐藏 下拉框相互移动 轮播图 选项卡 =================
一、jsonp
1.5、load  加载页面
二、jq动画
    hide        
    show
    fadeIn
    fadeOut
    slideDown
    slideUp
    slideToggle
    animate     自定义动画
        if (!$('div').is(':animated')) {
                $('div').animate({left:500}, 5000, function () {
                    $('div').animate({top:500}, 3000);
                });
        }
    暂停动画
        $('button:eq(1)').click(function () {
            $('div').stop();
        });
三、jq ajax
    $.ajax();
        $.ajax({
            type:'get',
            url:'http://www.wokao.com/1.php',
            data:{msg:'slowly'},
            success:success,
            async:true
        });
    $.get();
        $.get('1.php', {name:123}, success);
    $.post();
        $.post('1.php', {name:123}, success);

    jquery和js的转换
        //jq 对象 和js 对象 是不相等的
        alert($('div'));
        //jq 对象换成js对象
        $('div')[0].style.color = 'red';
        var oDiv = document.getElementById('div');
        alert(oDiv);
        //js对象 换成jq对象oDiv
        $(oDiv).css('color', '#c90');
四、样式
    attr        设置或者获取 属性值
    addClass    添加类名 为每个匹配的元素添加指定的类名。
    remomveClass
    toggleClass     切换类名 如果存在（不存在）就删除（添加）一个类。
    val             获取input的value值
    text
    html
    css
    width
    height
    end
    siblings

    // 执行上下文所匹配的所有元素
    $('div').each(function () {
        $(this).css('backgroundColor', 'red');
    });

    显示隐藏
    下拉框相互移动
    轮播图
    选项卡
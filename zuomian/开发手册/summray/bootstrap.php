========== day18 bootstrap 媒体查询 响应式布局  ============
一、他是啥
    他是一个UI框架 twitter前端团队开发 

    框架  
        UI 框架       布局页面 美观 快速
            bootstrap   amazeUI (妹子UI) weUI flatUI
        脚本框架       dom操作 或者js操作
            jquery  angular.js vue.js  ext.js
二、响应式布局
    是为了满足一个网页在不同的终端设备下或者讲在不同分辨率下 都能够完美的显示出来
    优点：
        1、完美适配不同屏幕，提高用户体验
        2、针对不同的设备 只需要一套模板
    缺点：
        1、编写复杂
        2、不适合大型复杂网站 比如淘宝 京东  大型复杂网站用header技术 header技术就是 说白了就是写了多个网站 多个样式 根据用户访问时的设备 确定要跳转到那里去
   
    1、媒体查询（css3） 不兼容ie8-
        当屏幕宽度小于768px的时候将body背景色设置成黄色
        方法一：
                @media screen and (max-width:768px) {
                    body {
                        background-color: yellow;
                    }
                }
                手机 768px pad 992px pc 1200px  tv
                2k      1920 * 1080
                viewport解决设备分辨率和像素比例问题
                    <meta name="viewport" content="width=device-width ,initial-scale=1">
        方法二：
                <link rel="stylesheet" type="text/css" media="screen and (max-width:768px)" href="phone.css">
                <link rel="stylesheet" type="text/css" media="screen and (min-width:768px) and (max-width:992px)" href="pad.css">
                <link rel="stylesheet" type="text/css" media="screen and (min-width:992px) and (max-width:1200px)" href="pc.css">
                <link rel="stylesheet" type="text/css" media="screen and (min-width:1200px)" href="tv.css">
    尺寸单位
        px
        em  根据父级html字体大小
        rem  根据html的大小
三、bootstrap
    栅(shan)格系统
    把页面宽度平均分成 12份
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

    // 要先 添加 container类
    例如：
        <div class='container' style="height: 300px; background-color: red;">
            <div class='row' >
                <div class="col-md-7 col-xs-10 col-sm-4 col-lg-9" style="height:200px; background-color: blue;"></div>
                <div class="col-md-9 col-xs-2 col-sm-8 col-lg-3" style="height:200px; background-color: yellow;"></div>
            </div>
        </div>


作业：
    用bootstrap写登录界面

微信开发
    1、基于公众号的开发
    2、小程序
    3、微网站
    4、接口（调用微信的接口，我们给小程序和网站提供接口）

明天设计模式容器 依赖注入 composer 反射 PDO 微信  git tp5

==========  day19 设计模式 反射 依赖注入 容器 DI+Container ==================
一、设计模式
    设计模式（Design Pattern）是一套被反复使用、多数人知晓的、经过分类的、代码设计经验的总结。
    使用设计模式的目的：为了代码可重用性、让代码更容易被他人理解、保证代码可靠性。 设计模式使代码编写真正工程化；设计模式是软件工程的基石脉络，如同大厦的结构一样。
    通俗上讲 就是前人在写了很多的代码之后 总结出来的一些经验和技巧， 在某些特定的场景下 我们可以使用
    【注】设计模式就是一种思想  请各位小爷不要过于纠结
1、单例模式
    一个类 始终只被实例化出一个对象
    在PHP中经常被用在 数据库实例化  其实呢 我们一般也只用在这里
        1、构造方法私有化
        2、保存类实例为静态的成员属性
        3、实例化是调用静态的成员方法
2、工厂模式
3、适配器模式
    为了调用的时候简单直接  用统一的方法去掉用  具体的处理细节不用管
4、策略模式
    就是在做一件事请的时候有不同的策略
5、门面设计模式
    代码中的门面模式  其实很简单 就是对一系列列复杂的操作进行简单的封装 给用户提供一个调用的接口就行了
6、观察者模式
    有两种角色
        观察者
            观察会根据被观察者的一些动作做出响应
        被观察者
            可以确定观察者是谁
            删除观察者
            通知观察者
    当确定观察关系的两个类  被观察类做出一些事情时  就会通知观察类 观察类迅速作出响应

反射
    是PHP中内置的类
    可以帮助我们获取到一个类的所有信息
    反射类
        reflectionClass
    实例化反射类
        $ref = new ReflectionClass('Person');
        $ref->name;  获取到类名
        $ref->getDocComment();  注释
        $method = $ref->getMethods();  类中的所有方法
        $ref->getMethod('say'); 方法say对应的类
        $ref->getInterfaces(); 获取接口的类名
    反射方法类
        reflectionMethod

        //反射方法类
        $refMethod = new ReflectionMethod(new Person(), 'say');
        var_dump($refMethod->getParameters()); // 获取Person类中的say方法中的参数
        
依赖注入
    Dependency Injection（DI）  他也叫控制反转Inversion of Control（IOC） 也叫 反转控制
    其实就是传参
容器
    容器就是存东西 取东西 可以吧我们的匿名函数 放进去 到时候拿出来用

DI+Container


//给依赖注入用的容器
class Container
{   
    static public $thing = [];

    //closure 规定 穿进去的是一个匿名函数
    static public function bind($name, closure $method)
    {
        if (!isset(self::$thing[$name])) {
            self::$thing[$name] = $method;
        }
    }

    static public function make($name)
    {
        if (isset(self::$thing[$name])) {
            $func = self::$thing[$name];
            //这个地方要return
            return $func();
        }
    }
}

class Son
{
    public function cry(Father $obj)
    {
        echo "哇哇哇哇哇哇哇哇哇哇哇。。。。";
        $obj->bao();
    }
}

class Father
{
    public function bao()
    {
        echo "粑粑来报一下，别哭了，别哭了，再苦我就揍你了，上去就一嘴巴子";
    }
}

Container::bind('father', function () {
    return new Father();
});
//var_dump(Container::make('father'));die;
$xiaohai = new Son();
$xiaohai->cry(Container::make('father'));

============  day21 composer 镜像（Mirroring）gitHub RESTful =============
一、composer
    首先它不是PHP代码
    是一个管理PHP包的工具，或者说叫做管理PHP包依赖的工具（软件）
    包：一个类 或者一组完成特定功能类  vendor目录下每一个都是包
    运行 Composer 需要 PHP 5.3.2+ 以上版本
    简单理解
        composer  就tmd的时一个迅雷 （不要出去说，就算说了也不说是我说的）
    镜像：镜像（Mirroring）是冗余的一种类型，一个磁盘上的数据在另一个磁盘上存在一个完全相同的副本即为镜像。

二、使用
    我们就是修改配置文件 告诉他们我们需要什么包 他就给我们下载
    如果我们移植别人的项目的时候可以直接把 别人的配置文件拿来  运行命令 帮我们下载

    牛逼在哪
    1、实现了自动加载 psr-0 psr-4
    2、下载所需要的依赖包
    3、下载别人的项目

    我们国内 网络比较安全 所以说 在访问composer  比较慢 需要爬墙 所以说为了方便我们可以使用 国内镜像

    安装完成之后 修改为国内镜像
        composer config -g repo.packagist composer https://packagist.phpcomposer.com

    三个网站：
        https://pkg.phpcomposer.com/        中国镜像网
        GitHub                              全球最大的项目托管网站
        https://packagist.org/              安装包列表

    composer.json
        配置文件 
    composer.lock
        当更新后 就会生成这个文件 下次在执行 composer install  就会先读取 composer.lock 如果说要更新 请使用 composer update
    声明依赖
        写在require规则里
            "require": {
                "monolog/monolog": "^1.23",
                "curl/curl": "*",
                "voku/simple-mysqli": "5.*"
            },
    自动加载（重要）
        可以使用composer里面的自动加载 来加载我们的文件
    写在 autoload的规则里
        "autoload": {
        
        }
    基于psr-4规则
        "psr-4": {
            "controller\\": "app/controller",
            "controller\\": "app/aaa"
        }
    自定义
        classmap    指定到目录
             "classmap" : ["app/aaa"]
        files       精确到文件
            "files": ["app/bbb/Liu.php"]

    常用命令
        composer install        根据配置文件加载包
        composer update         根据配置文件更新包
        composer init           初始化一个composer.json文件
        composer dump-autoload  更新自动加载
        composer create-project 创建一个项目
        composer self-update    自我更新
------------------------------------------------------------------------------
接口  interface
    就是别人发送请求给我们 我们返回信息

    客户端（浏览器，能发起http请求的任何玩意 curl ajax、桌面上的软件）

    服务端（接口） 返回跟客户端商量好的数据

    1、定义好客户端与服务器发送数据和接受数据的格式 （json、xml）
    2、确定服务器返回信息的地址
    3、需要一些认证，验证一下客户端是不是我信任的客户端 （appid appsecret）
    4、token就是客户端第一次请求数据的时候 我们给他生成token，token有个有效期，在有效期之内客户端都可以用这个token来请求数据， 如果过期了 就重发起认证

RESTful   流行的一种接口风格 不是一个标准
    一种软件架构风格，设计风格而不是标准，只是提供了一组设计原则和约束条件。它主要用于客户端和服务器交互类的软件。基于这个风格设计的软件可以更简洁，更有层次，更易于实现缓存等机制。
    
    rest    表现层状态转化 或者 表述型状态传递
            他就是一种架构约束条件 准则

    只需要知道 restful定义了什么就行

        http://www.91porn.com/xiaodianying.map4  post   增加一条数据


        post            增加 创建

        get             获取 查

        put             修改

        delete          删除

    $_SERVER['REQUEST_METHOD'];
    判断请求方式是什么
	
=========  day22 微信开发 curl =============
在我们跟移动端打交道时 用post接收数据 接受不到 时 就可以尝试使用下面的
file_get_contents('php://ipout');
$GLOBALS["HTTP_RAW_POST_DATA"];
作业：子菜单  网页版授权  （这是赚钱的东西）

http://blog.jobbole.com/79326/

=========== day23 git ================
在我们跟移动端打交道时 用post接收数据 接受不到 时 就可以尝试使用下面的
file_get_contents('php://ipout');
$GLOBALS["HTTP_RAW_POST_DATA"];
作业：子菜单  网页版授权  （这是赚钱的东西）

一、GIT
    誕生：
        林納斯.托瓦茲 （ 脫襪子 脫娃子）
        Linux Git
        91年的時候 linux 出生了  後來有很多的志願者加入到linux的開發當中來 慢慢的linux越來越龐大  他自己手動合併的時候 菲常德不方便
        集中式版本控制
            SVN
            CVS

        BitKeeper  商业的分布式版本控制系统
        这家公司 处于人道主义精神  免费给脱娃子使用
        安德鲁  Samba  他手欠  想要去破解BitKeeper 协议

        被发现之后 就不给用了  不给用也没事 这个脱娃子呢 很牛逼 

        一周时间 自己写了一个  Git 2005  

        2008 GitHub 网站上线  他免费提供git存储  PHP ruby

        常用的Git托管网站
            GitHub  Coding  码云
        分布式和集中式区别

        操作区
        暂存区
        版本库
二、Git基本使用
    git init            初始化Git仓库  初始化之后会生成.git
    git status          查看当前状态
    git add .           将当前文件 提交到暂存区
            .   代表当前目录下所有文件
            filename    文件名
    git commit -m '描述' 将暂存区的文件 提交到版本库
                            git  commit之前 必须进行 git add
    git log             查看 所有的commit 历史
    git reset --hard commitId      回退到某一个commit版本
    git reflog          查看命令历史 可以看到 git log  有可能看不到的版本  回到未来

    分支操作
        git branch          创建分支
        git branch dev      创建一个叫做dev的分支
        git checkout dev    切换到 dev分支
        git merge dev       合并dev分支到当前分支
        git diff            查看冲突
        git checkout -b dev 创建并切换到dev分支


三、项目文档
    processOn  在线画图
    xmind       思维导图
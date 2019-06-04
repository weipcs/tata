# 版本入门控制-搬进Github

> 讲师：happy peter
>
> github链接：github.com/happypeter
>
> 网站开发者，喜欢 Ruby 语言，使用 Rails 框架，全栈型程序（EverythingProgrammer）。



## 第一章

### 1-1 课程介绍

```
https://www.imooc.com/video/7623
git：global information tracker 全局信息跟踪器
```

* git命令

  ![1-1-01-git命令](static\images\1-1-01-git命令.png)

![1-1-02](static\images\1-1-02.png)



## 第二章 浏览器中使用 Github

###2-1 浏览器中使用 Github 

```
https://www.imooc.com/video/7624

github浏览器地址：github.com
github命令：https://github.com/CruxF/Blog/issues/1

1. 创建一个新仓库：【New repository】 或 【点击头像下拉框 -> New repositorires】
2. 点击右边的【New】
3. 第一：填写仓库名；第二：填写仓库的描述；第三：选择是公共（默认）的还是私有的；第四：是否初始化仓库（单选按钮Initialize...）;第五：确定创建仓库

```

* 1. 创建一个新仓库：【New repository】 或 【点击头像下拉框 -> New repositorires】

![2-1-01创建一个仓库](static\images\2-1-01创建一个仓库.png)

* 点击右边的【New】

![2-1-02创建一个仓库](D:\wwwroot\my-resources\my-study\git\static\images\2-1-02创建一个仓库.png)

* 3. 第一：填写仓库名；第二：填写仓库的描述；第三：选择是公共（默认）的还是私有的；第四：是否初始化仓库（单选按钮Initialize...）;第五：确定创建仓库

![2-1-03创建一个仓库](static\images\2-1-03创建一个仓库.png)



## 第三章  github客户端的使用

### 3-1 github客户端的使用

```shell
mac端：mac.github.com
windows端：windows.github.com  或 https://windows.github.com/
注：下载安装报错，在IE下安装：https://github-windows.s3.amazonaws.com/GitHub.application

安装时报错：
1. https://www.zhihu.com/question/21623581/answer/67127382
2. https://www.zhihu.com/question/23110947

Changges菜单中：
为被修改的文件，可以勾选被修改的文件是否被做到下一个版本中，同时会显示修改内容，
默认选定文件后修改都会做到版本中，点击修改的序号，取消选中则不会做到新版本中
注意：【蓝色】代表选中要提交的内容，如果说暂时不提交的话 就不选中变成 【淡蓝色】
changes 修改过的文件
Summary(required) 提交(commit)的备注
Description 备注详情
Commit to master  提交
History菜单中：
history 历史提交过的记录
在history中，选中版本，右键->【revert this commit】，还原上一一个版本

Edit菜单中：
Undo 还原上次提交（修改）的记录（撤销）只适合没有同步到GitHub的版本(本地)

其他：
1，提交但是没有同步到Github时撤销的方法:undo。
2，提交之后撤销的方法： revert this commit。  // 撤销此次的同步
3，回滚到某一版本的方法：roll back to this commit。 // 全部撤销，删去版本

add为添加本地的项目
create是创建一个新项目
clone为把repository的项目下载到本地

推荐《Git Pro 2nd Edition》、《Version Control with Git, 2nd Edition》
```

## 第四章：简单分支操作

### 4-1 简单分支操作

```
删除分支- 本地和远端同时删除：delete； 
只删除github上的： unpublish
```

## 第五章合并分支

### 5-1合并分支（上）

```

```

### 5-2合并分支（下）

```
分支合并 
两种方式  merge  rebase
1.点击同步操作可以更新远端代码到本地
2.发生冲突时会出现冲突标识符，上面head 是本地冲突，下面是远端冲突。修改代码后提交版本即可解决冲突。
```

## 第六章团队协作流程

### 6-1团队协作流程（上）

```
添加团队成员： 项目主页右侧 setting-》collaborators:collaborators拥有和项目拥有者一样的权限，即写权限

github flow：
第一步：创建一个新分支
第二步：在新分支上创建新版本
第三步：开启一个pull request
第四步：讨论和代码审核
第五步：合并分支，然后部署
```

### 6-2团队协作流程（下）

```
compare & pull request:意思是请求项目的维护者和协作者对我的代码进行比较讨论,是否合适拉我这个分支上的代码到master分支上.
注：在进行pull request之前一定要保证所有的任务都同步到了Github之上
```

## 第七章开源项目贡献流程

### 7-1开源项目贡献流程

```
无写权限开源项目的贡献流程：
1.将项目fork过来，(创建/拷贝（fork）一个分支到自己的GitHub仓库)
2.clone到本地仓库，修改信息，
3.sysc与远端仓库进行同步，(上传/同步到自己的GitHub仓库)
4.发起讨论请求(在github页面进行pull request提交到开发者哪里，进行协商等待开发者合并。完成后可以将项目删除
或者Quick Pull Requests,在原文件的网页页面点击编辑，然后系统会自动为你创建一个fork,)

注：1. fork之后克隆到本地，再上传，原拥有者的仓库不受影响。
	2. 拥有者在Graphs->network中可以看到有哪些人 fork/修改 了项目
	3. Setting->Danger Zone->Delete this reposltory;删除仓库；
```

## 第八章github issues

### 8-18-1 github issues

```
【卡片--一般是发布任务的地方并指派给谁】
https://gitbeijing.com/

Github 三大套件
1、Issues 讨论。问题提交 .....（事物卡片,先有讨论）-》 assignees部署任务
	(1) Issues:创建事务卡片（new issue)
	(2) assignees部署任务
	(3) @队友，用户。可以一起讨论；
	
	fix #2 表示自动关闭事物为2卡片
	---- 信息交流------------
	@给其他人
	selecting them 上传图片
	引用格式 >对方内容（快捷键R），然后写自己的回复（快速回复： 选择内容，快捷键R）
	-----------------------
2、Wiki 手册 说明 ....
3、GitPages  项目网站 ....

注意：在commit时，备注最后加上卡片的标识，这样就知道当前是在完成哪个功能，例如：卡片2 【git commit -m 'description add file #2'】
commit changes + #issues编号：自动回复issues
commit changes + fix #issues编号：自动回复并且关闭issues

在git上提交的时候，在提交内容后面加上“fix #2”类似的代码，则提交后，对应的issue就会被关闭
在评论中引用其他的issue，可直接用“#+号码”的方式来进行。
点击评论中的时间，会在浏览器地址栏中直接显示指向该评论的链接，在评论中粘贴这个链接可直接引用该issue的该评论

request和issue的区别？
一个pull request和issue几乎没有什么区别，区别就是pull request是由代码引发的讨论，而issue是先有讨论。
```

## 第九章 github pages 搭建网站

###9-1 github pages 搭建网站 

```
https://pages.github.com/
https://gitbeijing.com/pages.html

1.创建分支 gh-pages(必须是这个名字)
2.在这个分支下创建网页(index.html)
3. 访问项目页面：用户名.github.io/项目名，例如：liupcs.github.io/ci_tpl

如果不想用默认的 gh-pages 分支来搭建网站，则可以使用下面的方法：
去github仓库的settings下的GitHub Pages下的source下将None设置为master branch，然后Save
ok
```

## 第十章 github秘密机关

### 10-1github秘密机关

```
介绍github一些隐藏的技巧：zachholman.com/talk/git-github-secrets/
1. 按 T  搜索文件
2. 打开某个大牛的主页，点击【Follow】来和他们进行学习
可以通过点击View profile and more->Explore来查看一些比较火的project。

Github不得不follow的牛人：
css-tricks作者——Chris Coyier
Ruby on Rails——David Heinemeier Hansson
Github co-founder——Scott Chacon
Github co-founder——Tom Preston-Werner
Github——Zach Holman

GitHub客户端只能满足一些常见的需求，要更高级必须要学着用Git命令行。 《Pro Git》
github虽不开源，无法部署到自己服务器。
但，gitLab开源
```





## 链接

```
peter老师的github链接：github.com/happypeter
博客地址：https://logan70.github.io/
源码：https://github.com/logan70/logan70.github.io
在github上创建项目：https://www.cnblogs.com/foreveryt/p/4077380.html
码云代码托管平台：https://gitee.com/
代码合并：Merge、Rebase的选择：https://blog.csdn.net/fybon/article/details/52460516
RESTful API 设计指南：http://www.ruanyifeng.com/blog/2014/05/restful_api.html
版本管理工具Git入门：https://logan70.github.io/2017/09/23/learn-git/
github介绍（背景，创建项目）：https://guides.github.com/activities/hello-world/
github pages 搭建网站：https://pages.github.com/
peter老师的 github pages说明：https://gitbeijing.com/pages.html
github视频教程：https://www.bilibili.com/video/av3341837/
jquery：https://github.com/jquery/jquery
linus操作之父（Linus Torvalds）：github.com/torvalds
css(Chris Copier)：github.com/chriscoyier
dhh(David Heinemeier Hansson):github.com/dhh
node js：github.com/joyent/note
angular js：github.com/angulr/angular
rails 编程框架：github.com/rails/rails
github 大牛（Scott Chacon）：github.com/schacon
gihub github创始人（Tom Preston-Werner）：github.com/mojombo
github演讲：zachholman.com/talks
命令行，服务器上：https://gitee.com/progit/
在自己的服务器上搭建自己的github.com这样的服务：about.gitlab.com
```


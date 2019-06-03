

```
1，Sublime Text     http://www.sublimetext.com/
2，Vim              http://www.vim.org/
3，ATOM		    https://atom.io/
4，textmate         http://macromates.com/
5，Package Control  https://packagecontrol.io/
6，PhpStorm         https://www.jetbrains.com/phpstorm/
```





基于：packagecomtol.io  的包管理功能



启用vim（启用vim模式,mark "Vintage"）

```
进入 preferences -> settings 中
修改右侧这个文件
----------------------
修改前：
"ignored_packages":
[
	"Vintage"
],
	
修改后:
"ignored_packages":
[
    // "Vintage" // 注释后，表示启用vintage这个包
],
-------------------------
```

```
preferences->settings->"save_on_focus_lost": false, 复制一份放到user里，改成true，只要丢失文件焦点就会自动保存。一旦设置了自动保存，就不会弹出关闭文件提示框啦

ctrl+鼠标左键  多个光标

Ctrl + 光标 多点编辑
Ctrl + p 快速打开文件
Ctrl+f=查找当前文件内容
Ctrl+h=替换当前文件内容
Ctrl + Shift + p 打开命令行面板，输入模糊命令名，即可出现相关命令并执行

https://github.com/happypeter/sublime-config
老师的sublime配置

http://blog.csdn.net/u014465934/article/details/72810763

sublime的安装，使用和常用插件，看完之后应该是基础入门了。其余就是边用边搜索学习了。
```

## 2-1安装sublime

```
http://www.sublimetext.com/3
http://docs.sublimetext.info/en/latest/index.html
```



```
sublime插件安装

1.打开Package Control官网，复制安装代码

https://packagecontrol.io/installation

2.在sublime中CTRL+`（Show Console），并粘贴官网代码进行安装

3.CTRL+SHIFT+P中输入Package Control：Install Package打开

4.在输入框中Emmet.sublime-package进行安装

sublime中的代码补齐功能

例如：HTML文件中

输入p，然后CTRL+E或者TAB键都会自动补全代码，如：<p></p>
```

```
怎么安装插件package control？
command + ` ,然后粘贴下面代码到控制台：

import urllib.request,os,hashlib; h = '2915d1851351e5ee549c20394736b442' + '8bc59f460fa1548d1514676163dafc88'; pf = 'Package Control.sublime-package'; ipp = sublime.installed_packages_path(); urllib.request.install_opener( urllib.request.build_opener( urllib.request.ProxyHandler()) ); by = urllib.request.urlopen( 'http://packagecontrol.io/' + pf.replace(' ', '%20')).read(); dh = hashlib.sha256(by).hexdigest(); print('Error validating download (got %s instead of %s), please try manual install' % (dh, h)) if dh != h else open(os.path.join( ipp, pf), 'wb' ).write(by)
```

```
“http://pan.baidu.com/s/1nv6Lzsd” Sublime整合包（内含安装包+激活码）。

Sublime Text 3激活码:http://www.jianshu.com/p/656b0c24141e
使用教程：打开Sublime菜单 > help > enter License > 复制第一个代码

"http://pan.baidu.com/s/1mhMgp1A" Sublime Text 3 国外官方Free正版版

# 下载完 sublime-config 后，需要
rename sublime-config User
mv sublime-config USer


```

## 3-1正确的sublime使用方法

```
ctrl++ 字体放大

ctrl--   字体缩小
shift+ctrl+p 打开控制面板<br>
Ctrl+z=撤销<br>
Ctrl+s=保存<br>
Ctrl+n=新建文件<br>
Ctrl+/=注释，解开注释<br>
Ctrl+k+b=显示隐藏左侧面板<br>
Ctrl+鼠标滚轮=放大缩小文字<br>
html:5+TAB=自动生成html5代码<br>
keybindings-default 定义了所有的快捷键
Ctrl + J	合并当前和下一行
Ctrl + L	选择当前行
Ctrl + Shift + Enter	在光标上开辟新的一行
Ctrl + Enter	在光标下开辟新的一行
Shift + 右键滑动	多块选中（esc退出）
Shift + 左键点击	选中某段区域
Ctrl + Shift + 上(下)键	选中区域上(下)移,默认选中的是光标这行

缩进调整：
Ctrl + Shift + P再输入 reindent lines（可自行绑定快捷键，比如Shift + tab）


设置快捷键：
ctrl+shift+p 命令面板 --->  输入Key Bindings - Default  --->  打开keys bindings-default 里面包含所有的快捷键。
（输入keymap binding 查看所有的快捷键）

{"keys":["ctrl+shift+n"], "cmmand":"new_window"}, // 打开一个新的窗口
```

```
怎么安装插件啊
1，先安装包管理插件：打开control menu，（view>show control）把下面的代码考进去，回车运行

import urllib.request,os,hashlib; h = 'df21e130d211cfc94d9b0905775a7c0f' + '1e3d39e33b79698005270310898eea76'; pf = 'Package Control.sublime-package'; ipp = sublime.installed_packages_path(); urllib.request.install_opener( urllib.request.build_opener( urllib.request.ProxyHandler()) ); by = urllib.request.urlopen( 'http://packagecontrol.io/' + pf.replace(' ', '%20')).read(); dh = hashlib.sha256(by).hexdigest(); print('Error validating download (got %s instead of %s), please try manual install' % (dh, h)) if dh != h else open(os.path.join( ipp, pf), 'wb' ).write(by)

2，快捷键（shift+ctrl+p）打开包管理命令窗口：输入install package，回车执行，然后将会打开一个插件列表窗口，输入并查询你想要安装的插件，找到后点击或者回车安装即可。
```

## 4-1

```
ctrl+shift+upswap // 当前行置换上一行（向上移动）line up
ctrl+shift+downswap line down
ctrl+left //单词间跳转
alt+left // 光标指向行首行尾
ctrl+D  //选中当前光标所在单词
ctrl+z/y 撤销/反撤销
ctrl+c/v 复制粘贴大法好
alt+. html中的tag快速闭合补全
ctrl+p GotoAnything
ctrl+f 传统的查找
ctrl+d 神技能 快速选中单词/选中下方相同单词并且形成多行游标
ctrl+enter 快速下启一行
ctrl+shift+enter 快速上起一行
ctrl+shift+p packagecontrol 命令行

ctrl+n ：打开新页面；

ctrl+tab ：文件之间跳转；

ctrl+j ：合并行，光标在第一行，才能保证两行合并；

ctrl+} ：向右缩进；

ctrl+{ ：向左缩进；

ctrl+l ：选择当前行；

CTRL+J  合并两行
CTRL+回车   光标在中间时开辟新行；SHIFT+CTRL+回车
操作粒度： 移动一个字符
alt+ 移动一个单词
ctrl+alt+ 移动到头位置
alt+shift+ 选择

Com+shift+enter 从代码里开辟上一行，代码不折行
Com+shift+p & reindent lines 批量缩进
ctrl +w 关闭文件


Ctrl+P：搜索项目中的文件
Ctrl+G：跳转到第几行
Ctrl+W：关闭当前打开文件
Ctrl+Shift+W：关闭所有打开文件
```

```
sublime text3怎样应用微软雅黑字体
打开 Sublime Text ，执行【首选项】→【设置--用户】，如果是英文版的用户执行【Preferences】→【Setings-User】；

接下来，Sublime Text 会打开【Preferences.sublime-settings】，我们只需要在“｛｝”里的“font_size”下输入“  "font_face":"微软雅黑",   ”然后执行Ctrl+S 保存，这时字体就变为了“微软雅黑”了！当然，这个字体可以根据需要自己更改；
```

## 5-1 sublime-自定制

```
安装插件SideBarEnhancements,之后可以在侧边栏文件名上点击右键,Open in Browser >> 菜单中可以选择浏览器.


sublime text 3怎么能实现浏览器预览呢？
Tools>build system>new build system
{
  "cmd": ["/Applications/Google Chrome.app/Contents/MacOS/Google Chrome", "$file"],
  "selector": ["text.html"]
}
保存为browse.sublime-build，然后写一个html。mac上用command+b,windows上用win+b??


浏览器访问：ctrl+B


```





## 其他

```
http://www.sublimetext.com/docs/3/projects.html
```


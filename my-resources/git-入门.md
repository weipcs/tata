# GIT 入门
```shell
git version // 查看git版本
```

###1-2GIT安装
```
Git安装
Git官网：https://git-scm.com/ 
Git下载：https://git-scm.com/download/win

安装好后在git bash里配置用户信息
配置个人信息
git config --global user.name='test'
git config --global user.email='test@qq.com'
git config --list里查看用户名邮箱是否配置成功
注：global表示本地所有的仓库都会使用这个配置，当然你也可以针对某个仓库来配置个人信息


图形界面（sourceTre）：跳过注册 https://www.cnblogs.com/lucio110/p/8192792.html
```

###2-1 创建仓库
```
git init  初始化版本库
git add	添加文件到版本库
git commit
git status 查看仓库状态

mkdir 创建目录
cat  // 查看文件内容
【pwd】查看当前文件路径
【l1】展示所有文件时间、详细信息
【ls】显示指定工作目录下之内容
【-a】展示隐藏/非隐藏文件
【echo '添加数据 追加到 test.txt' >> test.txt】输入 追加
【cat test.txt】展示当前文件内容


sourcetree安装跳过注册 大家可以参考这个 https://www.kancloud.cn/git-managment/git/449534 
Win版sourcetree跳过注册方法：https://www.cnblogs.com/lucio110/p/8192792.html
```

###2-2工作流
```
打开项目目：点击项目 -> 右击 -> 打开资源管理目录

暂存区：
丢弃（暂存区和修改之后的本地开发文件），返回到上一个版本的数据
暂存区 -> 选中文件 -> 右单击 -> 丢弃（把提交到暂存区的文件丢弃掉）

本地仓库：重置当前分支到此次提交
选中已经commit 的文件，右击 -> 重置当前分支到此次提交 （还原到这个版本）

如果有一个commit的代码无用，就可以丢弃掉

git reset HEAD test.txt # 将add后的文件，在返回都工作区
git checkout -- test.txt # 将工作区的清理一下（变干净）
git reset --hard commit_id # 返回到指定的 commit_id

git rm test.txt # 将本地文件清空
git commit -m '清空本地问津'
```

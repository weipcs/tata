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
https://www.imooc.com/article/20411

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

一、git操作
1、git status // git状态
2、git add bash_demo.txt  // 提交到暂存区
3、git commit -m "bash first commit"  // 提交到本地仓库
4、git add bash_demo.txt
5、git checkout -- bash_demo.txt // 暂存区丢弃（本地工作区文件回滚至上一次状态）（直接把文件修改的内容删除了（相当于没有更改））（会将暂存区的文件覆盖掉本地的文件）（使工作区变干净）（清空工作区。）（在工作区做的修改全部撤销）
删除  git rm 文件名  在 提交
git rm 文件名   #清空本地文件
git reset --hard commit id

清空之后，需要继续执行git commit -m ""  进行提交才能使仓库干净

回滚命令
git reset HEAD [文件名]    暂存区未commit 回滚至上次状态（将暂存区的文件移除掉，不会覆盖掉本地文件）（相当于暂存区丢弃更改(回滚)。）
git reset --hard  [版本号] （将本次修改的文件，覆盖掉本地的文件，注：--hard 要小写）（表示仓库和暂存区都回滚到指定版本）
git log  查看log


git diff readme.txt  # 查看修改了哪些内容
git log --pretty=oneline  # 日志简版（只显示commit_id/提交的仓库/备注）
git reflog # 日志简版，commit_id只显示7位
git reset  --hard HEAD^ # 回退到上一个版本
git reset  --hard HEAD^^ # 回退到上上个版本
git reset  --hard HEAD~100 # 回退到前一百次
ssh-keygen  -t rsa –C "youremail@example.com"  # id_rsa是私钥，不能泄露出去，id_rsa.pub是公钥，可以放心地告诉任何人。
git remote add origin https://github.com/tugenhua0707/testgit.git  # 将本地仓库于远程仓库关联起来
git push -u origin master # 把本地仓库分支master内容推送到远程仓库去
由于远程库是空的，我们第一次推送master分支时，加上了 –u参数，Git不但会把本地的master分支内容推送的远程新的master分支，还会把本地的master分支和远程的master分支关联起来
git push # 把当前所在分支推送到远程
git branch dev # 创建dev分支
git branch # 查看分支
git checkout dev # 切换到dev分支
git merge dev # 将dev分支内容合并到当前分支

查看分支：git branch

创建分支：git branch name

切换分支：git checkout name

创建+切换分支：git checkout –b name

合并某分支到当前分支：git merge name

删除分支：git branch –d name

git merge –no-ff  -m “注释” dev  # 合并dev分支， -no-ff 表示禁用 fast forward??


比如我这个分支bug要2天完成，但是我issue-404 bug需要5个小时内完成。怎么办呢？还好，Git还提供了一个stash功能，可以把当前工作现场 ”隐藏起来”，等以后恢复现场后继续工作。

1. 隐藏工作现场
    git stash # 将当前的工作现场隐藏起来（将修改的文件隐藏起来，恢复到未修改时的状态，保证工作区干净）
2. 首先我们要确定在那个分支上修复bug，比如我现在是在主分支master上来修复的，现在我要在master分支上创建一个临时分支
    git checkout -b issue-404 # 在master分支上创建 issue-404分支
3. 在 issue-404 分支里面修改文件 -> 添加到暂存区 -> 提交到本地仓库
    git add .
    git commit -m '修改文件'
4. 修复完成后，切换到master分支上，并完成合并，最后删除issue-404分支
    git checkout master
    git merge --no-ff -m '将issue-404分支中修改的内容合并到master分支' issue-404
    git branch -d issue-404 # 删除issue-404分支

5. 上面已经将bug修复，并已发布（合并到master分支）
    下面我们可以继续上次没有开发完的需求了！

6. 首先切换到上次没有开发完的分支
    git checkout dev

7. 工作区是干净的，那么我们工作现场去哪里呢？我们可以使用命令 git stash list来查看下
    工作现场还在，Git把stash内容存在某个地方了，但是需要恢复一下，可以使用如下2个方法：
    1.git stash apply恢复，恢复后，stash内容并不删除，你需要使用命令git stash drop来删除。
    2.另一种方式是使用git stash pop,恢复的同时把stash内容也删除了。




git stash list # 查看隐藏的工作现场
Git把stash内容存在某个地方了，但是需要恢复一下，可以使用如下2个方法：

1.git stash apply恢复，恢复后，stash内容并不删除，你需要使用命令git stash drop来删除。
2.另一种方式是使用git stash pop,恢复的同时把stash内容也删除了。





现在我们的小伙伴要在dev分支上做开发，就必须把远程的origin的dev分支到本

git checkout  –b dev origin/dev # 创建远程的origin的dev分支到本地来
git push origin dev



git pull也失败了，原因是没有指定本地dev分支与远程origin/dev分支的链接，根据提示，设置dev和origin/dev的链接：
git branch --set-upstream dev origin/dev
git pull





远程库的默认名称是origin。
要查看远程库的信息 使用 git remote
要查看远程库的详细信息 使用 git remote –v # fetch抓取  push推送

```

### 3-1 远程仓库
```

```
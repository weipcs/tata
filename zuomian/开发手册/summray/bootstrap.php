========== day18 bootstrap ý���ѯ ��Ӧʽ����  ============
һ������ɶ
    ����һ��UI��� twitterǰ���Ŷӿ��� 

    ���  
        UI ���       ����ҳ�� ���� ����
            bootstrap   amazeUI (����UI) weUI flatUI
        �ű����       dom���� ����js����
            jquery  angular.js vue.js  ext.js
������Ӧʽ����
    ��Ϊ������һ����ҳ�ڲ�ͬ���ն��豸�»��߽��ڲ�ͬ�ֱ����� ���ܹ���������ʾ����
    �ŵ㣺
        1���������䲻ͬ��Ļ������û�����
        2����Բ�ͬ���豸 ֻ��Ҫһ��ģ��
    ȱ�㣺
        1����д����
        2�����ʺϴ��͸�����վ �����Ա� ����  ���͸�����վ��header���� header�������� ˵���˾���д�˶����վ �����ʽ �����û�����ʱ���豸 ȷ��Ҫ��ת������ȥ
   
    1��ý���ѯ��css3�� ������ie8-
        ����Ļ���С��768px��ʱ��body����ɫ���óɻ�ɫ
        ����һ��
                @media screen and (max-width:768px) {
                    body {
                        background-color: yellow;
                    }
                }
                �ֻ� 768px pad 992px pc 1200px  tv
                2k      1920 * 1080
                viewport����豸�ֱ��ʺ����ر�������
                    <meta name="viewport" content="width=device-width ,initial-scale=1">
        ��������
                <link rel="stylesheet" type="text/css" media="screen and (max-width:768px)" href="phone.css">
                <link rel="stylesheet" type="text/css" media="screen and (min-width:768px) and (max-width:992px)" href="pad.css">
                <link rel="stylesheet" type="text/css" media="screen and (min-width:992px) and (max-width:1200px)" href="pc.css">
                <link rel="stylesheet" type="text/css" media="screen and (min-width:1200px)" href="tv.css">
    �ߴ絥λ
        px
        em  ���ݸ���html�����С
        rem  ����html�Ĵ�С
����bootstrap
    դ(shan)��ϵͳ
    ��ҳ����ƽ���ֳ� 12��
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

    // Ҫ�� ��� container��
    ���磺
        <div class='container' style="height: 300px; background-color: red;">
            <div class='row' >
                <div class="col-md-7 col-xs-10 col-sm-4 col-lg-9" style="height:200px; background-color: blue;"></div>
                <div class="col-md-9 col-xs-2 col-sm-8 col-lg-3" style="height:200px; background-color: yellow;"></div>
            </div>
        </div>


��ҵ��
    ��bootstrapд��¼����

΢�ſ���
    1�����ڹ��ںŵĿ���
    2��С����
    3��΢��վ
    4���ӿڣ�����΢�ŵĽӿڣ����Ǹ�С�������վ�ṩ�ӿڣ�

�������ģʽ���� ����ע�� composer ���� PDO ΢��  git tp5

==========  day19 ���ģʽ ���� ����ע�� ���� DI+Container ==================
һ�����ģʽ
    ���ģʽ��Design Pattern����һ�ױ�����ʹ�á�������֪���ġ���������ġ�������ƾ�����ܽᡣ
    ʹ�����ģʽ��Ŀ�ģ�Ϊ�˴���������ԡ��ô�������ױ�������⡢��֤����ɿ��ԡ� ���ģʽʹ�����д�������̻������ģʽ��������̵Ļ�ʯ���磬��ͬ���õĽṹһ����
    ͨ���Ͻ� ����ǰ����д�˺ܶ�Ĵ���֮�� �ܽ������һЩ����ͼ��ɣ� ��ĳЩ�ض��ĳ����� ���ǿ���ʹ��
    ��ע�����ģʽ����һ��˼��  ���λСү��Ҫ���ھ���
1������ģʽ
    һ���� ʼ��ֻ��ʵ������һ������
    ��PHP�о��������� ���ݿ�ʵ����  ��ʵ�� ����һ��Ҳֻ��������
        1�����췽��˽�л�
        2��������ʵ��Ϊ��̬�ĳ�Ա����
        3��ʵ�����ǵ��þ�̬�ĳ�Ա����
2������ģʽ
3��������ģʽ
    Ϊ�˵��õ�ʱ���ֱ��  ��ͳһ�ķ���ȥ����  ����Ĵ���ϸ�ڲ��ù�
4������ģʽ
    ��������һ�������ʱ���в�ͬ�Ĳ���
5���������ģʽ
    �����е�����ģʽ  ��ʵ�ܼ� ���Ƕ�һϵ���и��ӵĲ������м򵥵ķ�װ ���û��ṩһ�����õĽӿھ�����
6���۲���ģʽ
    �����ֽ�ɫ
        �۲���
            �۲����ݱ��۲��ߵ�һЩ����������Ӧ
        ���۲���
            ����ȷ���۲�����˭
            ɾ���۲���
            ֪ͨ�۲���
    ��ȷ���۲��ϵ��������  ���۲�������һЩ����ʱ  �ͻ�֪ͨ�۲��� �۲���Ѹ��������Ӧ

����
    ��PHP�����õ���
    ���԰������ǻ�ȡ��һ�����������Ϣ
    ������
        reflectionClass
    ʵ����������
        $ref = new ReflectionClass('Person');
        $ref->name;  ��ȡ������
        $ref->getDocComment();  ע��
        $method = $ref->getMethods();  ���е����з���
        $ref->getMethod('say'); ����say��Ӧ����
        $ref->getInterfaces(); ��ȡ�ӿڵ�����
    ���䷽����
        reflectionMethod

        //���䷽����
        $refMethod = new ReflectionMethod(new Person(), 'say');
        var_dump($refMethod->getParameters()); // ��ȡPerson���е�say�����еĲ���
        
����ע��
    Dependency Injection��DI��  ��Ҳ�п��Ʒ�תInversion of Control��IOC�� Ҳ�� ��ת����
    ��ʵ���Ǵ���
����
    �������Ǵ涫�� ȡ���� ���԰����ǵ��������� �Ž�ȥ ��ʱ���ó�����

DI+Container


//������ע���õ�����
class Container
{   
    static public $thing = [];

    //closure �涨 ����ȥ����һ����������
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
            //����ط�Ҫreturn
            return $func();
        }
    }
}

class Son
{
    public function cry(Father $obj)
    {
        echo "���������������������ۡ�������";
        $obj->bao();
    }
}

class Father
{
    public function bao()
    {
        echo "��������һ�£�����ˣ�����ˣ��ٿ��Ҿ������ˣ���ȥ��һ�����";
    }
}

Container::bind('father', function () {
    return new Father();
});
//var_dump(Container::make('father'));die;
$xiaohai = new Son();
$xiaohai->cry(Container::make('father'));

============  day21 composer ����Mirroring��gitHub RESTful =============
һ��composer
    ����������PHP����
    ��һ������PHP���Ĺ��ߣ�����˵��������PHP�������Ĺ��ߣ������
    ����һ���� ����һ������ض�������  vendorĿ¼��ÿһ�����ǰ�
    ���� Composer ��Ҫ PHP 5.3.2+ ���ϰ汾
    �����
        composer  ��tmd��ʱһ��Ѹ�� ����Ҫ��ȥ˵������˵��Ҳ��˵����˵�ģ�
    ���񣺾���Mirroring���������һ�����ͣ�һ�������ϵ���������һ�������ϴ���һ����ȫ��ͬ�ĸ�����Ϊ����

����ʹ��
    ���Ǿ����޸������ļ� ��������������Ҫʲô�� ���͸���������
    ���������ֲ���˵���Ŀ��ʱ�����ֱ�Ӱ� ���˵������ļ�����  �������� ����������

    ţ������
    1��ʵ�����Զ����� psr-0 psr-4
    2����������Ҫ��������
    3�����ر��˵���Ŀ

    ���ǹ��� ����Ƚϰ�ȫ ����˵ �ڷ���composer  �Ƚ��� ��Ҫ��ǽ ����˵Ϊ�˷������ǿ���ʹ�� ���ھ���

    ��װ���֮�� �޸�Ϊ���ھ���
        composer config -g repo.packagist composer https://packagist.phpcomposer.com

    ������վ��
        https://pkg.phpcomposer.com/        �й�������
        GitHub                              ȫ��������Ŀ�й���վ
        https://packagist.org/              ��װ���б�

    composer.json
        �����ļ� 
    composer.lock
        �����º� �ͻ���������ļ� �´���ִ�� composer install  �ͻ��ȶ�ȡ composer.lock ���˵Ҫ���� ��ʹ�� composer update
    ��������
        д��require������
            "require": {
                "monolog/monolog": "^1.23",
                "curl/curl": "*",
                "voku/simple-mysqli": "5.*"
            },
    �Զ����أ���Ҫ��
        ����ʹ��composer������Զ����� ���������ǵ��ļ�
    д�� autoload�Ĺ�����
        "autoload": {
        
        }
    ����psr-4����
        "psr-4": {
            "controller\\": "app/controller",
            "controller\\": "app/aaa"
        }
    �Զ���
        classmap    ָ����Ŀ¼
             "classmap" : ["app/aaa"]
        files       ��ȷ���ļ�
            "files": ["app/bbb/Liu.php"]

    ��������
        composer install        ���������ļ����ذ�
        composer update         ���������ļ����°�
        composer init           ��ʼ��һ��composer.json�ļ�
        composer dump-autoload  �����Զ�����
        composer create-project ����һ����Ŀ
        composer self-update    ���Ҹ���
------------------------------------------------------------------------------
�ӿ�  interface
    ���Ǳ��˷������������ ���Ƿ�����Ϣ

    �ͻ��ˣ���������ܷ���http������κ����� curl ajax�������ϵ������

    ����ˣ��ӿڣ� ���ظ��ͻ��������õ�����

    1������ÿͻ�����������������ݺͽ������ݵĸ�ʽ ��json��xml��
    2��ȷ��������������Ϣ�ĵ�ַ
    3����ҪһЩ��֤����֤һ�¿ͻ����ǲ��������εĿͻ��� ��appid appsecret��
    4��token���ǿͻ��˵�һ���������ݵ�ʱ�� ���Ǹ�������token��token�и���Ч�ڣ�����Ч��֮�ڿͻ��˶����������token���������ݣ� ��������� ���ط�����֤

RESTful   ���е�һ�ֽӿڷ�� ����һ����׼
    һ������ܹ������Ʒ������Ǳ�׼��ֻ���ṩ��һ�����ԭ���Լ������������Ҫ���ڿͻ��˺ͷ�����������������������������Ƶ�������Ը���࣬���в�Σ�������ʵ�ֻ���Ȼ��ơ�
    
    rest    ���ֲ�״̬ת�� ���� ������״̬����
            ������һ�ּܹ�Լ������ ׼��

    ֻ��Ҫ֪�� restful������ʲô����

        http://www.91porn.com/xiaodianying.map4  post   ����һ������


        post            ���� ����

        get             ��ȡ ��

        put             �޸�

        delete          ɾ��

    $_SERVER['REQUEST_METHOD'];
    �ж�����ʽ��ʲô
	
=========  day22 ΢�ſ��� curl =============
�����Ǹ��ƶ��˴򽻵�ʱ ��post�������� ���ܲ��� ʱ �Ϳ��Գ���ʹ�������
file_get_contents('php://ipout');
$GLOBALS["HTTP_RAW_POST_DATA"];
��ҵ���Ӳ˵�  ��ҳ����Ȩ  ������׬Ǯ�Ķ�����

http://blog.jobbole.com/79326/

=========== day23 git ================
�����Ǹ��ƶ��˴򽻵�ʱ ��post�������� ���ܲ��� ʱ �Ϳ��Գ���ʹ�������
file_get_contents('php://ipout');
$GLOBALS["HTTP_RAW_POST_DATA"];
��ҵ���Ӳ˵�  ��ҳ����Ȩ  ������׬Ǯ�Ķ�����

һ��GIT
    �Q����
        �ּ{˹.����Ɲ �� Ó�m�� Ó���ӣ�
        Linux Git
        91��ĕr�� linux ������  ����кܶ��־��߼��뵽linux���_�l���Ё� ������linuxԽ��Խ����  ���Լ��քӺρ�ĕr�� �Ƴ��²�����
        ����ʽ�汾����
            SVN
            CVS

        BitKeeper  ��ҵ�ķֲ�ʽ�汾����ϵͳ
        ��ҹ�˾ �����˵����徫��  ��Ѹ�������ʹ��
        ����³  Samba  ����Ƿ  ��Ҫȥ�ƽ�BitKeeper Э��

        ������֮�� �Ͳ�������  ������Ҳû�� ����������� ��ţ�� 

        һ��ʱ�� �Լ�д��һ��  Git 2005  

        2008 GitHub ��վ����  ������ṩgit�洢  PHP ruby

        ���õ�Git�й���վ
            GitHub  Coding  ����
        �ֲ�ʽ�ͼ���ʽ����

        ������
        �ݴ���
        �汾��
����Git����ʹ��
    git init            ��ʼ��Git�ֿ�  ��ʼ��֮�������.git
    git status          �鿴��ǰ״̬
    git add .           ����ǰ�ļ� �ύ���ݴ���
            .   ����ǰĿ¼�������ļ�
            filename    �ļ���
    git commit -m '����' ���ݴ������ļ� �ύ���汾��
                            git  commit֮ǰ ������� git add
    git log             �鿴 ���е�commit ��ʷ
    git reset --hard commitId      ���˵�ĳһ��commit�汾
    git reflog          �鿴������ʷ ���Կ��� git log  �п��ܿ������İ汾  �ص�δ��

    ��֧����
        git branch          ������֧
        git branch dev      ����һ������dev�ķ�֧
        git checkout dev    �л��� dev��֧
        git merge dev       �ϲ�dev��֧����ǰ��֧
        git diff            �鿴��ͻ
        git checkout -b dev �������л���dev��֧


������Ŀ�ĵ�
    processOn  ���߻�ͼ
    xmind       ˼ά��ͼ
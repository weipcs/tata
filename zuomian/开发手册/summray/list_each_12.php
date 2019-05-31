<?php
# list each while

# list 只针对于索引数组
$arr1 = [1, 2, 3, 4];
list($a, $b, $c, $d) = $arr1;

echo "$a<br />$b <br />$c<br />";

# each 
$arr2 = ['a'=>1, 'b'=>2, 'c'=>3];

# 只要出现一次 each($arr2) 它就会运行一次
var_dump(each($arr2));

# each 它只传 一个键和一个值，所以list只有两个参数
// 第一次运行，取第一个的 键和值
list($key, $val) = each($arr2);
echo "$key => $val<br />";

//第二次运行，取第二个的 键和值
list($key, $val) = each($arr2);
echo "$key => $val<br />";

# list each while
$arr3 = ['f'=>2, 'e'=>1, 'n'=>'子', 'g'=>'枫'];
echo "list each while<br />";
while (list($key, $val) = each($arr3)) {
	echo "$key => $val <br />";
}
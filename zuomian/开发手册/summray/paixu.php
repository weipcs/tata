<?php
//面试时候用
$arr = [1,32,23,24,42,3,44,123];
//冒泡排序 就是讲相邻的值 进行比较 如果左边大于右边 就调换位置
/*function maopao($arr)
{
	$lenth = count($arr);
	//冒泡的轮数
	for ($i=1; $i<$lenth; $i++) {
		//比较的次数
		for ($k=0; $k<$lenth-$i; $k++) {
			if ($arr[$k] > $arr[$k+1]) {
				$tmp = $arr[$k+1];
				$arr[$k+1] = $arr[$k];
				$arr[$k] = $tmp;
			}
		}
	}
	return $arr;
}

var_dump(maopao($arr));*/
//快速排序就是  我定一个标量 是数组中任意一个值 用数组中的值跟这个标量去比较 小的 放在小数祖里 大的放在大数组里 递归调用
function kuaisu($arr)
{
	if (!isset($arr[1])) {
		return $arr;
	}
	$biao = $arr[0];
	$left = [];
	$right = [];
	foreach ($arr as $value) {
		if ($value > $biao) {
			$right[] = $value;
		}
		if ($value < $biao) {
			$left[] = $value;
		}
	}
	$left = kuaisu($left);
	$left[] = $biao;
	$right = kuaisu($right);

	return array_merge($left, $right);

}
var_dump(kuaisu($arr));
//选择排序
//插入排序
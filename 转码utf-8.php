(function(){
      $('.del-supplier').click(function(){
        if ( ! confirm('确认要删除该商品供应商？')) return false;
        var id = $(this).attr('data-id');
        var api_url = '<?php echo site_url("Goods_action/json_api") ?>';
        var param = {fun:'del_supplier_action',id:id};
        FORM.ajax_fun(param,api_url);
      })
    })();
	
	
	
	
	
/**
     * 转换字符串编码 为 utf-8
     */
    private function change_char_code($string)
    {
        if(empty($string))
        {
            return $string;
        }
        $newString = iconv('gb2312', 'utf-8', $string);
        if(false === $newString)
        {
            $newString = iconv('BIG5', 'utf-8', $string);
            if(false === $newString)
            {
                $newString = iconv('GBK', 'utf-8', $string);
                if(false === $newString)
                {
                    $newString = iconv('GB18030', 'utf-8', $string);
                }
            }           
        }
        if(false === $newString)
        {
            echo $this->curFile."\n";
            echo $string."\n";
            exit;
            return $string;
        }
        else{
            return $newString;
        }
    }

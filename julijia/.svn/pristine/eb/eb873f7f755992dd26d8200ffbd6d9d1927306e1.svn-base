<?php

/**
 * 杂项小工具集合
 * @author Carey
 *
 */
class ToolsUtils {
	
	
	/**
	 * 获取手机归属地
	 * @param string $mobile
	 * @param string $type  ==  txt|xml|json
	 */
	public static  function location_mobile( $mobile, $type = 'txt' )
	{
	if( false == $mobile )
		return;
	
	if( !preg_match("/^13[0-9]{1}[0-9]{8}$|15[0123896]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}|^14[0-9]{1}[0-9]{8}$/", $mobile) )
		return;
	
	
	$arrErrMsg = array(
		'该数据为空',
		'不是合法的手机号码！',
	);
	
	$url = 'http://www.096.me/api.php?phone='.trim( $mobile ).'&mode='.$type;
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	$data = curl_exec($ch);
	curl_close($ch);
	$arrData = explode( '||', $data );
	$phoneMsg = iconv( "GB2312//IGNORE","UTF-8" , $arrData[1] );
	
	if( in_array( trim( $phoneMsg ) , $arrErrMsg ) || false == $phoneMsg  )
	{
		return '未识别';
	}
	else
	{
		$hasSplit = strstr( ',' , $phoneMsg );
		if( $hasSplit > 0 )
		{
			$arrPhones = explode( ',', $phoneMsg );
			if( count( $arrData ) >= 1 )
				$info = $arrPhones[0];
		}
		else
		{
			$info = mb_substr( $phoneMsg , 0 , 4 , 'UTF-8' );
		}
		return $info;
	}
	}
	
	/**
	 * 数字转化成对应的汉字
	 * @param unknown $num
	 * @param string $mode
	 * @return string
	 */
	
	public function num2ch($num) //整体读取转换
	{
		$num_real = $this->del0($num);//去掉前面的“0”
		$numlen = strlen($num_real);
	
		if($numlen >= 9)//如果满九位，读取“亿”位
		{
			$y=substr($num_real, -9, 1);
			//echo $y;
			$wsbq = substr($num_real, -8, 4);
			$gsbq = substr($num_real, -4);
			$a = $this->num_r($this->del0($gsbq));
			$b = $this->num_r($this->del0($wsbq))."万";
			$c = $this->num_r($this->del0($y))."亿";
		}
		elseif($numlen <= 8 && $numlen >= 5) //如果大于等于“万”
		{
			$wsbq = substr($num_real, 0, $numlen-4);
			$gsbq = substr($num_real, -4);
			$a = $this->num_r($this->del0($gsbq));
			$b = $this->num_r($this->del0($wsbq))."万";
			$c="";
		}
		elseif($numlen <= 4) //如果小于等于“千”
		{
			$gsbq = substr( $num_real, -$numlen);
			$a = $this->num_r($this->del0($gsbq));
			$b="";
			$c="";
		}
		$ch_num = $c.$b.$a;
	
		return $ch_num ;
	}
	
	public function del0($num) //去掉数字段前面的0
	{
		return "".intval($num);
	}
	
	public function n2c($x) //单个数字变汉字
	{
		$arr_n = array("零","一","二","三","四","五","六","七","八","九","十");
		return $arr_n[$x];
	}
	
	
	public function num_r($abcd) //读取数值（4位）
	{
		$arr= array();
		$str = ""; //读取后的汉字数值
		$flag = 0; //该位是否为零
		$flag_end = 1; //是否以“零”结尾
		$size_r = strlen($abcd);
		for($i=0; $i<$size_r; $i++)
		{
			$arr[$i] = $abcd{$i};
		}
		$arrlen = count($arr);
		for($j=0; $j<$arrlen; $j++)
		{
			$ch = $this->n2c($arr[$arrlen-1-$j]); //从后向前转汉字
			
			if($ch == "零" && $flag == 0)
			{ //如果是第一个零
				$flag = 1; //该位为零
				$str = $ch.$str; //加入汉字数值字符串
				continue;
			}
			elseif($ch == "零")
			{ //如果不是第一个零了
				continue;
			}
			$flag = 0; //该位不是零
			switch($j)
			{
				case 0: $str = $ch; $flag_end = 0; break; //第一位（末尾），没有以“零”结尾
				case 1: $str = $ch."十".$str; break; //第二位
				case 2: $str = $ch."百".$str; break; //第三位
				case 3: $str = $ch."千".$str; break; //第四位
			}
		}
		if($flag_end == 1) //如果以“零”结尾
		{
			mb_internal_encoding("UTF-8");
			$str = mb_substr($str, 0, mb_strlen($str)-1); //把“零”去掉
		}
		return $str;
	}


    public static function isMobileDevice()
    {
        // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
        if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        {
            return true;
        }
        // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
        if (isset ($_SERVER['HTTP_VIA']))
        {
            // 找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
        }
        // 脑残法，判断手机发送的客户端标志,兼容性有待提高
        if (isset ($_SERVER['HTTP_USER_AGENT']))
        {
            $clientkeywords = array (
                'nokia',
                'sony',
                'ericsson',
                'mot',
                'samsung',
                'htc',
                'sgh',
                'lg',
                'sharp',
                'sie-',
                'philips',
                'panasonic',
                'alcatel',
                'lenovo',
                'iphone',
                'ipod',
                'blackberry',
                'meizu',
                'android',
                'netfront',
                'symbian',
                'ucweb',
                'windowsce',
                'palm',
                'operamini',
                'operamobi',
                'openwave',
                'nexusone',
                'cldc',
                'midp',
                'wap',
                'mobile'
            );
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
            {
                return true;
            }
        }
        // 协议法，因为有可能不准确，放到最后判断
        if (isset ($_SERVER['HTTP_ACCEPT']))
        {
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
            {
                return true;
            }
        }
        return false;
    }

}

?>
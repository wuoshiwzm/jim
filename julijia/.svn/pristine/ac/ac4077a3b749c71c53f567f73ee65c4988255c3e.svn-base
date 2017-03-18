<?php

/**
 * 时间格式化小工具
 * @author Carey
 * format: 2015/01/29
 */
class TimeTools {
	
	function __construct( )
	{
	
	}
	
	/**
	 * 获取系统当前时间
	 * format: 2015/01/29
	 * @return string
	 */
	public static function getFullTime()
	{
		return date( 'Y-m-d H:i:s', $_SERVER[ 'REQUEST_TIME' ] );
	}

	public static function getHeBingTime()
	{
		return date( 'YmdHis', $_SERVER[ 'REQUEST_TIME' ] );
	}
	
	/**
	 * 取以时间文件名
	 * format: 2015/01/29
	 * @return string
	 */
	public static function getTimeFileName()
	{
		return date( 'Ymd', $_SERVER['REQUEST_TIME'] );
	}
	
	/**
	 * get year
	 * format: 2015/01/29
	 * @return string
	 */
	public static function getYear()
	{
		return date( 'Y', $_SERVER[ 'REQUEST_TIME' ] );
	}
	
	/**
	 * 获取当前时间的年份
	 * @param string $sign
	 * return string
	 */
	public function GetMonth($sign="1")
	{
		//得到系统的年月
		$tmp_date=date("Ym");
		//切割出年份
		$tmp_year=substr($tmp_date,0,4);
		//切割出月份
		$tmp_mon =substr($tmp_date,4,2);
		$tmp_nextmonth=mktime(0,0,0,$tmp_mon+$sign,1,$tmp_year);
		$tmp_forwardmonth=mktime(0,0,0,$tmp_mon+$sign,1,$tmp_year);
		if($sign>0){
			//得到当前月的下一个月
			return $fm_next_month=date("Ym",$tmp_nextmonth);
		}else{
			//得到当前月的上一个月
			return $fm_forward_month=date("Ym",$tmp_forwardmonth);
		}
	}
	
	/**
     * 获取系统当前的年月日
     */
    static function getTime()
    {
        return date( 'Y-m-d ', $_SERVER[ 'REQUEST_TIME' ] );
    }

    /**
     * 得到明天的时间
     */
    static function toTime()
    {
        return date("Y-m-d",strtotime("+1 day"));
    }

	
    /**
     * 秒钟转分钟分钟转小时
     * @param unknown $time  分钟数
     * @return string|boolean 字符串时间
     */
    public static function Sec2Time( $time )
    {
    	if(is_numeric($time))
    	{
    		$value = array(
    				"years" => 0, 
    				"days" => 0, 
    				"hours" => 0,
    				"minutes" => 0, 
    				"seconds" => 0,
    		);
    		
    		if($time >= 31556926)
    		{
    			$value["years"] = floor($time/31556926);
    			$time = ($time%31556926);
    		}
    		
    		if($time >= 86400)
    		{
    			$value["days"] = floor($time/86400);
    			$time = ($time%86400);
    		}
    		
    		if($time >= 3600)
    		{
    			$value["hours"] = floor($time/3600);
    			$time = ($time%3600);
    		}
    		
    		if($time >= 60)
    		{
    			$value["minutes"] = floor($time/60);
    			$time = ($time%60);
    		}
    		$value["seconds"] = floor($time);
    		
    		$t = '';
    		if( isset( $value[ 'years' ] ) && false != $value[ 'years' ] )
    			$t .= $value[ 'years' ] .'年  ';
			
			if( isset( $value[ 'days' ] ) && false != $value[ 'days' ] )
				$t .= $value[ 'days' ] . '天' . '    ';
			
			if( isset( $value[ 'hours' ] ) && false != $value[ 'hours' ] )
				$t .= $value[ 'hours' ] .'时 ';

			if( isset( $value[ 'minutes' ] ) )
				$t .= $value[ 'minutes' ] .'分 ';
			
			if( isset( $value[ 'seconds' ] )  )
				$t .= $value[ 'seconds' ].'秒 ';
			
    		Return $t;
    	}
    	else
    		return (bool) FALSE;
    }

	/**
	 * @param $time
	 * @return bool|string
	 * 根据时间获取年月日
	 */
	static  function  getYMd($time)
	{
		return date("Y-m-d",strtotime($time));

	}
}

<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/1/16 0016
 * Time: 17:48
 */
class GoodsImg
{

    static function setGoodsImg(  $directories, $id, $name, $w, $h )
    {

        if( $directories== false || $id== false || $name == false || $w== false || $h == false )
        {
            return '/images/frontend/mo.png';
        }
        $newName = $w.'x'.$h.'-'.$name;
        $ftp = new Upload();
        $res = $ftp->download( $directories, $id, $name, $newName );
        if( $res )
        {
            $basePath =  public_path().'/media/temp/';
            //裁剪上传图片
            getProductWater( $basePath.$newName, $w, $h);
            //上传缓存图片
            $result = $ftp->uploadProductImage( $id,$newName, $directories.'/cache');
            if( $result )
            {
                return Config::get('tools.imagePath') . $directories . '/cache/' . $id . '/'.$newName;
            }
        }

        //生产缩略图失败
        return '/images/frontend/mo.png';
    }

    static function getGoodsImg(  $directories, $id, $name, $w, $h )
    {
        if( $directories== false || $id== false || $name == false || $w== false || $h == false )
        {
            return '/images/frontend/mo.png';
        }
        //图片名称
        $newName = $w.'x'.$h.'-'.$name;
        $url = Config::get('tools.imagePath') . $directories . '/cache/' . $id . '/'.$newName;
        $result = GoodsImg::check_remote_file_exists( $url );
        if( $result )
        {
            return $url;

        }else
        {
            return GoodsImg::setGoodsImg( $directories, $id, $name, $w, $h );
        }
    }


    /**
     * @param $url
     * @return bool
     * 检查网络图片是否存在
     */
    static function check_remote_file_exists( $url )
    {
        $curl = curl_init($url);
        // 不取回数据
        curl_setopt($curl, CURLOPT_NOBODY, true);
        // 发送请求
        $result = curl_exec( $curl );
        $found = false;
        // 如果请求没有发送失败
        if ( $result !== false )
        {
            // 再检查http响应码是否为200
            $statusCode = curl_getinfo( $curl, CURLINFO_HTTP_CODE );
            if ( $statusCode == 200 )
            {
                $found = true;
            }
        }
        curl_close( $curl );
        return $found;
    }
}
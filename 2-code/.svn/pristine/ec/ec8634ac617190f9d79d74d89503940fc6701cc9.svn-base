<?php
/**
 * Created by PhpStorm.
 * User: dingfeng0509@vip.qq.com
 * Date: 2016/10/8
 * Time: 16:53
 * 工具类： 上传类
 */


class Upload {

    //定义链接
    private  $connect ;
    public   $filepath = "/media";

    public function __construct()
    {
        $this->connect = FTP::connection('connection1');;
    }


    /**
     * @param $iPid 实体id,
     * @param $fileFrom  文件来源
     * @param $fileName  上传后文件的名字
     * @param $uploadtype  上传类型 product，user,brand,supplier
     * @return bool
     */
    public function  uploadProductImage($iPid,$fileFrom,$fileName,$uploadtype )
    {
        switch ($uploadtype){
            case "product":
                $filepath  =$this->filepath.'/product/';
                $res =  $this->uploadprocess($filepath,$iPid,$fileFrom,$fileName);
                break;
            case "user":
                $filepath  =$this->filepath.'/user/';
                $res = $this->uploadprocess($filepath,$iPid,$fileFrom,$fileName);
                break;
            case "brand":
                $filepath  =$this->filepath.'/brand/';
                $res =$this->uploadprocess($filepath,$iPid,$fileFrom,$fileName);
                break;
            case "supplier":
                $filepath  =$this->filepath.'/supplier/';
                $res = $this->uploadprocess($filepath,$iPid,$fileFrom,$fileName);
                break;
        }
        if($res){
            return true;
        }
        return false;
    }


    /**
     * @param $filepath
     * @param $iPid
     * @param $fileFrom
     * @param $fileName
     * @return bool
     * 私有方法
     */
    private function  uploadprocess($filepath,$iPid,$fileFrom,$fileName){

        $Directory = $filepath.$iPid;
        if($this->connect->changeDir($Directory))
        {
            //上传文件
            $upload = $this->connect->uploadFile($fileFrom,$fileName);
            if($upload && file_exists($fileFrom))
            {
                @unlink($fileFrom);
            }
            if($upload)
            {
                return true;
            }
        }else
        {
            //切换目录
            $this->connect->changeDir($filepath);
            //创建目录
            $this->connect->makeDir($iPid);
            $this-> uploadprocess($filepath,$iPid,$fileFrom,$fileName);
        }
    }

}
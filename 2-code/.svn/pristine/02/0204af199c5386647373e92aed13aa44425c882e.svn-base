<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2016/11/5
 * Time: 18:04
 * 即时接口
 */
class  ShippingApi {


    private  $EBusinessID = "1271962";
    private  $AppKey = "540ec363-c582-4138-bacb-35f123436b75";
    private  $ReqURL = 'http://api.kdniao.cc/Ebusiness/EbusinessOrderHandle.aspx';
    /**
     * @param $typeCom  物流公司编码
     * @param $shippNo  运单号
     * @return mixed|string
     */
    /**
     * Json方式  物流信息订阅
     *
     * 测试方法
     *   $val = new ShippingApi();
        $data['shiptype'] ='YTO';
        $data['shipno'] ='12345678';
        $dd = $val->getOrderTracesByJson($data);
        var_dump($dd);
     * 返回结果
     * "{ "EBusinessID": "1271962", "ShipperCode": "YTO", "Success": true, "LogisticCode": "12345678", "State": "2", "Traces": [ { "AcceptTime": "2016-11-03 19:22:16", "AcceptStation": "快件已到达凤山乡老卫生院旁妈妈驿站派件/自提,请及时取件,如有疑问请联系13885748720" }, { "AcceptTime": "2016-12-02 11:14:36", "AcceptStation": "快件已到达白鹿司路2号院海棠公社物业前台物业妈妈驿站派件/自提,请及时取件,如有疑问请联系18001279178" } ]
     */
    function getOrderTracesByJson( $Orderinfo){
        try{
            $requestData= "{'OrderCode':'','ShipperCode':'".$Orderinfo['shiptype']."','LogisticCode':'".$Orderinfo['shipno']."'}";
            $datas = array(
                'EBusinessID' => $this->EBusinessID,
                'RequestType' => '1002',
                'RequestData' => urlencode($requestData) ,
                'DataType' => '2',
            );
            $datas['DataSign'] =$this->encrypt($requestData, $this->AppKey);
            $result=$this->sendPost($this->ReqURL, $datas);
        }catch (Exception $e){
            $obj = new stdClass();
            $obj->Success = false;
            $result=json_encode($obj);
        }
        return $result;
    }

    /**
     *  post提交数据
     * @param  string $url 请求Url
     * @param  array $datas 提交的数据
     * @return url响应返回的html
     */
    function sendPost($url, $datas) {
        $temps = array();
        foreach ($datas as $key => $value) {
            $temps[] = sprintf('%s=%s', $key, $value);
        }
        $post_data = implode('&', $temps);
        $url_info = parse_url($url);
        if(!isset($url_info['port'])|| $url_info['port']=='')
        {
            $url_info['port']=80;
        }

        $httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
        $httpheader.= "Host:" . $url_info['host'] . "\r\n";
        $httpheader.= "Content-Type:application/x-www-form-urlencoded\r\n";
        $httpheader.= "Content-Length:" . strlen($post_data) . "\r\n";
        $httpheader.= "Connection:close\r\n\r\n";
        $httpheader.= $post_data;
        $fd = fsockopen($url_info['host'], $url_info['port']);
        fwrite($fd, $httpheader);
        $gets = "";
        $headerFlag = true;
        while (!feof($fd)) {
            if (($header = @fgets($fd)) && ($header == "\r\n" || $header == "\n")) {
                break;
            }
        }
        while (!feof($fd)) {
            $gets.= fread($fd, 128);
        }
        fclose($fd);

        return $gets;
    }

    /**
     * 电商Sign签名生成
     * @param data 内容
     * @param appkey Appkey
     * @return DataSign签名
     */
    function encrypt($data, $appkey) {
        return urlencode(base64_encode(md5($data.$appkey)));
    }

}
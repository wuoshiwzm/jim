<?php
class sms
{
    //定义发送短信的url
    /**
     * @param $phone 电话号码
     * @param $conent 短信内容
     * @return bool 返回真或者假
     */
    function  GetSms($phone,$conent)
    {
        $post_data = array();
        $post_data['account'] = iconv('GB2312', 'GB2312',"VIP_ljw");
        $post_data['pswd'] = iconv('GB2312', 'GB2312',"sxDXlijia521");
        $post_data['mobile'] =trim($phone);
        $post_data['msg']=mb_convert_encoding("$conent",'UTF-8', 'auto');
        $url='http://222.73.117.158/msg/HttpBatchSendSM?';
        $o="";
        foreach ($post_data as $k=>$v)
        {
            $o.= "$k=".urlencode($v)."&";
        }
        $post_data=substr($o,0,-1);
        return file_get_contents($url.$post_data);
    }

    /**
     * @param int $pw_length
     * @return string
     */
    static function create_code( $length=6 )
    {
        $chars = '0123456789';
        $code = '';
        for ( $i = 0; $i < $length; $i++ )
        {
            $code .= $chars[ mt_rand(0, strlen($chars) - 1) ];
        }
        return $code;
    }

    /**
     * @param $phone
     * @param $conent
     * @return int
     * 发送短信
     */
    static function SendSms( $phone, $conent )
    {
        $res = new sms();
        $str = $res->GetSms($phone,$conent);
        $data = explode(',',$str);
        if( $data[1] == '0')
        {
            return 1;
        }else
        {
            return 0;
        }
    }


    /**
     * @param $phone
     * @param $type
     * @return mixed
     *  发送短信公共方法
     */
    static function getCode( $phone, $type, $data = null )
    {
        $reg = '/^13[0-9]{9}$|14[0-9]{9}|15[0-9]{9}$|18[0-9]{9}$/';
        if( preg_match($reg, $phone)  == false )
        {
            return json_encode('手机号码验证失败');
        }
        $time = date("Y-m-d H:i");
        $count = Source_System__SmsHistory::whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d %H:%i') = ?",array($time))->count();
        if( $count == 100 )
        {
            sms::SendSms('15349232436','温馨提示：一分钟内发送短信超过200条');
            return json_encode('发送失败...');

        }elseif($count < 100)
        {
            $rowCount = Source_System__SmsHistory::whereRaw("DATE_FORMAT(created_at,'%Y-%m-%d %H:%i') = ? and phone = ? ",array( $time, $phone))->count();
            if( $rowCount > 5 )
            {
                return json_encode('频繁操作导致发送失败');
            }else
            {
                $code = sms::create_code();
                return  $code;
                Session::put('smsCode',$code,5);
                switch ( $type )
                {
                    case "1":
                        $content = "居利家温馨提示:您注册验证码为：" . $code . "请勿向他人泄 露！";
                        break;
                    case "2":
                        $content = "居利家温馨提示:您免费通话的验证码为：" . $code . "请勿向他人泄 露！";
                        break;
                    case "3":
                        $content = "居利家温馨提示:您发布找房需求验证码为：" . $code . "请勿向他人泄 露！";
                        break;
                    case "4":
                        $content = "居利家温馨提示:你发布的房源【".$data['xiaoqu']."】已经被【".$data['custome_name']."】".$data['phone']."成功预约！请您及时联系!";
                        break;
                    case "5":
                        $content = "居利家温馨提示:您免费发房验证码为：" . $code . "请勿向他人泄 露！";
                        break;
                }
                $res = sms::SendSms( $phone, $content );
                if( $res )
                {
                    $sms = new Source_System__SmsHistory;
                    $sms->type = 1;
                    $sms->content = $content;
                    $sms->status = 1;
                    $sms->phone = $phone;
                    $sms->save();
                    return json_encode('success');

                }else
                {
                    return json_encode('发送失败');
                }
            }
        }
    }
}

<?php
class DownloadController extends Controller{
    /**
     * 导出用户列表
     */
    public function downloadUserList()
    {
        header("Content-type:application/octet-stream;");


        $filename = "会员列表.txt";
        $encoded_filename = urlencode($filename);
        $encoded_filename = str_replace("+", "%20", $encoded_filename);

        $listFile = fopen($filename, "w");

        $txt = "Bill Gates\n";
        fwrite($listFile, $txt);
        $txt = "Steve Jobs\n";
        fwrite($listFile, $txt);

        fclose($listFile);

        if (preg_match("/MSIE/", $_SERVER['HTTP_USER_AGENT']) ) {
            header('Content-Disposition:  attachment; filename="' . $encoded_filename . '"');
        } elseif (preg_match("/Firefox/", $_SERVER['HTTP_USER_AGENT'])) {
            header('Content-Disposition: attachment; filename*="utf8' .  $filename . '"');
        } else {
            header('Content-Disposition: attachment; filename="' .  $filename . '"');
        }

        $users = Source_User_UserInfo::orderBy('id')->get();

        echo '总用户数：'.$users->count();
        echo "\r\n";
        echo "用户id---用户名---用户手机";
        echo "\r\n";
        foreach($users as $user){
            echo $user->id.'   '.$user->name.'   '.$user->mobile_phone;
            echo "\r\n";
        }



    }
}
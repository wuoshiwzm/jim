<?php

class DownloadController extends Controller
{
    /**
     * 导出用户列表
     */
    public function downloadUserList()
    {
        header("Content-type:application/octet-stream;");


        $filename = "会员列表.xls";
        $encoded_filename = urlencode($filename);
        $encoded_filename = str_replace("+", "%20", $encoded_filename);

        $listFile = fopen($filename, "w");

        $txt = "Bill Gates\n";
        fwrite($listFile, $txt);
        $txt = "Steve Jobs\n";
        fwrite($listFile, $txt);

        fclose($listFile);

        if (preg_match("/MSIE/", $_SERVER['HTTP_USER_AGENT'])) {
            header('Content-Disposition:  attachment; filename="' . $encoded_filename . '"');
        } elseif (preg_match("/Firefox/", $_SERVER['HTTP_USER_AGENT'])) {
            header('Content-Disposition: attachment; filename*="utf8' . $filename . '"');
        } else {
            header('Content-Disposition: attachment; filename="' . $filename . '"');
        }

        $users = Source_User_UserInfo::orderBy('id')->get();

        echo '总用户数：' . $users->count();

        echo '<table>';

        /**
         * 首行
         */
        echo '<tr>';

        echo '<th>';
        echo '用户id';
        echo '</th>';

        echo '<th>';
        echo '用户名';
        echo '</th>';

        echo '<th>';
        echo '用户手机';
        echo '</th>';

        echo '<th>';
        echo '用户座机';
        echo '</th>';

        echo '<th>';
        echo '用户性别';
        echo '</th>';

        echo '<th>';
        echo '用户积分';
        echo '</th>';

        echo '<th>';
        echo '消费积分';
        echo '</th>';

        echo '<th>';
        echo 'qq';
        echo '</th>';

        echo '<th>';
        echo '微信';
        echo '</th>';

        echo '<th>';
        echo '创建时间';
        echo '</th>';

        echo '</tr>';
        /**
         * 内容行
         */

        foreach ($users as $user) {
            echo '<tr>';

            echo '<td>';
            echo $user->id;
            echo '</td>';

            echo '<td>';
            echo $user->name;
            echo '</td>';


            echo '<th>';
            echo $user->mobile_phone;
            echo '</th>';

            echo '<th>';
            echo $user->home_phone;
            echo '</th>';

            echo '<th>';
            if ($user->sex == 1) {
                echo '男';
            } else {
                echo '女';
            }
            echo '</th>';

            echo '<th>';
            echo $user->user_points;
            echo '</th>';

            echo '<th>';
            echo $user->pay_points;
            echo '</th>';

            echo '<th>';
            echo $user->qq;
            echo '</th>';

            echo '<th>';
            echo $user->wechat;
            echo '</th>';

            echo '<th>';
            echo $user->created_at;
            echo '</th>';


            echo '</tr>';
        }


        echo '</table>';


//        echo "</table>";
//        echo '总用户数：'.$users->count();
//        echo "\r\n";
//        echo "用户id---用户名---用户手机";
//        echo "\r\n";
//        foreach($users as $user){
//            echo $user->id.'   '.$user->name.'   '.$user->mobile_phone;
//            echo "\r\n";
//        }


    }
}
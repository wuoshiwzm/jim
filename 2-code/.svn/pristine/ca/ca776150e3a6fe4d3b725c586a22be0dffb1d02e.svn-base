$(document).ready(function()
{
    $(".flashtime").each(function ()
    {
        var time = parseInt( $(this).find('input').val() );
        countDown( time, $(this) );
    });
});

function countDown( maxtime,index )
{
    var timer = setInterval(function()
    {
        if( maxtime >=0 )
        {
            second = Math.floor( maxtime % 60);       //计算秒
            minite = Math.floor((maxtime / 60) % 60); //计算分
            hour = Math.floor((maxtime / 3600) % 24 ); //计算小时
            day = Math.floor((maxtime / 3600) / 24);
            msg = hour+'&nbsp;:&nbsp;'+minite+'&nbsp;:&nbsp;'+second;
            $(index).find('font').html( msg );
            --maxtime;
        }
        else
        {
            clearInterval( timer );
            $(index).find('font').html( '活动结束' );
        }
    }, 1000);
}
<?php
  $all = round($comment['all']->getTotal());
  $good = $comment['good']->getTotal();
  $in = $comment['in']->getTotal();
  $difference = $comment['difference']->getTotal();
?>
<div  class="gongyong gongyong02"  id="dianping">
    <h1>服务点评</h1>
    <div  class="dianping">
        <dl>
            <dt><font>@if( $all ){{round(($good/$all)*100)}}@else 0 @endif%</font></dt>
            <dd><font>好评度</font></dd>
        </dl>
    </div>
    <div  class="dianping_xing">
        <div class="box_163css">
            <span class="s_name">好评<font>(@if( $all ){{round(($good/$all)*100)}}@else 0 @endif%)</font></span>
            <span class="s_result"><font style="width:{{$all?round(($good/$all)*100):0}}%"></font></span>
        </div>

        <div class="box_163css">
            <span class="s_name">中评<font>(@if( $all ){{$all?round(($in/$all)*100):0}}@else 0 @endif%)</font></span>

            <span class="s_result"><font style="width:{{$all?round(($in/$all)*100):0}}%"></font></span>
        </div>

        <div class="box_163css">
            <span class="s_name">差评<font>(@if( $all ){{round(($difference/$all)*100)}}@else 0 @endif%)</font></span>

            <span class="s_result"><font style="width:{{$all?round(($difference/$all)*100):0}}%"></font></span>
        </div>
    </div>

    <div  class="dianping_ping">
        <div class="hd">
            <ul>
                <li>所有评论（{{$comment['all']->getTotal()}}）</li>
                <li>好评（{{$comment['good']->getTotal()}}）</li>
                <li>中评（{{$comment['in']->getTotal()}}）</li>
                <li>差评（{{$comment['difference']->getTotal()}}）</li>
            </ul>
        </div>

        <div class="bd">
            <ul id="1">
               @include('frontend.details.commentlist',array('commentData'=>$comment['all'],'page'=>$all))
            </ul>
            <ul id="2">
                @include('frontend.details.commentlist',array('commentData'=>$comment['good'],'page'=>$good))
            </ul>
            <ul id="3">
                @include('frontend.details.commentlist',array('commentData'=>$comment['in'],'page'=>$in))
            </ul>
            <ul id="4">
                @include('frontend.details.commentlist',array('commentData'=>$comment['difference'],'page'=>$difference))
            </ul>
        </div>
    </div>
</div>
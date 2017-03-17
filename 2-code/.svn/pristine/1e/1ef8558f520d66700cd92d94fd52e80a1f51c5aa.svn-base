<?php
/**
 * Created by julijia_frontend.
 * User: 王顶峰
 * Email: dingfeng0509@vip.qq.com
 * Date: 2017/1/12
 * Time: 11:53
 */?>


<ul>
    @if( $refund->type ==1)
        @if($refund->status ==1)
            <li class="operate-steps">
                <i class="iconfont"></i>
                <span>退款单状态：买家已提交，等待客服业务审核</span>
            </li>
            <li class="operate-prompt">
                <input value="业务审核" data-refund="{{$refund->id}}" class="btn btn-primary modify" type="button">
            </li>
            <li class="operate-prompt">
                业务审核通过后，由财务确认退款
            </li>
        @endif
        @if($refund->status ==2)
            <li class="operate-steps">
                <i class="iconfont"></i>
                <span>退款单状态：客服业务已经审核，等待财务退款</span>
            </li>
            <li class="operate-prompt">
                <input   value="确认退款"  class="btn btn-primary " type="button" onclick="tuikuan('{{encode($refund->id)}}')">
            </li>
            <li class="operate-prompt">
                财务退款后，请确认退款
            </li>
        @endif
        @if($refund->status ==6)
            <li class="operate-steps">
                <i class="iconfont"></i>
                <span>退款单状态：财务已经退款</span>
            </li>
            <li class="operate-prompt">
                业务审核通过后，由财务确认退款
            </li>
        @endif
    @elseif( $refund->type ==2)
        @if($refund->status ==1)
            <li class="operate-steps">
                <i class="iconfont"></i>
                <span>退款单状态：买家已提交，等待客服业务审核</span>
            </li>
            <li class="operate-prompt">
                <input value="业务审核"  data-refund="{{$refund->id}}" class="btn btn-primary check" type="button">
            </li>
            <li class="operate-prompt">
                客户审核时，请输入收货人信息
            </li>
        @endif
        @if($refund->status ==2)
            <li class="operate-steps">
                <i class="iconfont"></i>
                <span>退款单状态：客服业务已经审核，等待客户发货</span>
            </li>
            <li class="operate-prompt">
                业务审核通过后，等待客户发货
            </li>
        @endif
        @if($refund->status ==4)
            <li class="operate-steps">
                <i class="iconfont"></i>
                <span>退款单状态：客户已经发货，等待客服收货</span>
            </li>
            <li class="operate-prompt">
                <input value="确认收货" data-refund="{{$refund->id}}"  class="btn btn-primary " type="button" onclick="location.href= '/admin/refund/reseive/{{encode($refund->id)}}'">
            </li>
            <li class="operate-prompt">
                确认收货后，财务退款，由财务确认退款
            </li>
        @endif

        @if($refund->status ==5)
            <li class="operate-steps">
                <i class="iconfont"></i>
                <span>退款单状态：客服已经收货，等待财务退款</span>
            </li>
            <li class="operate-prompt">
               <input   value="确认退款"  class="btn btn-primary " type="button" onclick="tuikuan('{{encode($refund->id)}}')">
            </li>
            <li class="operate-prompt">
                等待财务退款
            </li>
        @endif
        @if($refund->status ==6)
            <li class="operate-steps">
                <i class="iconfont"></i>
                <span>退款单状态：财务已经退款</span>
            </li>
            <li class="operate-prompt">
                业务审核通过后，由财务确认退款
            </li>
        @endif

    @endif
</ul>

<script>
    function  tuikuan(id) {
        layer.open({
            content: '您确认已经退款了吗？',
            btn: ['确认', '取消'],
            shadeClose: false,
            yes: function(){
                 $.post('/admin/frefund/confirm',{refund_id:id},function (msg) {
                     msg=eval("("+msg+")") ;
                     if(msg['status']){
                         location.reload();
                     }
                 })
            }, no: function(){
                 layer.close();
            }
        });
    }
</script>



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
                <input value="业务审核" class="btn btn-primary modify" type="button">
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
                <input value="财务退款" class="btn btn-primary modify" type="button">
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
                <input value="业务审核" class="btn btn-primary modify" type="button">
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
                <input value="确认收货" class="btn btn-primary modify" type="button">
            </li>
            <li class="operate-prompt">
                业务审核通过后，由财务确认退款
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

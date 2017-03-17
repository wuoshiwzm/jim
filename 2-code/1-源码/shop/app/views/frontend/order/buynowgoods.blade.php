<div class="table_div table_div_h">
    <h2>送货清单</h2>
    <div class="table_div_hd table_div_hd_table">
        <table border="0" cellpadding="0" cellspacing="0" class="order_tab">
            <tr>
                <th>商品信息</th>
                <th width="12%">库存</th>
                <th width="8%">商品数量</th>
                <th width="18%">单价(元)</th>
                <th width="18%">小计(元)</th>
            </tr>
            <tr>
                <td class="padding_left">
                    <dl>
                        <dt><a href="{{url($row->product_id.'.html')}}"><img src="{{getImgSize('goods', $row->product_id, $row->small_image,68,68)}}" class="goods-thumb" width="68" height="68"></a></dt>
                        <dd><a href="{{url($row->product_id.'.html')}}">{{$row->product_name}}</a></dd>
                        <dd class="order_tab_color">
                            @if( $row->guige )
                                @foreach( json_decode($row->guige) as $k=>$v)
                                    {{$k}}:{{$v}} &nbsp;
                                @endforeach
                            @endif
                        </dd>
                    </dl>
                </td>
                <td>有货</td>
                <td>x{{$row->num}}</td>
                <td><font class="price">¥ {{$row->price}}</font></td>
                <td><font class="price03">¥ {{number_format($row->price*$row->num,2,'.','')}}</font></td>
            </tr>
            <tr class="order_add">
                <td colspan="2" class="quan ding_jia">
                    <font>添加订单备注</font>
                    <textarea name="desc" placeholder="请输入订单备注" class="layui-textarea"  maxlength="200"></textarea>
                </td>
                <td colspan="3" class="song">
                    <div id="freightprice">运送方式：{{$freight->name}}<font>¥{{$freight->price!=0?$freight->price:0.00}}</font></div>
                    <div><span>合计(含运费)&nbsp;&nbsp;&nbsp;<font class="price03 font16" id="priceall">¥{{number_format(($row->price*$row->num+$freight->price),2,'.','')}}</font></span></div>
                </td>
            </tr>
            <input type="hidden" name="pid" id="pid" value="{{encode($row->product_id)}}"/>
            <input type="hidden" name="g" id="g" value="{{encode($row->guige)}}"/>
            <input type="hidden" name="num" id="num" value="{{encode($row->num)}}"/>
            <input type="hidden" name="j" id="j" value="{{encode($row->price)}}"/>
            <input type="hidden" id="price" value="{{number_format(($row->price*$row->num),2,'.','')}}"/>
        </table>
        <div class="jiesuan_fu">
            <ul>
                <li><span>商品总价：</span><font>¥{{$totaled->cost_item}}</font></li>
                <li><span>优 惠：</span><font>-¥{{$totaled->cost_freight}}</font></li>
                <li><span>运 费：</span><font>¥{{$totaled->shipping_amount}}</font></li>
                <li class="jiesuan_right_li"><span>应付总额:</span><font><i>¥{{$totaled->pay_amount}}</i></font></li>
            </ul>
            <div>
                @if( $address )
                    <span>寄送至：</span>
                    <span id="setAddress">
                    @foreach( $address as $row )
                            @if( $row->status )
                                <span>{{$row->name}}</span>
                                <span>@if(isset($row->provinceInfo->province)){{$row->provinceInfo->province}}@endif</span>
                                <span>@if(isset($row->cityInfo->city)){{$row->cityInfo->city}}@endif</span>
                                <span>@if(isset($row->areaInfo->area)){{$row->areaInfo->area}}@endif</span>
                                <span>{{$row->address}}</span>
                                <span>{{conversionPhone( $row->phone )}}</span>
                            @endif
                        @endforeach
                </span>
                @endif
            </div>
        </div>
        <div class="jiesuan_btn">
            <button class="layui-btn layui-btn-danger jieshuan"  id="btn_submit" lay-submit lay-filter="buynowgoods">提交订单</button>
        </div>
    </div>
</div>
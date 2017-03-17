<div id="info1" class="help-block help-block-t"><div class="help-block help-block-t">发运费参考</div></div>
<div id="info2" class="form_yun">
    <table id="table_list" class="table table-hover">
        @if( $type->is_freeshipping )
            <thead>
            <tr>
                <th class="w60">物流公司</th>
                <th class="w60">免费件数</th>
                <th class="w60">重量</th>
                <th class="w60">体积</th>
                <th class="w60">价格</th>
            </tr>
            </thead>
            @foreach( $data as $rows )
            <tr>
                <td>{{$rows->shipping_code}}</td>
                <td>{{$rows->pie_no}}</td>
                <td>{{$rows->weight_no}}</td>
                <td>{{$rows->bulk_no}}</td>
                <td>{{$rows->price}}</td>
            </tr>
            @endforeach
        @else
            @if( $type->jifei_model == 1 )
                <thead>
                <tr>
                    <th class="w60">物流公司</th>
                    <th class="w60">首件</th>
                    <th class="w60">首费</th>
                    <th class="w60">续件</th>
                    <th class="w60">续费</th>
                </tr>
                </thead>
                @foreach( $data as $rows )
                    <tr>
                        <td>{{$rows->Ship_code_id}}</td>
                        <td>{{$rows->FirstPiece}}</td>
                        <td>{{$rows->FirstAmount}}</td>
                        <td>{{$rows->SecondPiece}}</td>
                        <td>{{$rows->SecondAmount}}</td>
                    </tr>
                @endforeach
            @endif
            @if( $type->jifei_model == 2 )
                <thead>
                <tr>
                    <th class="w60">物流公司</th>
                    <th class="w60">首重</th>
                    <th class="w60">首费</th>
                    <th class="w60">续重</th>
                    <th class="w60">续费</th>
                </tr>
                </thead>
                @foreach( $data as $rows )
                    <tr>
                        <td>{{$rows->Ship_code_id}}</td>
                        <td>{{$rows->FirstWeight}}</td>
                        <td>{{$rows->FirstAmount}}</td>
                        <td>{{$rows->SecondWeight}}</td>
                        <td>{{$rows->SecondAmount}}</td>
                    </tr>
                @endforeach
            @endif
            @if( $type->jifei_model == 3 )
                <thead>
                <tr>
                    <th class="w60">物流公司</th>
                    <th class="w60">首体积</th>
                    <th class="w60">首费</th>
                    <th class="w60">续体积</th>
                    <th class="w60">续费</th>
                </tr>
                </thead>
                @foreach( $data as $rows )
                    <tr>
                        <td>{{$rows->Ship_code_id}}</td>
                        <td>{{$rows->FirstBulk}}</td>
                        <td>{{$rows->FirstAmount}}</td>
                        <td>{{$rows->SecondBulk}}</td>
                        <td>{{$rows->SecondAmount}}</td>
                    </tr>
                @endforeach
            @endif
        @endif
    </table>
</div>

@section('content')
    <table style="border:1px solid red;">
        <tr>
            <td>名称</td>
            <td>公司类型</td>
            <td>联系人</td>
            <td>联系电话</td>
            <td>邮编</td>
            <td>所在城市</td>
            <td>详细地址</td>
            <td>营业内容</td>
            <td>操作</td>
        </tr>
        @foreach($user as $row )
            <tr >
                <td>{{$row->name}}</td>
                <td>{{$row->type}}</td>
                <td>{{$row->lianxiren}}</td>
                <td>{{$row->phone}}</td>
                <td>{{$row->postcode}}</td>
                <td>{{$row->city}}</td>
                <td>{{$row->address}}</td>
                <td>{{$row->yingye}}</td>
                <td><a >审核</a>|<a >删除</a></td>
            </tr>
        @endforeach
    </table>
@stop
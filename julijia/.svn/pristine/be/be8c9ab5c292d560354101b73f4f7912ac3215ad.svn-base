@section('content')
    <table>
        <tr>
            <td>名称</td>
            <td>目录地址</td>
            <td>图标</td>
            <td>关键字</td>
            <td>操作</td>
        </tr>
        @foreach( $data as $row )
            <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->url}}</td>
                <td>{{$row->icon}}</td>
                <td>{{$row->keywords}}</td>
                <td><a href="{{url('admin/product/category/'.encode($row->id).'/edit')}}">编辑</a>|<a href="javascript:;">删除</a></td>
            </tr>
        @endforeach
    </table>
@stop
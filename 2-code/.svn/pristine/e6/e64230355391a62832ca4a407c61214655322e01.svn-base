@section('content')
    <table>
        <tr>
            <td>名称</td>
            <td>时间</td>
            <td>操作</td>
        </tr>
        @foreach( $data as $row )
            <tr>
                <td>{{$row->attribute_name}}</td>
                <td>{{$row->created_at}}</td>
                <td><a href="{{url('admin/product/attribute_base_edit?id=').encode($row->id)}}"/>编辑</a>|<a href="{{url('admin/product/attribute_base_del?id=').encode($row->id).'&type='.$row->type}}"/>删除</a>|<a href="{{url('admin/product/abstoab?setid=').encode($row->id)}}"/>设置属性</a> </td>
            </tr>
        @endforeach
    </table>
@stop
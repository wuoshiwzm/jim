@section('content')
    <table>
        <tr>
            <td>属性名称</td>
            <td>后台属性标题</td>
            <td>属性类型</td>

            <td>长度</td>
            <td>前端数据类型</td>
            <td>前台属性标题</td>

            <td>排序</td>
            <td>是否系统属性</td>
            <td>是否显示</td>

            <td>是否必填</td>
            <td>是否索引</td>
            <td>验证规则</td>

            <td>错误信息和提示信息</td>
            <td>默认值</td>
            <td>操作</td>
        </tr>
        @foreach( $data as $row )
            <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->admin_label}}</td>
                <td>{{$row->type}}</td>
                <td>{{$row->length}}</td>
                <td>{{$row->front_input}}</td>
                <td>{{$row->front_lable}}</td>
                <td>{{$row->sort}}</td>
                <td>{{$row->is_system}}</td>
                <td>{{$row->is_hidden}}</td>
                <td>{{$row->is_required}}</td>
                <td>{{$row->is_index}}</td>
                <td>{{$row->valid_rule}}</td>
                <td>{{$row->errormsg}}</td>
                <td>{{$row->default}}</td>
                <td><a href="{{url('admin/product/attribute_edit?id=').encode($row->id)}}"/>编辑</a>|<a href="{{url('admin/product/attribute_del?id=').encode($row->id)}}"/>删除</a></td>
            </tr>
        @endforeach
        {{$data->links()}}
    </table>
@stop
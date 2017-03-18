@section('content')
    <form action="{{url('admin/product/category')}}" method="post">
        {{ Form::token() }}
        <table>
            <tr>
                <td>是否在前端显示</td>
                <td>
                    <select name="parent_id">
                        <option value="0">根目录</option>
                        @foreach($type as $row )
                        <option value="{{$row->id}}">{{$row->pix}}{{$row->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>名称</td>
                <td><input type="text" name="name"/></td>
            </tr>
            <tr>
                <td>目录地址</td>
                <td><input type="text" name="url"/></td>
            </tr>
            <tr>
                <td>图标</td>
                <td> <input type="text" name="icon"/></td>
            </tr>
            <tr>
                <td>关键字</td>
                <td> <input type="text" name="keywords"/></td>
            </tr>
            <tr>
                <td>是否在前端显示</td>
                <td>
                    <select name="is_show">
                        <option value="1">是</option>
                        <option value="0">否</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>是否显示</td>
                <td>
                    <select name="status">
                        <option value="1">显示</option>
                        <option value="0">隐藏</option>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" value="提交"/>
    </form>
@stop
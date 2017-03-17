@section('content')
    <form action="{{url('admin/product/category/'.encode($data->id))}}" method="post">
        {{ Form::token() }}
        <input type="hidden" name="_method" value="PUT">
        <table>
            <tr>
                <td>名称</td>
                <td><input type="text" name="name" value="{{$data->name}}"/></td>
            </tr>
            <tr>
                <td>目录地址</td>
                <td><input type="text" name="url" value="{{$data->url}}"/></td>
            </tr>
            <tr>
                <td>图标</td>
                <td> <input type="text" name="icon" value="{{$data->icon}}"/></td>
            </tr>
            <tr>
                <td>关键字</td>
                <td> <input type="text" name="keywords" value="{{$data->keywords}}"/></td>
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
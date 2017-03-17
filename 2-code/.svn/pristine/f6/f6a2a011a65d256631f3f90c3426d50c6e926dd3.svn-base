@section('content')
    <form action="{{url('admin/product/attribute_edit')}}" method="post">
        <input type="text" name="id" value="{{encode($data->id)}}"/>
        <table>
            <tr>
                <td>属性名称</td>
                <td><input type="text" name="name" value="{{$data->name}}"/></td>
            </tr>
            <tr>
                <td>后台属性标题</td>
                <td><input type="text" name="admin_label" value="{{$data->admin_label}}"/></td>
            </tr>
            <tr>
                <td>属性类型</td>
                <td> <input type="text" name="type" value="{{$data->type}}"/></td>
            </tr>
            <tr>
                <td>长度</td>
                <td> <input type="text" name="length" value="{{$data->length}}"/></td>
            </tr>
            <tr>
                <td>前端数据类型</td>
                <td>
                    <select name="front_input">
                        <option value="text">text</option>
                        <option value="radio">radio</option>
                        <option value="select">select</option>
                        <option value="texteare">texteare</option>
                        <option value="file">file</option>
                        <option value="meida">meida</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>前台属性标题</td>
                <td> <input type="text" name="front_lable" value="{{$data->front_lable}}"/></td>
            </tr>
            <tr>
                <td>排序</td>
                <td> <input type="text" name="sort" value="{{$data->sort}}"/></td>
            </tr>
            <tr>
                <td>是否系统属性</td>
                <td>
                    <select name="is_system">
                        <option value="1">是</option>
                        <option value="0">否</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>是否显示</td>
                <td>
                    <select name="is_hidden">
                        <option value="1">显示</option>
                        <option value="0">隐藏</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>是否必填</td>
                <td> <input type="text" name="is_required" value="{{$data->is_required}}" /></td>
            </tr>
            <tr>
                <td>是否索引</td>
                <td> <input type="text" name="is_index" value="{{$data->is_index}}"/></td>
            </tr>
            <tr>
                <td>验证规则</td>
                <td> <input type="text" name="valid_rule" value="{{$data->valid_rule}}"/></td>
            </tr>
            <tr>
                <td>错误信息和提示信息</td>
                <td> <input type="text" name="errormsg" value="{{$data->errormsg}}"/></td>
            </tr>
            <tr>
                <td>默认值</td>
                <td> <input type="text" name="default" value="{{$data->default}}"/></td>
            </tr>
        </table>
        <input type="submit" value="提交"/>
    </form>
@stop
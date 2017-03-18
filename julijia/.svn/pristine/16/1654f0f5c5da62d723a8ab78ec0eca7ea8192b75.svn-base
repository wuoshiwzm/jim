@section('content')
    <form action="{{url('admin/user/supplier')}}" method="post">
        {{ Form::token() }}
        <table>
            <tr>
                <td>供应商名称</td>
                <td><input type="text" name="name"/></td>
            </tr>
            <tr>
                <td>营业号</td>
                <td><input type="text" name="yingyehao"/></td>
            </tr>
            <tr>
                <td>类型</td>
                <td>
                    <select name="type">
                        <option value="1">有限公司</option>
                        <option value="2">集团公司</option>
                        <option value="3">股份公司</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>联系人</td>
                <td> <input type="text" name="lianxiren"/></td>
            </tr>
            <tr>
                <td>手机</td>
                <td> <input type="text" name="phone"/></td>
            </tr>
            <tr>
                <td>固定电话</td>
                <td> <input type="text" name="tel"/></td>
            </tr>
            <tr>
                <td>邮编</td>
                <td> <input type="text" name="postcode"/></td>
            </tr>
            <tr>
                <td>地址</td>
                <td> <input type="text" name="address"/></td>
            </tr>
            <tr>
                <td>法人</td>
                <td> <input type="text" name="faren"/></td>
            </tr>
            <tr>
                <td>注册资金</td>
                <td> <input type="text" name="zhuce_zijin"/></td>
            </tr>
        </table>
        <input type="submit" value="提交"/>
    </form>
@stop
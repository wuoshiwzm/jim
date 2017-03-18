@section('content')

    <form action="{{url('admin/product/brand')}}" method="post">
        {{ Form::token() }}
        <table>
            <tr>
                <td>供应商id</td>
                <td>
                    <select name="pid">
                        @foreach($guser as $row )
                            <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>品牌名称</td>
                <td><input type="text" name="name"/></td>
            </tr>
            <tr>
                <td>品牌官网</td>
                <td><input type="text" name="url"/></td>
            </tr>
            <tr>
                <td>首字母</td>
                <td> <input type="text" name="pinyin"/></td>
            </tr>
            <tr>
                <td>排序</td>
                <td> <input type="text" name="sort"/></td>
            </tr>
        </table>
        <input type="submit" value="提交"/>
    </form>
@stop

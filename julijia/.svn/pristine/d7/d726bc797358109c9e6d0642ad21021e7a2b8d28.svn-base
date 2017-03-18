@section('content')
    <form action="{{url('admin/product/brand/'.encode($data->id)
    )}}" method="post">
        {{ Form::token() }}
        <input type="hidden" name="_method" value="PUT">
        <table>
            <tr>
                <td>品牌名称</td>
                <td><input type="text" name="name" value="{{$data->name}}"/></td>
            </tr>
            <tr>
                <td>品牌官网</td>
                <td><input type="text" name="url" value="{{$data->url}}"/></td>
            </tr>
            <tr>
                <td>首字母</td>
                <td> <input type="text" name="pinyin" value="{{$data->pinyin}}"/></td>
            </tr>
            <tr>
                <td>排序</td>
                <td> <input type="text" name="sort" value="{{$data->sort}}"/></td>
            </tr>
        </table>
        <input type="submit" value="提交"/>
    </form>
@stop
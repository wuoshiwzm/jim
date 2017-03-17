@section('content')
    <table>
        <tr>
            <td>品牌名称</td>
            <td>品牌logo</td>
            <td>推广图片</td>
            <td>品牌官网</td>
            <td>操作</td>
        </tr>
        @foreach( $data as $row )
            <tr>
                <td>{{$row->name}}</td>
                <td>{{$row->logo}}</td>
                <td>{{$row->extension}}</td>
                <td>{{$row->url}}</td>
                <td><a href="{{url('admin/product/brand/'.encode($row->id).'/edit')}}">编辑</a>|<a href="javascript:;">删除</a></td>
            </tr>
        @endforeach
    </table>
    <iframe allowtransparency="true" frameborder="0" width="385" height="96" scrolling="no" src="//tianqi.2345.com/plugin/widget/index.htm?s=1&z=1&t=0&v=0&d=3&bd=0&k=&f=&q=1&e=1&a=1&c=54511&w=385&h=96&align=center"></iframe>
@stop
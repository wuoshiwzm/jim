@section('content')
    <form action="{{url('admin/product/category')}}" method="post">
        {{ Form::token() }}
        <table>
            @foreach( $data as $row )
            <tr>
                <td>{{$row->productEavToEav->admin_label}}</td>
                @if( $row->productEavToEav->front_input == 'text')
                    <td><input type="text" name="{{$row->name}}"/></td>
                @endif
                @if( $row->productEavToEav->front_input == 'radio')

                    <td><input type="text" name="{{$row->name}}"/></td>
                @endif
            </tr>
            @endforeach
        </table>
        <input type="submit" value="提交"/>
    </form>
@stop

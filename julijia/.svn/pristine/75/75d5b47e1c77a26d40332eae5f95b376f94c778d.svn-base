@section('content')
    <form action="{{url('admin/product/abstoab')}}" method="post">
        <table>
            <tr>
                <td>选择属性</td>
                <td>
                    <select name="front_input">
                        @foreach( $pEav as $p)
                        <option value="{{$p->id}}">{{$p->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>



            <tr>
                <td>自定义属性</td>
                <td>
                    @foreach( $eav as $e)
                        <label><input name="aid[]" type="checkbox" value="{{$e->id}}" />{{$e->admin_label}}</label>
                    @endforeach
                </td>
            </tr>
        </table>
        <input type="hidden" value="{{encode($setId)}}" name="setid"/>
        <input type="submit" value="提交"/>
    </form>
@stop
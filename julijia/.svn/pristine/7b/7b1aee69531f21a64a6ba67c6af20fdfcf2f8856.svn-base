@section('content')
    <form action="{{url('admin/product/attribute_base_edit')}}" method="post">
        <input type="text" name="attribute_name" value="{{$data->attribute_name}}"/>
        <select name="type">
            <option value="product" @if($data->type=='product') selected @endif>product</option>
            <option value="order" @if($data->type=='order') selected @endif>order</option>
            <option value="customer" @if($data->type=='customer') selected @endif>customer</option>
        </select>
        <input type="hidden" name="id" value="{{encode($data->id)}}"/>
        <input type="submit" value="提交"/>
    </form>
@stop
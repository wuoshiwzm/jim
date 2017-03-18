<div class="gongyong"  id="can">
    <ul>
        @foreach($configInfo as $row )
         @if( $row->value )
         <li title="{{$row->value}}">{{$row->name}}：{{$row->value}}</li>
         @endif
        @endforeach
    </ul>
</div>
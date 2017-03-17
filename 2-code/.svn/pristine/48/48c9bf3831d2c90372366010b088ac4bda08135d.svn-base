<div class="pull-right page-box @if(isset($product)) page-box02 @endif">
    <div id="pagination" class="pull-right">
        <form  class="searchfrm" action="{{Request::url()}}" method="get">
            <div class="pagination-info">共{{$data->getTotal()}}条记录，每页显示：
                <select class="select m-r-5" name="setpage" onchange="searchGet( this )">
                    <option value="10" @if($set['setpage'] == 10 ) selected="selected" @endif >10</option>
                    <option value="20" @if($set['setpage'] == 20 ) selected="selected" @endif >20</option>
                    <option value="30" @if($set['setpage'] == 30 ) selected="selected" @endif >30</option>
                    <option value="50" @if($set['setpage'] == 50 ) selected="selected" @endif >50</option>
                </select>
                条
            </div>
            {{$data->appends($set)->links()}}
            <div class="pagination-goto">
                <input class="ipt form-control goto-input" type="text" name="page" value="{{$data->getCurrentPage()}}">
                <button class="btn btn-default goto-button" title="点击跳转到指定页面" onclick="searchGet( this )">GO</button>
            </div>
        </form>
    </div>
</div>




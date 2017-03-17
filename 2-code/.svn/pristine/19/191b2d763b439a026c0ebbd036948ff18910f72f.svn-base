<div class="form-group">
    <label class="col-sm-4 control-label">
        <span class="ng-binding">选定分类：</span>
    </label>
    <div class="col-sm-8 xuanding_bg_div">
        <div class="form-control-box xuanding_bg">
            <select class="form-control chosen-select" onchange="steCategory( this )">
                <option value="0">请选择</option>
                @foreach(Source_Product_ProductCategory::where('parent_id',0)->get() as $row  )
                    <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-control-box xuanding_bg">
            <select class="form-control chosen-select" onchange="steCategory( this )">
                <option value="0">请选择</option>
            </select>
        </div>
        <div class="form-control-box xuanding_bg">
            <select class="form-control chosen-select" id="category_id"  >
                <option value="0">请选择</option>
            </select>
        </div>
        <div class="form-control-box">
            <input type="button" value="添加分类" class="btn btn-primary m-r-5 attbute_add_ji" onclick="addCategory( this )">
        </div>
        <div class="form-control-box add_fen">
            @foreach( Source_Salerule_FavoutableCategory::where('rule_id',$id)->get() as $row )
            <div> @if( isset($row->favoutableCategoryToCategory->name) ) {{$row->favoutableCategoryToCategory->name }}（{{$id}}）@endif <a href="javascript:;" onclick="editRemCategory( this )">x</a><input type="hidden"  value="{{$row->category_id}}"></div>
            @endforeach
        </div>
    </div>
    <div id="oldID">
       <!--删除的id-->
    </div>
</div>
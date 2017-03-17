<div class="simple-form-field">
    <div class="form-group">
        <label class="col-sm-4 control-label">
            <span class="ng-binding"></span>
        </label>
        <div class="col-sm-8">
            <div class="form-control-box" style="color:red">提示:此优惠规则仅限于以下选定的分类</div>
        </div>
    </div>
</div>
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

        </div>
    </div>
</div>
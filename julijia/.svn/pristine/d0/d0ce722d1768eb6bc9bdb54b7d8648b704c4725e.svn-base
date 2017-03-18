<div class="form-group">
    <label class="col-sm-4 control-label">
        <span class="ng-binding">选定产品：</span>
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
            <select class="form-control chosen-select"  id="category_id" onchange="getGoods( this )" >
                <option value="0">请选择</option>
            </select>
        </div>
        <div  id="goodslist">

        </div>
        <div class="shop_ppp">
            <!--选择的产品-->
            <ul>

            </ul>
        </div>
    </div>
</div>


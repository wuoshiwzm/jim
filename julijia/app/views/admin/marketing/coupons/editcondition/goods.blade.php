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
            <!--选择的产品 -->
            <ul>
                @foreach( Source_Salerule_FavoutableProduct::where('rule_id',$id)->get() as $row )
                    @if( isset($row->favoutableProductToProductFlat->entity_id) )
                    <li>
                        <dl>
                            <dt><img src="{{getImagesUrl('goods',$row->favoutableProductToProductFlat->entity_id,$row->favoutableProductToProductFlat->small_image)}}"></dt>
                            <dd class="dd_h"><a href="javascript:;">{{$row->favoutableProductToProductFlat->name}}</a></dd>
                            <dd class="dd_size"><font>￥{{$row->favoutableProductToProductFlat->price}}</font></dd>
                            <dd class="dd_add"><a href="javascript:;" onclick="editReItem( this )"><i></i><span>删除</span></a></dd>
                            <input type="hidden" value="{{$row->product_id}}">
                        </dl>
                    </li>
                    @endif
                @endforeach
            </ul>
        </div>

        <div id="oldID">
            <!--删除的id-->
        </div>
    </div>
</div>


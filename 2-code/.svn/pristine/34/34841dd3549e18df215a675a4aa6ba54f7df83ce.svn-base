<h5 class="h5_bottom">物流设置</h5>
<div class="simple-form-field">
    <div class="form-group">
        <label class="col-sm-3 control-label">
            <span class="text-danger ng-binding">*</span>
            <span class="ng-binding">产品运费模板：</span>
        </label>
        <div class="col-sm-9" id="freightinfo">
            <div class="form-control-box">
                <select class="form-control valid w200" name="freight" id="freight" onchange="setFreight( this );" datatype="*|select">
                    <option value="">选择模板</option>
                    @foreach( $freight as $row )
                    <option value="{{$row->id}}" @if(isset($data->freight) && $data->freight == $row->id ) selected="selected" @endif>{{$row->name}}</option>
                   @endforeach
                </select>
                <span class="Validform_checktip"></span>
            </div>
            <!--详细信息展示-->
        </div>
    </div>
</div>
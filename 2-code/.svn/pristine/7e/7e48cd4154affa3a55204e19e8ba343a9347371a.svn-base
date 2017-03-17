<div class="form-group">
    <label class="col-sm-4 control-label">
        <span class="ng-binding">购物数量：</span>
    </label>
    <div class="col-sm-8">
        <div class="form-control-box">
            <select class="form-control valid w130" name="yunsuanfu">
                <option value="<" @if($data->yunsuanfu == '<') selected="selected" @endif>大于</option>
                <option value=">" @if($data->yunsuanfu == '>') selected="selected" @endif>小于</option>
                <option value="=" @if($data->yunsuanfu == '=') selected="selected" @endif>等于</option>
                <option value="<="@if($data->yunsuanfu == '<=') selected="selected" @endif>大于等于</option>
                <option value=">="@if($data->yunsuanfu == '>=') selected="selected" @endif>小于等于</option>
            </select>&nbsp;&nbsp;
            <input type="text"  class="form-control valid w100"  name="value" value="{{$data->value}}" datatype="n1-3" maxlength="3" tipsrmsg="请输入数量" errormsg="数量输入有误">
        </div>
    </div>
</div>
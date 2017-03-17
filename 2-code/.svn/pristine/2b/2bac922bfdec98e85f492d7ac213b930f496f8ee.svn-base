<div class="form-group">
    <label class="col-sm-4 control-label">
        <span class="ng-binding">总重量：</span>
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
            <input type="text"  class="form-control valid w100" name="value" value="{{$data->value}}" datatype="n1-5" maxlength="5" tipsrmsg="请输入总重量" errormsg="总重量输入有误">
        </div>
    </div>
</div>
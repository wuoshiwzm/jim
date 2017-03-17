<div class="form-group">
    <label class="col-sm-4 control-label">
        <span class="ng-binding">购物车小计：</span>
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
            <input type="text"  class="form-control valid w100" name="value" value="{{$data->value}}" datatype="full" maxlength="10" tipsrmsg="请输入1-10位正整数" errormsg="金额为1-10位正整数">&nbsp;&nbsp;元
            <span class="Validform_checktip"></span>
        </div>
    </div>
</div>
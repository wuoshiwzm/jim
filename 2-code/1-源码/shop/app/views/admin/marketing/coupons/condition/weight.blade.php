<div class="form-group">
    <label class="col-sm-4 control-label">
        <span class="ng-binding">总重量：</span>
    </label>
    <div class="col-sm-8">
        <div class="form-control-box">
            <select class="form-control valid w130" name="yunsuanfu">
                <option value="<">大于</option>
                <option value=">">小于</option>
                <option value="=">等于</option>
                <option value="<=">大于等于</option>
                <option value=">=">小于等于</option>
            </select>&nbsp;&nbsp;
            <input type="text"  class="form-control valid w100" name="value" datatype="/^[1-9]\d{0,4}$/" maxlength="5" tipsrmsg="请输入1-5位正整数" errormsg="输入1-5位正整数">
            <span class="Validform_checktip"></span>
        </div>
    </div>
</div>
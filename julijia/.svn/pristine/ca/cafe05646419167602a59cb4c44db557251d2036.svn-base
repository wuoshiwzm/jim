/**
 * 自定义验证规则
 *  z2-4 ：验证中文名称
 *  loucengold：当前楼层
 *  loucengstart:合计
 *  hx-shi  户型-室
 *  hx-ting  户型-厅
 *  hx-wei  户型-卫
 *  loucengold
 */
$.extend($.Datatype, {
        "xiaoqu": function (gets, obj, curform, regxp) {
            var reg1 = regxp["*"];
            var pindex = curform.find("#product_index_id");
            if (reg1.test(gets) && pindex.attr('title') == 1) {
                pindex.show().css('background', '#eb6100');
                return true;
            } else {
                pindex.attr('title', '');
                return false;
            }
        },
        "z2-4": /^[\u4E00-\u9FA5\uf900-\ufa2d]{2,4}$/,
        "phone": function (gets, obj, curform, regxp) {
            var reg1 = regxp["m"];
            sms = curform.find("#sms");
            if (reg1.test(gets)) {
                sms.show().css('background', '#c6c4c4');
                sms.removeAttr("disabled");
                return true;
            }
            return false;
        },
        "loucengold": function (gets, obj, curform, regxp) {
            var reg1 = regxp["n"],
                cuurlfooolr = curform.find('#currentfloor');
            if(parseInt(gets)<=0 ||parseInt(gets)>100){
                obj.attr('errormsg', '楼层不能为负数、大于100、0的数字');
                var objtip = obj.parent().find(".Validform_checktip");
                objtip.text();
                return false;
            }
            if (reg1.test(gets) && gets.length <= 2) {
                if (parseInt(cuurlfooolr.val()) > parseInt(gets)) {
                    obj.attr('errormsg', '楼层不能大于总楼层');
                    var objtip = obj.parent().find(".Validform_checktip");
                    objtip.text();
                    return false;
                }
                return true;
            }
            return false;
        },
        "loucengstart": function (gets, obj, curform, regxp) {
            var reg1 = regxp["n"],
                cuurlfooolr = curform.find('#totalfloor');
            if(parseInt(gets)<=0 || parseInt(gets)>100){
                obj.attr('errormsg', '楼层不能为负数、大于100、0的数字');
                var objtip = obj.parent().find(".Validform_checktip");
                objtip.text();
                return false;
            }

            if (reg1.test(gets) && gets.length <= 2) {
                if (parseInt(cuurlfooolr.val()) < parseInt(gets)) {
                    obj.attr('errormsg', '楼层不能大于总楼层');
                    var objtip = obj.parent().find(".Validform_checktip");
                    objtip.text();
                    return false;
                } else {
                    return true;
                }
                return true;
            }
            var objtip = obj.parent().find(".Validform_checktip").removeClass('Validform_right');
            objtip.text(obj.attr('errormsg'));
            return false;
        },
        "allprice": function (gets, obj, curform, regxp) {
            var reg1 = regxp["n"],
                reg2 = /^[0-9]{2,4}$/;
            if (reg1.test(gets) && reg2.test(gets) && parseInt(gets) > 10) {
                return true;
            }
            return false;
        },
        "eare": function (gets, obj, curform, regxp) {
            var reg2 = /^\d+\.[0-9]{2}$|^\d{1,6}$/;
            if (reg2.test(gets) && parseInt(gets) > 0) {
                return true;
            }
            return false;
        },
        "year": function (gets, obj, curform, regxp) {
                var mydate = new Date();
                var str = mydate.getFullYear();
                var res = /^[0-9]{4}$/;
                if (gets > str || !res.test(gets) || str - 70 > gets) {
                    var objtip = obj.parent().find(".Validform_checktip");
                    objtip.text();
                    return false;
                } else {
                    return true;
                }
        },
        "title": function (gets, obj, curform, regxp)
        {
            if (   gets.length >= 8 &&  gets.length <= 40 )
            {
                return true;

            } else
            {
                var objtip = obj.parent().find(".Validform_checktip");
                objtip.text();
                return false;
            }
        },
        "rent": function (gets, obj, curform, regxp)
        {
            var reg = /^([1-9][0-9]*)?$/;
            if ( reg.test(gets) &&  gets >= 100 &&  gets <= 300000 )
            {
                return true;

            } else
            {
                var objtip = obj.parent().find(".Validform_checktip");
                objtip.text();
                return false;
            }
        },
        "hx": function (gets, obj, curform, regxp)
        {
            var reg = /^[1-9]{1}$/;
            var reg1 = /^[0-9]{1}$/;
            var bedroom = $("#bedroom").val();
            var hall = $("#hall").val();
            var toilet = $("#toilet").val();

            if ( reg.test(bedroom) )
            {
                if( !reg1.test(hall) )
                {
                    var objtip = obj.parent().find(".Validform_checktip");
                    obj.attr('errormsg', '厅必须为数字');
                    objtip.text();
                    return false;
                }
                else if( !reg1.test(toilet) )
                {
                    var objtip = obj.parent().find(".Validform_checktip");
                    obj.attr('errormsg', '卫必须为数字');
                    objtip.text();
                    return false;
                }else
                {
                    return true;
                }

            }else
            {
                var objtip = obj.parent().find(".Validform_checktip");
                obj.attr('errormsg', '居室必须为大于0数字');
                objtip.text();
                return false;
            }
        },
        "lc": function (gets, obj, curform, regxp)
        {
            var reg = /^([1-9][0-9]*)+[0-9]?$/;
            var currentfloor = $("#currentfloor").val();
            var totalfloor = $("#totalfloor").val();
            if ( reg.test(currentfloor) && currentfloor != -0 )
            {
                if( !reg.test(totalfloor) )
                {
                    var objtip = obj.parent().find(".Validform_checktip");
                    obj.attr('errormsg', '总楼层必须为大于0的数字且不能以0开始');
                    objtip.text();
                    return false;
                }else if( parseInt(totalfloor) < parseInt(currentfloor) )
                {
                    var objtip = obj.parent().find(".Validform_checktip");
                    obj.attr('errormsg', '总楼层必须大于所在楼层');
                    objtip.text();
                    return false;
                }
                else
                {
                    return true;
                }

            }else
            {
                var objtip = obj.parent().find(".Validform_checktip");
                obj.attr('errormsg', '请正确填写楼层');
                objtip.text();
                return false;
            }
        },
        "mj": function (gets, obj, curform, regxp)
        {
            var reg = /^([1-9][0-9]*)+(.[0-9]{1,2})?$/;
            if ( reg.test(gets) && gets <=50000 && gets >= 1)
            {
                 return true;

            }else
            {
                var objtip = obj.parent().find(".Validform_checktip");
                objtip.text();
                return false;
            }
        },
        "jg": function (gets, obj, curform, regxp)
        {
            var reg = /^([1-9][0-9]*)+(.[0-9]{1,2})?$/;
            if ( reg.test(gets) && gets <=10000 && gets >= 2)
            {
                return true;
            }else
            {
                var len = gets.toString().split(".");
                if( len.length > 1 && isNaN(gets) == false )
                {
                    if( len[0] <= 1 )
                    {
                        var objtip = obj.parent().find(".Validform_checktip");
                        objtip.text();
                        return false;
                    }
                    
                    if( len[1].length > 2 )
                    {
                        var objtip = obj.parent().find(".Validform_checktip");
                        obj.attr('errormsg', '最多只能填写两位小数');
                        objtip.text();
                        return false;
                    }
                }else
                {
                    if( isNaN(gets) == false )
                    {
                        var objtip = obj.parent().find(".Validform_checktip");
                        obj.attr('errormsg', '售价要大于2万元小于1亿元');
                        objtip.text();
                        return false;

                    }else
                    {
                        var objtip = obj.parent().find(".Validform_checktip");
                        obj.attr('errormsg', '非法字符');
                        objtip.text();
                        return false;
                    }

                }
            }
        }
    }
);




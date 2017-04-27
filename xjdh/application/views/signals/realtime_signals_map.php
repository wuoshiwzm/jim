<div class="main-wrapper">
    <div class="container-fluid">
        <div class="row-fluid ">
            <div class="span12">
                <div class="primary-head">
                    <h3 class="page-header">设备信号管理</h3>
                    <ul class="breadcrumb">
                        <li><a class="icon-home" href="/"></a> <span class="divider"><i
                                        class="icon-angle-right"></i></span></li>
                        <?php foreach ($bcList as $bcObj) { ?>
                            <?php if ($bcObj->isLast) { ?>
                                <li class="active"><?php echo htmlentities($bcObj->title, ENT_COMPAT, "UTF-8"); ?></li>
                            <?php } else { ?>
                                <li><a href='<?php echo htmlentities($bcObj->url, ENT_COMPAT, "UTF-8"); ?>'>
                                        <?php echo htmlentities($bcObj->title, ENT_COMPAT, "UTF-8"); ?>
                                    </a>
                                    <span class="divider"><i class="icon-angle-right"></i></span></li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <br>
        <hr>


        <!--设备类型-->
        <h1>
            <?php echo Defines::$gDevModel[$model] ?>
        </h1>
        <!--先择对应的设备类型-->
        <form class="form-horizontal" onsubmit="return checkForm()">
            <div class="control-group">
                <label class="control-label" style="float: left;">选择设备类型</label>
                <div class="controls" style="margin-left: 20px; float: left;">
                    <select class="chzn-select" data-placeholder="选择设备类型"
                            name='model' id='model'>
                        <option value=''>选择设备类型</option>
                        <?php foreach (Defines::$gDevModel as $key => $val) { ?>
                            <option
                                    value='<?php echo $key; ?>'><?php echo $val; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button class="btn btn-success" type="submit" style="margin-left: 100px;">确认</button>
            </div>
        </form>

        <!--添加普通信号-->
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-head bondi-blue light-gray">
                    <h3>添加信号</h3>
                </div>
                <div class="widget-container">
                    <div>
                        <div>
                            <h3>添加普通信号:</h3>
                        </div>
                        <div class="widget-container">
                            <table
                                    class="table table-bordered responsive table-striped table-sortable">
                                <thead>
                                <tr>
                                    <!--                                <th width="30%">设备类型</th>-->
                                    <th width="15%">信号变量名称</th>
                                    <th width="10%">信号变量单位</th>
                                    <th width="10%">变量类型</th>
                                    <th width="10%">变量中文名</th>
                                    <th width="">描述</th>
                                    <th width="">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <!--                                信号变量名称-->
                                    <td>
                                        <input type="hidden" name='model' id='model' value="<?php echo $model ?>" ?>
                                        <input type="text" class="input desc parameter" name="parameter">
                                    </td>
                                    <!--                                信号变量单位-->
                                    <td>
                                        <select class="chzn-select signal_unit" data-placeholder="选择变量单位"
                                                name='signal_unit' id='signal_unit'>
                                            <option value=''>
                                                选择变量单位
                                            </option>
                                            <option value='1'>无单位
                                            </option>
                                            <option value='2'>℃
                                            </option>

                                        </select>
                                    </td>
                                    <!--                                变量类型-->
                                    <td>
                                        <select class="chzn-select signal_type" data-placeholder="选择标准信号名"
                                                name='signal_type' id='signal_type'>
                                            <option value=''>
                                                选择标准信号变量类型
                                            </option>
                                            <option value='a'>NUL-padded string</option>
                                            <option value='A'>SPACE-padded string</option>
                                            <option value='h'>Hex string, low nibble first</option>
                                            <option value='H'>Hex string, high nibble first</option>
                                            <option value='c'>signed char</option>
                                            <option value='C'>unsigned char</option>
                                            <option value='s'>signed short (always 16 bit, machine byte order)</option>
                                            <option value='S'>unsigned short (always 16 bit, machine byte order)
                                            </option>
                                            <option value='n'>unsigned short (always 16 bit, big endian byte order)
                                            </option>
                                            <option value='v'>unsigned short (always 16 bit, little endian byte order)
                                            </option>
                                            <option value='i'>signed integer (machine dependent size and byte order)
                                            </option>
                                            <option value='I'>unsigned integer (machine dependent size and byte order)
                                            </option>
                                            <option value='l'>signed long (always 32 bit, machine byte order)</option>
                                            <option value='L'>unsigned long (always 32 bit, machine byte order)</option>
                                            <option value='N'>unsigned long (always 32 bit, big endian byte order)
                                            </option>
                                            <option value='V'>unsigned long (always 32 bit, little endian byte order)
                                            </option>
                                            <option value='f'>float (machine dependent size and representation)</option>
                                            <option value='d'>double (machine dependent size and representation)
                                            </option>
                                            <option value='x'>NUL byte</option>
                                            <option value='X'>Back up one byte</option>
                                            <option value='@'>NUL-fill to absolute position</option>
                                        </select>
                                    </td>
                                    <!--                                变量中文名-->
                                    <td>
                                        <input type="text" class="input desc signal_name" name="signal_name">
                                    </td>
                                    <!--                                描述-->
                                    <td>
                                        <textarea class="span12 signal_desc" name='signal_desc'
                                                  id='signal_desc'></textarea>
                                    </td>

                                    <input type="hidden" class="input desc type" value=1>
                                    <td>
                                        <input type="submit"
                                               class="btn btn-success add_realtime_signal" value="添加信号"/>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>

                    <!--添加循环体信号-->
                    <div>
                        <div>
                            <h3>添加循环体信号:</h3>
                        </div>
                        <div class="widget-container">
                            <table
                                    class="table table-bordered responsive table-striped table-sortable">
                                <thead>
                                <tr>
                                    <!--                                <th width="30%">设备类型</th>-->
                                    <th width="70%">选择信号循环体</th>
                                    <th width="">操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <!--                                信号变量单位-->
                                    <td>
                                        <input type="hidden" class="model" value="<?php echo $model ?>">
                                        <select class="chzn-select signal_unit span20 add_realtime_loop_id"
                                                data-placeholder="选择循环体变量"
                                                name='add_realtime_loop_id'>
                                            <option value=''>
                                                选择循环体变量
                                            </option>
                                            <?php foreach ($loops as $loop) { ?>
                                                <option value='<?php echo $loop->id ?>'>
                                                    <?php echo $loop->model ?> - <?php echo $loop->name ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </td>

                                    <td>
                                        <input type="submit"
                                               class="btn btn-success add_realtime_loop" value="添加信号"/>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--管理-->
        <div class="row-fluid">
            <div class="span12">
                <div class="content-widgets light-gray">
                    <div class="widget-head bondi-blue">
                        <h3>管理信号名称</h3>
                    </div>
                    <div class="widget-container">
                        <table
                                class="table table-bordered responsive table-striped table-sortable">
                            <thead>
                            <tr>
                                <th width="5%">id</th>
                                <th width="13%">信号变量名称</th>
                                <th width="18%">变量中文名</th>
                                <th width="10%">信号变量单位</th>
                                <th width="10%">变量类型</th>
                                <th width="">描述</th>
                                <th width="10%">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($signals as $s) { ?>
                                <?php if (!empty($s->loop_id)) { ?>
                                    <tr>
                                        <td><h3 class="id"><?php echo $s->id ?></h3></td>
                                        <td>***循环信号</td>
                                        <td colspan="4">
                                            <input type="hidden" class="model" value="<?php echo $model ?>">
                                            <select class="chzn-select signal_unit span20 update_realtime_loop_id"
                                                    data-placeholder="选择循环体变量"
                                                    name='update_realtime_loop_id'>
                                                <option value=''>
                                                    选择循环体变量
                                                </option>
                                                <?php foreach ($loops as $loop) { ?>
                                                    <option value='<?php echo $loop->id ?>'
                                                        <?php if ($loop->id == $s->loop_id) { ?>
                                                            selected="selected"
                                                        <?php } ?>>
                                                        <?php echo $loop->model ?> - <?php echo $loop->name ?>
                                                    </option>
                                                <?php } ?>
                                            </select>

                                        </td>
                                        <td>
                                            <input type="submit" class="btn btn-primary update_realtime_loop"
                                                   value="更改">
                                            <input type="submit" class="btn btn-danger delete_realtime_signal"
                                                   value="删除">
                                        </td>
                                    </tr>

                                <?php } else { ?>
                                    <tr>
                                        <td>
                                            <h3 class="id"><?php echo $s->id ?></h3>
                                        </td>
                                        <td>
                                            <input type="text" class="input parameter span12"
                                                   value="<?php echo $s->parameter ?>">
                                        </td>
                                        <!-- 变量中文名-->
                                        <td>
                                            <input type="text" class="input signal_name_update span15"
                                                   value="<?php echo $s->name ?>">
                                        </td>

                                        <td>
                                            <select class="chzn-select signal_unit_update span12"
                                                    data-placeholder="选择变量单位"
                                                    name='signal_unit_update'>

                                                <option value='1' <?php if ($s->unit == 1) {
                                                    echo "selected=" . "selected";
                                                } ?>>无单位
                                                </option>
                                                <option value='2' <?php if ($s->unit == 2) {
                                                    echo "selected=" . "selected";
                                                } ?>>℃
                                                </option>
                                            </select>
                                        </td>
                                        <!--                                   标准信号变量类型 -->
                                        <td>
                                            <select class="chzn-select signal_type_update" data-placeholder="选择标准信号变量类型"
                                                    name='signal_type_update'>
                                                <option value='<?php echo $s->type; ?>'>
                                                    <?php echo $this->mp_extra->getRealtimeSignalType($s->type); ?>
                                                </option>
                                                <option value='a'>NUL-padded string</option>
                                                <option value='A'>SPACE-padded string</option>
                                                <option value='h'>Hex string, low nibble first</option>
                                                <option value='H'>Hex string, high nibble first</option>
                                                <option value='c'>signed char</option>
                                                <option value='C'>unsigned char</option>
                                                <option value='s'>signed short (always 16 bit, machine byte order)
                                                </option>
                                                <option value='S'>unsigned short (always 16 bit, machine byte order)
                                                </option>
                                                <option value='n'>unsigned short (always 16 bit, big endian byte order)
                                                </option>
                                                <option value='v'>unsigned short (always 16 bit, little endian byte
                                                    order)
                                                </option>
                                                <option value='i'>signed integer (machine dependent size and byte order)
                                                </option>
                                                <option value='I'>unsigned integer (machine dependent size and byte
                                                    order)
                                                </option>
                                                <option value='l'>signed long (always 32 bit, machine byte order)
                                                </option>
                                                <option value='L'>unsigned long (always 32 bit, machine byte order)
                                                </option>
                                                <option value='N'>unsigned long (always 32 bit, big endian byte order)
                                                </option>
                                                <option value='V'>unsigned long (always 32 bit, little endian byte
                                                    order)
                                                </option>
                                                <option value='f'>float (machine dependent size and representation)
                                                </option>
                                                <option value='d'>double (machine dependent size and representation)
                                                </option>
                                                <option value='x'>NUL byte</option>
                                                <option value='X'>Back up one byte</option>
                                                <option value='@'>NUL-fill to absolute position</option>
                                            </select>
                                        </td>

                                        <!--                                    描述-->
                                        <td>
                                    <textarea class="span12 signal_desc_update" name='signal_desc_update'
                                              id='signal_desc'><?php echo $s->desc ?></textarea>
                                        </td>

                                        <td>
                                            <input type="submit" class="btn btn-primary update_realtime_signal"
                                                   value="更改">
                                            <input type="submit" class="btn btn-danger delete_realtime_signal"
                                                   value="删除">
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <hr>

        <br>
        <br>

        <!--        添加循环体-->
        <div class="row-fluid">
            <div class="span12">
                <div class="content-widgets light-gray">
                    <div class="widget-head bondi-blue">
                        <h3>配置信号循环体</h3>
                    </div>

                    <div class="widget-container">
                        <div class="control-group">

                            <div>
                                <label class="control-label" style="float: left;">循环体命名(可任意命名)</label>
                                <div class="controls" style="margin-left: 20px; float: left;">
                                    <input type="text" class="input desc loop_name" name="loop_number">
                                </div>
                            </div>

                            <div>
                                <label class="control-label" style="float: left;">循环类型</label>
                                <div class="controls" style="margin-left: 20px; float: left;">
                                    <select name="loop_type" id="" class="loop_type">
                                        <option value="1">固定数字</option>
                                        <option value="2">变量名（*变量名务必填写正确，否则影响所有数据显示）</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="control-label" style="float: left;">循环次数（对应数字或变量）</label>

                                <div class="controls" style="margin-left: 20px; float: left;">
                                    <input type="hidden" class="model" value="<?php echo $model ?>">
                                    <input type="text" class="input desc loop_number" name="loop_number">
                                </div>
                            </div>

                            <button class="btn btn-success add_loop" type="submit"
                                    style="margin-left: 100px;">确认添加
                            </button>
                        </div>

                        <hr>
                        <table class="table table-bordered responsive table-striped table-sortable">
                            <thead>
                            <tr>
                                <!--                                <th width="30%">设备类型</th>-->
                                <th width="28%">循环体名</th>
                                <th width="28%">循环体类型</th>
                                <th width="28%">循环次数(数字或变量名)</th>

                                <th width="15">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($loops as $loop) { ?>
                                <tr>
                                    <!--                                循环体名-->
                                    <td>
                                        <input type="hidden" class="input desc loop_id" value="<?php echo $loop->id ?>">
                                        <input type="text" class="input desc loop_name" name="loop_name"
                                               value="<?php echo $loop->name ?>">
                                    </td>
                                    <!--                                循环体类型-->
                                    <td>
                                        <input type="hidden" name='model_loop' id='model_loop'
                                               value="<?php echo $loop->times_type ?>" ?>
                                        <select name="loop_type" class="loop_type" id="">
                                            <option value="1">固定数字</option>
                                            <option value="2">变量名（*变量名务必填写正确，否则影响所有数据显示）</option>
                                        </select>
                                    </td>
                                    <!--                                循环次数-->
                                    <td>
                                        <div class="controls" style="margin-left: 20px; float: left;">
                                            <input type="text" class="input desc loop_number" name="loop_number"
                                                   value="<?php echo $loop->times ?>">
                                        </div>
                                    </td>

                                    <td>
                                        <input type="submit"
                                               class="btn btn-primary update_loop" value="更新"/>

                                        <input type="submit"
                                               class="btn btn-danger delete_loop" value="删除"/>

                                        <input type="submit"
                                               class="btn btn-success config_loop" value="配置"/>
                                    </td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>



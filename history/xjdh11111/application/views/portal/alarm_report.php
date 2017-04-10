<div class="main-wrapper">
	<div class="container-fluid">
		<div class="row-fluid ">
			<div class="span12">
				<div class="primary-head">
					<h3 class="page-header">管理面板</h3>
					<ul class="breadcrumb">
						<li><a class="icon-home" href="/"></a> <span class="divider"><i
								class="icon-angle-right"></i></span></li>
						<?php foreach ($bcList as $bcObj){?>
						<?php if($bcObj->isLast){?>	
						<li class="active"><?php echo htmlentities($bcObj->title,ENT_COMPAT,"UTF-8");?></li>
						<?php }else {?>
						<li><a href='<?php echo htmlentities($bcObj->url,ENT_COMPAT,"UTF-8");?>'><?php echo htmlentities($bcObj->title,ENT_COMPAT,"UTF-8");?></a>
							<span class="divider"><i class="icon-angle-right"></i></span></li>
						<?php }?>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class='span12'>
				<div class="tab-widget">
					<ul class="nav nav-tabs">
                	   <li class="active"><a href="/portal/alarm_report"><i class="icon-tasks"></i>告警统计报表</a></li>
                	   <li><a href="/portal/alarm_rank"><i class="icon-tasks"></i>告警排名报表</a></li>
                	   <li><a href="/portal/fault_report"><i class="icon-tasks"></i>停电故障报表</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<div class="content-widgets light-gray">
					<div class="widget-head bondi-blue">
						<h3>
							<i class="icon-search"></i> 综合查询
						</h3>
					</div>
					<div class="widget-container">
						<form class="form-horizontal">
							<div class="control-group">
								<label class="control-label" style="float: left;">分公司</label>
								<div class="controls" style="margin-left: 20px; float: left;">
									<select class="chzn-select" data-placeholder="选择分公司"
										name='selCity' id='selCity'>
										<?php if($userObj->user_role == "admin"){?>
    							        <option value=''>全网</option>
    							        <?php foreach (Defines::$gCity as $cityKey=>$cityVal){?>
							            <option value='<?php echo $cityKey;?>'
											<?php  if($cityCode == $cityKey){?> selected="selected"
											<?php }?>><?php echo $cityVal;?>本地网</option>
    							        <?php }?>
    							        <?php }else if($userObj->user_role == "city_admin" || $userObj->user_role == "operator"){ ?>
    							        <option value="<?php echo $userObj->city_code; ?>">
    							            <?php echo Defines::$gCity[$userObj->city_code]; ?></option>
    							        <?php } ?>
    								</select>
								</div>
								<label class="control-label" style="float: left;">区域</label>
								<div class="controls" style="margin-left: 20px; float: left;">
									<select class="chzn-select" data-placeholder="选择区域"
										name='selCounty' id='selCounty'>
										<?php if($userObj->user_role == "city_admin"||$userObj->user_role == "operator"){ ?>
											<option value="0">所有区域</option>
											<?php foreach (Defines::$gCounty[$userObj->city_code] as $key=> $val){?>
										    <option value='<?php echo $key;?>'
												<?php if($countyCode == $key){?>selected="selected"<?php }?>>
												<?php echo $val;?></option>
									        <?php } ?>
								        <?php }else{ ?>
										    <option value="0">所有区域</option>
										    <?php if(count($cityCode)) foreach (Defines::$gCounty[$cityCode] as $key=> $val){?>
									            <option value='<?php echo $key;?>'
											    <?php if($countyCode == $key){?> selected="selected" <?php }?>>
											    <?php echo $val;?></option>
								            <?php }?>   
								        <?php }?>
									</select>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" style="float: left;">所属局站</label>
								<div class="controls" style="margin-left: 20px; float: left;">
									<select class="chzn-select" data-placeholder="选择局站"
										name='selSubstation' id='selSubstation'>
										<option value=''>所有局站</option>
										<?php if(isset($substationId)) {?>
									       <?php foreach ($substationList as $substationObj){?>
									       <option <?php if($substationObj->id == $substationId){?> selected="selected" <?php }?> value="<?php echo $substationObj->id;?>"><?php  echo htmlentities($substationObj->name,ENT_COMPAT,"UTF-8"); ?></option>	
									        <?php }?>	
									    <?php }?>	
									</select>
								</div>
								<label class="control-label" style="float: left;">所属机房</label>
								<div class="controls" style="margin-left: 20px; float: left;">
									<select class="chzn-select" data-placeholder="选择机房"
										name='selRoom' id='selRoom'>
										<option value=''>所有机房</option>
										<?php if(isset($roomId)) {?>
    									    <?php foreach ($roomList as $roomObj){?>
    									    <option <?php if($roomObj->id == $roomId){?> selected="selected" <?php }?> 
    									      value="<?php echo $roomObj->id; ?>"><?php echo htmlentities($roomObj->name,ENT_COMPAT,"UTF-8"); ?></option>	
    									    <?php }?>	
									    <?php }?>
									</select>
								</div>
							</div>
							
							<div class="control-group">
								<label class="control-label" style="float: left;">告警级别</label>
								<div class="controls" style="margin-left: 20px; float: left;">
									<select class="chzn-select" data-placeholder="选择告警级别"
										name='level' id='selLevel'>
										<option value='' >所有级别</option>
										<option <?php if($level == 1){?> selected="selected" <?php } ?>
											value='1'>一级</option>
										<option <?php if($level == 2){?> selected="selected" <?php } ?>
											value='2'>二级</option>
										<option <?php if($level == 3){?> selected="selected" <?php } ?>
											value='3'>三级</option>
										<option <?php if($level == 4){?> selected="selected" <?php } ?>
											value='4'>四级</option>
									</select>
								</div>
								<label class="control-label" style="float: left;">设备类型</label>
								<div class="controls" style="margin-left: 20px; float: left;">
									<select class="chzn-select" data-placeholder="选择设备类型"
										name='selDevModel' id='selDevModel'>
										<option value=''>所有类型</option>
										<?php foreach($devCategoryName as $key=>$val){?>
										<option <?php if($key == $selDevModel){?> selected="selected" <?php }?>
										value='<?php echo $key; ?>'><?php echo htmlentities($val, ENT_COMPAT, "UTF-8"); ?></option>	
										<?php }?>
									</select>
								</div>
							</div>
							<div class="control-group">
							
							<label class="control-label" style="float: left;">告警状态</label>
								<div class="controls" style="margin-left: 20px; float: left;">
									<select class="chzn-select" data-placeholder="选择告警状态"
										name='selStatus[]'  id='selStatus[]'  multiple="multiple">
<!-- 										<option value='all'>所有状态</option> -->
										<option value='unresolved' <?php if(in_array('unresolved', $statusArr)){?> selected="selected" <?php }?>>正在告警</option>
										<option value='solved' <?php if(in_array('solved', $statusArr)){?> selected="selected" <?php }?>>告警结束未确认恢复</option>
										<option value='confirmed' <?php if(in_array('confirmed', $statusArr)){?> selected="selected" <?php }?>>已确认恢复</option>
									</select>
								</div>
								<label class="control-label" style="float: left;">上报时间段</label>
								<div class="controls" style="margin-left: 20px; float: left;">
									<input type="text" class='form-control date-range-picker' name='reportDate' value="<?php if(isset($reportDate)) echo htmlentities($reportDate, ENT_COMPAT, "UTF-8"); ?>" />
								</div>
							</div>
							<div class="control-group">
					          <label class="control-label" style="float: left;">信号名称</label>
								<div class="controls" style="margin-left: 20px; float: left;">
									<select class="chzn-select" data-placeholder="信号名称"
										name='selSignalName'  id='selSignalName'>
										<option value=''>所有名称</option>
										<?php foreach($signalNameList as $signalName){?>
									    <option value='<?php echo htmlentities($signalName, ENT_COMPAT, "UTF-8"); ?>' <?php if(isset($selSignalName) && $signalName == $selSignalName){?> selected="selected" <?php }?> ><?php echo htmlentities($signalName, ENT_COMPAT, "UTF-8"); ?></option>
									    <?php }?>	   
									</select>
								</div>
							<label class="control-label" style="float: left;">数据粒度</label>
								<div class="controls" style="margin-left: 20px; float: left;">
									<select class="chzn-select" data-placeholder="选择能耗类型"
										name='ecGroup' id='ecGroup'>
										<?php foreach(Defines::$gAlarmGroup as $key=> $val){?>
										    <option  <?php if($ecGroup == $key){?> selected="selected"  <?php }?> value="<?php echo $key; ?>"><?php echo htmlentities($val,ENT_COMPAT,"UTF-8");?></option>	
										<?php } ?>

									</select>
								</div>
							</div>	
							<div class="control-group">
							<label class="control-label" style="float: left;">严障告警</label>
								<div class="controls" style="margin-left: 20px; float: left;">
										<?php foreach(Defines::$gSeriousAlarm as $key=> $val){?>
										    <label style="float:left;width:120px;"><input type="checkbox" name="ecType[]"  <?php if(in_array($key, $ecType)){?> checked="checked"  <?php }?> value="<?php echo $key; ?>" />&nbsp;&nbsp;&nbsp;&nbsp;<?php echo htmlentities($val,ENT_COMPAT,"UTF-8");?></label>	
										<?php } ?>
								</div>
								
							</div>
							<div class="form-actions">
								<button class="btn btn-success" type="submit">查询</button>	
								<button class="btn btn-success" name="export" value="exporttoexcel" type="submit" >导出报表</button>	
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span12">
				<div class="content-widgets light-gray">
					<div class="widget-head bondi-blue">
						<h3>
						  <i class="icon-list"></i>查询结果</h3>
					</div>
					<div class="widget-container">
						
						<table
							class="table table-bordered responsive table-striped table-sortable">
							<thead>
								<tr>							
									<th>序号</th>
									<th>分公司</th>
									<th>区域</th>
									<th>局站</th>
									<th>机房</th>
									<th>设备类型</th>
									<th>设备名称</th>
									<th>信号名称</th>
									<th>信号Id</th>
									<th>级别</th>
									<th>描述</th>
									<th>上报时间</th>									
									<th>恢复时间</th>
									<th>确认时间</th>
									<th>当前状态</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody id="tbAlarm">
							<?php $i = $offset + 1; foreach ($alarmList as $alarmObj){?>
							<tr>
						         <?php if ($alarmObj->status == 'solved' && $alarmObj->confirm_datetime == '0000-00-00 00:00:00') {?>	
						        <input type="checkbox" class="nameCheckbox"  name="checkbox" value="<?php echo htmlentities($alarmObj->id,ENT_COMPAT,"UTF-8");?>" />
						        <?php }?>
						        </td>
								<td><?php echo $i++;?></td>
								<td><?php echo htmlentities(Defines::$gCity[$alarmObj->city_code],ENT_COMPAT,"UTF-8"); ?></td>
								<td><?php echo htmlentities(Defines::$gCounty[$alarmObj->city_code][$alarmObj->county_code],ENT_COMPAT,"UTF-8");?></td>
								<td><?php echo htmlentities($alarmObj->substation_name,ENT_COMPAT,"UTF-8");?></td>
								<td><?php echo htmlentities($alarmObj->room_name,ENT_COMPAT,"UTF-8");?></td>
								<td><?php echo $devModelName[$alarmObj->dev_model]; ?></td>
    							<td><a href='/portal/realtimedata/<?php echo $alarmObj->room_id ?>/<?php echo $devModelGroup[$alarmObj->dev_model]; ?>/<?php echo $alarmObj->data_id; ?>'><?php echo htmlentities($alarmObj->dev_name,ENT_COMPAT,"UTF-8");?></a></td>
    							<td><?php echo htmlentities($alarmObj->signal_name,ENT_COMPAT,"UTF-8");?></td>
    							<td><?php echo htmlentities($alarmObj->signal_id,ENT_COMPAT,"UTF-8");?></td>
    							<td><?php switch ($alarmObj->level) {
						            case 1:
						                echo '<span class="brown badge ">一级</span>';
						                break;
						            case 2:
						                echo '<span class="badge orange">二级</span>';
						                break;
						            case 3:
						                echo '<span class="dark-yellow badge ">三级</span>';
						                break;
						            case 4:
						            default:
						                echo '<span class="badge blue">四级</span>';
						                break;
						        } ?></td>
								<td><?php echo htmlentities($alarmObj->subject,ENT_COMPAT,"UTF-8");?></td>
								<td><?php if($alarmObj->added_datetime != '0000-00-00 00:00:00'){?>
								<?php echo htmlentities($alarmObj->added_datetime,ENT_COMPAT,"UTF-8");?>
								<?php }?></td>									
	                            <td><?php if($alarmObj->restore_datetime != '0000-00-00 00:00:00'){?>
	                            <?php echo htmlentities($alarmObj->restore_datetime,ENT_COMPAT,"UTF-8");?>
	                            <?php }?></td>
								<td><?php if($alarmObj->confirm_datetime != '0000-00-00 00:00:00'){?>
								<?php echo htmlentities($alarmObj->confirm_datetime,ENT_COMPAT,"UTF-8");?>
								<?php }?></td>
									<td><?php
								        
								        if ($alarmObj->status == 'unresolved')
								            echo '<span class="label label-important">正在告警</span>';
								        else if ($alarmObj->confirm_datetime != '0000-00-00 00:00:00')
							                echo '<span class="label label-info">已确认</span>';
							            else if ($alarmObj->status == 'solved')
							                    echo '<span class="label label-success">已恢复</span>';
								        ?></td>
									<td>
									    <?php if ($alarmObj->status == 'unressolved') {?>
										<button alert_id='<?php echo htmlentities($alarmObj->id,ENT_COMPAT,"UTF-8");?>' type="button"
											class="btn btn-warning block-alert">
											<i class="icon-remove-sign"></i> 屏蔽
										</button>
										<?php }else{?>
													
										<?php }?>
										  <?php if ($alarmObj->status == 'solved' && $alarmObj->confirm_datetime == '0000-00-00 00:00:00') {?>										
										<button alert_id='<?php echo htmlentities($alarmObj->id,ENT_COMPAT,"UTF-8");?>' type="button"
											class="btn btn-warning restore-alert">
											<i class="icon-remove-sign"></i> 确认结束告警
										</button>
										<?php }else{?>
													
										<?php }?>
										<?php if ($alarmObj->status == 'solved' && $alarmObj->confirm_datetime != '0000-00-00 00:00:00') {?>
											<i >已确认结束告警</i> 
										<?php }else{?>
													
										<?php }?>
									</td>
								</tr>
							<?php }?>
							</tbody>
						</table>
						<div class="row-fluid">
							<div class="span6">
								<div class="dataTables_info">总共 <?php echo $alarmCount;?> 条告警，显示<?php echo '第 '.($offset+1).' 至 '.($offset + count($alarmList));?> 条</div>
							</div>
							<div class="span6">
						      <?php echo $pagination;?>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
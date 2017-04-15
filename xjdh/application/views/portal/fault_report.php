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
                	   <li><a href="/portal/alarm_report"><i class="icon-tasks"></i>告警统计报表</a></li>
                	   <li><a href="/portal/alarm_rank"><i class="icon-tasks"></i>告警排名报表</a></li>
                	   <li class="active"><a href="/portal/fault_report"><i class="icon-tasks"></i>停电故障报表</a></li>
                	   <li><a href="/portal/alarm_type"><i class="icon-tasks"></i>告警类别报表</a></li>
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
							</div>
				            <div class="control-group">
								<label class="control-label" style="float: left;">类型</label>
								<div class="controls" style="margin-left: 20px; float: left;">
										<label style="float:left;width:100px;"><input type="radio" name="ecType"  <?php if($ecType == '0'||$ecType == null){?> checked="checked"  <?php }?> value="0" />&nbsp;&nbsp;&nbsp;&nbsp;停电</label>
									    <label style="float:left;width:100px;"><input type="radio" name="ecType"  <?php if($ecType == '1'){?> checked="checked"  <?php }?> value="1" />&nbsp;&nbsp;&nbsp;&nbsp;故障</label>		
								</div>
								<label class="control-label" style="float: left;">汇总类别</label>
								<div class="controls" style="margin-left: 20px; float: left;">
										<label style="float:left;width:100px;"><input type="radio" name="category"  <?php if($category == '0'||$ecType == null){?> checked="checked"  <?php }?> value="0" />&nbsp;&nbsp;&nbsp;&nbsp;次数</label>
									    <label style="float:left;width:100px;"><input type="radio" name="category"  <?php if($category == '1'){?> checked="checked"  <?php }?> value="1" />&nbsp;&nbsp;&nbsp;&nbsp;时长</label>		
								</div>
							</div>
							<div class="control-group">
							<label class="control-label" style="float: left;">上报时间段</label>
								<div class="controls" style="margin-left: 20px; float: left;">
									<input type="text" class='form-control date-range-picker' name='reportDate' value="<?php if(isset($reportDate)) echo htmlentities($reportDate, ENT_COMPAT, "UTF-8"); ?>" />
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
		   <?php if($category){?>		
						<table
							class="table table-bordered responsive table-striped table-sortable">
						<?php if($category == '0'){?>
							<thead>
								<tr>							
									<th>序号</th>
									<th>分公司</th>
									<th>区域</th>
									<th>局站</th>
									<th>告警数量</th>
								</tr>
							</thead>
							<tbody id="tbAlarm">
							<?php $i = $offset + 1; foreach ($FaultList as $FaultObj){?>
							<tr>
						        </td>
								<td><?php echo $i++;?></td>
								<td><?php echo htmlentities(Defines::$gCity[$FaultObj->city_code],ENT_COMPAT,"UTF-8"); ?></td>
								<td><?php echo htmlentities(Defines::$gCounty[$FaultObj->city_code][$FaultObj->county_code],ENT_COMPAT,"UTF-8");?></td>
								<td><?php echo htmlentities($FaultObj->subname,ENT_COMPAT,"UTF-8");?></td>
								<td><?php echo htmlentities($FaultObj->subAlarmCount,ENT_COMPAT,"UTF-8");?></td>
								</tr>
							<?php }?>
							</tbody>
						<?php }?>
						<?php if($category == '1'){?>
							<thead>
								<tr>							
									<th>序号</th>
									<th>分公司</th>
									<th>区域</th>
									<th>局站</th>
									<th>时长</th>
								</tr>
							</thead>
							<tbody id="tbAlarm">
							<?php $i = $offset + 1; foreach ($FaultList as $FaultObj){?>
							<tr>
						        </td>
								<td><?php echo $i++;?></td>
								<td><?php echo htmlentities(Defines::$gCity[$FaultObj->city_code],ENT_COMPAT,"UTF-8"); ?></td>
								<td><?php echo htmlentities(Defines::$gCounty[$FaultObj->city_code][$FaultObj->county_code],ENT_COMPAT,"UTF-8");?></td>
								<td><?php echo htmlentities($FaultObj->subname,ENT_COMPAT,"UTF-8");?></td>
								<td><?php echo floor($FaultObj->sum/3600);?>时<?php echo floor($FaultObj->sum%3600/60);?>分<?php echo $FaultObj->sum%3600%60;?>秒</td>
								</tr>
							<?php }?>
							</tbody>
						<?php }?>		
							
						</table>
						<div class="row-fluid">
							<div class="span6">
                                                            总计 <?php echo $FaultCount;?> 条记录
                            </div>
							<div class="span6">
                            <?php echo $pagination;?>
                            </div>
						</div>
				<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="alert" id="<?php echo $dataObj->data_id;?>-status"
	style="display: none;">
	<i class="icon-exclamation-sign"></i><strong>警告！</strong>
	设备数据异常，当前显示最后一次数据。最后数据时间：<span></span>
</div>
<div class='row-fluid rt-data' data_id='<?php echo $dataObj->data_id;?>' type="<?php echo $type; ?>"
	data_type="<?php echo $dataObj->model; ?>">
	<table
		class="table table-bordered table-striped responsive table-sortable">
		<tr>
			<th>类型</th>
			<th>数据</th>
			<th>最后数据时间</th>
			<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
			<th>设置告警规则</th>
			<?php } ?>
	   </tr>
	   <tr>
			<td>整组电压</td>
			<td class="group_v"></td>
			<td class="update_datetime"></td>
			<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
			<td class="hasThreshold"><button
		data_id='<?php echo $dataObj->data_id;?>'
		model='<?php echo $dataObj->model;?>' field="group_voltage"
		class="btn btn-warning setThreshold">设置阈值</button></td>
		    <?php } ?>
		</tr>
	</table>	
	<?php 
   ///44代表蓄电池前4后4接法
   if($type == "44" || $type == "44i"){?>
    <h5>第一组</h5>
	<table
		class="table table-bordered table-striped responsive table-sortable"
		id="bat_voltage_<?php echo $dataObj->data_id;?>">
		<thead>
			<tr>
		    <?php for($z=0;$z<4;$z++){ ?>
				<th>节号</th>
				<th>电压</th>
				<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
	            <th>设置告警规则</th>
	            <?php } ?>
            <?php } ?>
		    </tr>
		</thead>
		<tbody>
			<tr>
                <?php for($z=0;$z<4;$z++){ ?>
				<td><?php echo $z+1; ?></td>
		        <td class='bat_num<?php echo $z; ?>'><span></span>&nbsp;</td>
				<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
				<td class="hasThreshold"><button
				data_id='<?php echo $dataObj->data_id;?>'
				field="battery_<?php echo $z; ?>_value"
				class="btn btn-warning setThreshold">设置阈值</button></td>
				<?php } ?>
				<?php } ?>
			</tr>
			<tr>		
    			<?php for($z=20;$z<24;$z++){ ?>
    			<td><?php echo $z+1; ?></td>
    	        <td class='bat_num<?php echo $z; ?>'><span></span>&nbsp;</td>
    			<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
    			<td class="hasThreshold"><button
    			data_id='<?php echo $dataObj->data_id;?>'
    			field="battery_<?php echo $z; ?>_value"
    			class="btn btn-warning setThreshold">设置阈值</button></td>
    			<?php } ?>
    			<?php } ?>
    	    </tr>
		</tbody>
	</table>
	<h5>第二组</h5>
	<table
		class="table table-bordered table-striped responsive table-sortable"
		id="bat_voltage2_<?php echo $dataObj->data_id;?>">
		<thead>
			<tr>
			<?php for($z=0;$z<4;$z++){ ?>
				<th>节号</th>
				<th>电压</th>
				<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
				<th>设置告警规则</th>
				<?php } ?>
			<?php } ?>
			</tr>
		</thead>
		<tbody>
			<tr>		
			<?php for($z=0;$z<4;$z++){ ?>
				<td><?php echo $z+1; ?></td>
				<td class='bat_num<?php echo $z; ?>'><span></span>&nbsp;</td>
				<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
				<td class="hasThreshold"><button
				data_id='<?php echo $dataObj->data_id;?>'
				field="battery_<?php echo $z; ?>_value"
				class="btn btn-warning setThreshold">设置阈值</button></td>
				<?php } ?>
				<?php } ?>
			</tr>
			<tr>		
				 <?php for($z=20;$z<24;$z++){ ?>
				<td><?php echo $z+1; ?></td>
				<td class='bat_num<?php echo $z; ?>'><span></span>&nbsp;</td>
				<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
				<td class="hasThreshold"><button
				data_id='<?php echo $dataObj->data_id;?>'
				field="battery_<?php echo $z; ?>_value"
				class="btn btn-warning setThreshold">设置阈值</button></td>
				<?php } ?>
				<?php } ?>
			</tr>
		</tbody>
	</table>
    <?php }else if($type == "11"){///11代表蓄电池11节接法?>
    <h5>第一组</h5>
	<table
		class="table table-bordered table-striped responsive table-sortable"
		id="bat_voltage_<?php echo $dataObj->data_id;?>">
		<thead>
			<tr>
			<?php for($z=0;$z<4;$z++){ ?>
				<th>节号</th>
				<th>电压</th>
    			<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
    			<th>设置告警规则</th>
    			<?php } ?>
    		<?php } ?>
    		</tr>
		</thead>
		<tbody>		
				 <?php for($z=0; $z<12; $z++){ 
				     if($z%4 == 0){
				         echo "<tr>";
				     }
				 ?>
				 <?php if($z < 11){ ?>		 
				<td><?php echo $z+1; ?></td>
				<td class='bat_num<?php echo $z; ?>'><span></span>&nbsp;</td>
				<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
				<td class="hasThreshold"><button
				data_id='<?php echo $dataObj->data_id;?>'
				field="battery_<?php echo $z; ?>_value"
				class="btn btn-warning setThreshold">设置阈值</button></td>
				<?php }
        			 }else{ ?>
        			<td></td><td></td>
        			<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
        			<td></td>
        			<?php }?>
				<?php } 
                    if($z%4 == 3)
                        echo "</tr>";
				 } ?>
		</tbody>
	</table>
	<h5>第二组</h5>
	<table
		class="table table-bordered table-striped responsive table-sortable"
		id="bat_voltage2_<?php echo $dataObj->data_id;?>">
		<thead>
			<tr>
				<?php for($z=0;$z<4;$z++){ ?>
				<th>节号</th>
				<th>电压</th>
				<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
				<th>设置告警规则</th>
				<?php } ?>
			<?php } ?>
			</tr>
		</thead>
		<tbody>	
			<?php for($z=0; $z<12; $z++){ 
				     if($z%4 == 0){
				         echo "<tr>";
				     }
				 ?>
				 <?php if($z < 11){ ?>		 
				<td><?php echo $z+1; ?></td>
				<td class='bat_num<?php echo $z; ?>'><span></span>&nbsp;</td>
				<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
				<td class="hasThreshold"><button
				data_id='<?php echo $dataObj->data_id;?>'
				field="battery_<?php echo $z; ?>_value"
				class="btn btn-warning setThreshold">设置阈值</button></td>
				<?php }
        			 }else{ ?>
        			<td></td><td></td>
        			<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
        			<td></td>
        			<?php }?>
				<?php } 
                    if($z%4 == 3)
                        echo "</tr>";
				 } ?>
		</tbody>
	</table>
	<?php }else{ ?>
			<table
		class="table table-bordered table-striped responsive table-sortable"
		id="bat_voltage_<?php echo $dataObj->data_id;?>">
		<thead>

			<tr>
				    <?php for($z=0; $z<4; $z++){ ?>
						<th>节号</th>
				        <th>电压</th>
						<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
						<th>设置告警规则</th>
						<?php } ?>
					<?php } ?>
					</tr>
		</thead>
		<tbody>				
                  <?php    
  	$amount = isset($extraPara["amount"]) ? $extraPara["amount"] : ($dataObj->model == "battery_24" ? 24 : 32);
    for ($j = 0; $j < $amount; $j += 4) { ?>
        <tr> 
        <?php 
          for( $z=0; $z<4; $z++){ ?>
                <?php if( ($j+$z) < $amount){ ?>	
				<td><?php echo $j+$z+1;?></td>
				<td class='bat_num<?php echo $j+$z;?>'><span></span></td>
				<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
				<td class="hasThreshold">
				<button data_id='<?php echo $dataObj->data_id;?>'
				model='<?php echo $dataObj->model;?>'
				field="battery_<?php echo $j+$z;?>_value"
				class="btn btn-warning setThreshold">设置阈值</button>
				</td>
				<?php }
				}else{?>
				<td></td><td></td>
				<?php if( (!isset($isMobile) || !$isMobile) && in_array($userObj->user_role, array("admin","city_admin"))){ ?>
				<td></td>
				<?php } 
                } 
		 } ?>
		 </tr>
		 <?php }?>			 
         </tbody>
	</table>
	<?php } ?>
</div>

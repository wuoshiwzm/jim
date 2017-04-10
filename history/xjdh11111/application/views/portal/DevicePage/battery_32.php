<script type="text/javascript">
var array = <?php echo json_encode($array);?>;
var row = <?php echo $dataObj->extra_para;?>;
</script>
<div class='row-fluid'>
				<h4>性能指标</h4>
		      <?php if(in_array($userObj->user_role, array("admin","city_admin"))){ ?>
		      <p>
		            <?php if(is_int($dataObj->extra_para)){ ?>
		                <a class="btn btn-warning"
							href='<?php echo site_url('portal/device_pi_setting/'.$dataObj->model);?>'>设置性能指标</a>
						<a
							href='<?php echo site_url('portal/dynamicSetting/'.$dataObj->data_id['1']);?>'
							target="_blank" class="btn btn-info">动态设置</a>
						<button class='btn btn-info dev-info'
							data_id='<?php echo $dataObj->data_id['1'];?>'
							model='<?php echo $dataObj->model;?>'>详细信息</button>
		            <?php }else{?>
						<a class="btn btn-warning"
							href='<?php echo site_url('portal/device_pi_setting/'.$dataObj->model);?>'>设置性能指标</a>
						<a
							href='<?php echo site_url('portal/dynamicSetting/'.$dataObj->data_id);?>'
							target="_blank" class="btn btn-info">动态设置</a>
						<button class='btn btn-info dev-info'
							data_id='<?php echo $dataObj->data_id;?>'
							model='<?php echo $dataObj->model;?>'>详细信息</button>
				    <?php }?>
				</p>
		      <?php }?>
		      <table
					class="table table-bordered responsive table-striped table-sortable"
					id='tb-<?php echo $dataObj->data_id;?>-dc'>
					<thead>
						<tr>
							<th>序号</th>
							<th>变量名</th>
							<th>当前值</th>
							<th>告警级别</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>	
				<table
					class="table table-bordered table-striped responsive table-sortable"
					id='bat_pi-<?php echo $dataObj->data_id;?>'>
					<thead>
						<tr>
							<th>序号</th>
							<th>变量标签</th>
							<th>变量值</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="3">无</td>
						</tr>
					</tbody>
				</table>			
			</div>		
			<table
					class="table table-bordered table-striped responsive table-sortable">
				<tr>
						<th>类型</th>
						<th>数据</th>
						<th>更新时间</th>
						<?php if(in_array($userObj->user_role, array("admin","city_admin"))){ ?>
						<th>设置告警规则</th>
						<?php } ?>
					</tr>
					<tr>
					<?php if(is_int($dataObj->extra_para)){ ?>
						<td>整组电压</td>
						<td class="group_v" id= 'group_v'></td>
						<td class="update_datetime"><?php echo date('Y-m-d H:i:s');?></td>
						<?php if(in_array($userObj->user_role, array("admin","city_admin"))){ ?>
						<td class="hasThreshold"><button data_id='<?php echo $dataObj->data_id[1];?>'
									field="group_voltage" class="btn btn-warning setThreshold">设置阀值</button></td>
					    <?php } ?>
					<?php }else{ ?>
					    <td>整组电压</td>
						<td class="group_v"></td>
						<td class="update_datetime"><?php echo date('Y-m-d H:i:s');?></td>
						<?php if(in_array($userObj->user_role, array("admin","city_admin"))){ ?>
						<td class="hasThreshold"><button data_id='<?php echo $dataObj->data_id;?>'
									field="group_voltage" class="btn btn-warning setThreshold">设置阀值</button></td>
					    <?php } ?>
					<?php } ?>
					</tr>
				</table>	
				
			
			
				<?php if(is_int($dataObj->extra_para)){ ?>	
				<table
				class="table table-bordered table-striped responsive table-sortable">
				<thead>
				
					<tr>
						<th>节号</th>
						<th>电压</th>
						<th>设置告警规则</th>
						<th>节号</th>
						<th>电压</th>
						<th>设置告警规则</th>
						<th>节号</th>
						<th>电压</th>
						<th>设置告警规则</th>
						<th>节号</th>
						<th>电压</th>
						<th>设置告警规则</th>
					</tr>
				</thead>
				<tbody>	
							
                  <?php    
                  	 $row =	$dataObj->extra_para;
              for ($j = 0; $j < $row; $j += 4) {
               ?>       
                  <tr>  <?php if($j+1<=$row){ ?>	
						<td><?php echo $j+1;?></td>
						<td bat_num='<?php echo $j;?>' <?php $i = ceil(($j+1)/32);?>
						 id="bat_voltage_<?php echo $j;?>_<?php echo $dataObj->data_id[$i];?>" ><span></span>&nbsp;</td>
						<td class="hasThreshold">
						<?php if(in_array($userObj->user_role, array("admin","city_admin"))){ ?>
						<button
								data_id='<?php $i = ceil(($j+1)/32); echo $dataObj->data_id[$i];?>'
								field="battery_<?php echo $j;?>_value"
								class="btn btn-warning setThreshold">设置阀值</button>
						<?php } ?></td>
						 <?php } ?> 
						 
						<?php if($j+2<=$row){ ?>
						<td><?php echo $j+2;?></td>
						<td bat_num='<?php echo $j+1;?>' <?php $i = ceil(($j+2)/32);?>
						 id="bat_voltage_<?php echo $j+1;?>_<?php echo $dataObj->data_id[$i];?>"><span></span>&nbsp;</td>
						<td class="hasThreshold">
						<?php if(in_array($userObj->user_role, array("admin","city_admin"))){ ?>
						<button
								data_id='<?php $i = ceil(($j+2)/32); echo $dataObj->data_id[$i];?>'
								field="battery_<?php echo $j+1;?>_value"
								class="btn btn-warning setThreshold">设置阀值</button>
						<?php } ?></td>
						 <?php } ?> 
						 
						<?php if($j+3<=$row){ ?>
						<td><?php echo $j+3;?></td>
						<td bat_num='<?php echo $j+2;?>' <?php $i = ceil(($j+3)/32);?>
						 id="bat_voltage_<?php echo $j+2;?>_<?php echo $dataObj->data_id[$i];?>"><span></span>&nbsp;</td>
						<td class="hasThreshold">
						<?php if(in_array($userObj->user_role, array("admin","city_admin"))){ ?>
						<button
								data_id='<?php $i = ceil(($j+3)/32); echo $dataObj->data_id[$i];?>'
								field="battery_<?php echo $j+2;?>_value"
								class="btn btn-warning setThreshold">设置阀值</button>
								<?php } ?></td>
						 <?php } ?> 
						 		
						<?php if($j+4<=$row){ ?>		
						<td><?php echo $j+4;?></td>
						<td bat_num='<?php echo $j+3;?>' <?php $i = ceil(($j+4)/32);?>
						 id="bat_voltage_<?php echo $j+3;?>_<?php echo $dataObj->data_id[$i];?>"><span></span>&nbsp;</td>
						<td class="hasThreshold">
						<?php if(in_array($userObj->user_role, array("admin","city_admin"))){ ?>
						<button
								data_id='<?php $i = ceil(($j+4)/32); echo $dataObj->data_id[$i];?>'
								field="battery_<?php echo $j+3;?>_value"
								class="btn btn-warning setThreshold">设置阀值</button>
					       <?php } ?></td>
					     <?php } ?>   
					</tr>
                  <?php }?> 
           <?php }else{?>   
           <table
				class="table table-bordered table-striped responsive table-sortable"
				id="bat_voltage_<?php echo $dataObj->data_id;?>">
				<thead>
				
					<tr>
						<th>节号</th>
						<th>电压</th>
						<th>设置告警规则</th>
						<th>节号</th>
						<th>电压</th>
						<th>设置告警规则</th>
						<th>节号</th>
						<th>电压</th>
						<th>设置告警规则</th>
						<th>节号</th>
						<th>电压</th>
						<th>设置告警规则</th>
					</tr>
				</thead>
				<tbody>	
				     
                    <?php    
          $row = json_decode($dataObj->extra_para)->amount;
  	
            for ($j = 0; $j < $row; $j += 4) {
               ?>       
                  <tr>  <?php if($j+1<=$row){ ?>	
						<td><?php echo $j+1;?></td>
						<td bat_num='<?php echo $j;?>'><span></span>&nbsp;</td>
						<td class="hasThreshold">
						<?php if(in_array($userObj->user_role, array("admin","city_admin"))){ ?>
						<button
								data_id='<?php echo $dataObj->data_id;?>'
								field="battery_<?php echo $j;?>_value"
								class="btn btn-warning setThreshold">设置阀值</button>
						<?php } ?></td>
						 <?php } ?> 
						 
						<?php if($j+2<=$row){ ?>
						<td><?php echo $j+2;?></td>
						<td bat_num='<?php echo $j+1;?>'><span></span>&nbsp;</td>
						<td class="hasThreshold">
						<?php if(in_array($userObj->user_role, array("admin","city_admin"))){ ?>
						<button
								data_id='<?php echo $dataObj->data_id;?>'
								field="battery_<?php echo $j+1;?>_value"
								class="btn btn-warning setThreshold">设置阀值</button>
						<?php } ?></td>
						 <?php } ?> 
						 
						<?php if($j+3<=$row){ ?>
						<td><?php echo $j+3;?></td>
						<td bat_num='<?php echo $j+2;?>'><span></span>&nbsp;</td>
						<td class="hasThreshold">
						<?php if(in_array($userObj->user_role, array("admin","city_admin"))){ ?>
						<button
								data_id='<?php echo $dataObj->data_id;?>'
								field="battery_<?php echo $j+2;?>_value"
								class="btn btn-warning setThreshold">设置阀值</button>
								<?php } ?></td>
						 <?php } ?> 
						 		
						<?php if($j+4<=$row){ ?>		
						<td><?php echo $j+4;?></td>
						<td bat_num='<?php echo $j+3;?>'><span></span>&nbsp;</td>
						<td class="hasThreshold">
						<?php if(in_array($userObj->user_role, array("admin","city_admin"))){ ?>
						<button
								data_id='<?php echo $dataObj->data_id;?>'
								field="battery_<?php echo $j+3;?>_value"
								class="btn btn-warning setThreshold">设置阀值</button>
					       <?php } ?></td>
					     <?php } ?>   
					</tr>
                  <?php }?> 
                  
          <?php }?>        
             
                  </tbody>
			</table>


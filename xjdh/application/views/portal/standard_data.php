<table  class="table table-bordered responsive table-striped table-sortable"
id="standard_<?php echo $dataObj->data_id;?>">
	<thead>
		<tr>
			<th>序号</th>
			<th>标准信号名</th>
			<th>标准信号值</th>
        </tr>
	</thead>
	<tbody>
	<?php foreach (Constants::$standardConfig as $key => $val){?>
	   <?php if($key == $devName){?>
	       <?php foreach ($val as $key => $value){?>
		        <tr>
					<td><?php echo ++$i;?></td>
					<td><?php echo $value;?></td>
					<td><span></span></td>
		        </tr>
            <?php }?>
        <?php }?>
    <?php }?>
    </tbody>
</table>
<script type="text/javascript">
var devName = <?php echo json_encode($devName); ?>
</script>









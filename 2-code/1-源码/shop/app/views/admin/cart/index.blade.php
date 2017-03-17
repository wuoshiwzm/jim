@section('content')
<table>
   	<thead>
       	<tr>
           	<th>Product</th>
           	<th>Qty</th>
           	<th>Item Price</th>
           	<th>Shop_id</th>
           	<th>Subtotal</th>
           	<th>rowId</th>

       	</tr>
   	</thead>

   	<tbody>

      <?php foreach($cart as $row) :?>

       	<tr>
           	<td>
               	<p><strong><?php echo $row->name;?></strong></p>
               	<p><?php echo ($row->options->has('size') ? $row->options->size : '');?></p>
           	</td>
           	<td><input type="text" value="<?php echo $row->qty;?>"></td>
            <td>$<?php echo $row->price;?></td>
           	<td><input type="text" value="<?php echo $row->shop_id;?>"></td>
           	<td>$<?php echo $row->subtotal;?></td>
            <td><?php echo $row->rowid;?></td>
       </tr>

   	<?php endforeach;?>

  </tbody>
</table>


@stop

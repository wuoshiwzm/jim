//删除//
$('.dele_d').click(function(){
 //询问框
layer.confirm('确定要删除？', {
  title: ['删除', 'font-size:16px;'], 
  btn: ['确定','取消'] //按钮
}, function(){
  layer.msg('已经删除', {icon: 1});
}, function(){
  layer.msg('取消删除', {icon: 2

  });
});
});
//

//删除订单//
$('.dele_dd').click(function(){
 //询问框
layer.confirm('确定要删除订单？', {
  title: ['删除订单', 'font-size:16px;'], 
  btn: ['确定','取消'] //按钮
}, function(){
  layer.msg('已经删除', {icon: 1});
}, function(){
  layer.msg('取消删除', {icon: 2

  });
});
});
//


//确定退款//
$('.t_ok').click(function(){
 //询问框
layer.confirm('确定要给买家退款？', {
  title: ['退款', 'font-size:16px;'], 
  btn: ['确定','取消'] //按钮
}, function(){
  layer.msg('已经退款', {icon: 1});
}, function(){
  layer.msg('取消退款', {icon: 2

  });
});
});
//


//下架//
$('.xiajia').click(function(){
 //询问框
layer.confirm('确定要下架商品？', {
  title: ['下架', 'font-size:16px;'], 
  btn: ['确定','取消'] //按钮
}, function(){
  layer.msg('下架成功', {icon: 1});
}, function(){
  layer.msg('取消操作', {icon: 2

  });
});
});
//

//上架//
$('.shangjia').click(function(){
 //询问框
layer.confirm('确定要上架商品？', {
  title: ['上架', 'font-size:16px;'], 
  btn: ['确定','取消'] //按钮
}, function(){
  layer.msg('上架成功', {icon: 1});
}, function(){
  layer.msg('取消操作', {icon: 2

  });
});
});
//

//新闻添加分类//
$('.addclass').click(function(){
	  layer.open({
		  
	    type: 2,
	    title:false,
	    shadeClose: true,
	    shade: 0.8,
	   area: ['286px', '300px'],
		    content: ['news_addclass.html','no']
	});
});
//

//添加属性集//
$('.attbute_add_ji').click(function(){
	  layer.open({
		  
	    type: 2,
	    title:false,
	    shadeClose: true,
	    shade: 0.8,
	    area: ['479px', '240px'],
		    content: ['attbute_add_ji.html','no']
	});
});
//


//修改价格//
$('.modify').click(function(){
  
	  layer.open({
		  
	    type: 2,
	    title:false,
	    shadeClose: true,
	    shade: 0.8,
	   area: ['940px', '560px'],
		    content: ['modify.html','no']
	});
});
//

//回复///
$('.huifu').click(function(){ 
  
	  layer.open({
		  
	    type: 2,
	    title:false,
	    shadeClose: true,
	    shade: 0.8,
	   area: ['460px', '330px'],
		    content: ['reply.html','no']
	});
});
//

















































































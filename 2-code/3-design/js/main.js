
// 主题点击收起展开导航菜单
$(".left-menu-state").click(function() {
	var state = $(this).data("default");

	if (state == "true" || state == true) {
		$('.admincp-container').addClass('unfold').removeClass('fold');
		$('#foldSidebar i').addClass('arrow arrow-left').removeClass('arrow arrow-right');
	} else {
		$('.admincp-container').addClass('fold').removeClass('unfold');
		$('#foldSidebar i').addClass('arrow arrow-right').removeClass('arrow arrow-left');
	}
	$.cookie('left_menu_state', state, {
		expires: 365
	});
});

var theme_style = $.cookie('theme_style');

theme_style = (theme_style == "false" || theme_style == false) ? false : true;

$("#theme_style").bootstrapSwitch({
	state: theme_style
});

if (theme_style) {
	$("body").removeClass("style-original");
	$(document.getElementById('workspace').contentWindow.document).find("body").removeClass("style-original");

	$(".theme-style[data-default=true]").addClass("active");
	$(".theme-style[data-default=false]").removeClass("active");
} else {
	$("body").addClass("style-original");
	$(document.getElementById('workspace').contentWindow.document).find("body").addClass("style-original");

	$(".theme-style[data-default=true]").removeClass("active");
	$(".theme-style[data-default=false]").addClass("active");
}

// 风格切换
$(".theme-style").click(function() {
	var state = $(this).data("default");

	if (state == "true" || state == true) {
		$("body").removeClass("style-original");
		var workspace = document.getElementById('workspace');
		if (workspace) {
			$(workspace.contentWindow.document).find("body").removeClass("style-original");
		}
	} else {
		$("body").addClass("style-original");
		var workspace = document.getElementById('workspace');
		if (workspace) {
			$(workspace.contentWindow.document).find("body").addClass("style-original");
		}
	}
	$.cookie('theme_style', state, {
		expires: 365
	});
});

// 顶部导航展示形式切换
$('#foldSidebar i').click(function() {
	if ($('.admincp-container').hasClass('unfold')) {
		$('.admincp-container').addClass('fold').removeClass('unfold');
		$('#foldSidebar i').addClass('arrow arrow-right').removeClass('arrow arrow-left');
	} else {
		$('.admincp-container').addClass('unfold').removeClass('fold');
		$('#foldSidebar i').addClass('arrow arrow-left').removeClass('arrow arrow-right');
	}
});
// 侧边导航展示形式切换，现已隐藏
$('.navbar-collapse > a').click(function() {
	if ($('.admincp-container').hasClass('unfold')) {
		$('.admincp-container').addClass('fold').removeClass('unfold');

		$('.navbar-btn i').addClass('fa-indent').removeClass('fa-outdent');

	} else {
		$('.admincp-container').addClass('unfold').removeClass('fold');

		$('.navbar-btn i').addClass('fa-outdent').removeClass('fa-indent');
	}
});
// 手机显示展开收起导航按钮切换
$('.toggle-left-box').click(function() {
	if ($('.admincp-container').hasClass('sm')) {
		$('.admincp-container').removeClass('sm');
	} else {
		$('.admincp-container').addClass('sm');
	}
});

// 导航三级折叠
$(".sm-nav-box > li > a").click(function() {
	$(this).addClass("active").parents().siblings().find("a").removeClass("active");
	$(this).parents().siblings().find(".sm-child").hide(300);
	$(this).siblings(".sm-child").toggle(300);
})
$(".sm-child > li > a").click(function() {
	$(this).addClass("active").parents().siblings().find("a").removeClass("active");
	$(this).parents().siblings().find(".sm-three").hide(300);
	$(this).siblings(".sm-three").toggle(300);
})

// 加载对象
var loading = {
	// 显示加载进度条
	start: function() {
		// Pace.restart();
		$("#page-load").show();
	},
	// 停止加载进度条
	stop: function() {
		// Pace.stop();
		$("#page-load").hide();
	}
};

var bind_click = false;

// iframe加载完成后调用事件
$("#workspace").load(function() {
	loading.stop();
	if (bind_click == false) {
		if (this.contentWindow && this.contentWindow.document) {
			$(this.contentWindow.document).click(function() {
				$(window).click();
			});
			bind_click = true;
		}
	}
});

$(window).click(function() {
	// 关闭菜单
	$("[data-toggle='dropdown']").each(function() {
		if ($(this).attr("aria-expanded") == "true") {
			$(this).dropdown('toggle');
		}
	});
});

$(".SZY-MENU-2").click(function() {
	if ($(this).find(".submenu").find("li").size() == 1) {
		try {
			var js = $(this).find(".submenu").find("li").find("a").attr("onClick");
			eval(js);
		} catch (e) {

		}
	}
});

// ifream跳转左侧导航选中
function openMenu(url, obj, target) {
	if (obj) {
		var lastmenus = $(obj).attr("data-menus");

		try {
			var menus = lastmenus.split("|");
			$(".nav-tabs").find("[data-param='" + menus[0] + "']").find("a").click();
		} catch (e) {
		}

		$(".submenu,.product-nav-list,.sm-three").find("li").removeClass('active');
		$(".submenu,.product-nav-list,.sm-three").find("li").find("[data-menus='" + lastmenus + "']").parents('li').addClass('active');

	}

	if (lastmenus) {
		$.cookie("lastmenus", lastmenus, {
			expires: 7
		});
	}

	// $.post(url, function(data){
	// $("#workspace").html(data);
	// loading.stop();
	// })

	if (target == '_blank') {
		window.open(url);
	} else {
		loading.start();
		$("#workspace").attr("src", url);
	}
}

loading.stop();
$("#personal_message").mouseenter(function() {
	window.focus();
	$("#personal_message_panel").show();
}).mouseleave(function() {
	$("#personal_message_panel").hide();
}).find(".close").click(function() {
	$("#personal_message_panel").hide();
});
$("#change_color").mouseenter(function() {
	window.focus();
	$("#change_color_panel").show();
}).mouseleave(function() {
	$("#change_color_panel").hide();
}).find(".close").click(function() {
	$("#change_color_panel").hide();
});

$("#clear_cache").mouseenter(function() {
	window.focus();
	$("#clear_cache_panel").show();
}).mouseleave(function() {
	$("#clear_cache_panel").hide();
}).find(".close").click(function() {
	$("#clear_cache_panel").hide();
});

// 清理缓存
$("#btn_clear_cache").click(function() {

	var data = $("#cacheForm").serializeJson();

	if (!data.codes || !$.isArray(data.codes) || data.codes.length == 0) {
		$.msg('请选择要清理的缓存！');
		return;
	}

	data.codes = data.codes.join(",");

	var target = this;

	if ($(target).data("loading")) {
		return;
	}

	$(target).data("loading", true);

	$.loading.start();

	$.post('/system/cache/clear', data, function(result) {
		if (result.code == 0) {
			$.msg(result.message);
		} else {
			$.msg(result.message, {
				time: 5000
			});
		}
	}, "json").always(function() {
		$.loading.stop();
		$(target).data("loading", false);
	});
});

$("#cache_all").click(function() {
	$("#cacheForm").find(":checkbox").prop("checked", $(this).prop("checked"));
});
$("#cacheForm").find(":checkbox").click(function() {
	if (!$(this).prop("checked")) {
		$("#cache_all").prop("checked", false);
	} else if ($("#cacheForm").find(":checkbox").not("#cache_all").size() == $("#cacheForm").find(":checkbox:checked").size()) {
		$("#cache_all").prop("checked", true);
	}
})

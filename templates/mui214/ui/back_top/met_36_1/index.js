METUI_FUN['$uicss'] = {
    name:'$uicss',
    totop: function() {
         $(".cd-top").click(function(){
            $('html,body').animate({'scrollTop':0},300);
        });
        // 返回顶部按钮显示/隐藏
        $(window).scroll(function(){
            if($(this).scrollTop()>$(this).height()){
                $(".cd-top").removeAttr('hidden').addClass("animation-slide-bottom");
            }else{
                $(".cd-top").attr({hidden:''}).removeClass('animation-slide-bottom');
            }
        });
    }
};
var banner=metui(METUI_FUN['$uicss']);
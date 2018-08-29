METUI_FUN['$uicss'] = {
    name:'$uicss',
    appear:function (){
        // 首页首屏内动画预加载
        var indexappear=$('.met-index-body:eq(0) [data-plugin=appear]');
        if(indexappear.length){
            indexappear.scrollFun(function(val){
                val.appearDiy();
            });
        }
        /*news*/
        METUI['$uicss'].find(".newslist").mCustomScrollbar({
            scrollInertia:600,
            autoDraggerLength:false
        });
        
        if($(".newsad").length){
            METUI['$uicss'].find('.newsad').slick({
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  autoplay:true,
                  autoplaySpeed:3000,
                  dots:true
            });
        }

    }
};
var x = new metui(METUI_FUN['$uicss']);
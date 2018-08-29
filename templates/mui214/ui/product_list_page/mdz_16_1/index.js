// 瀑布流配置
METUI_FUN['$uicss'] = {
    name: '$uicss',
    metAnimOnScroll: function() {
        var list = METUI['$uicss'].find('.$uicss-list');
        // 产品列表页
        if (list.length) {
            if ($('#met-grid').length) {
                setTimeout(function() {
                    metAnimOnScroll('met-grid');
                }, 0)
            }
        }

        function metAnimOnScroll(obj) {
            new AnimOnScroll(document.getElementById(obj), {
                minDuration: 0.4,
                maxDuration: 0.7,
                viewportFactor: 0.2
            });
        }
    },
    animate: function() {
        var wh = $(window).height();
        $('.$uicss [data-plugin=appear]').each(function() {
            var thisT = $(this).offset().top,
                thisH = $(this).height();
            if (thisT + thisH / 2 < wh + $(window).scrollTop()) {
                var dataAnimate = $(this).attr('data-animate');
                $(this).removeClass("invisible").removeAttr('data-plugin').removeAttr('data-animate').addClass('appear-no-repeat animation-' + dataAnimate);
            }
        });
    }
};
METUI['$uicss'] = new metui(METUI_FUN['$uicss']);
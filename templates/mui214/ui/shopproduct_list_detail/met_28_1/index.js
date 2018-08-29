METUI_FUN['$uicss'] = {
    name: '$uicss',
    init: function() {
        var body = $('body');
        var header = $('header');
        var imgbox = $('.$uicss .slick-slide span .img-fluid');
        var windowWidth = $(window).width();
        $(document).ready(function() {
            // body.removeClass('met-navfixed')
            // header.removeClass('navbar-fixed-top')

            if(windowWidth < 992){
                imgbox.removeClass('cloudzoom')
            }
 
        })
        // 放大镜
        CloudZoom.quickStart({
            zoomSizeMode: 'image',
            autoInside: 750,
            zoomOffsetX: -15,
            maxMagnification: 4,
            zoomPosition: 12
    });
            //缩略图滚动
        
        setTimeout(function() {
            $('.$uicss .slick-dots').wrapInner('<div></div>');
            var
                showpro_index = 0;
            $('#met-imgs-slick1').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
                paginationScroll(nextSlide);
                showpro_index = nextSlide;
            });
        }, 0)


        function paginationScroll(index) {
            var slickdots_w = $('.$uicss .slick-dots').height(),
                slickdots_div_w = $('.$uicss .slick-dots div').height(),
                deviation = parseInt(index * 180 - slickdots_w / 2 + 90);
            if (slickdots_div_w > slickdots_w) {
                var translateY = deviation > 0 ? -deviation : 0;
                if (deviation + slickdots_w >= slickdots_div_w) translateX = -parseInt(slickdots_div_w - slickdots_w);
                if ($('html').hasClass('no-csstransitions')) {
                   $('.$uicss .slick-dots div').stop().animate({
                        left: translateY
                    }, 500); // IE9兼容
                } else {
                    $('.$uicss .slick-dots div').css({
                        transform: 'translateY(' + translateY + 'px)'
                    });
                }
            }
        }
    },
    img_slick:function(){
       // 详情页轮播图
    // 产品详情页、图片模块详情页共用
    var $met_img_slick=$('#met-imgs-slick1'),
        $met_img_slick_slide=$met_img_slick.find('.slick-slide');
    if($met_img_slick_slide.length>1){
        // 开始轮播
        var slick_lazyloadPrevNext=slick_swipe=true,
            slick_fade=slick_arrows=false;
        if(device_type=='d'){
            if($met_img_slick.hasClass('fngallery')){
                slick_lazyloadPrevNext=slick_swipe=false;
                slick_fade=true;
            }
        }
        if(!slick_swipe) $met_img_slick.addClass('slick-fade');// 如果切换效果为淡入淡出，则加上标记class
        if(device_type!='m') slick_arrows=true;
        $met_img_slick.slick({
            arrows:slick_arrows,
            dots:true,
            speed:300,
            fade:slick_fade,
            swipe:slick_swipe,
            customPaging:function(a,b) {// 缩略图html
                var $selfimg=$met_img_slick_slide.eq(b),
                    src=$selfimg.find('.lg-item-box').data('exthumbimage'),
                    alt=$selfimg.find('img').attr('alt'),
                    img_html='<img src="'+src+'" alt="'+alt+'" />';
                return img_html;
            },
            lazyloadPrevNext:slick_lazyloadPrevNext,
            prevArrow:met_prevarrow,
            nextArrow:met_nextarrow,
            adaptiveHeight: true
        })
        // 切换图片之前，判断所有图片是否被替换，如被替换，则还原
        $met_img_slick.on('beforeChange', function(event, slick, currentSlide, nextSlide){
            $met_img_slick_slide.each(function(index, el) {
                var thisimg=$('img',this),
                    thisimg_datasrc=thisimg.attr('data-src');
                if(!thisimg.attr('data-lazy') && thisimg.attr('src')!=thisimg_datasrc) thisimg.attr({src:thisimg_datasrc});
            });
        });
    }
    // 画廊加载
    var $fngallery=$('.fngallery');
    if($fngallery.length){
        var $fngalleryimg=$fngallery.find('.slick-slide img');
        if($fngalleryimg.length){
            var fngallery_open=true;
            $fngalleryimg.each(function() {
                $(this).one('click',function(){
                    if(fngallery_open){
                        if(device_type=='m'){
                            $.initPhotoSwipeFromDOM('.fngallery','.slick-slide:not(.slick-cloned) [data-med]');
                        }else{
                            $fngallery.galleryLoad();
                        }
                        fngallery_open=false;
                    }
                });
            })
        }
    }
        var navbar = METUI['$uicss'].find('.navbar'),
                navbar_t = navbar.offset().top,
                wh = $(window).height(),
                a = navbar.find('.navbar-right li a');
$(window).scroll(function() {
                    var st = $(this).scrollTop();
                    //标题工具栏固定
                    if($("body").hasClass('met-navfixed')){
                        if (st > navbar_t) {
                            navbar.addClass('navbar-fixed-top animation-slide-top');
                            $("header").removeClass('navbar-fixed-top');
                        } else {
                            navbar.removeClass('navbar-fixed-top animation-slide-top');
                            $("header").addClass('navbar-fixed-top');
                        }
                    }else{
                        if (st > navbar_t) {
                            navbar.addClass('navbar-fixed-top animation-slide-top');
                        } else {
                            navbar.removeClass('navbar-fixed-top animation-slide-top');

                        }
                    }
                    
                    //选项卡自动选中
                    a.each(function() {
                        var topsize = pro_topsize($(this));
                        //30为区域上下内边距，根据需要调整
                        if (st >= (topsize - 30)) pro_active($(this));
                    });
                });
function pro_active(dom) {
                navbar.find('.navbar-right li').removeClass('active');
                dom.parent('li').addClass('active');
            }
function pro_topsize(dom) {
                var href=dom.attr('href');
                 var oftop = $(href).offset().top;
                  var topsize = oftop - 100;
                   
                if (navbar.hasClass('navbar-fixed-top')) {
                    topsize = topsize + 50;
                } else {
                    if (Breakpoints.is('xs')) {
                        topsize = topsize - navbar.find(".navbar-collapse-toolbar").height();
                    }
                }
                if (topsize < 0) topsize = 10;
                return topsize;
            }

    }

};
var x = new metui(METUI_FUN['$uicss']);
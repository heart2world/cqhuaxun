
METUI_FUN['$uicss']=METUI['$uicss_x']={
	name: '$uicss',
	IE9: navigator.userAgent.indexOf('MSIE 9.0')>0,
	init: function(){
		if($('.swiper-header').length==0){
			METUI['$uicss_x'].slide(1);
		}		
	},
	resize: function(res){
		
		if(!res) $(window).resize(function(){ METUI['$uicss_x'].resize(true); });
	},
	slide: function(str){
		switch (str){
			case 1:
				if(!METUI['slide']){
					METUI['$uicss']
						.css('background-image','url('+METUI['$uicss'].attr('data-background')+')')
						.removeAttr('data-background');
				}
							
				METUI['$uicss_info']=new Swiper('.$uicss .info-cut',{
					wrapperClass: 'info-cut-wraper',
					slideClass: 'info-cut-slide',
					slidesPerView: this.IE9?4:'auto',
					autoplay: 3000,
					lazyLoading: true,
					lazyLoadingClass: 'info-lazy',
					watchSlidesProgress : true,
					watchSlidesVisibility : true,
					prevButton:'.$uicss .info-box .fa-chevron-left',
					nextButton:'.$uicss .info-box .fa-chevron-right',
					observer:true,
					observeParents:true
				});
				
				METUI['$uicss'].addClass('active');
			break;
			case 2:
				if(METUI['$uicss_info']) METUI['$uicss_info'].init();
				METUI['$uicss'].addClass('active');
			break;
			case 3:
				if(METUI['$uicss_info']) METUI['$uicss_info'].destroy(false);
				METUI['$uicss'].removeClass('active');
			break;
		}
	}
}
var x=new metui(METUI_FUN['$uicss']);

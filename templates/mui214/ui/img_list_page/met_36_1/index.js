METUI_FUN['$uicss']={
	name:'$uicss',
	init:function(){
		// if(/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
		// 	return;
		// }
        setTimeout(function(){
            METUI['$uicss'].find('.portfolio-list').masonry({
              itemSelector: '.$uicss .portfolio-item-wrap',
              no_columns: 3
            });
        },500)
		
        function paraimgs(){
            var paraimg = METUI['$uicss'].find('.para-img');

                paraimg.children('a').html("<img src='"+paraimg.attr("data-img")+"'></img>");
        }
        paraimgs();
        $("#met-pager-btn").on('click',function() {
           setTimeout(function(){
                var paraimg = $('.para-img');
                    paraimg.children('a').html("<img src='"+paraimg.attr("data-img")+"'></img>");
           },3000);
        });
	}
};
var x=new metui(METUI_FUN['$uicss']);
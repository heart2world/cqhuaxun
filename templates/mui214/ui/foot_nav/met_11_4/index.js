METUI_FUN['$uicss'] = {
    name:'$uicss',
    init:function(){
        $('.$uicss select').addClass('selectpicker');
        $('.$uicss .form-group').each(function(index, el) {
            if($(this).find('textarea').length>0){$(this).addClass('w100');}
                $(this).addClass('p-r-15').removeClass('m-b-0');
            
        });
    }
};
var x = new metui(METUI_FUN['$uicss']);
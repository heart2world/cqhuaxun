METUI_FUN['$uicss'] = {
    name:'$uicss',
    getRGB: function() {
        /*背景颜色透明*/
        var t = METUI['$uicss'].find('.hd-live-con'),
            b = t.data('hex');
        if (t.length) {
            var hex = b.split('|')[0],
                opacity = b.split('|')[1];
            var bgcolor = rgb2color(hex, opacity);
            t.find(".mask1").css('background', bgcolor);
        }
        function rgb2color(hex, opacity) {
            var reg = /^#([0-9a-fA-f]{3}|[0-9a-fA-f]{6})$/;
            var c = hex.toLowerCase();
            if (c && reg.test(c)) {
                if (c.length === 4) {
                    var a = '#';
                    for (var i = 1; i < 4; i++) {
                        a += c.slice(i, i + 1).concat(c.slice(i, i + 1));
                    }
                    c = a;
                }
                var b = [];
                for (var i = 1; i < 7; i += 2) {
                    b.push(parseInt('0x' + c.slice(i, i + 2)));
                }
                return "rgba(" + b.join(',') + ',' + opacity + ')';
            } else {
                return c
            }

        }

    }
};
var x = new metui(METUI_FUN['$uicss']);
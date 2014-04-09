$(function() {

    function draw() {
        $.each($('div'), function(k, v) {
            if($(v).attr('ctrl') != undefined) {
                var params = ($(v).attr('param')!=undefined) ? '/'+$(v).attr('param') : '';
                $.get('http://customercue.com/'+$(v).attr('ctrl')+params, function(data) {
                    $(v).html(data);
                });
            }
        });
        setTimeout(draw, 1000);
    }

    draw();

});
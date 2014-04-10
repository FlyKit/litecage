    function draw() {
        $.each($('div'), function(k, v) {
            if($(v).attr('ctrl') != undefined) {
                var params = ($(v).attr('param')!=undefined) ? '/'+$(v).attr('param') : '';
                $.get('/'+$(v).attr('ctrl')+params, function(data) {
                    $(v).html(data);
                });
            }
        });
        setTimeout(draw, 1000);
    }

    function act(onError) {
        $.each($('form'), function(k, v) {
               var ctrl = $(v).attr('action');
               $(v).submit(function(e) {
                    e.preventDefault();
                    $.post('/'+ctrl, $(this).serialize(), function(result) {
                        var res = $.parseJSON(result);
                        if(res.success != 'true') onError(res);
                    });
                });
        });
    }

$('body').on('click', '.js-add-btn', function() {
    let self = $(this);

    let data = {
        prod_id : self.attr('id'),
        _csrf: yii.getCsrfToken()
    };
    $.ajax({
        url: 'order/add',
        type: 'POST',
        data: data,
        success: function(data) {
            let pdata = JSON.parse(data);
            console.log(pdata);
    }
});
});

$('body').on('click', '.js-del-btn', function() {
    let self = $(this);

    let data = {
        prod_id: self.attr('id'),
        _csrf: yii.getCsrfToken()
    };
    $.ajax({
        url: 'order/delete',
        type: 'POST',
        data: data,
        success: function (data) {
            let pdata = JSON.parse(data);
            console.log(pdata);
        }
    });
});
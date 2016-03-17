window.getBasketElementData = function (obj) {
    var id =  $(obj).attr('id').replace('backet-element-buy-button-', '');
    var ret = {
        buttonObj: $(obj),
        lengthObj: $('#backet-element-length-'+id),
        costObj:   $('#basket-element-cost-'+id),
        element:   $('#basket-element-'+id),
        length:    $('#backet-element-length-'+id).val(),
        cost:      $('#basket-element-cost-'+id).text(),
        id: id
    };
    
    if (!isNaN(ret.length) && !isNaN(ret.cost)) {
        var length = parseInt(ret.length);
        var cost = parseFloat(ret.cost);
        
        if (length > 0 && cost > 0) {
            ret['summ'] = length * cost;
        } else {
            $('#backet-element-length-'+id).val(1);
        }
        
    } else {
        $('#backet-element-length-'+id).val(1);
    }
    
    return ret;
}

$(function () {
    $(document).on('click', '.backet-element-buy-button', function () {
        var obj = window.getBasketElementData($(this));
        $.getJSON('/basket/add', {id: obj.id, length:obj.length}, function(data) {
            console.log(data);
            
            $('#basket-menu-batton-cost').html(data.totalSummFormat+" "+data.totalLength);
        }).fail(function(err) {
            console.log(err);
        });
    });
});
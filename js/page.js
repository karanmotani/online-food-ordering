function nextPage(){
    window.location.href="?page="+(parseInt($('#page').val())+12);
}

function previousPage(){
    if (parseInt($('#page').val())>0)
        window.location.href="?page="+(parseInt($('#page').val())-12);
}

window.onload = function() {
    var item=parseInt($('#page').val());
    var page="&nbsp;item "+(item+1)+" - "+(item+12)+"&nbsp;";
    $('#itemCount').html(page);
};
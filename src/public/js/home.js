$(function () {
    $('body').on('swipeleft swiperight', function (event) {
        var url = $("#pagination" + event.type)[0].href;
        var pattern = /.*#/g;
        var emptysite = pattern.test(url);
        if (!emptysite) {
            window.location.replace(url);
        }
    });
});



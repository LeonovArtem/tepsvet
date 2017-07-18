/**
 *Document Scroll arrow
 */
var $goTop = $('#go-to-top');
$(window).scroll(function () {
    // Высота проявления кнопки
    if ($(this).scrollTop() > 100) {
        $goTop.fadeIn();
    } else {
        $goTop.fadeOut();
    }
});

$goTop.on('click', function () {
    $('body,html').animate({scrollTop: 0}, 0);
    return false;
});

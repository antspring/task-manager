//modal with link in header
$('.header__profile-more').click(function() {
    $('.header__profile-more__modal').toggle("fast");
    $(this).toggleClass("open");

});

// change background color input in sidebar
let loc = window.location.pathname;
let urls =  $('.side-bar__link');
urls.each(function (key) {
    let href = $(this).attr('href')
    if (href === loc) {
        $(this).parent().addClass('active');
    }
})

//notification
let successNotifications = `<div class="success-notification">
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M4 12L10 18L20 6" stroke="#47D664" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>Действие успешно выполнено</div>`;

$("form").on("submit", function() {

    $("body").append(successNotifications);

    setTimeout(function () {
        $('.success-notification').remove();
    },2500)

})

$(document).on("click",".success-notification",function() {
    this.remove();
})

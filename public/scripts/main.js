//modal with link in header
$('.header__profile-more').click(function() {
    $('.header__profile-more-open').toggle("fast");
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


//Модалка с ссылками в хедере
$('.header__profile-more').click(function() {
    $('.header__profile-more-open').toggle("fast");
});


//Создание проекта в кабинете
$('.create-project__btn').click(function() {
    $(this).toggleClass('active')
    $('.create-project__form').toggleClass('active')
})




let loc = window.location.pathname;
let urls =  $('.side-bar__link');
urls.each(function (key) {
    let href = $(this).attr('href')
    if (href === loc) {
        $(this).parent().addClass('active');
    }
})


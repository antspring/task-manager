//create project in personal area
$('.create-project__btn').click(function() {
    $(this).toggleClass('active')
    $('.create-project__form').toggleClass('active')
})


$('.profile-btn').click(function (e) {

    if ($(this).hasClass('btn-primary')) e.preventDefault()

    $(this).attr('type','submit').removeClass('btn-primary').addClass('btn-success').val('Подтвердить')
    $('.profile__form-input').removeAttr('disabled')
})

$('.project__item').on("contextmenu",function (e) {
    e.preventDefault()

    let x = e.pageX;
    let y = e.pageY;

    $('.project__actions').addClass('active').css({left:x,top:y+20+"px"});

})

$(window).click(function () {
    $('.project__actions').removeClass("active")
})
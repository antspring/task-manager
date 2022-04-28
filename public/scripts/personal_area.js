//create project in personal area
$('.create-project__btn').click(function() {
    $(this).toggleClass('active')
    $('.create-project__form').toggleClass('active')
})


$('.profile-btn').click(function (e) {
    e.preventDefault()
    $(this).attr('type','submit').removeClass('btn-primary').addClass('btn-success').val('Подтвердить')
    $('.profile__form-input').removeAttr('disabled')
})
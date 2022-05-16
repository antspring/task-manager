$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
});

//modal with link in header
$('.header__profile-more').click(function() {
    $('.header__profile-more__modal').toggle("fast");
    $(this).toggleClass("open");

});

// change background color input in sidebar
let loc = window.location.pathname;
let urls =  $('.side-bar__link');
urls.each(function (key) {
    let href = $(this).attr('href');
    if (href === loc) {
        $(this).parent().addClass('active');
    }
})

//notification
let successNotifications = `
<div class="notification success-notification">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M4 12L10 18L20 6" stroke="#47D664" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>Действие успешно выполнено
</div>`;

let errorNotifications = `
    <div class="notification error-notification">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M15 9L9 15M15 15L9 9L15 15Z" stroke="#CE3166" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#CE3166" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
        Ошибка отправки запроса 
    </div>`;

$(document).on("click",".notification",function() {
    this.remove();
});

function getSuccess() {
    $("body").append(successNotifications);

}

function getError() {
    $("body").append(errorNotifications);

}

setTimeout(function () {
    $('.notification').remove();
},2500);

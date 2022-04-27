
$('.task').each(function() {
    $(this).css({ top: $(this).parent().offset().top, left: $(this).parent().offset().left })
});

$('.hover-block').droppable();
$('.task').draggable({
    start: function(event) {
        event.target.classList.add('task-active');
    },
    drag: function(eventDrag) {
        $('.task').each(function() {
            $(this).css({ top: $(this).parent().offset().top, left: $(this).parent().offset().left })
        });
        $('.hover-block').droppable({
            over: function(eventDrop) {
                if (eventDrag.target.id !== eventDrop.target.dataset.target) {
                    let block = document.querySelector(`div[data-target='${eventDrag.target.id}']`);

                    eventDrop.target.after(eventDrag.target.parentElement, block);
                }
            }

        });
    },
    stop: function(event) {
        event.target.classList.remove('task-active');
        event.target.style.top = event.target.parentElement.offsetTop + 'px';
        event.target.style.left = event.target.parentElement.offsetLeft + 'px';
    }
});


// modal task more
$('.task-modal__btn').click(function() {
    $('.modal__overlay').fadeIn(297, function() {
        $('.task-modal')
            .css('display', 'block')
            .animate({ opacity: 1 }, 198);
    });
})

// modal task more end
$("#add-people__btn").click(function() {
    $('.modal__overlay').fadeIn(297, function() {
        $('.addpeople-modal')
            .css('display', 'block')
            .animate({ opacity: 1 }, 198);
    });
})


// create task modal
$("#create-task__btn").click(function() {
    $('.modal__overlay').fadeIn(297, function() {
        $('.create-task__modal')
            .css('display', 'block')
            .animate({ opacity: 1 }, 198);
    });
})


// Закрытие модалки
$('.modal__overlay').click(function() {
    $('.modal__overlay').fadeOut(297, function() {
        $('.modal')
            .css('display', 'none')
            .animate({ opacity: 0 }, 198);
    });
})

// custom select
$('.custom-select').niceSelect();
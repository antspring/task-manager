
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
$('.task-modal__btn').click(function(e) {
    const id = e.target.parentElement.parentElement.id;

    $.get('/get-task', { task_id: id }).done((response) => {
        $('#task-modal__name').text(response.title);
        $('#task-modal__description').text(response.description);

        $(`input[name='task_id']`).val(response.id);
    });

    $('.modal__overlay').fadeIn(150, function() {
        $('.task-modal')
            .css('display', 'block')
            .animate({ opacity: 1 }, 150);
    });
})

// modal task more end
$("#add-people__btn").click(function() {
    $('.modal__overlay').fadeIn(150, function() {
        $('.addpeople-modal')
            .css('display', 'block')
            .animate({ opacity: 1 }, 150);
    });
})


// create task modal
$("#create-task__btn").click(function() {
    $('.modal__overlay').fadeIn(150, function() {
        $('.create-task__modal')
            .css('display', 'block')
            .animate({ opacity: 1 }, 150);
    });
})


// close modal
$('.modal__overlay, .close-modal').click(function() {
    $('.modal__overlay').fadeOut(0, function() {
        $('.modal')
            .css('display', 'none')
            .animate({ opacity: 0 }, 0);
    });
})

// custom select
$( document ).ready(function() {
    $('.custom-select').niceSelect();
});

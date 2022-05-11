$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    $('.task').each(function() {
        $(this).css({top: $(this).parent().offset().top, left: $(this).parent().offset().left,width: $(this).parent().width()+2});
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

    // custom select
    $('.custom-select').niceSelect();

    $(".addpeople-form").on("submit",function (e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: "post",
            data: $(".addpeople-form").serializeArray(),
            success:function (data) {
                $(".addpeople-form input").val("").parent().find("span").text("");

                getSuccess();
            },
            error:function (err) {
                let {errors} = err.responseJSON;
                for (let key in errors) {
                    $(`input[name="${key}"]`).parent().find('span').text(errors[key]);
                }
                getError();
            }
        })
    })

    $('.hover-block').droppable();
    $('.task').draggable({
        start: function(event) {
            let task = {
                task_id: event.target.id,
                status_id: event.target.parentElement.parentElement.dataset.statusId
            }

            event.target.classList.add('task-active');
            $(`.status-count[data-status-id=${task.status_id}]`).text($(`div[data-status-id=${task.status_id}]`).find('.task').length - 1);
        },
        drag: function(eventDrag) {
            $('.task').each(function() {
                $(this).css({ top: $(this).parent().offset().top, left: $(this).parent().offset().left });
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

            let task = {
                task_id: event.target.id,
                status_id: event.target.parentElement.parentElement.dataset.statusId
            }

            $.post('/change-status', task).done(() => {
                $(`.status-count[data-status-id=${task.status_id}]`).text($(`div[data-status-id=${task.status_id}]`).find('.task').length);
            });
        }
    });

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


    window.addEventListener('resize', (e) => {
        $('.task').each(function() {
            $(this).css({top: $(this).parent().offset().top, left: $(this).parent().offset().left,width: $(this).parent().width()+2});
        });
    });

    $(".nav-item").on("click",(e) => {
        $(".nav-item").removeClass("active")
        e.target.classList.add("active")
    })
    $("#tasks").on("click",function () {
        $(".tasks").fadeIn(0)
        $(".description").fadeOut(0)

    })

    $("#description").on("click",function () {
        $(".tasks").fadeOut(0)
        $(".description").css({display:"flex",justifyContent:"space-between"})
    })

    $('.panel__search-btn').on('keypress', function (e){
        if (e.which === 13){
            $('.task').removeClass('task-focus');
            if (e.target.value !== ''){
                $.get('/search-tasks', { title_task: e.target.value}).done((response) => {
                    response.forEach((item) => {
                        $(`div[id=${item.id}]`).addClass('task-focus');
                    });
                });
            }
        }
    }).on('input', function (e){
        if (e.target.value === ''){
            $('.task').removeClass('task-focus');
        }
    })

})

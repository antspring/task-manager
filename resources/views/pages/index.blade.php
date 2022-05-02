@extends('app')

@section('content')
    <!-- MAIN BEGIN -->
    <main>
        <div class="task-top">
            <h1 class="headline-1">{{ $groupName}}</h1>
            <div class="panel">
                <div class="panel__button-block">
                    <button id="create-task__btn" class=" panel-btn add-task ">Добавить задачу</button>
                    <button id="add-people__btn" class="panel-btn add-people ">Добавить людей</button>
                </div>
                <div class="panel__search-block ">
                    <div class="panel__select-parent">
                        <div class="box">
                            <select class="custom-select" style="display: none;">
                                <option value="1">Сначала новые</option>
                                <option value="2">Сначала старые</option>
                            </select>
                        </div>
                    </div>
                    <input class="form-control panel__search-btn " type="text " placeholder="Поиск по имени ">
                </div>
            </div>
        </div>
        <div class="tasks">
            @foreach($statuses as $status)
            <div class="tasks__status ">
                <div class="head-status ">
                    <h2 class="headline-3 second-color">{{ $status[0]->status->name }}</h2>
                    <span class="status-count">{{ $status->count() }}</span>
                </div>
                <div class="content-tasks ">
                    <div data-target="0 " class="hover-block ">
                    </div>
                    @foreach($status as $task)
                        <div class="task-parent">
                            <div id="{{ $task->id }}" class="task ">
                                <div class="task-name ">
                                    {{ $task->title }}
                                    <img class="task-modal__btn " src="{{asset('images/tripleDot.svg')}}" alt="image">
                                </div>
                                <div style="background-color: {{ $task->priority->color }}" class="status-task">{{ $task->priority->name }}</div>
                                <div class="creator-info ">
                                    <div class="creator-info__name ">
                                        <svg width="14 " height="15 " viewBox="0 0 14 15 " fill="none " xmlns="http://www.w3.org/2000/svg ">
                                            <g clip-path="url(#clip0_282_113) ">
                                                <path d="M8.28331 9.98554C6.58494 9.2663 5.23436 7.91257 4.51906 6.21254L6.50239 4.2257L2.85072 0.571108L1.00097 2.42028C0.68014 2.74295 0.426476 3.12603 0.254656 3.54737C0.0828362 3.96871 -0.0037276
                                    4.41994 -2.73346e-05 4.87495C-2.73346e-05 9.10296 5.39698 14.5 9.62498 14.5C10.0799 14.5038 10.5311 14.4173 10.9524 14.2455C11.3736 14.0737 11.7566 13.8199 12.0791 13.499L13.9288 11.6492L10.2742 7.99462L8.28331 9.98554ZM11.2548
                                    12.6741C11.0403 12.8864 10.7857 13.0539 10.506 13.1671C10.2262 13.2802 9.92675 13.3367 9.62498 13.3333C5.98906 13.3333 1.16664 8.51087 1.16664 4.87495C1.1632 4.57327 1.2197 4.27391 1.33286 3.99423C1.44601 3.71455 1.61357 3.46012
                                    1.82581 3.2457L2.85072 2.22078L4.85564 4.2257L3.14356 5.93778L3.28648 6.29595C3.7072 7.42139 4.36492 8.44324 5.21506 9.29228C6.06521 10.1413 7.08792 10.7977 8.2139 11.217L8.5674 11.3517L10.2742 9.64429L12.2791 11.6492L11.2548
                                    12.6741ZM8.74998 4.30853V1.66661H9.91665V3.77303C10.3022 3.38628 10.7631 2.92253 11.2227 2.46053C12.0196 1.65903 12.8047 0.870358 13.1477 0.525024L13.9726 1.34986C13.6272 1.69519 12.8432 2.48269 12.0476 3.28303C11.5955 3.74036
                                    11.1416 4.19828 10.7561 4.58328H12.8333V5.74995H10.2083C9.8239 5.75181 9.45444 5.60109 9.18104 5.33085C8.90763 5.06061 8.7526 4.69294 8.74998 4.30853Z " fill="#7775F8 "/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_282_113 ">
                                                    <rect width="14 " height="14 " fill="white " transform="translate(0 0.5) "/>
                                                </clipPath>
                                            </defs>
                                        </svg>{{ $task->creator->login }}
                                    </div>
                                    <div class="creator-info__tel ">
                                        +7 (999) 124 12 24
                                    </div>
                                </div>
                                <div class="date-task ">
                                    <svg width="24 " height="25 " viewBox="0 0 24 25 " fill="none " xmlns="http://www.w3.org/2000/svg ">
                                        <g clip-path="url(#clip0_82_72) ">
                                            <path d="M19 2.5H18V1.5C18 1.23478 17.8946 0.98043 17.7071 0.792893C17.5196 0.605357 17.2652 0.5 17 0.5C16.7348 0.5 16.4804 0.605357 16.2929 0.792893C16.1054 0.98043 16 1.23478 16 1.5V2.5H8V1.5C8 1.23478
                                    7.89464 0.98043 7.70711 0.792893C7.51957 0.605357 7.26522 0.5 7 0.5C6.73478 0.5 6.48043 0.605357 6.29289 0.792893C6.10536 0.98043 6 1.23478 6 1.5V2.5H5C3.67441 2.50159 2.40356 3.02888 1.46622 3.96622C0.528882 4.90356 0.00158786
                                    6.17441 0 7.5L0 19.5C0.00158786 20.8256 0.528882 22.0964 1.46622 23.0338C2.40356 23.9711 3.67441 24.4984 5 24.5H19C20.3256 24.4984 21.5964 23.9711 22.5338 23.0338C23.4711 22.0964 23.9984 20.8256 24 19.5V7.5C23.9984 6.17441
                                    23.4711 4.90356 22.5338 3.96622C21.5964 3.02888 20.3256 2.50159 19 2.5ZM2 7.5C2 6.70435 2.31607 5.94129 2.87868 5.37868C3.44129 4.81607 4.20435 4.5 5 4.5H19C19.7956 4.5 20.5587 4.81607 21.1213 5.37868C21.6839 5.94129 22 6.70435
                                    22 7.5V8.5H2V7.5ZM19 22.5H5C4.20435 22.5 3.44129 22.1839 2.87868 21.6213C2.31607 21.0587 2 20.2956 2 19.5V10.5H22V19.5C22 20.2956 21.6839 21.0587 21.1213 21.6213C20.5587 22.1839 19.7956 22.5 19 22.5Z " fill="#434A85 "/>
                                            <path d="M12 17C12.8284 17 13.5 16.3284 13.5 15.5C13.5 14.6716 12.8284 14 12 14C11.1716 14 10.5 14.6716 10.5 15.5C10.5 16.3284 11.1716 17 12 17Z " fill="#434A85 "/>
                                            <path d="M7 17C7.82843 17 8.5 16.3284 8.5 15.5C8.5 14.6716 7.82843 14 7 14C6.17157 14 5.5 14.6716 5.5 15.5C5.5 16.3284 6.17157 17 7 17Z " fill="#434A85 "/>
                                            <path d="M17 17C17.8284 17 18.5 16.3284 18.5 15.5C18.5 14.6716 17.8284 14 17 14C16.1716 14 15.5 14.6716 15.5 15.5C15.5 16.3284 16.1716 17 17 17Z " fill="#434A85 "/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_82_72 ">
                                                <rect width="24 " height="24 " fill="white " transform="translate(0 0.5) "/>
                                            </clipPath>
                                        </defs>
                                    </svg> {{ $task->created_at }}
                                </div>
                            </div>
                        </div>
                        <div data-target="{{ $task->id }}" class="hover-block ">

                        </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </main>
    <!-- TASK-MODAL -->
    <div class="task-modal modal">
        <img src="{{ asset('images/white-close.svg') }}" alt="" class="close-modal">
        <div class="task-modal__top">
            <h2 class="headline-3">
                Название
            </h2>
        </div>
        <div class="task-modal__bottom ">
            <div class="task-modal__description">
                 <p class="description__heading"><object class="desc-heading__image" data="images/more.svg" type=""></object> Описание</p>
                <form method="post" class="update-descr__form">
                    <textarea disabled class="description__text" name="" id="">Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.
По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце, что позволяет сделать текст более привлекательным и живым для визуально-слухового восприятия.
По своей сути рыбатекст является альтернативой традиционному lorem ipsum, который вызывает у некторых людей недоумение при попытках прочитать рыбу текст. В отличии от lorem ipsum, текст рыба на русском языке наполнит любой макет непонятным смыслом и придаст неповторимый колорит советских времен.</textarea>

                    <button  class="btn btn-success confirm-update">Сохранить</button>
                </form>
            </div>
            <div class="task-modal__actions ">
                <p class="actions__heading ">Доступные действия</p>
                <button class="action__button">
                    <object class="action__icon" data="images/tag.svg" type=""></object>
                    Добавить
                </button>
                <button class="action__button">
                    <object class="action__icon" data="images/back-man.svg" type=""></object>
                    Участники
                </button>
                <button class="action__button">
                    <object class="action__icon" data="images/close.svg" type=""></object>
                    Удалить
                </button>
            </div>
        </div>
    </div>
    <!-- TASK-MODAL END -->

    <!-- ADDPEOPLE-MODAL -->
    <div class="addpeople-modal modal ">
        <img src="images/close.svg" alt="" class="close-modal">
        <div class="addpeople-modal__head ">
            <h2 class="headline-3 ">Добавить людей</h2>
        </div>
        <form class="addpeople-form " action="#" method="post">
            <div class="addpeople-form__input ">
                <input class="form-control" type="text" placeholder="Введите ник ">
            </div>
            <button class="btn btn-success addpeople__btn " type="button">Добавить человека</button>
        </form>
    </div>
    <!-- ADDPEOPLE-MODAL END-->

    <!-- CREATE-TASK -->
    <div class="create-task__modal modal ">
        <img src="images/close.svg" alt="" class="close-modal">
        <div class="create-task__heading ">
            <h2 class="headline-3 ">Создать задачу</h2>
        </div>

        <form class="create-task__form" action="# " method="post ">
            <input type="text " class="form-control create-task__input" placeholder="Введие название">
            <input type="text " class="form-control create-task__input" placeholder="Введите описание">
            <input type="text " class="form-control create-task__input" placeholder="Введите ник исполнителя">
            <button class="btn btn-success create-task__btn" type="submit">Подтвердить</button>
        </form>
    </div>


    <!-- MAIN  END-->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('styles/plugins/nice-select.css')}}">
@endpush
@push('scripts')
    <script src="{{asset('scripts/plugins/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('scripts/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('scripts/index.js')}}"></script>
@endpush

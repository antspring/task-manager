@extends('app')

@section('content')
    <main>
        <h1 class="headline-1">Личный кабинет</h1>
        <div class="my-zone">
            <div class="my-projects">
                <div class="my-projects__top">
                    <h2 class="headline-2">Мои проекты</h2>
                    <div class="create-project">
                        <svg class="create-project__btn" width="20" height="20" viewBox="0 0 20 20" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 20C4.47715 20 0 15.5228 0 10C0 4.47715 4.47715 0 10 0C15.5228 0 20 4.47715 20 10C19.9939 15.5203 15.5203 19.9939 10 20ZM2 10.172C2.04732 14.5732 5.64111 18.1095 10.0425 18.086C14.444 18.0622 17.9995 14.4875 17.9995 10.086C17.9995 5.68451 14.444 2.10977 10.0425 2.086C5.64111 2.06246 2.04732 5.59876 2 10V10.172ZM11 15H9V11H5V9H9V5H11V9H15V11H11V15Z"
                                  fill="#7775F8"/>
                        </svg>
                        <p>Создать проект</p>
                        <form class="create-project__form" action="{{ route('create-group') }}" method="post">
                            @csrf
                            <input class="form-control" type="text" name="group_name" placeholder="Название проекта">
                            <button class="btn btn-success" type="submit">Подтвердить</button>
                        </form>
                    </div>
                </div>
                <div class="projects">
                    <div class="projects__list">
                        @forelse ($groupToUser as $item)
                            <a href="{{ route('project', $item->group->slug )}}" class="project__item">
                                <p class="project__name">{{ $item->group->name }}</p>
                                <div class="project__desc">
                                    <div class="project-indicator success"></div>
                                    @foreach($newTasks as $key => $value)
                                        @if($key === $item->group_id)
                                            Новых задач - {{ $value }}
                                        @endif
                                    @endforeach
                                </div>
                            </a>
                        @empty
                            <div class="project__item">
                                <p class="project__name">У вас нет проектов</p>
                            </div>
                        @endforelse
                    </div>
                        <div class="project__actions">
                            <form action="#" method="post">
                                <button>
                                    <object data="images/trash.svg" type=""></object>
                                    Удалить</button>
                            </form>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="my-profile">
                <form class="profile__form" action="{{route('user-profile-information.update')}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="profile__image">
                        <div class="profile__image-inner">
                            <img id="output-image" src="{{asset('storage/'.$user->image)}}" alt="">
                            <div class="upload-avatar__overlay">
                                <label for="image-upload">Загрузить фото</label>
                                <input onchange="loadFile(event)" id="image-upload" name="image" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="form__input-list">
                        <input disabled id="name" value="{{ $user->name }}" name="name" type="text" class="form-control profile__form-input" placeholder="name">
                        <input disabled value="{{ $user->login }}" name="login" type="text" class="form-control profile__form-input" placeholder="login">
                        <input disabled value="{{ $user->info }}" name="info" type="text" class="form-control profile__form-input" placeholder="telegram/telephone">
                    </div>
                    <input class="btn btn-primary profile-btn" type="button" value="Изменить">
                </form>
            </div>
        </div>
    </main>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('styles/personal_area.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('scripts/personal_area.js')}}"></script>

    <script type="text/javascript">
        let loadFile = function (event) {
            let output = document.getElementById("output-image");
            output.src = URL.createObjectURL(event.target.files[0])
        }
    </script>
@endpush

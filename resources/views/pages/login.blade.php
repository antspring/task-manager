@extends('app')

@section('register-content')
    <div class="main-container registration-container">
        <div class="registration">
            <div class="registration__heading">
                Авторизация
            </div>
            <div class="registration__sign-in">
                Нет аккаунта?
                <a class="sign-in-link" href="{{ route('register') }}">Зарегистрируйтесь</a>
            </div>
            <form action="{{ route('login') }}" class="registration__form" method="POST">
                @csrf
                <div class="form-group">
                    <input name="login" class="registration__form-input" type="text" value="{{ old('login') }}" placeholder="Логин">
                    <div class="registration__form-error">
                        @error('login')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <input name="password" class="registration__form-input" type="password" placeholder="Пароль">
                    <div class="registration__form-error">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <button class="registration__form-btn" type="submit">Подтвердить</button>

                @if($errors->any())
                    @foreach($errors as $error)
                        {{$error}}
                    @endforeach
                @endif
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('styles/registration.css')}}">
@endpush

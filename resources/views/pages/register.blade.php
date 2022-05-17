@extends('app')
@section('title','Регистрация')
@section('register-content')
    <div class="main-container registration-container">
        <div class="registration">
            <div class="registration__heading">
                Регистрация
            </div>
            <div class="registration__sign-in">
                Уже есть аккаунт?
                <a class="sign-in-link" href="{{ route('login') }}">Войдите</a>
            </div>
            <form action="/register" class="registration__form" method="POST">
                @csrf
                <div class="form-group">
                    <input name="name" class="registration__form-input" type="text" value="{{ old('name') }}" placeholder="Имя">
                    <div class="registration__form-error">
                        @error('name')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
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
                <div class="form-group">
                    <input name="password_confirmation" class="registration__form-input" type="password" placeholder="Подтвердите пароль">
                    <div class="registration__form-error">
                        @error('password_confirmation')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="confirm-rules">
                    <input name="rules" class="registration__form-checkbox" id="confirm-rules" type="checkbox" placeholder="Имя">
                    <label for="confirm-rules">Согласие с правилами обработки</label>
                    <div class="registration__form-error">
                        @error('rules')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <button class="registration__form-btn" type="submit">Подтвердить</button>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('styles/registration.css')}}">
@endpush

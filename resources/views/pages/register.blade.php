@extends('app')

@section('register-content')
    <div class="main-container registration-container">
        <div class="registration">
            <div class="registration__heading">
                Регистрация
            </div>
            <div class="registration__sign-in">
                Уже есть аккаунт?
                <a class="sign-in-link" href="#">Войдите</a>
            </div>
            <form class="registration__form">
                <div class="form-group">
                    <input name="name" class="registration__form-input" type="text" placeholder="Имя">
                    <div class="registration__form-error">
                        Поле Ф.И.О. обязательное
                    </div>
                </div>
                <div class="form-group">
                    <input name="login" class="registration__form-input" type="text" placeholder="Логин">
                    <div class="registration__form-error">
                        Поле Логин обязательное
                    </div>
                </div>
                <div class="form-group">
                    <input name="password" class="registration__form-input" type="password" placeholder="Пароль">
                    <div class="registration__form-error">
                        Поле Пароль обязательное
                    </div>
                </div>
                <div class="form-group">
                    <input name="password-confirm" class="registration__form-input" type="password" placeholder="Подтвердите пароль">
                    <div class="registration__form-error">
                        Поля должны совпадать
                    </div>
                </div>
                <div class="confirm-rules">
                    <input name="rules" class="registration__form-checkbox" id="confirm-rules" type="checkbox" placeholder="Имя">
                    <label for="confirm-rules">Согласие с правилами обработки</label>
                    <div class="registration__form-error">
                        Согласие обязательное
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
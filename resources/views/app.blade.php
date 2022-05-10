<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('styles/plugins/reset.css')}}">
    <link rel="stylesheet" href="{{asset('styles/layout.css')}}">
    <link rel="stylesheet" href="{{asset('styles/index.css')}}">
    @stack('styles')

    <title>Document</title>
</head>
<body>


<div class="main-container">
    @sectionMissing('register-content')
        <x-side_bar/>
        <div class="container">
            <x-header/>
            @yield('content')
        </div>
        <div class="modal__overlay "></div>
    @endif
    @hasSection('register-content')
            @yield('register-content')
    @endif
</div>



<script src="{{asset('scripts/plugins/jquery.js')}}"></script>
<script src="{{asset('scripts/main.js')}}"></script>
@stack('scripts')

</body>
</html>

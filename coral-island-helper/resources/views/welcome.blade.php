<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coral Island Helper</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    @livewireStyles
@livewireScripts
</head>

<body class="frontpage">
    <img src="{{ URL::to('/') }}/images/Lily_default-spring.webp" alt="">
    <div class="content">
        <img src="{{ URL::to('/') }}/images/Coral_Island_logo.webp" alt="">
        <h1>Lake temple & museum helper</h1>

        <div class="frontpage-nav">
            <a href="{{ url('offerings') }}">Offerings</a>
            <a href="{{ url('museum') }}">Museum</a>
            <a href="{{ url('characters') }}">Characters</a>
            <a href="{{ url('recipes') }}">Recipes</a>
        </div>

        <div class="animals">
            <img src="{{ URL::to('/') }}/images/Bonbon_full_-_default.webp" alt="">
            <img src="{{ URL::to('/') }}/images/Grantle.webp" alt="">
            <img src="{{ URL::to('/') }}/images/Grog_default-spring.webp" alt="">
            <img src="{{ URL::to('/') }}/images/Peanut_happy-spring.webp" alt="">
            <img src="{{ URL::to('/') }}/images/Taco_default-spring.webp" alt="">
        </div>
    </div>
    <img src="{{ URL::to('/') }}/images/Sunny_default-spring.webp" alt="">
</body>
</html>
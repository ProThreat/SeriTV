<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SeriTV</title>

        {{-- CSS --}}
        <link rel="stylesheet" type="text/css" href="/css/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/libs/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/libs/owlcarousel/dist/assets/owl.theme.default.min.css">
        {{-- <link rel="stylesheet" type="text/css" href="/css/materialFormStyles.css"> --}}
        <link rel="stylesheet" type="text/css" href="/css/dropzone.css">
        <link href="/css/simply-tag.css" rel="stylesheet">
        <link href="/css/tokenize2.min.css" rel="stylesheet">
        <link href="/css/filepond-plugin-image-preview.css" rel="stylesheet">
        <link href="/css/filepond.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/style.css">

        {{-- Fonts --}}
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

    </head>
    <body class="{{ str_replace('/', '_', Request::path()) }} {{ @$layout }}">

        <div id="app">

            <example-component></example-component>

            <?php // Check permissions ?>
            {{-- @include('layouts.permissions') --}}

            <?php // Add navigation ?>
            @include('layouts.nav')

            <div class="content">
                @yield('content')
            </div>

        </div>

        <?php // Add footer ?>
        @include('layouts.footer')

    </body>
</html>

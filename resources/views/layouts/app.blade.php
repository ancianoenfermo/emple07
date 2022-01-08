<!DOCTYPE html>
<html lang= "{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8" />

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="lang" content="es">
        {!! \Artesaos\SEOTools\Facades\SEOTools::generate() !!}

        {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">


{{--
        <style>
           li {
                font-size: 14px;
                margin-left: 10px;
                list-style-type: circle;

            }
            li::marker {
                color:rgb(255, 0, 149);
            }
        </style>
--}}
    <style>
       li::marker {
            color:rgb(255, 0, 149);
            }
    </style>


        @livewireStyles

    </head>
    <body class="font-sans antialiased" itemscope itemtype="http://schema.org/WebPage">
        {{--<x-jet-banner />--}}

        <div class=" bg-pink-50">
            <div class="z-50 relative">
                @livewire('navigation-menu')
            </div>
            <!-- Page Heading -->
            @if (isset($header))
                {{--<header class="bg-white shadow"> --}}
                    {{--<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
                        {{ $header }}
                    {{--</div>--}}
                {{-- </header>--}}
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')


        @livewireScripts

        @stack('js')
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>

</body>

</html>

<!DOCTYPE html>
<html lang= "{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8" />

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="lang" content="es">
        {{--{!! \Artesaos\SEOTools\Facades\SEOTools::generate() !!} --}}

        {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        {{--<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">--}}

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    </head>
    <body class="font-sans antialiased" itemscope itemtype="http://schema.org/WebPage">
        {{--<x-jet-banner />--}}
        @include('layouts.navBlog')
        @yield('header')
        @yield('content')
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}"></script>

        <script>
            /*
             * Light YouTube Embeds by @labnol
             * Credit: https://www.labnol.org/
             */

            function labnolIframe(div) {
              var iframe = document.createElement('iframe');
              iframe.setAttribute(
                'src',
                'https://www.youtube.com/embed/' + div.dataset.id + '?autoplay=1&rel=0'
              );
              iframe.setAttribute('frameborder', '0');
              iframe.setAttribute('allowfullscreen', '1');
              iframe.setAttribute(
                'allow',
                'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'
              );
              div.parentNode.replaceChild(iframe, div);
            }

            function initYouTubeVideos() {
              var playerElements = document.getElementsByClassName('youtube-player');
              for (var n = 0; n < playerElements.length; n++) {
                var videoId = playerElements[n].dataset.id;
                var div = document.createElement('div');
                div.setAttribute('data-id', videoId);
                var thumbNode = document.createElement('img');
                thumbNode.src = '//i.ytimg.com/vi/ID/hqdefault.jpg'.replace(
                  'ID',
                  videoId
                );
                div.appendChild(thumbNode);
                var playButton = document.createElement('div');
                playButton.setAttribute('class', 'play');
                div.appendChild(playButton);
                div.onclick = function () {
                  labnolIframe(this);
                };
                playerElements[n].appendChild(div);
              }
            }

            document.addEventListener('DOMContentLoaded', initYouTubeVideos);
        </script>
</body>

</html>

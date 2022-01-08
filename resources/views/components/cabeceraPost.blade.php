@props(['portada'=>null])
<header>
    <div class="bg-cover h-80" style="background-image: url({{asset('/img/portadas')}}/{{$portada}})">
        <div class="h-80 ">
            <p class="text-6xl text pl-20 pb-8  tracking-wide  text-white font-bold ">
                {{$slot}}
            </p>
        </div>
    </div>

</header>




<div class="py-4 px-8 bg-white shadow-lg rounded-lg my-10 w-full">
    {{--Linea 1--}}
    <div class="pt-2 ml-4 flex items-center ">
        <!-- Localidad -->
        <div x-data="{ tooltip: false }">
            <div class="flex" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"  >
                <i class="fas fa-map-marker-alt fill-current text-gray-500 "></i>
                <p class="font-semibold ml-1 text-red-900 text-xs">{{ $empleo->localidad }}</p>
            </div>
            <div class="text-xs bg-gray-600 text-gray-100 px-1 absolute rounded mt-1" x-cloak x-show.transition.origin.top="tooltip">
                Provincia: {{ $empleo->provincia }}
            </div>
        </div>

        <span class="mx-3">|</span>

        <!-- Fecha de Publicación -->
        <div x-data="{ tooltip: false }">
            <div class="flex" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"  >
                <i class="fas fa-calendar-week fill-current text-gray-500"></i>
                <p class="text-xs ml-1">{{ \Carbon\Carbon::parse($empleo->datePosted)->diffForHumans() }}</p>
            </div>

            <div class="text-xs bg-gray-600 text-gray-100 px-1 absolute rounded mt-1" x-cloak x-show.transition.origin.top="tooltip">
                Publicada el {{ \Carbon\Carbon::parse($empleo->datePosted)->format('d/m/Y')}}
            </div>
        </div>

        <span class="mx-3">|</span>

        <!-- Web editor -->
        <div x-data="{ tooltip: false }">
            <div class="flex" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false">
                <i class="fab fa-internet-explorer fill-current text-gray-500"></i>
                <span class="text-xs ml-1">{{$empleo->JobFuente}}</span>
            </div>

            <div class="text-xs bg-gray-600 text-gray-100 px-1 absolute rounded mt-1" x-cloak x-show.transition.origin.top="tooltip">
                web www.agro.com
            </div>
        </div>


    </div>
    <hr class="mt-1"/>
    {{--Linea 2--}}
    <div class="flex">
        <div class="flex my-auto mt-4" >
            <h2 class="ml-4 text-gray-800 text-3xl font-semibold">
                {{$empleo->title}}
            </h2>
        </div>
    </div>
    {{--Linea 3--}}
    <div class="">
      <p class="mt-2 ml-4 text-gray-600"> {{$empleo->excerptCorto}}!</p>
    </div>
    <hr class="mt-1"/>
    {{--Linea 4--}}
    <div class="flex pt-6  ml-4">

        @if(!@empty($empleo->contrato))
            <span class="mr-4 items-center text-sm leading-none text-black">
                Contrato:
                <strong>{{ $empleo->contrato }}</strong>
            </span>
        @endif


        @if(!@empty($empleo->jornada))
            <span class="mr-4 items-center  text-sm leading-none text-black ">
                Jornada:
                <strong class="px-1">{{ $empleo->jornada }}</strong>
            </span>
        @endif
        @if(!@empty($empleo->salario))
            <span class="mr-4 items-center  px-2  text-sm leading-none text-black">
                Salario:
                <strong class="px-1">{{ $empleo->salario }}</strong>
            </span>

        @endif

        @if(!@empty($empleo->vacantes))
            <span class="mr-4 items-center  px-2  text-sm  leading-none text-black">
                Vacantes:
                <strong class="px-1 ">{{ $empleo->vacantes }}</strong>
            </span>
        @endif
        @if(!@empty($empleo->experiencia))
            <span class="mr-4 items-center  px-2  text-sm  leading-none text-black ">
                Experiencia:
                <strong class="px-1 ">Requerida</strong>
            </span>
        @endif

    </div>

    <div class="flex justify-end mt-4">
      <a href="{{ $empleo->JobUrl }}" target="_blank" class="text-xl font-semibold text-pink-500">Ir a la oferta</a>
    </div>
  </div>

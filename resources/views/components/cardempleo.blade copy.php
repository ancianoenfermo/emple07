<div>
    <article class="mt-5 rounded-lg  shadow-md bg-white bg-opacity-50 mb-10 border-2">
        <!--*************-->
        <!--* LINEA 1   *-->
        <!--*************-->

        <div class="pt-5 ml-4 flex items-center ">
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

            <!-- Tipos -->




            <!-- Ir a la Oferta -->
            <div class="flex-1 flex justify-end">
                <div class="flex" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"  >
                    <button
                    class="focus:outline-none focus:ring-2 focus:ring-pink-900 focus:ring-opacity-75 bg-pink-500 hover:bg-pink-700 text-white font-bold py-1 px-4 mr-4 rounded-xl  justify-end"
                    onclick="clickOferta('{{ $empleo->JobUrl }}','{{ $empleo->title }}')">
                    {{--onclick="window.open('{{ $empleo->$empleoUrl }}')">--}}
                    <span class="ml-2 text-xs">Ir a la oferta</span>
                    </button>
                </div>
            </div>
        </div>

        <!--*************-->
        <!--* LINEA 2   *-->
        <!--*************-->

        <div class="flex">
            <!-- Titulo de la Oferta -->
            <div class="flex my-auto mt-4" >
                <button class="ml-2"
                x-data="{ tooltip: false }"
                >
                <i class="fa fa-search-plus transition duration-500 ease-in-out bg-transparent hover:bg-transparent transform hover:-translate-y-1 hover:scale-110 text-pink-800" ></i>
                </button>
                <h2 class="ml-2 text-2xl font-semibold tracking-wide text-pink-900">
                    {{$empleo->title}}
                </h2>
            </div>
        </div>

        <!--*************-->
        <!--* LINEA 3   *-->
        <!--*************-->
        <div class="flex mx-10">
            <p>
                {{$empleo->excerptCorto}}
            </p>
        </div>

        <!--*************-->
        <!--* LINEA 4  *-->
        <!--*************-->
        <div class="flex pt-6  ml-4">

            @if(!@empty($empleo->contrato))
                <span class="mr-4 items-center text-sm leading-none text-black">
                    <strong>Contrato:</strong>
                    <span>{{ $empleo->contrato }}</span>
                </span>
            @endif


            @if(!@empty($empleo->jornada))
                <span class="mr-4 items-center  text-sm leading-none text-black ">
                    <strong>Jornada:</strong>
                    <span class="px-1">{{ $empleo->jornada }}</span>
                </span>
            @endif
            @if(!@empty($empleo->salario))
                <span class="mr-4 items-center  px-2  text-sm leading-none text-black">
                    <strong>Salario:</strong>
                    <span class="px-1">{{ $empleo->salario }}</span>
                </span>

            @endif

            @if(!@empty($empleo->vacantes))
                <span class="mr-4 items-center  px-2  text-sm  leading-none text-black">
                    <strong>Vacantes:</strong>
                    <span class="px-1 ">{{ $empleo->vacantes }}</span>
                </span>
            @endif
            @if(!@empty($empleo->experiencia))
                <span class="mr-4 items-center  px-2  text-sm  leading-none text-black ">
                    <strong>Experiencia:</strong>
                    <span class="px-1 ">Requerida</span>
                </span>
            @endif

        </div>


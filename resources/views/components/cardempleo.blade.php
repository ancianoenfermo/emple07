<div class=" pt-4 mx-24 bg-white shadow-lg rounded-lg my-10  border-b-4 border-pink-500">

    @php
        $tipos =[];
        if (strlen($empleo->tipos)>2) {
            $tipos = explode(',', $empleo->tipos);
        }
    @endphp
    {{--Linea 1--}}
    <div class="pt-2 ml-4 flex items-center ">
        <!-- Localidad -->
        <div x-data="{ tooltip: false }">
            <div class="flex" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"  >
                <i class="fas fa-map-marker-alt fill-current text-gray-500 my-auto"></i>
                <p class="font-semibold ml-1 text-red-900 text-lg">{{ $empleo->localidad }}</p>
            </div>
            <div class="text-xs bg-gray-600 text-gray-100 px-1 absolute rounded mt-1" x-cloak x-show.transition.origin.top="tooltip">
                Provincia: {{ $empleo->provincia }}
            </div>

        </div>

        <span class="mx-3">|</span>

        <!-- Fecha de Publicación -->
        <div x-data="{ tooltip: false }">
            <div class="flex" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false"  >
                <i class="fas fa-calendar-week fill-current text-gray-500 my-auto"></i>
                <p class="text-lg ml-1">{{ \Carbon\Carbon::parse($empleo->datePosted)->diffForHumans() }}</p>
            </div>

            <div class=" bg-gray-600 text-gray-100 px-1 absolute rounded mt-1" x-cloak x-show.transition.origin.top="tooltip">
                Publicada el {{ \Carbon\Carbon::parse($empleo->datePosted)->format('d/m/Y')}}
            </div>
        </div>

        <span class="mx-3">|</span>

        <!-- Web editor -->
        <div x-data="{ tooltip: false }">
            <div class="flex" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false">
                <i class="fab fa-internet-explorer fill-current text-gray-500 my-auto"></i>
                <span class="text-lg ml-1">{{$empleo->JobFuente}}</span>
            </div>

            <div class="text-xs bg-gray-600 text-gray-100 px-1 absolute rounded mt-1" x-cloak x-show.transition.origin.top="tooltip">
                web www.agro.com
            </div>
        </div>


        @if (count($tipos) > 0)
            <div class=" flex ml-4" >

                @foreach ($tipos as $tipo)

                    <span class=" px-2  mr-5 text-xs  font-semibold rounded-full bg-pink-400 text-white">
                            {{ $tipo }}
                    </span>

                @endforeach

            </div>
        @endif



    </div>
    <hr class="mt-1"/>
    {{--Linea 2--}}
    <div class="flex">
        <div class="flex my-auto mt-2" >
            <h2 class="ml-4 text-gray-800 text-2xl font-semibold">
                {{$empleo->title}}
            </h2>
        </div>
    </div>
    {{--Linea 3--}}
    <div class=" inline-flex items-baseline mr-2">
        <p class=" mt-2 ml-4  text-gray-600">{{$empleo->excerptCorto}}...
        <a id="{{$index}}" onclick="leermas({{$index}})" class="italic text-pink-600 cursor-pointer font-semibold" wire:click="showExceprt({{$empleo}})">Leer más
        </a>
        </p>
    </div>

    {{--Linea 4--}}
    <div class="flex pt-6 pb-2 ml-4">

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
        @if(!@empty($empleo->Texperiencia))
            <span class="mr-4 items-center  px-2  text-sm  leading-none text-black ">
                Experiencia:
                <strong class="px-1 ">Requerida</strong>
            </span>
        @endif

    </div>
    <hr class=""/>
    <div class="hover:bg-pink-200 h-16 flex flex-col-2  justify-center items-center ">
        <div class="flex-1">
            <a href="{{ $empleo->JobUrl }}" target="_blank" class="ml-4  text-xl font-semibold text-pink-800">Ver la oferta en {{$empleo->JobFuente}}</a>
        </div>
        <div>
            {{--<span class="text-6xl mr-8 text-pink-600">&#8594;</span>--}}
            <a class="text-6xl mr-8 text-pink-600" href="{{ $empleo->JobUrl }}" target="_blank" class="ml-4  text-xl font-semibold text-pink-800">&#8594;</a>
        </div>
    </div>



</div>

  {{--
  <div class="flex">
            <!-- Titulo de la Oferta -->
            <div class="flex my-auto mt-4" >
                <button class="ml-2"
                x-data="{ tooltip: false }"
                x-on:click="$dispatch('modal', { openModal: 'true',titulo: '{{$job->title}}', mensaje: '{{$job->excerpt}}' })">
                <i class="fa fa-search-plus transition duration-500 ease-in-out bg-transparent hover:bg-transparent transform hover:-translate-y-1 hover:scale-110 text-pink-800" ></i>
                </button>
                <h2 class="ml-2 text-2xl font-semibold tracking-wide text-pink-900">
                    {{$job->title}}
                </h2>
            </div>


        </div>
--}}

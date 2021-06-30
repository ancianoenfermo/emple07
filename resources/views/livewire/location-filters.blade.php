<div>
    <div class="bg-gray-200 py-4">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 block my-2 lg:flex">
                <!-- Dropdown Tipos de Trabajo -->
                <div class="relative mb-2 z-10" x-data="{open:false}">

                    <button
                        class="px-4 w-60 text-gray-700  h-12  rounded-lg overflow-hidden focus:outline-none bg-white shadow mr-6"
                        x-on:click="open = !open">
                            <span>{{ $elegidaTiposTrabajo }}</span>

                        <i class="fas fa-angle-down"></i>
                    </button>
                    <!-- Dropdown Body -->
                    <div class="absolute w-60 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                        x-on:click.away="open = false">
                        @foreach ($tiposTrabajo as $tipoTrabajo)
                            <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                                wire:click="tipoTrabajoClick({{ $tipoTrabajo }})"
                                x-on:click="open = false">{{ $tipoTrabajo->name }}</a>
                        @endforeach

                    </div>
                    <!-- // Dropdown Body  -->
                </div>

                {{-- Dropwdown Autonomias --}}
                <div class="relative mb-2 z-40" x-data="{open:false}">

                    <button
                        class="px-4 w-60 text-gray-700  h-12  rounded-lg overflow-hidden focus:outline-none bg-white shadow mr-6"
                        x-on:click="open = !open">
                        @if (@isset($elegidaAutonomia))
                            <span>{{ $elegidaAutonomia }}</span>
                        @else
                            <span>Todas las Autonomías</span>
                        @endif
                        <i class="fas fa-angle-down"></i>
                    </button>
                    <!-- Dropdown Body -->
                    <div class="absolute w-60 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                        x-on:click.away="open = false">
                        <!--
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                            wire:click="$set('elegidaAutonomia','Todas las Autonomías')" x-on:click="open = false">Todas
                            las Autonomías</a>
                        -->
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                            wire:click="autonomiaClick({{null}})" x-on:click="open = false">Todas
                            las Autonomías</a>
                        @foreach ($autonomias as $autonomia)
                            <a  class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                                wire:click="autonomiaClick({{ $autonomia }})"
                                x-on:click="open = false">{{ $autonomia->name }}</a>
                        @endforeach

                    </div>
                    <!-- // Dropdown Body  -->


                    <!-- // Dropdown Body -->

                </div>
                <!-- Dropdown Provincias -->
                <div class="relative mb-2 z-30" x-data="{open:false}">
                    <button class="
                @empty($provincias)
                    cursor-not-allowed
                @endempty
                 px-4 w-60 text-gray-700  h-12  rounded-lg overflow-hidden focus:outline-none bg-white shadow mr-6"
                        x-on:click="open = !open">
                        @if (@isset($elegidaProvincia))
                            <span>{{ $elegidaProvincia }}</span>
                        @else
                            <span>Todas las Provincias</span>
                        @endif
                        <i class="fas fa-angle-down"></i>
                    </button>
                    <!-- Dropdown Body -->
                    @isset($provincias)
                        <div class="absolute right-0 w-60 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                            x-on:click.away="open = false">
                            {{--
                            <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                                wire:click="$set('elegidaProvincia','Todas las Provincias')" x-on:click="open = false">Todas
                                las Provincias</a>
                            --}}
                            <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                            wire:click="provinciaClick({{null}})" x-on:click="open = false">Todas
                                las Provincias</a>
                            @foreach ($provincias as $provincia)
                                <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                                    wire:click="provinciaClick({{ $provincia }})"
                                    x-on:click="open = false">{{ $provincia->name }}</a>
                            @endforeach
                        </div>
                    @endisset
                </div>

                <!-- Dropdown Localidades -->
                <div class="relative mb-2  z-20" x-data="{open:false}">
                    <button class="
                @empty($localidades)
                    cursor-not-allowed
                @endempty
                 px-4 w-60 text-gray-700  h-12  rounded-lg overflow-hidden focus:outline-none bg-white shadow mr-6"
                        x-on:click="open = !open">
                        @if (@isset($elegidaLocalidad))
                            <span>{{ $elegidaLocalidad }}</span>
                        @else
                            <span>Todas las Localidades</span>
                        @endif
                        <i class="fas fa-angle-down"></i>
                    </button>
                    <!-- Dropdown Body -->
                    @isset($localidades)


                        <div class="absolute right-0 w-60 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                            x-on:click.away="open = false">
                            {{--
                            <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                                wire:click="$set('elegidaProvincia','Todas las Provincias')" x-on:click="open = false">Todas
                                las Localidades</a>
                            --}}
                            <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                            wire:click="localidadClick({{null}})" x-on:click="open = false">Todas
                                las Localidades</a>
                            @foreach ($localidades as $localidad)
                                <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                                    wire:click="localidadClick({{ $localidad }})"
                                    x-on:click="open = false">{{ $localidad->name }}</a>
                            @endforeach
                        </div>
                    @endisset
                </div>


            </div>

        </div>

    </div>

    <div>
        @foreach ($jobs as $job )

          <p>{{$job->title}}</p>

            <p>{{$job->autonomia->name}}</p>
            <p>{{$job->provincia->name}}</p>
            <p>{{$job->localidad->name}}</p>
            @foreach ($job->tipojobs as $tipoJob )
                <p> {{$tipoJob->name}}  <p>
            @endforeach
        @endforeach
    </div>
</div>




{{-- <button  disabled class="cursor-not-allowed px-4 w-60 text-gray-700  h-12  rounded-lg overflow-hidden focus:outline-none bg-white shadow"
x-on:click="open = !open">
@if (@isset($elegidaProvincia))
<span>{{$elegidaProvincia}}</span>
@else
    <span>Todas las Provincias</span>
@endif
<i class="fas fa-angle-down"></i>
</button>
<!-- Dropdown Body -->
@isset($provincias)


<div class="absolute right-0 w-60 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
    x-on:click.away="open = false">
    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('elegidaProvincia','Todas las Provincias')" x-on:click="open = false">Todas las Provincias</a>
    @foreach ($provincias as $provincia)
        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('elegidaProvincia','{{$provincia->name}}')" x-on:click="open = false">{{ $provincia->name }}</a>
    @endforeach
</div>
@endisset


<div class="py-12">
        <div class="relative" x-data="{open:false}">

            <button class="px-4 w-60 text-gray-700  h-12  rounded-lg overflow-hidden focus:outline-none bg-white shadow mr-6"
                x-on:click="open = !open">
                @if (@isset($elegidaAutonomia))
                <span>{{$elegidaAutonomia}}</span>
                @else
                    <span>Todas las Autonomías</span>
                @endif
                <i class="fas fa-angle-down"></i>
            </button>
            <!-- Dropdown Body -->
            <div class="absolute right-0 w-60 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                x-on:click.away="open = false">
                <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('elegidaAutonomia','Todas las Autonomías')" x-on:click="open = false">Todas las Autonomías</a>
                @foreach ($autonomias as $autonomia)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white" wire:click="$set('elegidaAutonomia','{{$autonomia->name}}')" x-on:click="open = false">{{ $autonomia->name }}</a>
                @endforeach

            </div>
            <!-- // Dropdown Body  -->


            <!-- // Dropdown Body -->
            <p class= "text-white">Autonomia elegida : {{$elegidaAutonomia}}</p>
        </div>



    </div> --}}


{{-- <div class="relative">
                <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow">
                    Todas las Autonomías
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl">
                    <a href="#"
                        class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">Settings</a>
                    <div class="py-2">
                        <hr>
                        </hr>
                    </div>
                    <a href="#"
                        class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">
                        Logout
                    </a>
                </div>
                <!-- // Dropdown Body -->
            </div> --}}

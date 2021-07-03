<div>
    <section class="bg-cover object-cover object-bottom "
        style="background-image: url({{ asset('img/ofertas/portadaOfertas.jpg') }})">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 py-36 ">
            <div class="w-full md:w-3/4b">
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-extrabold text-white tracking-wider">
                    {{ $titleH1 }}</h1>
                <p class="text-white text-lg mt-2 mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Incidunt
                    quia blanditiis accusamus porro nihil ex aut, dolorem quae nisi beatae quod praesentium
                    molestiae
                    enim laboriosam amet accusantium nesciunt deserunt nostrum</p>
            </div>
        </div>
    </section>

    <div class="bg-gray-500 py-3 flex justify-around lg:sticky top-0">
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
                            wire:click="autonomiaClick({{ null }})" x-on:click="open = false">Todas
                            las Autonomías</a>
                        @foreach ($autonomias as $autonomia)
                            <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
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
                            {{-- <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                                wire:click="$set('elegidaProvincia','Todas las Provincias')" x-on:click="open = false">Todas
                                las Provincias</a> --}}
                            <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                                wire:click="provinciaClick({{ null }})" x-on:click="open = false">Todas
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
                            {{-- <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                                wire:click="$set('elegidaProvincia','Todas las Provincias')" x-on:click="open = false">Todas
                                las Localidades</a> --}}
                            <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                                wire:click="localidadClick({{ null }})" x-on:click="open = false">Todas
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

    <div class="container mx-auto py-2 mt-3 ">
        <div class="sm:px-4 lg:px-20">
        @foreach ($jobs as $job)

            <x-jobCard :job=$job />

        @endforeach
        </div>
    </div>


    @if ($jobs->hasPages())
        <div class="bg-gray-200 px-4 py-3 mt-5 mb-5 mr-2 items-center justify-between border-t border-gray-200 sm:px-6">
            {{ $jobs->links() }}
        </div>

    @endif

</div>

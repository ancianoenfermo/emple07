<div>

    <div wire:init="loadEmpleos" class=" relative mt-10">
        {{--<div class=" border-gray-100 border-opacity-50 rounded-lg
            @if (!$showSearch) hidden @endif relative">
            @livewire('filter-jobs')
        </div>
        --}}

        <div class="container mx-auto px-28 py-5">
            @if (count($ofertas))

                {{-- <div x-data='{openModal:false}' class="mt-10">--}}
                <div class="mt-10">

                    @foreach ($ofertas as  $job)


                        <x-cardjob :job=$job/>


                    @endforeach
                    {{--<x-cardjob :job=$job />--}}

                    @if ($ofertas->hasPages())
                        <div
                            class="bg-gray-50 px-4 py-3 mt-5 mb-5 mr-2 items-center justify-between border-t border-gray-200 sm:px-6">
                            {{ $ofertas->links() }}
                        </div>

                    @endif

                    {{-- MODAL --}}
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div x-data='{openModal:false, titulo:"", mensaje:""}' x-show='openModal'
                        x-on:modal.window="openModal = $event.detail.openModal;
                         mensaje = $event.detail.mensaje;
                         titulo = $event.detail.titulo;
                         "
                        class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                        aria-modal="true">

                        <div
                            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
                            </div>

                            <!-- This element is to trick the browser into centering the modal contents. -->
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                aria-hidden="true">&#8203;</span>
                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div
                                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <!-- Heroicon name: outline/exclamation -->
                                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title" x-ref="titulo">
                                                <p  x-html="titulo" class="text-lg font-bold text-gray-500"></p>
                                            </h3>
                                            <hr>
                                            <div class="mt-2">
                                                <p  x-html="mensaje" class="text-sm text-gray-500"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                                    <button type="button"
                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                        x-on:click.away='openModal = false'>
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- FIN MODAL --}}

                </div>


            @endif




            <div wire:loading class="backdrop-filter backdrop-blur-sm absolute inset-x-0  top-0 h-full w-full">
                <div style="color: #283618" class="la-line-scale-pulse-out items-center absolute top-6 left-1/2">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>

        </div>
    </div>
@push('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('showNOrecords', mensaje => {
            Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No hemos encontrado ninguna oferta con '+ mensaje,

            });
        });

        Livewire.on('cabecerah1',totalRecords=> {
            GetSelectedText(totalRecords);
        });


        function GetSelectedText(total){
                var e = document.getElementById("tipoTrabajo");
                var tipoTrabajo = e.options[e.selectedIndex].text;

                var e = document.getElementById("autonomia");
                var autonomia = e.options[e.selectedIndex].text;

                var e = document.getElementById("provincia");
                var provincia = e.options[e.selectedIndex].text;

                var e = document.getElementById("localidad");
                var localidad = e.options[e.selectedIndex].text;

                var busqueda = document.getElementById("textobuscar").value;


                var lugar = "";
                var en = "";
                var tipo = "";

                if (tipoTrabajo != "Todos los trabajos") {
                    tipo = " con " + tipoTrabajo;
                    tipo = tipo.toLowerCase();
                }

                if (localidad != "Todas las Localidades") {
                    lugar = localidad;
                    en = " en ";
                } else if (provincia != 'Todas las Provincias') {
                    lugar = provincia;
                    en = " en ";
                }   else if (autonomia != 'Todas las Autonomias') {
                    lugar = autonomia;
                    en = " en ";
                }

                totalformat = new Intl.NumberFormat("de-DE").format(total)
                if(totalformat == "NaN") {
                    totalformat = "";
                    document.getElementById("filtros").style.cssText = "pointer-events: none;opacity: 0.5;background: #CCC;"
                    document.getElementById("totalOfertas").className = "rounded animate-spin ease duration-300 w-5 h-5 border-2 border-blue-600";
                    document.getElementById("totalOfertas").innerHTML = totalformat;

                    console.log("NaN")
                } else {
                    document.getElementById("totalOfertas").className = "text-4xl";
                    document.getElementById("filtros").style.cssText = ""
                    console.log("Numero");
                }

                textoh1 = "Ofertas de trabajo " + tipo + en + lugar ;

                document.getElementById("totalOfertas").innerHTML = totalformat;

                document.getElementById("cabecerah1").innerHTML = textoh1;

                console.log(textoh1);
                console.log(busqueda);
                return;
            };
            function GetTextBusqueda(){
                var busqueda = document.getElementById("textobuscar").value;
                return busqueda;
            }

    </script>
@endpush
</div>
{{--
 @if($loop->index != 9999)
                        @php
                            $tt = $loop->index
                        @endphp
                        <x-cardjob :job=$job :index=$tt/>
                        @endif






--}}

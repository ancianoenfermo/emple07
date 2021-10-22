
<x-app-layout>

    <header class="cabecera">
        <div class="pt-4 pb-4">
            <p class="text-4xl text-center font-bold tracking-wider">
                EMPLEO EN ESPAÑA
            </p>

        </div>
        <section>
            <div class="px-4 pb-4 sm:px-6 lg:px-8"
            >

                @livewire('filter-jobs')
                <div class="flex items-center justify-center pt-10 pb-4">
                    <p class="text-2xl text-pink-800 animate-pulse" id="buscando">Cargando ...</p>
                    <p class="ml-2 rounded animate-spin ease duration-300 w-5 h-5 border-2 border-pink-800" id="totalOfertas"></p>
                    <h1 class="text-4xl pl-2 " id = "cabecerah1" >Ofertas de trabajo</h1>
                </div>
            </div>

        </section>
    </header>
    <x-separadorCabecera/>

    <section class="bg-pink-50 min-h-screen">

            @livewire('jobs')

    </section>
    <x-separadorFooter/>
    <x-footer/>

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

            Livewire.on('filtrosOff',totalRecords=> {
                OffFiltros();

            });







           async function GetSelectedText(total){
                console.log("GetSelectedText");
                totalformat = new Intl.NumberFormat("de-DE").format(total)
                document.getElementById("totalOfertas").className = "text-4xl";
                document.getElementById("buscando").style.visibility = "hidden";
                document.getElementById("totalOfertas").innerHTML = totalformat;
                const cabecera = await  getDatosTituloH1()
                document.getElementById("cabecerah1").innerHTML = cabecera;
                document.getElementById("filtros").classList.remove("disabledbutton");
                document.getElementById("filtros").classList.remove("blur");

            };

            function clickFiltersBuscar() {
                console.log("ClickFilterBuscar");
                document.getElementById("filtros").classList.add("disabledbutton");
                document.getElementById("filtros").classList.add("blur");
                document.getElementById("cabecerah1").innerHTML = getDatosTituloH1();
                document.getElementById("buscando").style.visibility = "visible";
                document.getElementById("totalOfertas").className = "ml-2 rounded animate-spin ease duration-300 w-5 h-5 border-2 border-green-800";
                document.getElementById("totalOfertas").innerHTML ="";
            }


            function getDatosTituloH1() {
                console.log("getDatosTituloH1");
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
                textoh1 = "Ofertas de trabajo " + tipo + en + lugar ;
                return textoh1;

            }


            function GetTextBusqueda(){
                console.log("GetTextBusqueda");
                var busqueda = document.getElementById("textobuscar").value;
                return busqueda;
            }

            function clickOferta(url,oferta) {
                Swal.fire({
                    title: 'Se abrirá en una pestaña nueva la oferta',
                    text: oferta,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK',
                    cancelButtonText: 'CANCELAR'
                    }).then((result) => {
                    if (result.isConfirmed) {

                        window.open(url);

                    }
                })
            }

            function showOfertaInfo() {
                Swal.fire({
                    title: 'Hemos abierto una pestaña nueva en tu navegador',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                })
            }

        </script>
    @endpush
    @push('modals')
    {{-- MODAL --}}
                        <!-- This example requires Tailwind CSS v2.0+ -->
                        <div x-data='{openModal:false, titulo:"", mensaje:""}' x-show='openModal' x-init='{openModal:false, titulo:"", mensaje:""}'
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
                                            x-on:click.away='openModal = false'
                                            x-on:click.away='openModal = false'
                                            >
                                            Cerrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- FIN MODAL --}}

    @endpush
</x-app-layout>

{{-- style="background-image: url({{asset('img/home/portada.jpg')}})"> --}}
{{-- Sacar y actiave en jobs-blade despues de prurbas
<div>
    @livewire('filter-jobs')

</div>
toltipPublicada.addEventListener('mouseleave',
            () =>{
                console.log("Sale Mouse")
            })


 --}}


 {{--
<div class="flex-1">

                <h1 class="">
                   @livewire('cabecera-ofertas')
                </h1>

            </div>


@isset($fertas)
@if (count($ofertas))
    @php
    Config::set('seotools.meta.defaults.description', 'CambiadoAAAAAAA');
    @endphp
@endif
@endisset



--}}

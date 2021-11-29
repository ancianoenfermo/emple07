<main class="flex flex-col h-screen">
    <div class="flex flex-1 overflow-hidden">
        <div class=" bg-pink-100 w-64 p-2 mt-16">

            <div class="text-center text-2xl text-pink-900 pb-2">
            FILTROS
            </div>
            <hr class="block bg-gradient-to-b from-pink-200 via-pink-300 to-pink-600 h-2 border-none">
            {{--TIPO DE TRABAJO Y OTROS--}}
            <div class=" mx-1 px-1 pb-2 ">
                <div class="grid grid-cols-2 gap-x-1 pt-4 px-1 pb-2">
                    <div>
                        <label class="inline-flex items-center mt-3 text-xs">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-pink-600" checked><span class="ml-2 text-gray-700">Discapacidad</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center mt-3 text-xs ">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-pink-600" checked><span class="ml-2 text-gray-700">Prácticas</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center mt-3 text-xs">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-pink-600" checked><span class="ml-2 text-gray-700">Teletrabajo</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center mt-3 text-xs">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-pink-600" checked><span class="ml-2 text-gray-700">100% Teletrabajo</span>
                        </label>
                    </div>
                    <div>
                        <label class="inline-flex items-center mt-3 text-xs">
                            <input type="checkbox" class="form-checkbox h-5 w-5 text-pink-600" checked><span class="ml-2 text-gray-700">ETT</span>
                        </label>
                    </div>



                </div>
                <hr class="block bg-gradient-to-b from-pink-200 via-pink-300 to-pink-600 h-2 border-none">
                <div class="flex items-center pt-2">
                    <label class="w-24 text-xs mr-2">Autonomia</label>
                    <select class="items-end block w-full text-xs  border-pink-600 focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Todas</option>
                    </select>
                </div>
                <div class="flex items-center pt-2">
                    <label class="w-24 text-xs mr-2">Provincia</label>
                    <select class="items-end block w-full text-xs  border-pink-600 focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Todas</option>
                    </select>
                </div>
                <div class="flex items-center pt-2">
                    <label class="w-24 text-xs mr-2">Localidad</label>
                    <select class="block w-full   text-xs  border-pink-600 focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Todas</option>
                    </select>
                </div>




                <div class="flex items-center pt-2">
                    <label class="w-24 text-xs block mr-2">Contrato</label>
                    <select class="block w-full text-xs  border-pink-600 focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Todos</option>
                    </select>
                </div>

                <div class="flex items-center pt-2">
                    <label class="w-24 text-xs block mr-2">Jornada</label>
                    <select class="block w-full text-xs  border-pink-600 focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Todas</option>
                    </select>
                </div>
                <div class="flex items-center pt-2">
                    <label class="w-24 text-xs block mr-2">Experiencia</label>
                    <select class="block w-full text-xs  border-pink-600 focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Todas</option>
                    </select>
                </div>
                <div class="flex items-center pt-2">
                    <label class="w-24 text-xs block mr-2">Salario</label>
                    <select class="block w-full text-xs  border-pink-400 focus:border-pink-300 focus:ring focus:ring-pink-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="">Todos</option>
                    </select>
                </div>
            </div>
            <hr class="block bg-gradient-to-b from-pink-200 via-pink-300 to-pink-600 h-2 border-none">


        </div>
        <div class="flex flex-1 flex-col mt-16">
            <div class="flex bg-pink-400 h-16 p-4">Header</div>
            <div class="flex flex-1 bg-blue-300 overflow-y-auto paragraph px-4">
                @foreach ($empleos as $empleo )
                <x-cardempleo :empleo=$empleo/>
                @endforeach
            </div>
            @if ($empleos->hasPages())
                <div
                    class="bg-transparent px-4 py-10  mr-2 items-center justify-between  sm:px-6">
                    {{ $empleos->links()}}
                </div>

            @endif
        </div>
        <x-separadorFooter/>
        <x-footer/>

    </div>
</main>
@push('js')
        <script>
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
                            window.focus();
                            window.open(url);

                        }
                    })
                }
        </script>

@endpush

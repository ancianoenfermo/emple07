
<div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
    <div class="flex flex-1">
        <div class="flex flex-1 bg-white overflow-y-auto paragraph px-4">
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
        <x-separadorFooter/>
        <x-footer/>
    </div>
    <div class="fixed inset-y-0 right-0 bg-red-500  lex flex-col w-full md:w-64 text-gray-700  dark-mode:text-gray-200 dark-mode:bg-gray-800 flex-shrink-0">
        <div class=" bg-pink-100 w-64 p-2 pt-10">
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

    </div>


</div>

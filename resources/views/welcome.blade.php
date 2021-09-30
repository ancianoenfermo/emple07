<x-app-layout>
    <section class="bg-gradient-to-r from-green-100 via-green-200 to-green-500">

        <div class="mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-10">
            <div class="flex">
                <div class=flex-1>
                    <h1 class="pb-6  text-3xl md:text-4xl lg:text-6xl font-extrabold text-black tracking-wider leading-loose ">¿Estás buscando empleo?</h1>
                    <p class="nivelp text-2xl italic leading-relaxed ">Para que tu proceso de búsqueda pueda obtener mejores frutos, es preciso que te prepares y aproveches cualquier oportunidad para venderte en el mercado laboral y encontrar trabajo con éxito.</p>
                </div>
                <div class="flex items-center ml-10">
                    <div class="bg-green-900 border-2 rounded-lg shadow-lg animate-pulse">
                        <div class="container mx-auto text-center px-4 py-6 text-white ">
                            <h2 class="text-2xl md:text-4xl font-medium">Ofertas de trabajo</h2>
                            <p class="mt-3">Ofertas publicadas en España en los últimos treinta días</p>


                            <div class="flex items-center justify-center mt-4">
                                <a class="text-mx text-center font-extrabold text-white transition-colors duration-150 bg-green-500 rounded-lg focus:shadow-outline hover:bg-green-700"
                                href="{{Route('ofertas')}}"><span class=" flex mx-5 py-1 ">Ver todas las ofertas</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="bg-white pb-4">
        <h1 class="text-gray-600 text-center text-3xl mb-10 pt-10 ">RECURSOS PARA LA BÚSQUEDA DE EMPLEO</h1>
        <div
            class="mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>

                    <a href="{{ route('buscarEmpleo') }}">
                    <img class="rounded-xl h-36 w-full object-contain " src="{{ asset('img/home/buscar-empleo.jpg') }}" alt="">
                    </a>
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">¿Dónde puedo buscar trabajo?</h1>

                    <p class="text-sm text-gray-500">Durante la búsqueda de empleo, tu objetivo es ponerte en contacto con las empresas y convencerlas de tus idoneidad para el puesto de trabajo.

                    </p>

                </header>
            </article>





            <article>
                <figure>

                    <a href="{{ route('entrevista') }}">
                    <img class="rounded-xl h-36 w-full object-contain " src="{{ asset('img/home/entrevista.png') }}" alt="">
                    </a>
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">La entrevista de trabajo</h1>

                    <p class="text-sm text-gray-500">La entrevista es la técnica más utilizada en los procesos de selección de personal.

                    </p>

                </header>
            </article>

            <article>
                <figure>

                    <a href="{{ route('curriculum') }}">
                    <img class="rounded-xl h-36 w-full object-contain " src="{{ asset('img/home/curriculum.png') }}" alt="">
                    </a>
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">El curriculum</h1>

                    <p class="text-sm text-gray-500">El curriculum es el instrumento para presentarte a las instituciones o empresas; es tu tarjeta de presentación

                    </p>

                </header>
            </article>

            <article>
                <figure>
                    <a href="{{ route('carta') }}">
                    <img class="rounded-xl h-36 w-full object-contain " src="{{ asset('img/home/CartaPresentacion.png') }}" alt="">
                    </a>
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Carta de presentación</h1>

                    <p class="text-sm text-gray-500">Es la carta que acompaña al CV y pretende atraer la atención del responsable de selección

                    </p>

                </header>
            </article>






            <article>
                <figure>

                    <a href="#">
                    <img class="rounded-xl h-36 w-full object-contain" src="{{ asset('img/home/FormacionD.jpg') }}" alt="">
                    </a>
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Formación gratuita</h1>

                    <p class="text-sm text-gray-500">100% Subvencionados por el Ministerio de Trabajo, Migraciones y Seguridad Social

                    </p>

                </header>
            </article>
            <article>
                <figure>

                    <a href="#">
                    <img class="rounded-xl h-36 w-full object-contain" src="{{ asset('img/home/FormacionAprendizaje.jpg') }}" alt="">
                    </a>
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">El contrato de formación y apredizaje</h1>

                    <p class="text-sm text-gray-500">Destinado a favorecer la inserción laboral y la formación de las personas jóvenes

                    </p>

                </header>
            </article>

            <article>
                <figure>

                    <a href="#">
                    <img class="rounded-xl h-36 w-full object-contain" src="{{ asset('img/home/Practicas.jpg') }}" alt="">
                    </a>
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">El contrato en prácticas</h1>

                    <p class="text-sm text-gray-500">Tiene por objeto la obtención por el trabajador de la práctica profesional adecuada al nivel de estudios cursados

                    </p>

                </header>
            </article>

        </div>
    </section>
    <x-footer/>
</x-app-layout>

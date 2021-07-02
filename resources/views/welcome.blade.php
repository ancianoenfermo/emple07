<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/home/portada.jpg') }})">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4b lg:w-1/2">
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-extrabold text-white tracking-wider">Ofertas de Empleo en España</h1>
                <div class="bg-black bg-opacity-25 mt-10 items-center rounded-lg border border-yellow-500 ">
                    <div class="flex mt-2">
                    <p class="text-white text-xl mx-5 mt-4"><strong
                            class="text-2xl font-bold text-yellow-500">"</strong> Hemos encontrado
                        <span class="font-bold">{{ $totalRecords }}
                            ofertas de trabajo</span> publicadas en España
                        en los últimos 3o días<strong class="text-2xl font-bold text-yellow-500 ml-1">"</strong>
                    </p>
                    </div>
                    <div class="flex mb-10 justify-end">
                        <a class="flex h-8 items-center  ml-4 mr-4 mb-2 text-base text-indigo-100 transition-colors duration-150 bg-yellow-500 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                        href="{{Route('ofertas')}}"><span class="ml-5 mr-5">Ver ofertas</span></a>
                    </div>
                </div>
                <!-- component -->



            </div>

    </section>

    <section class="mt-10 mb-20">
        <h1 class="text-gray-600 text-center text-3xl mb-6">FORMACIÓN PARA EL EMPLEO</h1>
        <div
            class="mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/img1.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Formación gratuita para desempleados</h1>

                    <p class="text-sm text-gray-500">100% Subvencionados por el Ministerio de Trabajo, Migraciones y Seguridad Social

                    </p>

                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/img2.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Formación gratuita para ocupados</h1>
                    <p class="text-sm text-gray-500">Pensados para responder a las necesidades formativas de un trabajador en activo.</p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/img3.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Contratos de Formación y apredizaje</h1>
                    <p class="text-sm text-gray-500">Cualificación profesional de los trabajadores, en un régimen de alternancia de actividad laboral retribuida en una empresa, con actividad formativa</p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/img4.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Certificados de Profesionalidad</h1>
                    <p class="text-sm text-gray-500">Instrumento de acreditación oficial de las cualificaciones profesionales del Catálogo Nacional de Cualificaciones Profesionales en el ámbito de la administración laboral</p>
                </header>
            </article>
        </div>
    </section>
</x-app-layout>

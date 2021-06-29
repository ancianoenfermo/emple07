<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/home/portada.jpg') }})">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4b lg:w-1/2">
                <h1 class="text-4xl font-bold text-white">Título página</h1>
                <p class="text-white text-lg mt-2 mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt
                    quia blanditiis accusamus porro nihil ex aut, dolorem quae nisi beatae quod praesentium molestiae
                    enim laboriosam amet accusantium nesciunt deserunt nostrum</p>
            </div>
            <!-- component -->
            @livewire('location-filters')
        </div>
    </section>

    <section class="mt-20">
        <h1 class="text-gray-600 text-center text-3xl mb-6">FORMACIÓN PARA EL EMPLEO</h1>
        <div
            class="mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/img1.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y productos</h1>
                    <p class="text-sm text-gray-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas
                        nostrum ipsam </p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/img2.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y productos</h1>
                    <p class="text-sm text-gray-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas
                        nostrum ipsam </p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/img3.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y productos</h1>
                    <p class="text-sm text-gray-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas
                        nostrum ipsam </p>
                </header>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/img4.jpg') }}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos y productos</h1>
                    <p class="text-sm text-gray-500">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas
                        nostrum ipsam </p>
                </header>
            </article>
        </div>
    </section>
</x-app-layout>

{{--  --}}

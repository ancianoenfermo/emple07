<x-app-layout>
    <section class="bg-cover" style="background-image: url({{ asset('img/ofertas/portadaOfertas.jpg') }})">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4b lg:w-1/2">
                <h1 class="text-4xl font-bold text-white">Título página</h1>
                <p class="text-white text-lg mt-2 mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt
                    quia blanditiis accusamus porro nihil ex aut, dolorem quae nisi beatae quod praesentium molestiae
                    enim laboriosam amet accusantium nesciunt deserunt nostrum</p>
            </div>
            <!-- component -->

        </div>

    </section>

    @livewire('location-filters')

</x-app-layout>

{{--style="background-image: url({{asset('img/home/portada.jpg')}})"> --}}

<x-app-layout>

    <section class="bg-cover object-cover object-bottom"
        style="background-image: url({{ asset('img/ofertas/portadaOfertas.jpg') }})">
        <div class="mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4b">
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-extrabold text-white tracking-wider"> Ofertas de
                    trabajo publicadas en los últimos 30 días en España</h1>
                <p class="text-white text-lg mt-2 mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Incidunt
                    quia blanditiis accusamus porro nihil ex aut, dolorem quae nisi beatae quod praesentium molestiae
                    enim laboriosam amet accusantium nesciunt deserunt nostrum</p>
            </div>
        </div>
    </section>

    <div class="sm:block bg-gray-500 py-3 lg:flex lg:justify-around">
        @livewire('filters')
    </div>
    <div class="container mx-auto px-4">
        @livewire('jobs', ['tipoTrabajo'=> $tipoTrabajo,'autonomia' => null, 'provincia'=> null, 'localidad'=>null])

    </div>
    {{-- Temporal para generar un espacio BORRAR --}}
    <div class="h-64">
    </div>
</x-app-layout>

{{-- style="background-image: url({{asset('img/home/portada.jpg')}})"> --}}

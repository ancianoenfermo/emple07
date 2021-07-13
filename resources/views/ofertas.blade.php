<x-app-layout>

    <section>
        <div class="mx-auto px-4 sm:px-6 lg:px-8 pt-20 pb-5">
            <div class="w-full md:w-3/4b lg:w-1/2">
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-extrabold text-black tracking-wider leading-loose ">Ofertas de trabajo publicadas en España el los últimos 30 días</h1>

            </div>
            <div class="flex items-center mb-10 ">

                <a class="flex-col h-12  mt-5 text-lg font-extrabold text-white transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800"
                        href="{{Route('home')}}"><span class=" flex mx-5 py-3 ">Formación gratuita para desemleados y ocupados</span></a>

                <span class="flex-col flex-1 "></span>
                </div>

            <div>
                @livewire('filter-jobs',['tipoTrabajo'=>'1'])

              </div>
    </section>

    <section class="bg-white py-5">
        <div class="">
            @livewire('jobs', ['tipoTrabajo'=> '2','autonomia' => null, 'provincia'=> null, 'localidad'=>null])
        </div>
    </section>

</x-app-layout>

{{-- style="background-image: url({{asset('img/home/portada.jpg')}})"> --}}

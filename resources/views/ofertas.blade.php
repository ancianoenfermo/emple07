<x-app-layout>

    <section>
        <div class="mx-auto px-4 sm:px-6 lg:px-8 pt-10 pb-3 bg-gray-50">
            <div class="w-full md:w-3/4b lg:w-1/2">
                <h1 class="text-3xl md:text-4xl lg:text-4xl font-extrabold text-black tracking-wider leading-loose ">
                    @livewire('cabecera-ofertas')
                </h1>
            </div>

    </section>

    <section class="bg-white">
        <div class="">
            @livewire('jobs')
        </div>
    </section>


</x-app-layout>

{{-- style="background-image: url({{asset('img/home/portada.jpg')}})"> --}}
{{-- Sacar y actiave en jobs-blade despues de prurbas
<div>
    @livewire('filter-jobs')

</div>
 --}}

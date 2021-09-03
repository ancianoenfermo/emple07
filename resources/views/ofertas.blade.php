<x-app-layout>

    <section>
        <div class="flex my-10 px-4 sm:px-6 lg:px-8  bg-gray-50">
            <div class="flex-1">
                <h1 class="">
                   @livewire('cabecera-ofertas')
                </h1>
            </div>
            <div>
                @livewire('filter-jobs')
            </div>
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

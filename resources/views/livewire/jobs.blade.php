<div>
    @section('title', 'mititulo')
    <div wire:init="loadEmpleos" class=" relative mt-10">


        <div class=" border-gray-100 border-opacity-50 rounded-lg
            @if (!$showSearch) hidden @endif relative">


            {{--@livewire('filter-jobs')--}}
        </div>


        <div class="container mx-auto px-28 py-5">
            @if (count($ofertas))


                {{-- <div x-data='{openModal:false}' class="mt-10">--}}
                <div class="mt-10">

                    @foreach ($ofertas as  $job)


                        <x-cardjob :job=$job/>


                    @endforeach
                    {{--<x-cardjob :job=$job />--}}

                    @if ($ofertas->hasPages())
                        <div
                            class="bg-white px-4 py-10  mr-2 items-center justify-between border-t border-gray-200 sm:px-6">
                            {{ $ofertas->links()}}
                        </div>

                    @endif


                </div>


            @endif


            <div wire:loading class="backdrop-filter backdrop-blur-sm absolute inset-x-0  top-0 h-full w-full">
                <div style="color: #36181f" class="la-line-scale-pulse-out items-center absolute top-6 left-1/2">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>



        </div>
    </div>
</div>

{{--
<div wire:loading class="backdrop-filter backdrop-blur-sm absolute inset-x-0  top-0 h-full w-full">
                <div style="color: #36181f" class="la-line-scale-pulse-out items-center absolute top-6 left-1/2">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
--}}





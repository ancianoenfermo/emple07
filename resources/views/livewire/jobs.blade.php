<div wire:init="loadEmpleos">
    @if (count($jobs))
        @foreach ($jobs as $job)
            <x-jobCard :job=$job />
        @endforeach
        @if ($jobs->hasPages())
            <div
                class="bg-gray-200 px-4 py-3 mt-5 mb-5 mr-2 items-center justify-between border-t border-gray-200 sm:px-6">
                {{ $jobs->links() }}
            </div>
        @else
            No hay registros
        @endif
    @endif
</div>


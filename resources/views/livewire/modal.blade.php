<div>
    <x-jet-dialog-modal>
        <x-slot name='title'>
            Titulo
        </x-slot>
        <x-slot name='content'>
            Contenido
        </x-slot>
        <x-slot name='footer'>
           <x-jet-secondary-button wire:click:"$set('open',false)">>
               Cerrar
           </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>

<x-admin-layout title="Usuarios" :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    ['name' => 'Usuarios'],
]">

        <div class ="flex justify-end mb-4 -mt-14">
        <x-wire-button href="{{ route('admin.users.create') }}" blue>
            <i class="fa-solid fa-plus mr-2"></i> Nuevo usuario
        </x-wire-button>

        </div>
    
    @livewire('admin.datatables.user-table')



</x-admin-layout>
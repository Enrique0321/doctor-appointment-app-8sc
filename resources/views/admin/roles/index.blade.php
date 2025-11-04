<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    ['name' => 'Roles'],
]">

<div class="flex justify-end mb-4">
    <x-wire-button href="{{ route('admin.roles.create') }}" blue>
        <i class="fa-solid fa-plus mr-2"></i> Nuevo rol
    </x-wire-button>
</div>


 @livewire('admin.datatables.role-table')
</x-admin-layout>



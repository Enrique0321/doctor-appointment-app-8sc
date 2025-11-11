<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Roles',
        'href' => route('admin.roles.index')
    ],
    [
        'name' => 'Editar'
    ],
]">

<x-wire-card>
    <form action="{{ route('admin.roles.update', $role )}}" method="POST"> 
        @csrf
        @method('PUT')

    
            <x-wire-input 
            label="Nombre del rol"
            name="name"
            placeholder="Nombre del rol"

            value="{{ old('name', $role->name ) }}"
            >

            </x-wire-input>

            <div class="mt-4 flex justify-end">
            <x-wire-button blue type="submit">
                Actualizar
            </x-wire-button>

            </div>
           
    </form>




</x-wire-card>


</x-admin-layout>
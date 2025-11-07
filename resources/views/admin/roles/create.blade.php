<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Roles',
        'href' => route('admin.roles.index')
    ],
    ['name' => 'Nuevo'],
]">

<x-wire-card>
    <form action="{{ route('admin.roles.store')}}" method="POST"> 
        @csrf

    
            <x-wire-input 
            label="Nombre del rol"
            name="name"
            placeholder="Nombre del rol"

            value="{{ old('name') }}"
            >

            </x-wire-input>

            <div class="mt-4 flex justify-end">
            <x-wire-button blue type="submit">
                Guardar
            </x-wire-button>

            </div>
           
    </form>




</x-wire-card>


</x-admin-layout>
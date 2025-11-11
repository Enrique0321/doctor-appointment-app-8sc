<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validar
        $request->validate([
            'name' => 'required|unique:roles,name',
            
        ]);

        //crear el rol
        Role::create(['name' => $request->name]);

        //almacenar mensaje
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Éxito',
            'text' =>'Rol creado exitosamente.'

        ]);

        //redireccionar
        return redirect()->route('admin.roles.index')->with('success', 'Rol creado exitosamente.');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
    //Restringir la accion para los primeros 4 roles fijos
        if ($role->id <=4) {
            //alerta
         session()->flash('swal', [
            'icon' => 'error',
            'title' => 'Acción no permitida',
            'text' =>'No se puede eliminar este rol predeterminado.'

        ]);
        //redireccionar
        return redirect()->route('admin.roles.index');
        }

    return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
    
    
        //validar que se inserte bien 
        $request->validate([
            'name' => 'required|unique:roles,name, ' . $role->id,   
        ]);


        //Si el cmapo no cambio, no hacer nada
        if ($role->name === $request->name) {
             session()->flash('swal', [
            'icon' => 'info',
            'title' => 'Sin cambios',
            'text' =>'No se realizaron cambios en el rol.'

        ]);

        return redirect()->route('admin.roles.edit', $role);
        }

        //crear el rol
        $role->update(['name' => $request->name]);

        //almacenar mensaje
        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Rol actualizado',
            'text' =>'Rol ha sido actualizado exitosamente.'

        ]);

        //redireccionar
        return redirect()->route('admin.roles.index', $role);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)

    {


        //Restringir la accion para los primeros 4 roles fijos
        if ($role->id <=4) {
            //alerta
         session()->flash('swal', [
            'icon' => 'error',
            'title' => 'Acción no permitida',
            'text' =>'No se puede eliminar este rol predeterminado.'

        ]);
        //redireccionar
        return redirect()->route('admin.roles.index');
        }



        //Borrar elemento
        $role->delete();

        //alerta
         session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Rol eliminado correctamente',
            'text' =>'Rol ha sido elimado exitosamente.'

        ]);
        //redireccionar
        return redirect()->route('admin.roles.index');


    }

    
}
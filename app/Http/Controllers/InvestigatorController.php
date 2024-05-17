<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\AuthServiceProvider;
use App\Providers\RoleServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;

class InvestigatorController extends Controller
{
    /**
     @TODO = Falta crear la vista para este metodo.
     *
     * Muestra todos los investigadores
     */
    public function index()
    {
        $query = DB::table("users AS u")
            ->join("roles AS r", "u.role_id", "=", "r.id")
            ->where("r.name", "=", RoleServiceProvider::INVESTIGATOR)
            ->get();
        
        return Inertia::render("Investigator/Index", [
            "investigators" => $query,
            "role" => AuthServiceProvider::getRole(),
            "isAuthenticated" => AuthServiceProvider::checkAuthenticated()
        ]);
    }


    /**
     * Crea un nuevo Investigador
     */
    public function store()
    {
        
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Password::defaults()],
        ]);

        $user = User::create([
            'name' => request("name"),
            'email' => request("email"),
            'password' => Hash::make(request("password")),
            'role_id' => RoleServiceProvider::INVESTIGATOR_ID
        ]);

        $user->assignRole("investigator");

        return redirect()->route("investigator.index")->with("message", "¡El investigador se ha creado correctamente!");
    }

    /**
     * Actualiza un Investigador
     */
    public function update($userID)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Password::defaults()],
        ]);

        $user = User::find($userID);

        $user->update([
            'name' => request("name"),
            'email' => request("email"),
            'password' => Hash::make(request("password")),
            'role_id' => RoleServiceProvider::INVESTIGATOR_ID
        ]);

        return redirect()->route("investigator.index")->with("message", "¡El investigador se ha actualizado correctamente!");
    }

    /**
     * Eliminar un investigador
     * 
     */
    public function destroy($userID)
    {
        $user = User::find($userID);

        $user->delete();

        return redirect()->route("investigator.index")->with("message", "¡El investigador se ha eliminado correctamente!");
    }

}

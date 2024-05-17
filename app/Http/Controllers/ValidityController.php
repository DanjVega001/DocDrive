<?php

namespace App\Http\Controllers;

use App\Models\Validity;
use App\Providers\AuthServiceProvider;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ValidityController extends Controller
{
    //

    /**
     * 
     * Muestra las vigencias en su vista.
     */
    public function index()
    {
        return Inertia::render("Validity/Index", [
            "validities" => Validity::all(),
            "role" => AuthServiceProvider::getRole(),
            "isAuthenticated" => AuthServiceProvider::checkAuthenticated()
        ]);
    }


    /**
     * 
     * Crea una nueva Vigencia
     */
    public function store()
    {
        $this->validate(request(), [
            "year" => "required",
        ]);

        Validity::create([
            "year" => request("year"),
        ]);

        return redirect()->route("validity.index")->with("message", "¡La vigencia se ha creado correctamente!");
    }

}
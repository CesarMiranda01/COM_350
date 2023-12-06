<?php

namespace App\Http\Controllers;

use App\Models\Correspondencias;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

class CorrespondenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //mi codigo
        $data['destinatarios']=Correspondencias::paginate(6);
        return view('correpondencia.index', $data);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('correspondencia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Correspondencias $correspondencias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Correspondencias $correspondencias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Correspondencias $correspondencias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Correspondencias $correspondencias)
    {
        //
    }
}

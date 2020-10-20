<?php

namespace App\Http\Controllers;

use App\pagina;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pagina.inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function show(pagina $pagina)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function edit(pagina $pagina)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pagina $pagina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pagina  $pagina
     * @return \Illuminate\Http\Response
     */
    public function destroy(pagina $pagina)
    {
        //
    }
}

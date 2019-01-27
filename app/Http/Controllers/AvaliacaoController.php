<?php

namespace PGD\Http\Controllers;

use PGD\Avaliacao;
use PGD\Produzido;
use PGD\Producao;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($dia = 0)
    {
        //
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
        var_dump($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \PGD\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function show($id=0)
    {
        return view('pages/formavaliacao');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PGD\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Avaliacao $avaliacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PGD\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Avaliacao $avaliacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PGD\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avaliacao $avaliacao)
    {
        //
    }
}

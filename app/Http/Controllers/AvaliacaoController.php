<?php

namespace PGD\Http\Controllers;

use PGD\Avaliacao;
use PGD\Produzido;
use PGD\Producao;
use PGD\Prato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        if (!$request->id) {
            $avaliacao = new Avaliacao();
        }else {
            $avaliacao = Avaliacao::find($request->id);
        }
        $avaliacao->notaSabor = $request->notaSabor;
        $avaliacao->notaAparencia = $request->notaAparencia;
        $avaliacao->justificativa = $request->justificativa;
        $avaliacao->pessoa_id = $request->user()->id;
        $avaliacao->produzido_id = $request->produzidoid;
        $avaliacao->save();

        $request->session()->flash('status','Avaliacao cadastrada/atualizada com sucesso!');
        return Redirect::to('/produzidos/listavaliar/'.$request->data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \PGD\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $produzido = Produzido::find($id);
        $producao = Producao::find($produzido->producao_id);
        $prato = Prato::find($produzido->prato_id);
        return view('pages/formavaliacao',compact(['produzido','producao','prato']));
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

<?php

namespace PGD\Http\Controllers;

use PGD\Avaliacao;
use PGD\Produzido;
use PGD\Producao;
use PGD\Prato;
use PGD\Pessoa;
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

    public function notasProducoes (Request $request)
    {
        if($request->datainicial && $request->datafinal){
            $notas=[];
            $funcionarios = Pessoa::all();
            foreach ($funcionarios as $key => $funcionario) {
                $notafuncionario = new \stdClass();
                $producoes = Producao::whereBetween('data',[$request->datainicial,$request->datafinal])
                                    ->where('pessoa_id',$funcionario->id) 
                                    ->get();
                $producoesid = [];
                if(count($producoes)>0){
                    foreach ($producoes as $key => $producao) {
                        array_push($producoesid,$producao->id);
                    }
                    $produzidos = Produzido::whereIn('producao_id',$producoesid)->get();
                    $notafuncionario->nome = $funcionario->nome;
                    $notafuncionario->nota = $this->calculaNotaProducoes($produzidos);
                    $notafuncionario->produtividade = $this->calculaProdutividadeProducoes($produzidos); 
                    array_push($notas,$notafuncionario);
                }
                
            }      
            return view ('pages/listnotas',['notas'=>$notas]);
        }else{
            return view('pages/listnotas');
        }
        
    }

    public function calculaNotaProducoes ($produzidos) {
		$nota = 0.0;
		$numerador=0.0;
		$denominador=0.0;
		
        foreach ($produzidos as $key => $produzido) {
            $avaliacoes = $produzido->avaliacaos;
            if (count($avaliacoes)>0) {
                foreach ($avaliacoes as $key => $avaliacao) {
					$numerador = $numerador + (((($avaliacao->notaAparencia+$avaliacao->notaSabor)/2)*Prato::find($produzido->prato_id)->dificuldade));
                    $denominador = $denominador + Prato::find($produzido->prato_id)->dificuldade;
                }
			}
        }
        if($denominador>0) {
            $nota = $numerador/$denominador;
        }
		return $nota;
	}
	
	public function calculaProdutividadeProducoes ($produzidos) {
		$produtividade = 0;
		
		foreach ($produzidos as $key => $produzido) {
			$produtividade += Prato::find($produzido->prato_id)->dificuldade;
		}
		
		return $produtividade;
	}
}

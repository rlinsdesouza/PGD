<?php

namespace PGD\Http\Controllers;

use Illuminate\Http\Request;
use PGD\Pessoa;


class PessoaController extends Controller
{
    public function formpessoa($id = 0) {
        if($id!=0) {
            $pessoa = Pessoa::find($id);

            return view ('pages/formpessoa',['pessoa'=> $pessoa]);
        }
        return view ('pages/formpessoa');
    }

    public function salvarpessoa(Request $request) {
        if (!$request->id) {
            $pessoa = new Pessoa ();
        }else {
            $pessoa = Pessoa::find($request->id);
        }
        $pessoa->nome = strtoupper($request->nome);
        $pessoa->apelido = strtoupper($request->apelido);
        $pessoa = $pessoa->save();
        $request->session()->flash('status', 'Pessoa cadastrado/atualizado com sucesso!');
        return back();
    }

    public function excluir (Request $request) {
        $pessoa = Pessoa::find($request->id);
        $pessoa->delete();
        $request->session()->flash('status', 'Pessoa deletado com sucesso!');
        return back();
    }
    
    public function listagem() {
        return view('pages/listpessoa');
    }

    public function listarpessoas() {
        return Pessoa::all();
    }
}

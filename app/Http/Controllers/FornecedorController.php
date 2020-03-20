<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Empresa;
use App\Http\Requests\FornecedorRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fornecedores = Fornecedor::all();
        $empresas = Empresa::all();
        return view('fornecedores.index', compact('fornecedores'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = Empresa::all();
        return view('fornecedores.create')->with(['empresas' => $empresas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FornecedorRequest $request)
    {
        $demaior = 1; 
            $empresa = Empresa::find($request->id_empresa);
            
        if($demaior == 1) {
            $fornecedor = new Fornecedor([
            'nome' => $request->get('nome'),
            'id_empresa' => $request->get('id_empresa'),
            'tipo_pessoa' => $request->get('tipo_pessoa'),
            'cpf_cnpj' => $request->get('cpf_cnpj'),
            'data_hora' => $request->get('data_hora'),
            'telefone' => $request->get('telefone'),
            'rg' => $request->get('rg'),
            'data_nascimento' => $request->get('data_nascimento')
            ]);
            $fornecedor->save();
            return redirect('/fornecedores')->with('sucesso', 'Fornecedor salvo!');
        }else{
            $error = 'Menor de idade!';
            return redirect()->route('fornecedores.index')->with(['erro' => $error]);
        }
        return redirect()->route('fornecedores.index');

        if($empresa->uf == 'PR' && $fornecedor->tipo_pessoa == 'F') {
                $verificar = strtotime(Carbon::now()->subYears(18)->format('d-m-Y'))-strtotime($request->data_nascimento);
                if($verificar >= 0) {
                } else {
                    $demaior = 0;
                }
    
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fornecedor = Fornecedor::find($id);
        $empresas = Empresa::all();
        // return view('fornecedores.edit', compact('fornecedor'));
        return view('fornecedores.edit')->with(['fornecedor' => $fornecedor, 'empresas' => $empresas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FornecedorRequest $request, $id)
    {
    //     $request->validate([
    //         'nome' => 'required',
    //         'tipo_pessoa' => 'required',
    //         'cpf_cnpj' => 'required',
    //         'data_hora' => 'required',
    //         'telefone' => 'required'
    //         // 'rg' => 'required',
    //         // 'data_nascimento' => 'required'
    //     ]);

        // $fornecedor = Fornecedor::find($id);
        // $fornecedor->nome = $request->get('nome');
        // $fornecedor->tipo_pessoa = $request->get('tipo_pessoa');
        // $fornecedor->cpf_cnpj = $request->get('cpf_cnpj');
        // $fornecedor->data_hora = $request->get('data_hora');
        // $fornecedor->telefone = $request->get('telefone');
        // $fornecedor->rg = $request->get('rg');
        // $fornecedor->data_nascimento = $request->get('data_nascimento');
        // $fornecedor->save();
    //     return redirect('/fornecedores')->with('sucesso', 'Fornecedor atualizado!');
    // }
    $demaior = 1; 
            $empresa = Empresa::find($request->id_empresa);
            
        if($demaior == 1) {
            $fornecedor = Fornecedor::find($id);
            $fornecedor->nome = $request->get('nome');
            $fornecedor->tipo_pessoa = $request->get('tipo_pessoa');
            $fornecedor->cpf_cnpj = $request->get('cpf_cnpj');
            $fornecedor->data_hora = $request->get('data_hora');
            $fornecedor->telefone = $request->get('telefone');
            $fornecedor->rg = $request->get('rg');
            $fornecedor->data_nascimento = $request->get('data_nascimento');
            $fornecedor->save();
            return redirect('/fornecedores')->with('sucesso', 'Fornecedor salvo!');
        }else{
            $error = 'Menor de idade!';
            return redirect()->route('fornecedores.index')->with(['erro' => $error]);
        }
        return redirect()->route('fornecedores.index');

        if($empresa->uf == 'PR' && $fornecedor->tipo_pessoa == 'F') {
                $verificar = strtotime(Carbon::now()->subYears(18)->format('d-m-Y'))-strtotime($request->data_nascimento);
                if($verificar >= 0) {
                } else {
                    $demaior = 0;
                }
    
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fornecedor = Fornecedor::find($id);
        $fornecedor->delete();

        return redirect('/fornecedores')->with('sucesso', 'Fornecedor deletado!');
    }

}

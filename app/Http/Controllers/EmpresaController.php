<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();

        return view('empresas.index', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'uf' => 'required',
            'cnpj' => 'required'
        ]);

        $empresa = new Empresa([
            'uf' => $request->get('uf'),
            'nome_fantasia' => $request->get('nome_fantasia'),
            'cnpj' => $request->get('cnpj')
        ]);
        $empresa->save();
        return redirect('/empresas')->with('sucesso', 'Empresa salva!');
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
        $empresa = Empresa::find($id);
        return view('empresas.edit', compact('empresa')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'uf' => 'required',
            'cnpj' => 'required'
        ]);

        $empresa = Empresa::find($id);
        $empresa->uf = $request->get('uf');
        $empresa->nome_fantasia = $request->get('nome_fantasia');
        $empresa->cnpj = $request->get('cnpj');
        $empresa->save();
        return redirect('/empresas')->with('sucesso', 'Empresa atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        $empresa->delete();

        return redirect('/empresas')->with('sucesso', 'Empresa deletada!');
    }
}

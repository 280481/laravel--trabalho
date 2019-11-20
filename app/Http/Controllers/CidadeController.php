<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Estado;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidade::paginate(2); //para enviar a view
        if(request('pesquisa')!=null){
            if(trim(request('pesquisa'))!=""){
                $cidades= Cidade::where('nome','like','%'.request('pesquisa').'%')->paginate(6);
            }
        }
         
         return view('cidade.index',compact('cidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = Estado::all();
		return view('cidade.create',compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$cidade = new Cidade();
		$valid = $request->validate(['nome=>required', 'estado_id'=>'required']);
		$cidade->fill($valid);
		$estado = Estado::findOrFail($valid['estado_id']);
		$cidade->estado()->associate($estado);
		$cidade->save();
		return redirect('cidades.index')->with('success','Cidade inserida com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function show(Cidade $cidade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function edit(Cidade $cidade)
    {
         $estados = Estado::all();
		 return view('cidade.create',compact('estados', 'cidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cidade $cidade)
    {
       $valid = $request->validate(['nome=>required', 'estado_id'=>'required']);
		$cidade->fill($valid);
		$estado = Estado::findOrFail($valid['estado_id']);
		$cidade->estado()->associate($estado);
		$cidade->save();
		return redirect('cidades.index')->with('success','Cidade atualizada com sucesso!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cidade $cidade)
    {
        $cidade->delete();
		return redirect('cidades.index')->with('success','Cidade removida com sucesso!');
    }
}
 /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cidade  $cidade
     * @return \Illuminate\Http\Response
     */
    public function confirm(Cidade $cidade)
    {
        return view('cidade.confirm', compact('cidade'));
    }
}

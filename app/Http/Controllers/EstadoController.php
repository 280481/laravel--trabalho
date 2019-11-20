<?php

namespace App\Http\Controllers;

use App\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		 $estados = Estado::paginate(2);
		if(request('pesquisa')!=null){
			if(trim(request('pesquisa'))!=""){
				$estados = Estado::where('nome', 'like', '%'.request('pesquisa').'%')->paginate(2);
			}
		}
       
		return view('estado.index',compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('estado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $valid = $request->validate(['nome'=>'required', 'sigla'=>'required']);
		Estado::create($valid);
		return redirect('/estados')->with(['success'=>'O estado foi criado']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function show(Estado $estado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit(Estado $estado)
    {
        return view('estado.create',compact('estado'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estado $estado)
    {
         $valid = $request->validate(['nome'=>'required', 'sigla'=>'required']);
		 $estado->fill($valid);
		 $estado->save();
		 return redirect('/estados')->with(['success'=>'Estado Atualizado']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estado $estado)
    {
        $estado->delete();
		return redirect('/estados')->with(['success'=>'Removido com Sucesso']);
		
    }
	public function confirm(Estado $estado) {
		return view('estado.confirm', compact($estado));
	}
}

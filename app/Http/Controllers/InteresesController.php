<?php

namespace SocialNet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use SocialNet\Http\Requests;
use SocialNet\Http\Controllers\Controller;
use SocialNet\Intereses;

class InteresesController extends Controller
{
    public function __construct(){
        $this->middleware('cors');
        $this->beforeFilter('@find', ['only'=>['show','update','destroy']]);
    }
    public function find(Route $route){
        $this->intereses=Intereses::find($route->getParameter('intereses'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intereses = Intereses::all();
        return response()->json($intereses->toArray());
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
        Intereses::create($request->all());
        return response()->json(["mensaje"=>"Creada correctamente"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->intereses);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->intereses->fill($request->all());
        $this->intereses->save();
        return response()->json(["mensaje"=>"Actualido correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->intereses->delete();
        return response()->json(["mensaje"=>"Borrado correctamente"]);
    }
}

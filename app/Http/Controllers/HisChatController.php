<?php

namespace SocialNet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use SocialNet\Http\Requests;
use SocialNet\Http\Controllers\Controller;
use SocialNet\HisChat;

class HisChatController extends Controller
{
    public function __construct(){
        $this->middleware('cors');
        $this->beforeFilter('@find', ['only'=>['show','update','destroy']]);
    }
    public function find(Route $route){
        $this->hischat=HisChat::find($route->getParameter('his_chats'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hischat = HisChat::all();
        return response()->json($hischat->toArray());
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
        HisChat::create($request->all());
        return response()->json(["mensaje"=>"exito"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->hischat);
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
        $this->hischat->fill($request->all());
        $this->hischat->save();
        return response()->json(["mensaje"=>"exito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->hischat->delete();
        return response()->json(["mensaje"=>"exito"]);
    }
}

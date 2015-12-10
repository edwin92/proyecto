<?php

namespace SocialNet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use SocialNet\Http\Requests;
use SocialNet\Http\Controllers\Controller;
use SocialNet\ImgEvent; 

class ImgEventController extends Controller
{
    public function __construct(){
        $this->middleware('cors');
        $this->beforeFilter('@find', ['only'=>['show','update','destroy']]);
    }
    public function find(Route $route){
        $this->imgevents=ImgEvent::find($route->getParameter('img_events'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imgevents = ImgEvent::all();
        return response()->json($imgevents->toArray());
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
        ImgEvent::create($request->all());
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
        return response()->json($this->imgevents);
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
        $this->imgevents->fill($request->all());
        $this->imgevents->save();
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
        $this->imgevents->delete();
        return response()->json(["mensaje"=>"exito"]);
    }
}

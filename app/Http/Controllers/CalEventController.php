<?php

namespace SocialNet\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use SocialNet\Http\Requests;
use SocialNet\Http\Controllers\Controller;
use SocialNet\CalEvent;

class CalEventController extends Controller
{
    public function __construct(){
        $this->middleware('cors');
        $this->beforeFilter('@find', ['only'=>['show','update','destroy']]);
    }
    public function find(Route $route){
        $this->calevents=CalEvent::find($route->getParameter('cal_events'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calevents = CalEvent::all();
        return response()->json($calevents->toArray());
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
        CalEvent::create($request->all());
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
        return response()->json($this->calevents);
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
        $this->calevents->fill($request->all());
        $this->calevents->save();
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
        $this->calevents->delete();
        return response()->json(["mensaje"=>"exito"]);
    }
}

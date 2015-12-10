<?php

namespace SocialNet\Http\Controllers;

use DB;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

use SocialNet\Http\Requests;
use SocialNet\Http\Controllers\Controller;
use SocialNet\IntUser;
use SocialNet\Intereses;
use SocialNet\User;


class IntUserController extends Controller
{
    public function __construct(){
        $this->middleware('cors');
        $this->beforeFilter('@find', ['only'=>['show','update','destroy']]);
    }
    public function find(Route $route){
        $this->int_users=IntUser::find($route->getParameter('int_users'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('int_users')
            ->join('intereses', 'int_users.id_interes', '=', 'intereses.id')
            ->join('users', 'int_users.id_user', '=', 'users.id')
            ->select('int_users.*', 'intereses.nombre', 'intereses.descripcion')
            ->get();
        return response()->json($users);
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
        IntUser::create($request->all());
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
        $this->int_users->fill($request->all());
        $this->int_users->save();
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
        $this->int_users->delete();
        return response()->json(["mensaje"=>"exito"]);
    }
}

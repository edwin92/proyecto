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
use SocialNet\ImgUser;
use Auth;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware('cors');
        $this->beforeFilter('@find', ['only'=>['show','update','destroy']]);
    }
    public function find(Route $route){
        $this->users=User::find($route->getParameter('users'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = DB::table('users')
            ->join('int_users', 'int_users.id_user', '=', 'users.id')
            ->join('intereses', 'int_users.id_interes', '=', 'intereses.id') 
            ->join('img_users','img_users.id_perfil','=','users.id') 
            ->select('users.name','users.lastname', 'intereses.nombre', 'intereses.descripcion','img_users.dato')
            ->groupBy('users.id')
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
        User::create($request->all());
        if(Auth::attempt(['email'=> $request['email'],'password'=> $request['password']])){
            $user = Auth::user();
            return response()->json($user);
        } 
        
        return response()->json(["mensaje"=>"Usuario registado con exito"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->users);
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
        $this->users->fill($request->all());
        $this->users->save();
        return response()->json(["mensaje"=>"Usuario actualizado con exito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->users->delete();
        return response()->json(["mensaje"=>"Usuario eliminado con exito"]);
    }
}

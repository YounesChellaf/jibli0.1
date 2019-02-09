<?php

namespace App\Http\Controllers;

use App\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profil::paginate(10);
        return response()->json([
            'profils' => $profil
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profil = $request->isMethod('Put') ? Profil::findorFail($request->profil_id) : new Profil;
        $profil->pseudo = $request->input('pseudo');
        $profil->avatar = $request->input('avatar');
        $profil->age = $request->input('age');
        $profil->sexe = $request->input('sexe');
        $profil->nb_post = $request->input('nb_post');
        $profil->location = $request->input('location');
        if($profil->save()){
            return response()->json([
                'profil' => $profil
            ]);
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
        $profil = Profil::findorFail($id);
        return response()->json([
            'profil' => $profil,
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profil = Profil::findOrFail($id);
        if ($profil->delete()){
            return response()->json([
                'profil' => $profil
            ]);
        }
    }
    public function review(Request $request, $id){
        $profil = Profil::findOrFail($id);
        $profil->review = $request->input('review');
        if($profil->save()){
            return response()->json([
                'profil' => $profil
            ]);
        }
    }
}
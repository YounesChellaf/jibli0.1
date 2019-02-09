<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medicament;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Resources\Medicament as MedicamentResource;


class MedicamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicament = Medicament::paginate(10);
        //return MedicamentResource::collection($medicament);
        return response()->json([
               'medicament'=>$medicament
        ]);
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
        $medicament = $request->isMethod('Put') ? Medicament::findorFail($request->medicament_id) : new Medicament;
        $medicament->title = $request->input('title');
        $medicament->description = $request->input('description');

        if($medicament->save()){
            return response()->json([
                'medicament' => $medicament,
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
        $medicament = Medicament::findorFail($id);
        return response()->json([
          'medicament' => $medicament,
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
        $medicament = Medicament::findorFail($id);
        if($medicament->delete()){
            return response()->json([
               'medicament' => $medicament,
            ]);
        }
    }
}

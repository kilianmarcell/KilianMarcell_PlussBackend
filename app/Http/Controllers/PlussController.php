<?php

namespace App\Http\Controllers;

use App\Models\Pluss;
use Illuminate\Http\Request;

class PlussController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pluss = Pluss::all();
        return response()->json($pluss);
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
        $pluss = new Pluss();
        $pluss->fill($request->all())->save();
        return response()->json($pluss, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pluss  $pluss
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $pluss = Pluss::find($id);

        if (is_null($pluss)) {
            return response()->json(["message" => "A megadott azonosítóval nem található plüssállat."], 404);
        }
        return response()->json($pluss);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pluss  $pluss
     * @return \Illuminate\Http\Response
     */
    public function edit(Pluss $pluss)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pluss  $pluss
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $pluss = Pluss::findOrFail($id);
        $pluss->fill($request->all())->save();
        return response()->json($pluss, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pluss  $pluss
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $pluss = Pluss::find($id);
        if (is_null($pluss)) {
            return response()->json(["message" => "A megadott azonosítóval nem található plüssállat."], 404);
        }
        Pluss::destroy($id);
        return response()->noContent();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Employe;
use App\Http\Requests\StoreRayonRequest;
use App\Http\Requests\UpdateRayonRequest;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rayons = Rayon::paginate(2);
        return view('rayons.index', compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rayons = Rayon::all();
        $employes = Employe::all();
        return view('rayons.create', compact('rayons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRayonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRayonRequest $request)
    {
        Rayon::create($request->all());
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function show(Rayon $rayon)
    {
        return view('rayons.show', compact('rayon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function edit(Rayon $rayon)
    {
        $employes = Employe::all();
        return view('rayons.edit', compact('rayon', 'employes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRayonRequest  $request
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRayonRequest $request, Rayon $rayon)
    {
        $rayon->update($request->except([
            '_token',
            '_method',
            'employe_id'
        ]));
        $rayon->employes()->attach($request->employe_id);
        $rayon->save();
        return redirect()->route('rayons.index')->with([
            'status' => 'success',
            'msg' => __('Rayon mis à jour avec succès')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rayon  $rayon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rayon $rayon)
    {
        $rayon->delete();
        return redirect()->route('rayons.index')->with([
            'status' => 'success',
            'msg' => __('Rayon supprimé avec succès')
        ]);
    }
}

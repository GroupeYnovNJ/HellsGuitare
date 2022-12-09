<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Http\Requests\StoreMarqueRequest;
use App\Http\Requests\UpdateMarqueRequest;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marques = Marque::paginate(2);
        return view('marques.index', compact('marques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marques.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMarqueRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarqueRequest $request)
    {
        Marque::create($request->all());
        return redirect()->route('marques.index')->with([
            'status' => 'success',
            'msg' => __('Marque créée avec succès')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(Marque $marque)
    {
        return view('marques.show', compact('marque'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function edit(Marque $marque)
    {
        return view('marques.edit', compact('marque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMarqueRequest  $request
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarqueRequest $request, Marque $marque)
    {
        $marque->update($request->except([
            '_token',
            '_method'
        ]));
        $marque->save();
        return redirect()->route('marques.index')->with([
            'status' => 'success',
            'msg' => __('Marque mise à jour avec succès')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marque $marque)
    {
        $marque->delete();
        return redirect()->route('marques.index')->with([
            'status' => 'success',
            'msg' => __('Marque supprimée avec succès')
        ]);
    }
}

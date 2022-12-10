<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Marque;
use App\Models\Categorie;
use App\Models\Promotion;
use App\Models\Instrument;
use Illuminate\Http\Request;
use App\Http\Requests\StoreInstrumentRequest;
use App\Http\Requests\UpdateInstrumentRequest;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $instruments = Instrument::paginate(5);
        return view('instruments.index', compact('instruments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Categorie::all();
        $marques = Marque::all();
        $rayons = Rayon::all();
        $promotions = Promotion::all();
        return view('instruments.create', compact('categories', 'marques', 'rayons', 'promotions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInstrumentRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreInstrumentRequest $request)
    {
        
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $real = 'uploads/images/'.$filename;
            $file->move('uploads/images/', $filename);
            
            Instrument::create([
                'nom' => $request->nom,
                'description' => $request->description,
                'prix' => $request->prix,
                'stock' => $request->stock,
                'image' => $real,
                'categorie_id' => $request->categorie_id,
                'rayon_id' => $request->rayon_id,
                'marque_id' => $request->marque_id,
                'promotion_id' => $request->promotion_id,
            ]);
        }
        
        return redirect()->route('instruments.index')->with([
            'status' => 'success',
            'msg' => __('Instrument créé avec succès')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Instrument $instrument)
    {
        return view('instruments.show', compact('instrument'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Instrument $instrument)
    {
        $categories = Categorie::all();
        $marques = Marque::all();
        $rayons = Rayon::all();
        $promotions = Promotion::all();
        return view('instruments.edit', compact('instrument', 'categories', 'marques', 'rayons', 'promotions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstrumentRequest  $request
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateInstrumentRequest $request, Instrument $instrument)
    {
        $instrument->update($request->except([
            '_token',
            '_method',
            'image',
            'categorie_id',
            'rayon_id',
            'marque_id',
            'promotion_id',
        ]));
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $real = 'uploads/images/'.$filename;
            if ($real != $instrument->image) 
            {
                $file->move('uploads/images/', $filename);
                $instrument->image = $real;
            }
        }
        $instrument->categorie()->associate($request->categorie_id);
        $instrument->rayon()->associate($request->rayon_id);
        $instrument->marque()->associate($request->marque_id);
        $instrument->promotion()->associate($request->promotion_id);
        $instrument->save();
        return redirect()->route('instruments.index')->with([
            'status' => 'success',
            'msg' => __('Instrument mis à jour avec succès')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instrument  $instrument
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Instrument $instrument)
    {
        $instrument->delete();
        return redirect()->route('instruments.index')->with([
            'status' => 'success',
            'msg' => __('Instrument supprimé avec succès')
        ]);
    }

}

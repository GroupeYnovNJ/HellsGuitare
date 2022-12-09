<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::paginate(2);
        return view('employes.index', compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employes.create', compact('employes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeRequest $request)
    {
        Employe::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'password' => Hash::make($request->password),
            'email' => $request->email,
        ]);
        return redirect()->route('employes.index')->with([
            'status' => 'success',
            'msg' => __('Employé créé avec succès')
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show(Employe $employe)
    {
        return view('employes.show', compact('employe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit(Employe $employe)
    {
        return view('employes.edit', compact('employe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeRequest  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeRequest $request, Employe $employe)
    {
        $employe->update($request->except([
            '_token',
            '_method'
        ]));
        $employe->save();
        return redirect()->route('employes.index')->with([
            'status' => 'success',
            'msg' => __('Employé mis à jour avec succès')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employe $employe)
    {
        $employe->delete();
        return redirect()->route('employes.index')->with([
            'status' => 'success',
            'msg' => __('Employé supprimé avec succès')
        ]);
    }
}

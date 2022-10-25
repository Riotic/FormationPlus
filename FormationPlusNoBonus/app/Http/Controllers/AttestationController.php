<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Convention;
use App\Models\Attestation;
use Illuminate\Http\Request;


class AttestationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Attestation $attestations)
    {
        $attestations = Attestation::orderBy('created_at', 'desc')->paginate(8);
	    return view('attestations.index', compact('attestations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attestations.create');
    }

    // recherche du nom de la convention via ajax
    public function search(Request $request)
    {
        $output = "";
        $convention = Convention::where('id', 'Like','%'.$request->search.'%')->get();
        
        foreach($convention as $convention)
        {   
            // pour pouvoir parser la data et récuperer le nb d'heures "---" a été ajouté
            $output.=$convention->nom.'---'.$convention->nbHeur;
        }
        return response($output);
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required',
            'id_etudiant' => 'required',
            'id_convention' => 'required',
        ]);
        $attestation = Attestation::create($validated);
        $attestations = Attestation::orderBy('created_at', 'desc')->paginate(8);
        return view('attestations.index', compact('attestations'));
    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attestation  $attestation
     * @return \Illuminate\Http\Response
     */
    public function show(Attestation $attestation)
    {
        return view('attestations.show', ['attestation' => $attestation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attestation  $attestation
     * @return \Illuminate\Http\Response
     */
    public function edit(Attestation $attestation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attestation  $attestation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attestation $attestation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attestation  $attestation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attestation $attestation)
    {
        //
    }
}

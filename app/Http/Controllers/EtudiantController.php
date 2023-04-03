<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;

use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::with('ville')->get();
       
        return view('blog.index', ['etudiants' => $etudiants]);


    }
   //pdo->query(SELECT * FROM blog_posts)->fetchAll();
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();

        return view('blog.create', [ 'villes' => $villes]);
        }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $villes = Ville::all();
        $etudiant = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
        ]);
    
        return redirect(route('etudiant.show', $etudiant->id))->withSuccess('etudiant inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        $etudiant = Etudiant::with('ville')->find($etudiant->id);
      
        return view('blog.show', ['etudiant' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        $etudiant = Etudiant::with('ville')->find($etudiant->id);
      
        return view('blog.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
    
            $etudiant->update([
                'nom' => $request->nom,
                'adresse' => $request->adresse,
                'phone' => $request->phone,
                'email' => $request->email,
                'date_de_naissance' => $request->date_de_naissance,
                'ville_id' => $request->ville_id,
            ]);
        
            return redirect(route('etudiant.show', $etudiant->id))->withSuccess('Etudiant updated successfully.');
        }
        

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect(route('index'))->withSuccess('Post Deleted');
    }

}
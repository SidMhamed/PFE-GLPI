<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\glpi_Moniteur;
use App\Models\User;
use App\Models\glpi_groups;
use App\Models\glpi_fabricant;
use App\Models\MoniteurTypes;
use App\Models\MoniteurModeles;
use App\Models\glpi_location;
class MoniteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search !== null){
            $title = 'GLPI-Moniteurs';
            $header = 'Moniteur';
            $search = $request->search;
            $Moniteurs = glpi_Moniteur::orderBy('created_at', 'DESC')->where('id','like','%'.$search.'%')
                                                  ->OrWhere('name', 'like','%'.$search.'%')->paginate(2);
            return view('front.Moniteur')->with([
                'title' => $title,
                'Moniteurs' => $Moniteurs,
                'header' => $header
            ]);
        }else
        {
            $title = 'GLPI-Moniteurs';
            $header = 'Moniteur';
            $Moniteurs = glpi_Moniteur::paginate(2);
            return view('front.Moniteur')->with([
                'title' => $title,
                'Moniteurs' => $Moniteurs,
                'header' => $header
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'GLPI-Moniteurs --1';
        $header = 'Moniteur';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $groups = glpi_groups::all();
        $Types = MoniteurTypes::all();
        $Models = MoniteurModeles::all();
        return view('front.MoniteurForm')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'Fabricants' => $Fabricants,
            'groups' => $groups,
            'Types' => $Types,
            'Models' => $Models
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        glpi_Moniteur::create($request->all());
        return redirect()->route('FormAjouterMoniteur')->with(['success' => '??l??ment ajout??']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "GLPI-Moniteurs --$id";
        $header = 'Moniteur';
        $Users = User::all();
        $Fabricants = glpi_fabricant::all();
        $groups = glpi_groups::all();
        $Types = MoniteurTypes::all();
        $Models = MoniteurModeles::all();
        $Locations = glpi_location::all();
        $Moniteurs = glpi_Moniteur::find($id);
        return view('front.edit.MoniteurEdit')->with([
            'title' => $title,
            'header' => $header,
            'Users' => $Users,
            'Fabricants' => $Fabricants,
            'groups' => $groups,
            'Types' => $Types,
            'Models' => $Models,
            'Locations' => $Locations,
            'Moniteur' => $Moniteurs
        ]);
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
        $Moniteur = glpi_Moniteur::find($id);
        $Moniteur->update($request->all());
        return redirect()->route('Moniteur.index')->with(['success' => '??l??ment modifi??']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Moniteur =  glpi_Moniteur::where('id', $id)->delete();
        return redirect()->route('Moniteur.index')->with(['success' => '??l??ment Supprimer']);

    }
}

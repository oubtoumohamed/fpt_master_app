<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Formation;
use App\User;
use App\Categorie;
use App\Media;

class FormationController extends Controller
{
    public $model = 'formation';
    public function filter_fields(){
        return [
            'code'=>[
                'type'=>'text'
            ],
            'titre'=>[
                'type'=>'text'
            ],
            'langue'=>[
                'type'=>'text'
            ],
            'intitule_fr'=>[
                'type'=>'text'
            ],
            'intitule_ar'=>[
                'type'=>'text'
            ]
        ];
    }

    public function __construct()
    {
        //$this->middleware('auth');

    }
    public function index()
    {
        $formations = Formation::where($this->filter(false))
                        ->orderBy($this->orderby, 'desc')->paginate($this->perpage())
                        ->withPath($this->url_params(true,['formation'=>null]));

        return $this->view_('formation.list', [
            'results'=>$formations
        ]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->view_('formation.update',[
            'object'=> new Formation(),
        ]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $formation = Formation::create([
            'code' => request('code'),
            'titre' => request('titre'),
            'langue' => request('langue'),
            'intitule_fr' => request('intitule_fr'),
            'intitule_ar' => request('intitule_ar')

        ]);
       

       return redirect()
                ->route('formation_edit', $formation->id)
                ->with('success', __('global.create_succees'));
    }

    /*
     * Display the specified resource.
     */

    public function show($id)
    {
        return $this->edit($id);
    }

    
    public function edit($id)
    {
        $formation = Formation::findOrFail($id);

        return $this->view_('formation.update', [
            'object'=>$formation,
        ]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {      
        $formation = Formation::findOrFail($id);

        $formation->code = request('code');
        $formation->titre = request('titre');
        $formation->langue = request('langue');
        $formation->intitule_fr = request('intitule_fr');
        $formation->intitule_ar = request('intitule_ar');

        $formation->save();

        return redirect()
                ->route('formation_edit', $formation->id)
                ->with('success', __('global.edit_succees'));
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $msg = 'delete_error';
        $flash_type = 'error';
        $formation = Formation::findOrFail($id);

        if( $formation->delete() ){            
            $flash_type = 'success';
            $msg = 'delete_succees';
        }

        return redirect()
            ->route('formation')
            ->with($flash_type, __('global.'.$msg));
    }
}
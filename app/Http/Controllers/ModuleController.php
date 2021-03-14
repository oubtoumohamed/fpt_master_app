<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Module;
use App\User;
use App\Formation;
use App\Media;

class ModuleController extends Controller
{
    public $model = 'module';
    public function filter_fields(){
        return [
            'code'=>[
                'type'=>'text'
            ],
            'titre'=>[
                'type'=>'text'
            ],
            'formation_id'=>[
                'type'=>'select',
                'table'=>'formations',
                'fields' => ['id as key_','intitule_ar as value_'],
            ],
            'semester'=>[
                'type'=>'select',
                'data'=> semesters(),
            ],
        ];
    }

    public function __construct()
    {
        //$this->middleware('auth');

    }
    public function index()
    {
        $modules = Module::where($this->filter(false))
                        ->orderBy($this->orderby, 'desc')->paginate($this->perpage())
                        ->withPath($this->url_params(true,['module'=>null]));

        return $this->view_('module.list', [
            'results'=>$modules
        ]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formations = Formation::all();
        return $this->view_('module.update',[
            'object'=> new Module(),
            'formations'=> $formations,
        ]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $module = Module::create([
            'code' => request('code'),
            'titre' => request('titre'),
            'semester' => request('semester'),
            'formation_id' => request('formation_id')
        ]);
       
       return redirect()
                ->route('module_edit', $module->id)
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
        $module = Module::findOrFail($id);
        $formations = Formation::all();

        return $this->view_('module.update', [
            'object'=>$module,
            'formations'=>$formations,
        ]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {      
        $module = Module::findOrFail($id);

        $module->code = request('code');
        $module->titre = request('titre');
        $module->semester = request('semester');
        $module->formation_id = request('formation_id');

        $module->save();

        return redirect()
                ->route('module_edit', $module->id)
                ->with('success', __('global.edit_succees'));
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $msg = 'delete_error';
        $flash_type = 'error';
        $module = Module::findOrFail($id);

        if( $module->delete() ){            
            $flash_type = 'success';
            $msg = 'delete_succees';
        }

        return redirect()
            ->route('module')
            ->with($flash_type, __('global.'.$msg));
    }

    public function load(Request $r){

        $modules = Module::where([
                            ['formation_id', $r->formation],
                            ['semester', $r->semester]
                        ])->get();

        return response()->json($modules);
    }
}
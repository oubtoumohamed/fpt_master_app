<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Media;

use App\Formation;
use App\Student_formation;
use App\Module;
use App\Student_module;

class StudentController extends Controller
{
    public $model = 'student';
    public function filter_fields(){
        return [
            'cne'=>[
                'type'=>'text'
            ],
            'num_ins'=>[
                'type'=>'text'
            ],
            'cin'=>[
                'type'=>'text'
            ],
            'nom_fr'=>[
                'type'=>'text'
            ],
            'prenom_fr'=>[
                'type'=>'text'
            ],
            'nom_ar'=>[
                'type'=>'text'
            ],
            'prenom_ar'=>[
                'type'=>'text'
            ],
            'statut'=>[
                'type'=>'text'
            ],
            'annee_ins'=>[
                'type'=>'text'
            ],
        ];
    }

    public function __construct()
    {
        //$this->middleware('auth');

    }
    public function index()
    {

        /*$array = ['cne','num_ins','cin','nom_fr','prenom_fr','nom_ar','prenom_ar','statut','date_de_naissance','lieu_naissance_fr','lieu_naissance_ar','sexe','serie_bac','annee_bac','mention_bac','licence','annee_licence','code_diplome','annee_ins'];


        $html = '';


        foreach ($array as $val) {
            
            $html .= "<div class='col-md-6'> \n";
                $html .= "  <div class='form-group'> \n";
                    $html .= "      <label class='form-label'>{{ __('student.".$val."') }}</label> \n";
                    $html .= "      <input class='form-control' id='$val' name='$val' value=\"@if($ object->id){{ $ object->$val }}@else{{ old('$val') }}@endif\" type=\"text\" required=\"\"> \n";
                $html .= "  </div> \n";
            $html .= "</div> \n";
        }

        echo "<textarea>" . $html . "<textarea>";
        die();*/


        $students = Student::where($this->filter(false))
                        ->orderBy($this->orderby, 'desc')->paginate($this->perpage())
                        ->withPath($this->url_params(true,['student'=>null]));

        return $this->view_('student.list', [
            'results'=>$students
        ]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->view_('student.update',[
            'object'=> new Student(),
        ]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $student = Student::create([
            'cne' => request('cne'),
            'num_ins' => request('num_ins'),
            'cin' => request('cin'),
            'nom_fr' => request('nom_fr'),
            'prenom_fr' => request('prenom_fr'),
            'nom_ar' => request('nom_ar'),
            'prenom_ar' => request('prenom_ar'),
            'statut' => request('statut'),
            'date_de_naissance' => request('date_de_naissance'),
            'lieu_naissance_fr' => request('lieu_naissance_fr'),
            'lieu_naissance_ar' => request('lieu_naissance_ar'),
            'sexe' => request('sexe'),
            'serie_bac' => request('serie_bac'),
            'annee_bac' => request('annee_bac'),
            'mention_bac' => request('mention_bac'),
            'licence' => request('licence'),
            'annee_licence' => request('annee_licence'),
            'code_diplome' => request('code_diplome'),
            'annee_ins' => request('annee_ins'),
        ]);


        if( $student && $student->id ){
            // all is good
            $student->formations()->sync(request('new_formation'));
            $student->modules()->sync(request('new_module'));
        }
       

       return redirect()
                ->route('student_edit', $student->id)
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
        $student = Student::findOrFail($id);

        $formations = Formation::all();
        $modules = Module::all();

        return $this->view_('student.update', [
            'object'=>$student,
            'formations'=>$formations,
            'modules'=>$modules,
        ]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {      
        $student = Student::findOrFail($id);

        $student->cne = request('cne');
        $student->num_ins = request('num_ins');
        $student->cin = request('cin');
        $student->nom_fr = request('nom_fr');
        $student->prenom_fr = request('prenom_fr');
        $student->nom_ar = request('nom_ar');
        $student->prenom_ar = request('prenom_ar');
        $student->statut = request('statut');
        $student->date_de_naissance = request('date_de_naissance');
        $student->lieu_naissance_fr = request('lieu_naissance_fr');
        $student->lieu_naissance_ar = request('lieu_naissance_ar');
        $student->sexe = request('sexe');
        $student->serie_bac = request('serie_bac');
        $student->annee_bac = request('annee_bac');
        $student->mention_bac = request('mention_bac');
        $student->licence = request('licence');
        $student->annee_licence = request('annee_licence');
        $student->code_diplome = request('code_diplome');
        $student->annee_ins = request('annee_ins');


        //$student->formations()->sync(request('new_formation'));
        ///$student->modules()->sync(request('new_module'));

        if( request('new_formation') ){
            foreach ( request('new_formation') as $id => $formation) {
                if( is_int( $id ) ){
                    $sf_ = Student_formation::find($id);
                    $sf_->fill($formation);
                    $sf_->save();
                }else{
                    $sf = Student_formation::create($formation);
                }
            }
        }

        if( request('new_module') ){
            foreach ( request('new_module') as $id => $module) {
                if( is_int( $id ) ){
                    $sm_ = Student_module::find($id);
                    $sm_->fill($module);
                    $sm_->save();
                }else{
                    $sm = Student_module::create($module);
                }
            }
        }

        $student->save();

        return redirect()
                ->route('student_edit', $student->id)
                ->with('success', __('global.edit_succees'));
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $msg = 'delete_error';
        $flash_type = 'error';
        $student = Student::findOrFail($id);

        if( $student->delete() ){            
            $flash_type = 'success';
            $msg = 'delete_succees';
        }

        return redirect()
            ->route('student')
            ->with($flash_type, __('global.'.$msg));
    }
}
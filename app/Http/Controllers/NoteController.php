<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Note;
use App\User;
use App\Formation;
use App\Student_formation;

class NoteController extends Controller
{
    public $model = 'note';
    public function filter_fields(){
        return [
            'student_formation_id'=>[
                'type'=>'text'
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
        return $this->view_('note.list', [
        ]);
    }

    /*
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $formations = Formation::all();
        $semesters = semesters();
        return $this->view_('note.update',[
            'object'=>new Note(),
            'formations'=>$formations,
            'semesters'=>$semesters,
        ]);
    }

    /*
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $status = ['status'=>'no'];

        foreach ($request->sf as $id => $notes) {

            foreach ($notes as $key => $note) {
                if( is_int( $key ) ){

                    $nt_ = Note::find($key);
                    
                    $nt_->fill($note);

                    $nt_->save();
                }else{
                    $nt = Note::create($note);
                }
            }


        }

        $status = ['status'=>'ok'];       

       return response()->json($status);
    }

    /*
     * Display the specified resource.
     */

    public function students(Request $r)
    {

        $student_formation = Student_formation::where([
            [ 'formation_id', $r->formation ],
            [ 'semester', $r->semester ],
            [ 'year',$r->year ],
        ])->get();

        return $this->view_('note.student_formation',[
            'student_formation'=>$student_formation,
            'module'=>$r->module,
        ]);

        return $this->edit($id);
    }

    
    public function edit($id)
    {
        $note = Note::findOrFail($id);

        return $this->view_('note.update', [
            'object'=>$note,
        ]);
    }

    /*
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {      
        $note = Note::findOrFail($id);

        $note->code = request('code');
        $note->titre = request('titre');
        $note->langue = request('langue');
        $note->intitule_fr = request('intitule_fr');
        $note->intitule_ar = request('intitule_ar');

        $note->save();

        return redirect()
                ->route('note_edit', $note->id)
                ->with('success', __('global.edit_succees'));
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $msg = 'delete_error';
        $flash_type = 'error';
        $note = Note::findOrFail($id);

        if( $note->delete() ){            
            $flash_type = 'success';
            $msg = 'delete_succees';
        }

        return redirect()
            ->route('note')
            ->with($flash_type, __('global.'.$msg));
    }
}
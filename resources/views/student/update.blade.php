@extends('standard')

@section('content')

  <form class="card" method="POST" enctype="multipart/form-data" action="@if($object->id){{ route('student_update',$object->id) }}@else{{ route('student_store') }}@endif">
    {{ csrf_field() }}
    <div class="card-body">
      <h3 class="card-title">
        @if($object->id)
          {{ __('student.student_edit') }}
        @else
          {{ __('student.student_create') }}
        @endif
      </h3>
      
      <div class="row">

        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.cne') }}</label> 
              <input class='form-control' id='cne' name='cne' value="@if($object->id){{ $object->cne }}@else{{ old('cne') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.num_ins') }}</label> 
              <input class='form-control' id='num_ins' name='num_ins' value="@if($object->id){{ $object->num_ins }}@else{{ old('num_ins') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.cin') }}</label> 
              <input class='form-control' id='cin' name='cin' value="@if($object->id){{ $object->cin }}@else{{ old('cin') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.statut') }}</label> 
              <input class='form-control' id='statut' name='statut' value="@if($object->id){{ $object->statut }}@else{{ old('statut') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.nom_fr') }}</label> 
              <input class='form-control' id='nom_fr' name='nom_fr' value="@if($object->id){{ $object->nom_fr }}@else{{ old('nom_fr') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.prenom_fr') }}</label> 
              <input class='form-control' id='prenom_fr' name='prenom_fr' value="@if($object->id){{ $object->prenom_fr }}@else{{ old('prenom_fr') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.nom_ar') }}</label> 
              <input class='form-control' id='nom_ar' name='nom_ar' value="@if($object->id){{ $object->nom_ar }}@else{{ old('nom_ar') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.prenom_ar') }}</label> 
              <input class='form-control' id='prenom_ar' name='prenom_ar' value="@if($object->id){{ $object->prenom_ar }}@else{{ old('prenom_ar') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.date_de_naissance') }}</label> 
              <input class='form-control' id='date_de_naissance' name='date_de_naissance' value="@if($object->id){{ $object->date_de_naissance }}@else{{ old('date_de_naissance') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.sexe') }}</label> 
              <input class='form-control' id='sexe' name='sexe' value="@if($object->id){{ $object->sexe }}@else{{ old('sexe') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.lieu_naissance_fr') }}</label> 
              <input class='form-control' id='lieu_naissance_fr' name='lieu_naissance_fr' value="@if($object->id){{ $object->lieu_naissance_fr }}@else{{ old('lieu_naissance_fr') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.lieu_naissance_ar') }}</label> 
              <input class='form-control' id='lieu_naissance_ar' name='lieu_naissance_ar' value="@if($object->id){{ $object->lieu_naissance_ar }}@else{{ old('lieu_naissance_ar') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.serie_bac') }}</label> 
              <input class='form-control' id='serie_bac' name='serie_bac' value="@if($object->id){{ $object->serie_bac }}@else{{ old('serie_bac') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.annee_bac') }}</label> 
              <input class='form-control' id='annee_bac' name='annee_bac' value="@if($object->id){{ $object->annee_bac }}@else{{ old('annee_bac') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.mention_bac') }}</label> 
              <input class='form-control' id='mention_bac' name='mention_bac' value="@if($object->id){{ $object->mention_bac }}@else{{ old('mention_bac') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.licence') }}</label> 
              <input class='form-control' id='licence' name='licence' value="@if($object->id){{ $object->licence }}@else{{ old('licence') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.annee_licence') }}</label> 
              <input class='form-control' id='annee_licence' name='annee_licence' value="@if($object->id){{ $object->annee_licence }}@else{{ old('annee_licence') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.code_diplome') }}</label> 
              <input class='form-control' id='code_diplome' name='code_diplome' value="@if($object->id){{ $object->code_diplome }}@else{{ old('code_diplome') }}@endif" type="text" > 
          </div> 
        </div> 
        <div class='col-md-6'> 
          <div class='form-group'> 
              <label class='form-label'>{{ __('student.annee_ins') }}</label> 
              <input class='form-control' id='annee_ins' name='annee_ins' value="@if($object->id){{ $object->annee_ins }}@else{{ old('annee_ins') }}@endif" type="text" > 
          </div> 
        </div> 

      </div>

        <div class="row formation_module">

          <!-- Filiers -->
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">{{ __('student.formations') }}</label>

              <div class="row" id="formations_inscri">
                @if($object and $object->student_formations)
                  @foreach ($object->student_formations as $sf)
                    <div class="formation_item">
                        
                      <input class="form-control" name="new_formation[{{$sf->id}}][id]" type="hidden" value="{{ $sf->id }}">
                      <input class="form-control" name="new_formation[{{$sf->id}}][formation_id]" type="hidden" value="{{ $sf->formation_id }}">
                      <input class="form-control" name="new_formation[{{$sf->id}}][student_id]" type="hidden" value="{{ $object->id }}">
                      <input class="form-control" name="new_formation[{{$sf->id}}][year]" type="hidden" value="{{ $sf->year }}">
                      <input class="form-control" name="new_formation[{{$sf->id}}][semester]" type="hidden" value="{{ $sf->semester }}">
                      <input class="form-control" name="new_formation[{{$sf->id}}][note]" type="hidden" value="{{ $sf->note }}">
                      <input class="form-control" name="new_formation[{{$sf->id}}][created_at]" type="hidden" value="{{ $sf->created_at }}">
                      <input class="form-control" name="new_formation[{{$sf->id}}][updated_at]" type="hidden" value="{{ date('y-m-d H:i:s') }}">

                      {{ $sf->year }} - {{ $sf->semester }} - {{ $sf->formation }}
                      <i class="fa fa-trash" onclick="delete_formation_item(this)"></i>
                    </div>
                  @endforeach
                @endif
              </div>
              <div class="row affecttation">
                <b class="col-md-12">تعيين  شعبة :</b>
                <div class="col-md-5">
                  <select class="form-control" id="formation" name="formation">
                    <option value=""></option>
                  @foreach($formations as $formation)
                    <option value="{{ $formation->id }}">{{ $formation }}</option>
                  @endforeach
                  </select>
                </div>
                <div class="col-md-3">
                  <input class="form-control" id="year" type="text" placeholder="2020-2021" placeholder="االسنة : ">

                </div>
                <div class="col-md-3">
                  <select class="form-control" id="semester" name="semester">
                    <option value=""></option>
                  @foreach(semesters() as $s=>$s_name)
                    <option value="{{ $s }}">{{ $s_name }}</option>
                  @endforeach
                  </select>
                </div>            
                <div class="col-md-1" style="padding: 0;">
                  <button id="add_formation_item" type="button" class="btn btn-indigo"><i class="fa fa-plus"></i></button>
                </div>
                <div class="clear"></div>
              </div>

            </div>
          </div>

          <!-- Modules -->

          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">{{ __('student.modules') }}</label>


              <div class="row" id="modules_inscri">
                @php $student_modules = [];  @endphp              
                @if($object and $object->student_modules)
                  @foreach ($object->student_modules as $sf)
                    @php $student_modules[$sf->module_id] = $sf->module_id;  @endphp  
                    <div class="module_item">
                      <input name="old_module[{{$sf->id}}]" value="{{$sf->id}}" type="hidden">
                        
                      <input class="form-control" name="new_module[{{$sf->id}}][id]" type="hidden" value="{{ $sf->id }}">
                      <input class="form-control" name="new_module[{{$sf->id}}][module_id]" type="hidden" value="{{ $sf->module_id }}">
                      <input class="form-control" name="new_module[{{$sf->id}}][date_affect]" type="hidden" value="{{ $sf->date_affect }}">
                      <input class="form-control" name="new_module[{{$sf->id}}][created_at]" type="hidden" value="{{ $sf->created_at }}">
                      <input class="form-control" name="new_module[{{$sf->id}}][updated_at]" type="hidden" value="{{ date('y-m-d H:i:s') }}">

                      {{ $sf->date_affect }} - {{ $sf->module }}
                      <i class="fa fa-trash" onclick="delete_module_item(this)"></i>
                    </div>
                  @endforeach
                @endif
              </div>

              <div class="row affecttation">
                <b class="col-md-12">تعيين وحدة دراسية :</b>
                <div class="col-md-8">
                  <select class="form-control" id="module" name="module">
                    <option value=""></option>
                  @foreach($modules as $module)
                    @if( !in_array( $module->id, $student_modules ) )
                    <option value="{{ $module->id }}">{{ $module->getfull() }}</option>
                    @endif
                  @endforeach
                  </select>
                </div>  
                <div class="col-md-3">
                  <input class="form-control datepicker" id="date_affect" type="text" placeholder="Date : ">
                </div>
                <div class="col-md-1" style="padding: 0;">
                  <button id="add_module_item" type="button" class="btn btn-indigo"><i class="fa fa-plus"></i></button>
                </div>
                <div class="clear"></div>
              </div>

            </div>
          </div>
          <!-- / Modules -->
        </div>

    </div>



    <script type="text/javascript">
      $(document).ready(function(){
        var iformation = 1;
        $('#add_formation_item').click(function(){
          $formation_id = $('select#formation').val();
          $formation_text = $('select#formation option[value='+$formation_id+']').text();
          $semester = $('select#semester').val();
          $semester_text = $('select#semester option[value='+$semester+']').text();
          $created_at = "{{ date('y-m-d H:i:s') }}";
          $updated_at = "{{ date('y-m-d H:i:s') }}";
          $year = $('input#year').val();

          if( $year && $semester && $formation_id ){
            $('#formations_inscri').append('<div class="formation_item new"> <input class="form-control" name="new_formation[new_'+iformation+'][id]" type="hidden" value=""> <input class="form-control" name="new_formation[new_'+iformation+'][formation_id]" type="hidden" value="'+$formation_id+'"> <input class="form-control" name="new_formation[new_'+iformation+'][student_id]" type="hidden" value="{{ $object->id }}"> <input class="form-control" name="new_formation[new_'+iformation+'][year]" type="hidden" value="'+$year+'"> <input class="form-control" name="new_formation[new_'+iformation+'][semester]" type="hidden" value="'+$semester+'"> <input class="form-control" name="new_formation[new_'+iformation+'][created_at]" type="hidden" value="'+$created_at+'"> <input class="form-control" name="new_formation[new_'+iformation+'][updated_at]" type="hidden" value="'+$updated_at+'"> '+$year +' - '+$semester_text +' - '+$formation_text+' <i class="fa fa-trash" onclick="delete_formation_item(this)"></i></div>');
            $('input#year').val("");
            iformation++;
          }else{
             $('input#year').focus();
          }
        });
      });
      function delete_formation_item(i){
        $(i).parent().remove();              
      }
      // for modules

      $(document).ready(function(){
        var imodule = 1;
        $('#add_module_item').click(function(){
          $module_id = $('select#module').val();
          $module_text = $('select#module option[value='+$module_id+']').text();
          $created_at = "{{ date('y-m-d H:i:s') }}";
          $updated_at = "{{ date('y-m-d H:i:s') }}";
          $date_affect = $('input#date_affect').val();

          if( $date_affect && $module_id ){
            $('#modules_inscri').append('<div class="module_item new"> <input class="form-control" name="new_module[new_'+imodule+'][id]" type="hidden" value=""> <input class="form-control" name="new_module[new_'+imodule+'][module_id]" type="hidden" value="'+$module_id+'">  <input class="form-control" name="new_module[new_'+imodule+'][date_affect]" type="hidden" value="'+$date_affect+'">   <input class="form-control" name="new_module[new_'+imodule+'][created_at]" type="hidden" value="'+$created_at+'">   <input class="form-control" name="new_module[new_'+imodule+'][updated_at]" type="hidden" value="'+$updated_at+'"> '+$date_affect +' - '+$module_text+' <i class="fa fa-trash" onclick="delete_module_item(this)"></i></div>');

            $('input#date_affect').val("");
            imodule++;
          }else{
             $('input#date_affect').focus();
          }
        });
      });
      function delete_module_item(i){
        $(i).parent().remove();              
      }
    </script>
    <style type="text/css">
      .affecttation{
        background: #f2f2f2;
        border: solid 1px #ccc;
        padding: 10px 0;
        margin-bottom: 20px;
      }
      .affecttation b{
        display: block;
        margin-bottom: 10px;
        padding-top: 5px;
      }
      .formation_item ,
      .module_item {
        margin:5px 0;
        border: solid 1px #ccc; 
        border-left: solid 4px #ccc; 
        padding: 5px;
        background: #f0f0f0;
        width: 100%;
        height: 43px;
        line-height: 35px;
        font-weight: bold;
      } 
      .formation_item i ,
      .module_item i {
        width: 35px; 
        margin-left: 10px;
        display: inline-block; 
        background: red; 
        padding: 5px 0; 
        text-align: center; 
        color: #fff; 
        float: right; 
        cursor: pointer; 
        font-size: 20px; 
      }
      .formation_module .form-group{
        padding: 20px
      }

      #modules_inscri,
      #formations_inscri{
        min-height: 120px;
        display: block;
        margin-bottom: 10px;
        border: solid 1px #ccc;
        padding: 5px 10px;
      }
    </style>


    <div class="card-footer text-right">
      @include('layout.update-actions')
    </div>
  </form>
 
@endsection
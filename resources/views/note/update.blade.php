@extends('standard')

@section('content')

  <form class="card" id="form_note_store" method="POST" enctype="multipart/form-data" action="{{ route('note_store') }}">
    {{ csrf_field() }}
    <div class="card-body">
      <h3 class="card-title">
        {{ __('note.note_create') }}
      </h3>
      <div class="row">

        <div class="col-md-3">
          <div class="form-group">
            <label class="form-label">{{ __('note.year') }}</label>
            <select class="form-control" id="year" name="year" required="">
              @for( $y = date('Y'); $y > 2003; $y-- )
              <option value="{{ $y }}-{{ $y+1 }}">{{ $y }} - {{ $y+1 }}</option>
              @endfor
            </select>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label class="form-label">{{ __('note.formation') }}</label>
            <select class="form-control" id="formation" name="formation" required="">
              @foreach( $formations as $formation )
              <option value="{{ $formation->id }}">{{ $formation }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label class="form-label">{{ __('note.semester') }}</label>
            <select class="form-control" id="semester" name="semester" required="">
              @foreach( semesters() as $s=>$s_name )
              <option value="{{ $s }}">{{ $s_name }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-3">
          <div class="form-group">
            <label class="form-label">{{ __('note.module') }}</label>
            <select class="form-control" id="module" name="module" required="">
            </select>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-12"  id="notes"></div>
      </div>
    </div>
    <div class="card-footer text-right">
       @include('layout.update-actions')
    </div>


    <script type="text/javascript">
      $(document).ready(function(){
        $('#formation,#semester').change(function(){
          $f = $('select#formation').val();
          $s = $('select#semester').val();

          load_modules($f, $s);
        });

        $('#year,#module').change(function(){
          $f = $('select#formation').val();
          $y = $('select#year').val();
          $s = $('select#semester').val();
          $m = $('select#module').val();

          load_module_notes($f, $s, $y, $m);
        });

        $('#save_btn').click(function(e){
          e.preventDefault();
          $.post('{{ route('note_store') }}', $('#form_note_store').serialize(), function(status){
            console.log(status);
            alert(status);
          })
        });
      });

      function load_modules(_f, _s){
        $('#module').html('');

        if( _f && _s ){
          $.get("{{ route('loadmodules') }}/?formation="+_f+"&semester="+_s, function($_modules){
            $.each($_modules, function($i, $mdl){
              $('#module').append('<option value="'+$mdl.id+'">'+$mdl.titre+'</option>');
            });
            $('#module').trigger('change');
          });
        }else{
            $('#module').trigger('change');
        }

      }

      function load_module_notes(_f, _s, _y, _m){
        $('#notes').html('');

        if( _f && _s && _y && _m ){
          $.get("{{ route('note_students') }}/?formation="+_f+"&semester="+_s+"&year="+_y+"&module="+_m, function($_html){
            $('#notes').html($_html);
          });
        }
      }
    </script>
  </form>

@endsection
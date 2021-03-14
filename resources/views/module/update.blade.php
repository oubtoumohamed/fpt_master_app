@extends('standard')

@section('content')

  <form class="card" method="POST" enctype="multipart/form-data" action="@if($object->id){{ route('module_update',$object->id) }}@else{{ route('module_store') }}@endif">
    {{ csrf_field() }}
    <div class="card-body">
      <h3 class="card-title">
        @if($object->id)
          {{ __('module.module_edit') }}
        @else
          {{ __('module.module_create') }}
        @endif

      </h3>
      <div class="row">

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">{{ __('module.code') }}</label>
            <input type="text" class="form-control" name="code" id="code" value="@if($object->id){{ $object->code }}@else{{ old('code') }}@endif" />
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">{{ __('module.titre') }}</label>
            <input type="text" class="form-control" name="titre" id="titre" value="@if($object->id){{ $object->titre }}@else{{ old('titre') }}@endif" />
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">{{ __('module.formation') }}</label>
            <select class="form-control" id="formation_id" name="formation_id" required="">
              @foreach( $formations as $formation )
              <option value="{{ $formation->id }}" @if($object->id && $object->formation_id == $formation->id ) selected="selected" @endif>{{ $formation }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">{{ __('module.semester') }}</label>
            <select class="form-control" id="semester" name="semester" required="">
              @foreach( semesters() as $s=>$s_name )
              <option value="{{ $s }}" @if($object->id && $object->semester == $s ) selected="selected" @endif>{{ $s_name }}</option>
              @endforeach
            </select>
          </div>
        </div>

      </div>
    </div>
    <div class="card-footer text-right">
      @include('layout.update-actions')
    </div>
  </form>

@endsection
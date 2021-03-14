@extends('standard')

@section('content')

  <form class="card" method="POST" enctype="multipart/form-data" action="@if($object->id){{ route('formation_update',$object->id) }}@else{{ route('formation_store') }}@endif">
    {{ csrf_field() }}
    <div class="card-body">
      <h3 class="card-title">
        @if($object->id)
          {{ __('formation.formation_edit') }}
        @else
          {{ __('formation.formation_create') }}
        @endif

      </h3>
      <div class="row">

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">{{ __('formation.code') }}</label>
            <input type="text" class="form-control" name="code" id="code" value="@if($object->id){{ $object->code }}@else{{ old('code') }}@endif" />
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">{{ __('formation.titre') }}</label>
            <input type="text" class="form-control" name="titre" id="titre" value="@if($object->id){{ $object->titre }}@else{{ old('titre') }}@endif" />
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">{{ __('formation.intitule_fr') }}</label>
            <input type="text" class="form-control" name="intitule_fr" id="intitule_fr" value="@if($object->id){{ $object->intitule_fr }}@else{{ old('intitule_fr') }}@endif" />
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">{{ __('formation.intitule_ar') }}</label>
            <input type="text" class="form-control" name="intitule_ar" id="intitule_ar" value="@if($object->id){{ $object->intitule_ar }}@else{{ old('intitule_ar') }}@endif" />
          </div>
        </div>        

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-label">{{ __('formation.langue') }}</label>
            <select id="langue" name="langue" class="form-control select_with_filter">
              <option value=""></option>
              <option value="ARABE" @if($object->id && $object->getlangue() == "ARABE" ) selected="selected" @endif >ARABE</option>
              <option value="FRANÇAIS" @if($object->id && $object->getlangue() == "FRANÇAIS" ) selected="selected" @endif >FRANÇAIS</option>
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
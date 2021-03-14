
<div class="table-responsive">
  <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr style="background-color: #04519e;">
        <th style="color: #fff; padding: 15px; text-align: center;"> {{ __('note.student') }} </th>
        <th style="color: #fff; padding: 15px; text-align: center;"> {{ __('note.note_normale') }} </th>
        <th style="color: #fff; padding: 15px; text-align: center;"> {{ __('note.remark_normale') }} </th>
        <th style="color: #fff; padding: 15px; text-align: center;"> {{ __('note.note_ratt') }} </th>
        <th style="color: #fff; padding: 15px; text-align: center;"> {{ __('note.remark_ratt') }} </th>
        <!--th style="color: #fff; padding: 15px; text-align: center;"> {{ __('note.validate') }} </th-->
      </tr>
    </thead>

    <tbody>
      @php $index_id = 1; $txt_id = ""; @endphp

      @foreach( $student_formation as $sf )
        @php

        $note = $sf->module_note($module);

        if( $note->id > 0 ){
          $txt_id = $note->id;
        }else{          
          $txt_id = "note_".$index_id;
          $index_id++;
        }

        @endphp
        <tr> 
          <td> 
            <input class="form-control" type="hidden" name="sf[{{ $sf->id }}][{{ $txt_id }}][id]" value="{{ $note->id }}" /> 
            <input class="form-control" type="hidden" name="sf[{{ $sf->id }}][{{ $txt_id }}][student_formation_id]" value="{{ $sf->id }}" /> 
            <input class="form-control" type="hidden" name="sf[{{ $sf->id }}][{{ $txt_id }}][module_id]" value="{{ $module }}" /> 
            <input class="form-control" type="hidden" name="sf[{{ $sf->id }}][{{ $txt_id }}][created_at]" value="{{ $note->created_at }}" /> 

            <span>{{ $sf->student }}</span>
          </td>
          <td> 
            <input class="form-control" type="number" step="0.1" name="sf[{{ $sf->id }}][{{ $txt_id }}][note_normale]" value="{{ $note->note_normale }}" /> 
          </td>
          <td> 
            <input class="form-control" type="text" name="sf[{{ $sf->id }}][{{ $txt_id }}][remark_normale]" value="{{ $note->remark_normale }}" /> 
          </td>
          <td> 
            <input class="form-control" type="number" step="0.1" name="sf[{{ $sf->id }}][{{ $txt_id }}][note_ratt]" value="{{ $note->note_ratt }}" /> 
          </td>
          <td> 
            <input class="form-control" type="text" name="sf[{{ $sf->id }}][{{ $txt_id }}][remark_ratt]" value="{{ $note->remark_ratt }}" /> 
          </td>
          <!--td> 
            <input class="form-control" type="checkbox" name="sf[{{ $sf->id }}][{{ $txt_id }}][validate]" value="{{ $note->validate }}" /> 
          </td -->
          
        </tr>

      @endforeach
    </tbody>
    
  </table>
</div>
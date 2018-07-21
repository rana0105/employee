{{-- <form action="{{ route('postRemark, $supply->id') }}" method="POST">
  {{ csrf_field() }} --}}
{!! Form::model( $supply, ['route' => ['postRemark', $supply->id], 'files' => true, 'method' => 'POST']) !!}
{{ csrf_field() }}
  <div class="form-group row">
    <label for="to_date" class="col-sm-3 col-form-label">Remark</label>
      <div class="col-sm-9">
          <input type="text" name="remark" class="form-control" value="{{$supply->remark}}" required="">
      </div>
  </div>
  <input type="hidden" name="supply_id" value="{{$supply->id}}">
  </div>
  <div class="form-group row">
      <div class="col-sm-10">
          <button type="submit" class="btn btn-sm btn-primary">Save</button>
      </div>  
  </div>
  {!! Form::close() !!}
{{-- </form> --}}
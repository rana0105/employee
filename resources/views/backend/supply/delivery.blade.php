<form action="{{ route('supply-date') }}" method="POST">
  {{ csrf_field() }}
  <div class="form-group row">
      <div class="col-sm-10">
          <input type="hidden" name="supply_id" value="{{ $supply->id }}" required="" class="form-control">
      </div>
  </div>
  <div class="form-group row">
    <label for="to_date" class="col-sm-3 col-form-label">Delivery Date</label>
      <div class="col-sm-9">
          <input type="date" name="supply_date" class="form-control" required="">
      </div>
  </div>
  <div class="form-group row">
    <label for="to_date" class="col-sm-3 col-form-label">Size</label>
      <div class="col-sm-9">
              <select name="size_id" id="size_id" class="livesearch form-control" required="">
                  @foreach($supply->quantity as $size)
                      <option value="{{ $size->size_id }}">{{ $size->sizeName->name }}</option>
                  @endforeach
              </select>
              @if ($errors->has('size_id'))
                  <span class="help-block text-danger">
                      <strong>{{ $errors->first('size_id') }}</strong>
                  </span>
              @endif
      </div>
  </div>
  <div class="form-group row">
    <label for="to_date" class="col-sm-3 col-form-label">Quantity</label>
      <div class="col-sm-9">
          <input type="number" name="supply_quantity" placeholder="Quantity" required="" class="form-control">
      </div>
  </div>
  <div class="form-group row">
    <label for="to_date" class="col-sm-3 col-form-label">Delivery No</label>
      <div class="col-sm-9">
          <input type="text" name="delivery_no" placeholder="Delivery No" required="" class="form-control">
      </div>
  </div>
  <div class="form-group row">
      <div class="col-sm-10">
          <button type="submit" class="btn btn-sm btn-primary">Save</button>
      </div>  
  </div>
</form>
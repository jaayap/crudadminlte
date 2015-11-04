<!--// a: SEARCH BOX -->
{!! Form::open(array('url'=>route('search'), 'id'=>'frmSearch', 'role'=>'search')) !!}
  <div class="input-group input-group-sm">
    {!! Form::text('search', $searchterm, ['id'=>'search', 'placeholder'=>'Search', 'class'=>'form-control']) !!}
    <span class="input-group-btn">
      <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
      <button class="btn btn-default _reset" type="submit"><i class="glyphicon glyphicon-remove-circle"></i></button>
    </span>
  </div>
{!! Form::close() !!}
<!--// z: SEARCH BOX -->

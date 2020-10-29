@if ($errors->count())
<div class="col-md-8 mx-auto alert alert-danger mt-3">
  <ul class="list-unstyled">
    @foreach ($errors->all() as $error)
      <li class="list-item">{{ $error}}</li>
    @endforeach
  </ul>

  </div> 
@endif
{{-- Controllo automatico se ci sono errori. Il validator nel controller passa in automatico alla view gli errori (Se ci sono) nella variabile $errors --}}
@if ($errors->any())
  <div class="row alert alert-dismissable alert-danger align-items-center">
    <div class="col-md-11">
      <ul class="mt-3">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    <div class="col-md-1">
      <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
    </div>
@endif

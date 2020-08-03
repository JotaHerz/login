@if(session('status'))
<div class="alert alert-primary" role="success">
    {{session('status')}}
  </div>
@endif

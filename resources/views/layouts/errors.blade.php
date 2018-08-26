@if (count($errors))
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $message)
    <li>{{ $message }}</li>
    @endforeach
  </ul>
</div>
@endif

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

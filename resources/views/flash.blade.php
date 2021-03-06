@if($errors->any())
    <div class="alert-danger pure-button-primary" role="alert">{{$errors->first()}}</div>
@endif
@if (Session::has('success'))
    <div class="alert-success pure-button-primary">{{ Session::get('success') }}</div>
@endif
@if (Session::has('error'))
    <div class="alert-danger pure-button-primary">{{ Session::get('error') }}</div>
@endif
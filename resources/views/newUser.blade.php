@extends('base')
@section('title')
 - create new user
@append

@section('content')
<h1>Create New User</h1><hr>


<div class="col-md-12">
    <div class="col-md-8">
        <form action="{{URL::route('user-new')}}" method="POST" class="pure-form pure-form-stacked tag-description" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="team_id" value={{$id}}>
           
            <fieldset>
                <br>
                <div class="pure-control-group @if ($errors->has('name')) has-error @endif">
                    <label for="name">name:</label>
                    <input id="name" type="text" name="name" value="{{ Request::old('name') }}" placeholder="First name">
                    @if ($errors->has('name'))<p class="help-block">{{$errors->first('name')}}</p>@endif
                </div>
                <div class="pure-control-group @if ($errors->has('sure_name')) has-error @endif">
                    <label for="sure_name">sure_name:</label>
                    <input id="sure_name" type="text" name="sure_name" value="{{ Request::old('sure_name') }}" placeholder="Surename">
                    @if ($errors->has('sure_name'))<p class="help-block">{{$errors->first('sure_name')}}</p>@endif
                </div>
                <div class="pure-control-group @if ($errors->has('age')) has-error @endif">
                    <label for="age">age:</label>
                    <input id="age"  type="text" name="age" value="{{ Request::old('age') }}" placeholder="Age">
                    @if ($errors->has('age'))<p class="help-block">{{$errors->first('age')}}</p>@endif
                </div>
            
                <br>
            </fieldset>

            <button type="submit" class="pure-button pure-button-primary success tag-accept-button">Create User</button>
        </form>
    </div>
</div>

@endsection
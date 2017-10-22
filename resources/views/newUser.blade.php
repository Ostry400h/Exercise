@extends('base')
@section('title')
 - create new user
@append

@section('content')
<h1>Create New User</h1><hr>


<div class="col-md-12">
    <div class="col-md-8">
        <form action="{{URL::route('user-new')}}" method="POST" class="form form-group tag-description" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="team_id" value={{$id}}>
           
            <fieldset>
                <br>
                <div class="form-group @if ($errors->has('name')) has-error @endif">
                    <label for="name">First name:</label>
                    <input id="name" class="form-control" type="text" name="name" value="{{ Request::old('name') }}" placeholder="First name">
                    @if ($errors->has('name'))<p class="help-block">{{$errors->first('name')}}</p>@endif
                </div>
                <div class="form-group @if ($errors->has('sure_name')) has-error @endif">
                    <label for="sure_name">Sure name:</label>
                    <input id="sure_name" class="form-control" type="text" name="Sure name" value="{{ Request::old('sure_name') }}" placeholder="Surename">
                    @if ($errors->has('sure_name'))<p class="help-block">{{$errors->first('sure_name')}}</p>@endif
                </div>
                <div class="form-group @if ($errors->has('age')) has-error @endif">
                    <label for="age">Age:</label>
                    <input id="age" class="form-control" type="text" name="age" value="{{ Request::old('age') }}" placeholder="Age">
                    @if ($errors->has('age'))<p class="help-block">{{$errors->first('age')}}</p>@endif
                </div>
            
                <br>
            </fieldset>

            <button type="submit" class="btn btn-success tag-accept-button"><i class="fa fa-plus fa-lg" aria-hidden="true"></i>Create User</button>
            </form>
            <a href="{{URL::route('list')}}" title="List">
            <button class="btn btn-danger tag-accept-button"> Cancel</button>
        </a>
        
    </div>
</div>

@endsection
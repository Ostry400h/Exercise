@extends('base')

@section('title')
 - create new team
@append

@section('content')
<h1>Create New Team</h1><hr>

{{--@if (is_object($data))--}}

<div class="col-md-12">
    <div class="col-md-8">
        <form action="{{URL::route('team-new')}}" method="POST" class="pure-form pure-form-stacked tag-description" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <fieldset>
                <br>
                <div class="pure-control-group @if ($errors->has('team_name')) has-error @endif">
                    <label for="team_name">Team Name:</label>
                    <input id="team_name" type="text" name="team_name" value="{{ Request::old('team_name') }}" placeholder="team_name">
                    @if ($errors->has('team_name'))<p class="help-block">{{$errors->first('team_name')}}</p>@endif
                </div>

                <br>
            </fieldset>

            <button type="submit" class="pure-button pure-button-primary success tag-accept-button">Create Team</button>
        </form>
    </div>
</div>

@endsection
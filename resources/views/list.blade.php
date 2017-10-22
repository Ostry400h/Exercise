@extends('base')

@section('title')
Teams
@endsection

@section('content')

<h1>List Teams</h1><hr>

@if (!empty($data))
<div class="list-control">
   <div class="list-control-item">
        {{--@include('search')--}}
    </div>
    <div class="list-control-item">
         {{--@include('filter')--}}
    </div>
    <div class="list-control-item">
        <a href="{{URL::route('team-new')}}" title="Create new Team">
            <button type="submit" class="btn btn-success tag-accept-button"> <i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create Team</button>
        </a>
    </div>
</div>

<table class="table table-horizontal">

    <thead>
        <tr>
            <th>Team</th>
            <th>Players</th>
            <th></th>
            <th>Actions</th>
        </tr>
    </thead>
   
    <tbody>
        @foreach ($data as $team)
        <tr class="success">
            <td><h2>{{ $team->team_name }}</h2></td> 
            <td>{{$team->team_count}}</td> 
            <td></td>
            <td>           

                    @if($team->team_count < 3)
                    
                        <a href="{{URL::route('user-new', array('id' => $team->id ))}}" class="btn btn-success btn-xs" title="Add new User">
                            <i class="controls-btn success pure-button-success fa fa-user-plus fa-lg" aria-hidden="true"></i>
                        </a>
                    
                    @endif
                   
                    <form action="{{URL::route('team-delete', array('id' => $team->id ))}}" method="POST" class="pure-form pure-form-stacked tag-description" enctype="multipart/form-data" id="teamDelete">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class = "btn btn-danger btn-xs" type="submit" title="Delete team" value="teamDelete">
                            <i class="controls-btn error fa fa-trash-o fa-lg" aria-hidden="true"></i>
                        </button>
                        </form>

            </td>
        </tr>
        <tr class="active">
            <th>Name</th>
            <th>Surename</th>
            <th>Age</th>
            <th></th>
        </tr>
            @foreach($team->users as $user)
                <tr class="warning">
                    <td>{{$user->name}}</td>
                    <td>{{$user->sure_name}}</td>
                    <td>{{$user->age}}</td>
                    <td>

                       <form action="{{URL::route('user-delete', array('id' => $user->id ))}}" method="POST" class="pure-form pure-form-stacked tag-description" enctype="multipart/form-data" id= "userDelete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class = "btn btn-danger btn-xs" type="submit" title="Delete user" value="userDelete"><i class="controls-btn error fa fa-trash-o fa-lg" aria-hidden="true"></i>
                            </button>
                        </form>
                   </td>
                </tr>
            @endforeach
        @endforeach
    </tbody>

</table>
<br>
<br>
@else

<h2>Empty</h2>

@endif
@endsection


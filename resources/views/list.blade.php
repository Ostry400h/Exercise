@extends('base')

@section('title')
Teams
@endsection

@section('content')

<h1>List Teams</h1><hr>
{{--@php $data = null; 
@endphp--}}


@if (!empty($data))
<div class="list-control">
   <div class="list-control-item">
        {{--@include('admin.search')--}}
    </div>
    <div class="list-control-item">
         {{--@include('admin.sections.users.extension.userFilterSwitch')--}}
    </div>
    <div class="list-control-item">
        <a href="{{URL::route('team-new')}}" title="Create new Team">
            <button type="submit" class="pure-button pure-button-primary success tag-accept-button"> <i class="fa fa-plus fa-lg" aria-hidden="true"></i> Create Team</button>
        </a>
    </div>--}}
</div>

<table class="pure-table  pure-table-horizontal">

    <thead>
        <tr>
            <th>Team</th>
            <th>Count</th>
            <th></th>
        </tr>
    </thead>
   
    <tbody>
        @foreach ($data as $team)
{{--
        @include('admin.sections.users.extension.viewFlagWindows')
        @include('admin.sections.users.extension.setFlagWindows')
        @include('admin.sections.users.extension.deleteUser')
        @include('admin.sections.users.extension.sendEmail')

        @if ($user->status == 3)
        <tr class="tr-ban">
        @elseif ($user->admin == 1)
        <tr class="tr-admin">
        @elseif ($user->flag == 1)
        <tr class="tr-flag">
        @else 
        <tr>
        @endif --}}
        <tr >
            <td><h2>{{ $team->team_name }}</h2></td> 
            <td>{{$team->team_count}}</td> 
            <td></td>
            <td>           
                <ul class="pure-menu-list" style="width:100px">

                    @if($team->team_count < 3)
                    <li class="pure-menu-item">
                        <a href="{{URL::route('user-new', array('id' => $team->id ))}}" class="btn btn-success btn-xs" title="Add new User">
                            <i class="controls-btn success pure-button-success fa fa-user-plus fa-lg" aria-hidden="true"></i>
                        </a>
                    </li>
                    @endif
                    <li class="pure-menu-item">
                    <form action="{{URL::route('team-delete', array('id' => $team->id ))}}" method="POST" class="pure-form pure-form-stacked tag-description" enctype="multipart/form-data" id="teamDelete">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class = "btn btn-danger btn-xs" type="submit" title="Delete team" value="teamDelete">
                            <i class="controls-btn error fa fa-trash-o fa-lg" aria-hidden="true"></i>
                        </button>
                        </form>
                    </li>
                    
                </ul>

            </td>
        </tr>
        <tr>
            <th>Name</th>
            <th>Surename</th>
            <th>Age</th>
            <th></th>
        </tr>
         @foreach($team->users as $user)
                    <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->sure_name}}</td>
                    <td>{{$user->age}}</td>
                    <td><ul class="pure-menu-list" style="width:100px">

                    <li class="pure-menu-item">
                       <form action="{{URL::route('user-delete', array('id' => $user->id ))}}" method="POST" class="pure-form pure-form-stacked tag-description" enctype="multipart/form-data" id= "userDelete">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button class = "btn btn-danger btn-xs" type="submit" title="Delete user" value="userDelete">
                            <i class="controls-btn error fa fa-trash-o fa-lg" aria-hidden="true"></i>
                        </button>
                        </form>
                    </li>
                    
                </ul></td>
                    </tr>
                   @endforeach
        @endforeach
    </tbody>

</table>
<br>
<br>
{{-- $data->links() --}}
@else

<h2>Empty</h2>

@endif
@endsection


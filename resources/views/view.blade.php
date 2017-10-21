@extends('base')

@section('title')
Teams
@endsection

@include ('list')
{{--@section('submenu')
<li class="pure-menu-item context-sub-menu">
    <a href="{{URL::route('teams', array('type' => 'lists'))}}" class="pure-menu-link">
        <i class="fa fa-list-ul fa-lg fa-fw" aria-hidden="true"></i>
        List
    </a>
</li>

<li class="pure-menu-item menu-item-divided"></li>
@endsection
--}}
{{--
@php $baseSubMenu = 'teams' @endphp

@if ($type == 'list')
    @include ('list')
@elseif ($type == 'new')
    @include('views.newTeam')
@elseif ($type == 'edit')
    @include('views.editTeam')
@elseif ($type == 'newUser')
    @include('views.newUser')
@elseif ($type == 'editUser')
    @include('views.editUser')
@else
    @include ('list')
@endif
--}}
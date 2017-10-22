<?php

namespace App\Http\Controllers;

use Validator;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller as Controller;

use App\Exceptions\Viewable;

use App\Model\User;
use App\Model\Team;

use App\Providers\ValidatorServiceProvider;


class TeamController extends Controller
{

    public function getUserLists()
    {
        $builder = \DB::table("teams AS t")
                        ->select('t.team_name','id')
                        ->get();

        foreach($builder as $data)
        {
            $data->users = \DB::table("users AS u")
                            ->select('u.name',
                                'u.sure_name',
                                'u.id',
                                'u.age',
                                'team_id'
                                //,                                
                                )
                            ->where('team_id',$data->id)
                            ->get();
               
            $data->team_count = \DB::table("users")
                            ->select(\DB::raw("COUNT(team_id) as team_count"))
                            ->where('team_id',$data->id)
                            ->first()->team_count;
             
        }

        return View::make('list', ['data'=> $builder]);
    }
    public function deleteUser($id)
    {
        $user = User::where('id', $id)->delete();

        return Redirect::to('/')->with('success', 'User deleted');;
   }
    public function deleteTeam($id)
    {
         $team = Team::where('id', $id)->delete();
         $users = User::where('team_id', $id)->delete();

        return Redirect::to('/')->with('success', 'Team and his users deleted');;
   
    }
        public function prepareEditUser(Request $request, $id, $type = 'edit')
    {
        $data = User::where('id', $id)->first();

        return View::make('admin.sections.users.view', [
                                                    'type'       => $type,
                                                    'data'       => $data, 
                                                ]);
    }
    public function prepareNewUser(Request $request)
    {
        //$request->input('id');
        return View::make('newUser', ['id' => $request->input('id')]);
    }
    public function newUser(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:4|max:40',
            'sure_name' => 'required|min:4|max:40|',
            'age' => 'integer|nullable',
            'team_id'=> 'integer'
        ]);
        if ($validator->fails())
        {
            return Redirect::to('users/new?id='.$request->input('team_id'))
                                ->withInput($request->all())
                                ->withErrors($validator);
        }

        $count_user = User::where('team_id',$request->input('team_id'))->count();
        if($count_user >= 3)
            return Redirect::to('/')->with('error','Team is full');

        $user = new User; 

        $user->name = $request->input('name');
        $user->sure_name = $request->input('sure_name');
        if($request->has('age'))
            $user->age = $request->input('age');
        $user->team_id = $request->input('team_id');
        
        $user->save();
        
        return Redirect::to('/')->with('success', 'User create success');
  
    }
        public function prepareNewTeam(Request $request)
    {
       
        return View::make('newTeam');
    }
    public function addTeam(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'team_name' => 'required|unique:teams,team_name|min:4|max:40',
        ]);
        if ($validator->fails())
        {
            return Redirect::to('team/new')
                                ->withErrors($validator)
                                ->withInput($request->all());
        }

        $team = new Team; 

        $team->team_name = $request->input('team_name');

        $team->save();
        $teamId = $team->id;
        
        return Redirect::to('/')->with('success', 'Team create success');
  
    }
    
}
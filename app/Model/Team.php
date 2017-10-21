<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'teams';
    protected $fillable = ["id", "team_name"];


}

<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $table = 'users';
    protected $fillable = ["id", "name", "sure_name", "age", "team_id"];


}

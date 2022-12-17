<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Photo;
use App\Models\Project;
use App\Models\Task;



class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'phone_number', 'deleted','administrator',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The projects this user participates in.
     */
    public function projects() {  
        return $this->belongsToMany(Project::class,
                                 'role',
                                 'id_user',
                                 'id_project')->orderBy('id', 'ASC');
    }

    public function favoriteProjects() {
        return $this->hasMany('App\Models\Favorite','id_user');
    }
    
    /**
     * The user's photo
     */

    public function photo() {  
        return $this->hasOne('App\Models\Photo','id_user');
    }

    /**
     * User's notifications
     */
    public function notifications() {  
        return $this->hasMany('App\Models\Notification','id_user');
    }

    public function leaveProject(Project $project){
        return $this->hasMany('App\Models\Role','id_user')->where('id_project',$project->id)->delete();
    }

}

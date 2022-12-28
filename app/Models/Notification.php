<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notification';

    public $timestamps  = false;

    public function text(){
        if($this->type == 'Invite'){
            return (User::find(Invite::find($this->id_invite)->id_user_sender)->name).' convidou-te para te juntares a '.(Project::find($this->id_project)->name);
        }elseif ($this->type == 'Assign'){
            return 'Foi-te atribuida a task "' . (Task::find($this->id_task)->name) . '" do projeto "'. (Project::find($this->id_project)->name). '".';
        }elseif ($this->type == 'TaskState'){
            return 'O estado da task "' . (Task::find($this->id_task)->name) . '" do projeto '. (Project::find($this->id_project)->name). ' foi atualizado ';
        }
    }
}

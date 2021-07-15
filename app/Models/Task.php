<?php

namespace App\Models;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    //Fillable
    protected $fillable = [
        'task_name',
        'task_priority',
        'project_id'
    ];


    //relationship
    public function project(){
        return $this->belongsTo(Project::class);
    }

    //Relationship
    public function user(){
        return $this->belongsTo(User::class);
    }
}

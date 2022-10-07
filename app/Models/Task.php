<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\User;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'project_id',
        'status',
    ];
    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}

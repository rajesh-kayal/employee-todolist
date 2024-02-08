<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_type_id';

    protected $fillable = ['task_title', 'task_description'];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'task_type_id');
    }
}

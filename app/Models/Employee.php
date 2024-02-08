<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = 'emp_id';

    protected $fillable = ['name', 'email', 'phone', 'department'];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'task_id');
    }
}

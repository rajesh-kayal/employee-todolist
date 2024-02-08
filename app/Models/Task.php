<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'task_id';

    protected $fillable = ['task_status', 'deadline_days'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }

    public function TaskType()
    {
        return $this->belongsTo(TaskType::class, 'task_id');
    }
}

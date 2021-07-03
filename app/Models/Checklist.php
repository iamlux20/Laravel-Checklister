<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Task;

class Checklist extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'checklist_group_id', 'user_id', 'checklist_id'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user_tasks()
    {
        return $this->hasMany(Task::class)->where('user_id', auth()->id());
    }

    public function user_completed_tasks()
    {
        return $this->hasMany(Task::class)
            ->where('user_id', auth()->id())
            ->whereNotNull('completed_at');
    }
}

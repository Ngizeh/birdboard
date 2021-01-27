<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use RecordsActivity;

    protected $guarded = [];

    public function path()
    {
    	return "/projects/{$this->id}";
    }

    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
    	return $this->belongsTo(User::class);
    }

    public function tasks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
    	return $this->hasMany(Task::class);
    }

    public function addTask($body): Model
    {
    	return $this->tasks()->create(compact('body'));
    }

    public function activity(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Activity::class)->latest();
    }

}

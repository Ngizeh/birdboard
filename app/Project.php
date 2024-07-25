<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use RecordsActivity, HasFactory;

    protected $guarded = [];

    public function path(): string
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
        return $this->tasks()->create([
                'user_id' => auth()->id(),
                'body' => $body
            ]
        );
    }

    public function activity(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Activity::class)->latest();
    }

    public function invite(User $user) : void
    {
        $this->members()->attach($user);
    }

    public function members(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

}

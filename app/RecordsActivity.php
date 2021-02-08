<?php

namespace App;

use Illuminate\Support\Arr;

trait RecordsActivity
{
    public $oldAttribute = [];

    public static function bootRecordsActivity()
    {
        foreach (self::recordableEvents() as $event){
            self::$event(function ($model) use ($event) {
                $model->recordActivity($model->activityDescription($event));
            });

            if($event === 'updated'){
                self::updating(function($model){
                    $model->oldAttribute = $model->getOriginal();
                });
            }
        }

    }

    /**
     * @return array
     */
    public static function recordableEvents(): array
    {
        if (isset(static::$recordableEvents)) {
            return static::$recordableEvents;
        }
        return ['created', 'updated'];
    }

    /**
     * @param $description
     * @return string
     */
    protected function activityDescription($description): string
    {
        return "{$description}_" . strtolower(class_basename($this));
    }


    public function recordActivity($type)
    {
        $this->activity()->create([
            'project_id' => class_basename($this) == 'Project' ? $this->id : $this->project_id,
            'description' => $type,
            'changes' => $this->activityChanges(),
            'user_id' => ($this->project ?? $this)->owner->id
        ]);
    }

    public function activity(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    protected function activityChanges()
    {
        if ($this->wasChanged()) {
            return [
                'before' => Arr::except(array_diff($this->oldAttribute, $this->getAttributes()), 'updated_at'),
                'after' => Arr::except($this->getChanges(), 'updated_at')
            ];
        }
    }
}

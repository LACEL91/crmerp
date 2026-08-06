<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';

    protected $attributes = [
        'work_order_id' => null,
        'activity_type_id' => null,
        'activity_status_id' => null,
        'uuid' => null,
        'title' => null,
        'description' => null,
        'scheduled_at' => null,
        'due_at' => null,
        'completed_at' => null,
        'created_by' => null,
        'completed_by' => null,
    ];

    protected $fillable = [
        'work_order_id',
        'activity_type_id',
        'activity_status_id',
        'uuid',
        'title',
        'description',
        'scheduled_at',
        'due_at',
        'completed_at',
        'created_by',
        'completed_by',
    ];

    protected $casts = [
        'due_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function workOrder() {
        return $this->belongsTo(WorkOrder::class);
    }

    public function activityType() {
        return $this->belongsTo(ActivityType::class);
    }

    public function activityStatus() {
        return $this->belongsTo(ActivityStatus::class);
    }

    public function createdByUser() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function completedByUser() {
        return $this->belongsTo(User::class, 'completed_by');
    }
}

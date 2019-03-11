<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * @package App
 *
 * @property int id,
 * @property string title,
 * @property string description,
 * @property string due_datetime,
 * @property int priority,
 * @property int status,
 * @property int created_at,
 * @property int updated_at,
 */
class Task extends Model
{
    const STATUS_DONE = 3;

    const STATUS_IN_PROGRESS = 2;

    const STATUS_NEW = 1;

    const PRIORITY_HIGH = 3;

    const PRIORITY_MEDIUM = 2;

    const PRIORITY_LOW = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'due_datetime',
        'priority',
        'status',
        'created_at',
        'updated_at',
    ];
}

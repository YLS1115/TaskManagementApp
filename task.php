<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'priority',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'due_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * The default values for model's attributes.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'status' => 'Incomplete',
    ];

    /**
     * Set the task's priority.
     *
     * @param  string  $value
     * @return void
     */
    public function setPriorityAttribute($value)
    {
        $this->attributes['priority'] = ucfirst(strtolower($value));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'status',
    ];

    public function toggleComplete(): void
    {
        switch ($this->attributes['status']) {
            case 'created':
                $this->attributes['status'] = 'done';
                break;
            case 'done':
                $this->attributes['status'] = 'created';
                break;
        }

        $this->completed_at = $this->completed_at ? null : now();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

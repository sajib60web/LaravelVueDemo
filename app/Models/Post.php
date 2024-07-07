<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * Write code on Method
     *
     * @return response()
     */
    protected $fillable = [
        'title', 'body', 'slug'
    ];

    public function scopeMorning($query)
    {
        return $query->whereTime('created_at', '>=', '05:00:00')
            ->whereTime('created_at', '<=', '11:59:59');
    }

    public function scopeAfternoon($query)
    {
        return $query->whereTime('created_at', '>=', '12:00:00')
            ->whereTime('created_at', '<=', '17:59:59');
    }

    public function scopeEvening($query)
    {
        return $query->whereTime('created_at', '>=', '18:00:00')
            ->orWhereTime('created_at', '<=', '04:59:59');
    }
}

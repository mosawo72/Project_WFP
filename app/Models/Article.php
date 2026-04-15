<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'image',
        'category',
        'status',
    ];

    /**
     * Get the admin user who created this article.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

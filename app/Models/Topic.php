<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title','parent_id','user_id'];

    /* Owner */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* Parent topic */
    public function parent()
    {
        return $this->belongsTo(Topic::class, 'parent_id');
    }

   public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function children()
    {
        return $this->hasMany(Topic::class, 'parent_id');
    }
    
    protected static function booted()
    {
        static::deleting(function ($topic) {

            // CASE 2 & 3: Delete articles under THIS topic
            $topic->articles()->delete();

            // CASE 3: If MAIN topic → delete child topics (and their articles)
            if ($topic->children()->count() > 0) {
                foreach ($topic->children as $child) {
                    $child->delete(); // recursive
                }
            }
        });
    }
}
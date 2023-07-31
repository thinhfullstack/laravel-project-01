<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'parent',
        'created_by',
        'content',
        'meta_title',
        'meta_desc',
        'meta_keyword',
        'created_at',
        'updated_at',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    protected $appends = [
        'owner',
        'suntech'
    ];

    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d',
    // ];

    public function getOwnerAttribute()
    {
        return Category::find($this->id)->slug ?? null;
    }

    public function getSuntechAttribute()
    {
        return Category::find($this->id)->name ?? null;
    }
}

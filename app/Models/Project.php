<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $fillable = ['title', 'description', 'type_id', 'cover_image'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Author extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'username',
        'seotital',
        'occupation',
        'avatar'];

    public function setNameAttribute($value)
    {
        $this->attributes['username'] = $value;
        $this->attributes['seotital'] = Str::seotital($value);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
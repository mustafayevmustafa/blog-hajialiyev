<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;
    function getCategory() {
        return  $this->hasOne('App\Models\Category','id','category_id');
    }

    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class);
    }
}

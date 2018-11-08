<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //=========================== FIELDS
    protected $fillable =
        [
            'title',
            'body'
        ];

    //=========================== BELONGS
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //=========================== METHODS
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}

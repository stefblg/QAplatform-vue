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

    //=========================== HAS MANY
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    //=========================== METHODS
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
    public function getUrlAttribute()
    {
        return route("questions.show", $this->slug);
    }
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if ($this->answers_count> 0) {
            if ($this->best_answer_id) {
                return "answered_accepted";
            }
            return "answered";
        }
        return "unanswered";
    }

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }


}

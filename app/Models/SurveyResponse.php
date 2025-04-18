<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id',
        'question',
        'answer',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}

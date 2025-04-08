<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'profession',
        'it_professional',
        'purchase_frequency',
    ];

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }
}

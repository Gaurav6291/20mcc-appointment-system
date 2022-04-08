<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_type',
        'third_screen',
        'area',
        'type',
        'image_1',
        'image_2',
        'image_3',
        'user_id',
        'start_date',
        'end_date',
        'start_time',
        'end_time'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
}

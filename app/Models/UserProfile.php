<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $primaryKey = 'user_id';

    protected $fillable = ['user_id','country', 'city', 'birthdate'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');

    }
}

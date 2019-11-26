<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = "profiles";
    protected $primaryKey = 'user_id';
    protected $fillable = ['name','gender','about','user_id'];
}

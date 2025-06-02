<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Model;

class Landing extends Model
{
    protected $fillable = ['title', 'description', 'cta'];
}

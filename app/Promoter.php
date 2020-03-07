<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promoter extends Model
{
    protected $fillable = ['name', 'status', 'contact_name', 'contact_phone', 'email'];
}

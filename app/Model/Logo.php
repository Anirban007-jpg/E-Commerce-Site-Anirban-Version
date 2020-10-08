<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{

    protected $table = 'logos';

    protected $fillable =['image','created_by','updated_by'];
}

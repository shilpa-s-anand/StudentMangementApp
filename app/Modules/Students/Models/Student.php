<?php

namespace App\Modules\Students\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $table = 'students';

  public $timestamps = false;

}

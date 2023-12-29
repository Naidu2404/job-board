<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    //we create a  static array for experiences 
    public static array $experience = ['entry','intermediate','senior'];
    public static array $category = ['IT','Finance','Marketing','Sales'];
}

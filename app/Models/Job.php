<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;

    //relation to the employer table
    public function employer() : BelongsTo {
        return $this->belongsTo(Employer::class);
    }

    //we create a  static array for experiences 
    public static array $experience = ['entry','intermediate','senior'];
    public static array $category = ['IT','Finance','Marketing','Sales'];
}

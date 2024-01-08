<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;

    //relation to the employer table
    public function employer() : BelongsTo {
        return $this->belongsTo(Employer::class);
    }

    //relation to the job application model
    public function jobApplications() : HasMany {
        return $this->hasMany(JobApplication::class);
    }

    //checking whether the user has applied for the job or not
    public function hasUserApplied(Authenticate | User | int $user) : bool {
        return $this->where('id',$this->id)
        ->whereHas('jobApplications',
        fn($query) => $query->where('user_id','=',$user->id ?? $user))
        ->exists();
    }

    //we create a  static array for experiences 
    public static array $experience = ['entry','intermediate','senior'];
    public static array $category = ['IT','Finance','Marketing','Sales'];
}
